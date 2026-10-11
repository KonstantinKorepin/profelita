<?php

namespace Tests\Unit;

use App\Services\StringHelper;
use PHPUnit\Framework\TestCase;

class StringHelperTest extends TestCase
{
    public function test_phone_formatting_preserves_country_prefix_and_digits(): void
    {
        $this->assertSame('+79991234567', StringHelper::getClearPhone("+7 999\t123-45-67\n"));
        $this->assertSame('89991234567', StringHelper::getClearPhone('89991234567'));
    }

    public function test_seo_text_removes_comments_and_line_breaks(): void
    {
        $this->assertSame('Услуги в Самаре', StringHelper::getSeoTagString("Услуги /* комментарий */в\r\n Самаре\t"));
    }
}
