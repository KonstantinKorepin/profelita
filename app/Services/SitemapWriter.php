<?php

namespace App\Services;

use App\Models\Url;
use RuntimeException;
use XMLWriter;

class SitemapWriter
{
    /**
     * Записывает XML во временный файл и заменяет целевой файл после завершения.
     *
     * Каждый элемент url занимает одну строку. При ошибке прежний файл сохраняется,
     * а временный удаляется. Адрес сайта берётся из config('app.url').
     *
     * @param  iterable<Url>  $urls Записи URL, в том числе лениво загружаемая коллекция.
     * @param  string  $filename Путь к целевому файлу в существующем каталоге.
     * @param  string  $priority Значение элемента priority для всех URL.
     * @param  string|null  $lastmod Общая дата в формате Y-m-d; null использует updated_at каждого URL.
     * @return string Путь к записанному файлу.
     *
     * @throws RuntimeException Если адрес сайта не задан, каталог недоступен или запись файла не удалась.
     */
    public function write(iterable $urls, string $filename, string $priority = '0.5', ?string $lastmod = null): string
    {
        $baseUrl = rtrim((string) config('app.url'), '/');
        if ($baseUrl === '') {
            throw new RuntimeException('Не задан адрес сайта в config(app.url).');
        }

        $directory = dirname($filename);
        if (! is_dir($directory) || ! is_writable($directory)) {
            throw new RuntimeException('Каталог sitemap недоступен для записи.');
        }

        $temporaryFile = tempnam($directory, '.sitemap-');
        if ($temporaryFile === false) {
            throw new RuntimeException('Не удалось создать временный файл sitemap.');
        }

        try {
            $writer = new XMLWriter();
            if (! $writer->openUri($temporaryFile)
                || ! $writer->startDocument('1.0', 'UTF-8')
                || ! $writer->startElementNS(null, 'urlset', 'http://www.sitemaps.org/schemas/sitemap/0.9')
                || ! $writer->writeRaw("\n")) {
                throw new RuntimeException('Не удалось начать запись sitemap.');
            }

            foreach ($urls as $url) {
                $this->writeUrl($writer, $url, $baseUrl, $priority, $lastmod);
            }

            if (! $writer->endElement() || ! $writer->endDocument() || $writer->flush() === false) {
                throw new RuntimeException('Не удалось завершить запись sitemap.');
            }
            unset($writer);

            // tempnam создаёт файл с правами 0600; для чтения sitemap нужны права 0644.
            if (! chmod($temporaryFile, 0644) || ! rename($temporaryFile, $filename)) {
                throw new RuntimeException('Не удалось заменить файл sitemap.');
            }

            return $filename;
        } finally {
            unset($writer);
            if (is_file($temporaryFile)) {
                unlink($temporaryFile);
            }
        }
    }

    /**
     * Записывает один элемент url, экранируя XML и пропуская отсутствующую дату.
     *
     * @param  XMLWriter  $writer Открытый XML-документ внутри элемента urlset.
     * @param  Url  $url Запись с относительным адресом страницы.
     * @param  string  $baseUrl Адрес сайта без завершающего слеша.
     * @param  string  $priority Значение элемента priority.
     * @param  string|null  $lastmod Дата Y-m-d; null использует updated_at записи.
     *
     * @throws RuntimeException Если запись XML-элемента не удалась.
     */
    private function writeUrl(XMLWriter $writer, Url $url, string $baseUrl, string $priority, ?string $lastmod): void
    {
        $date = $lastmod ?? $url->updated_at?->format('Y-m-d');
        if (! $writer->startElement('url')
            || ! $writer->writeElement('loc', $baseUrl.'/'.ltrim($url->url, '/'))
            || ($date !== null && ! $writer->writeElement('lastmod', $date))
            || ! $writer->writeElement('changefreq', 'yearly')
            || ! $writer->writeElement('priority', $priority)
            || ! $writer->endElement()
            || ! $writer->writeRaw("\n")) {
            throw new RuntimeException('Не удалось записать URL в sitemap.');
        }
    }
}
