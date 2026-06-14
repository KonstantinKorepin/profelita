<?php

namespace Database\Seeders;

use App\Models\Master;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterPlumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // специализация
        $specializationId = DB::table('specializations')
            ->select('id')
            ->where('code', '=', 'plumber')
            ->get()->first()->id;

        // источник контакта Яндекс
        $yandexSourcesId = DB::table('master_sources')
            ->select('id')
            ->where('code', '=', 'yandex')
            ->get()->first()->id;

        // источник контакта Авито
        $avitoSourcesId = DB::table('master_sources')
            ->select('id')
            ->where('code', '=', 'avito')
            ->get()->first()->id;

        // источник контакта Профи
        $profiSourcesId = DB::table('master_sources')
            ->select('id')
            ->where('code', '=', 'profi')
            ->get()->first()->id;

        // города
        $cities = DB::table('cities')
            ->select('id', 'code')
            //->where('active', '=', true)
            ->get();
        $citiesData = [];
        foreach ($cities as $city) {
            $citiesData[$city->code] = $city->id;
        }

        Master::insert([
            [
                'city_id' => $citiesData['abakan'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Соколов',
                'first_name' => 'Алексей',
                'middle_name' => 'Викторович',
                'phone' => '+7 929 318-58-88',
                'rating' => 4.9,
                'start_working_hours' => '8:00',
                'end_working_hours' => '19:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 101,
                'education' => 'Высшее',
                'description' => 'Я частный мастер универсал. Выполняю практически любую мужскую работу по дому,
				имеется профессиональный аккумуляторный инструмент, доставка материалов,
				имеются скидки на материалы в магазинах. Есть бригада. Работаем аккуратно, большой опыт.
				Полное сопровождение объекта. Гарантия на все выполненные работы.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AleksejViktorovichS-482779',
                'on_front' => true, 'actual' => true
            ],
            [
                'city_id' => $citiesData['almetyevsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Мамулов',
                'first_name' => 'Руслан',
                'middle_name' => 'Сергеевич',
                'phone' => '+7917 243-05-13',
                'rating' => 5,
                'start_working_hours' => '8:00',
                'end_working_hours' => '23:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2015,
                'count_realized_orders' => 14,
                'education' => 'Средне-спрофессиональное.Государственное автономное профессиональное образовательное учреждение Самарской области Самарский государстенный колледж',
                'description' => 'Всех приветствую! Меня зовут Руслан я и мои коллеги
Занимаемся грузоперевозками есть грузчики, разнорабочие так же собираем мебель, делаем мелкосрочный ремонт.
Будем у вас в течении 20 минут после заказа наших услуг. Большой опыт работы, работаем качественно, без посредников нет скрытых платежей низкие цены гарантия качества',
                'url_source' => 'https://uslugi.yandex.ru/profile/RuslanSergeevichM-1850113',
                'on_front' => true, 'actual' => false
            ],
            [
                'city_id' => $citiesData['angarsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Скитальцев',
                'first_name' => 'Кирилл',
                'middle_name' => 'Константинович',
                'phone' => '+7 904 112-50-70',
                'rating' => 5.0,
                'start_working_hours' => '9:00',
                'end_working_hours' => '23:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2016,
                'count_realized_orders' => 37,
                'education' => 'ИрГТУ. Инженер электрик.',
                'description' => 'Добрый день, меня зовут Кирилл. Я квалифицированный специалист в области электрики и электромонтажа. Так же оказываю услуги мастера на час, сантехнические работы, сборки мебели и демонтажные работы.',
                'url_source' => 'https://uslugi.yandex.ru/profile/KirillS-123668',
                'on_front' => true, 'actual' => true
            ],
            [
                'city_id' => $citiesData['arzamas'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Комаров',
                'first_name' => 'Алексей',
                'middle_name' => 'Валерьевич',
                'phone' => '+7 905 567-85-45',
                'rating' => 4.8,
                'start_working_hours' => '8:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 47,
                'education' => 'Среднее',
                'description' => 'Я частный мастер. Выполняю отделочные, сантехнические и строительные работы. Работу выполняю в срок. Цены адекватные.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AleksejK-1283581',
                'on_front' => true, 'actual' => true
            ],
            [
                'city_id' => $citiesData['armavir'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Логвинов',
                'first_name' => 'Михаил',
                'middle_name' => 'Алексеевич',
                'phone' => '+7 908 194-88-88',
                'rating' => 4.7,
                'start_working_hours' => '00:00',
                'end_working_hours' => '23:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 28,
                'education' => 'Высшее',
                'description' => 'Профессионально занимаюсь оказанием услуги в области сантехники.
                                  Работаю быстро, качественно, надёжно!',
                'url_source' => 'https://uslugi.yandex.ru/profile/MikhailL-522883',
                'on_front' => true, 'actual' => true
            ],
            [
                'city_id' => $citiesData['artem'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Суворов',
                'first_name' => 'Роман',
                'middle_name' => 'Борисович',
                'phone' => '+7 914 660-81-47',
                'rating' => 5,
                'start_working_hours' => '08:00',
                'end_working_hours' => '20:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 8,
                'education' => '  ',
                'description' => 'Здравствуйте меня зовут Роман. Профессионально занимаюсь реставрацией ванн. В своей работе использую технологию заливки изделия акрилом полностью а так-же различные способы локальных ремонтов.Делаем то от чего отказываются другие мастера. Особая любовь к сложным случаям)',
                'url_source' => 'https://uslugi.yandex.ru/profile/RomanBorisovichS-1067723',
                'on_front' => true, 'actual' => false
            ],
            [
                'city_id' => $citiesData['arkhangelsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Ипатов',
                'first_name' => 'Иван',
                'middle_name' => 'Иванович',
                'phone' => '+7 960 002‑63‑33',
                'rating' => 4.7,
                'start_working_hours' => '10:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2008,
                'count_realized_orders' => 31,
                'education' => 'Высшее',
                'description' => 'С 2001 года я глубоко изучаю все отрасли связанные с ремонтом.
                                  Я люблю свою работу поэтому качественно выполняю её.
                                  Стараюсь жить по Божьим законам мироздания поэтому честность, аккуратность, профессионализм у меня в приоритете.
                                  Я радую своих клиентов не только качеством исполнения работ, но и стоимостью и временем затраченным на выполняемую работу.',
                'url_source' => 'https://uslugi.yandex.ru/profile/IvanIvanovichI-1848402',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['astrahan'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Морин',
                'first_name' => 'Игорь',
                'middle_name' => '',
                'phone' => '+7 988 174-35-65',
                'rating' => 4.7,
                'start_working_hours' => '9:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2016,
                'count_realized_orders' => 33,
                'education' => 'Колледж "АТК" специальнось"Электромеханик по торговому и холодильному оборудованию".',
                'description' => 'Всем привет, хочу подметить что шарлатанов с каждым годом все больше и больше, все хотят лёгких денег,
                                  но вот опыта ноль соответственно и качество выполненной работы тоже ноль,я работаю в данной свере уже
                                  долгое время все клиенты довольны, и мастера больше не меняют. Берегите свою технику, время и деньги.
                                  Всем добра.',
                'url_source' => 'https://uslugi.yandex.ru/profile/IgorMorin-1584180',
                'on_front' => false, 'actual' => false
            ],
            [
                'city_id' => $citiesData['achinsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'И',
                'first_name' => 'Андрей',
                'middle_name' => 'Сергеевич',
                'phone' => '+7 923 299-55-32',
                'rating' => 5,
                'start_working_hours' => '0:00',
                'end_working_hours' => '0:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2017,
                'count_realized_orders' => 17,
                'education' => 'Высшее',
                'description' => 'Добрый день, если Вы на моей странице значит вас заинтересовали мои услуги,
				                  я приложу все усилия чтобы помочь решить ваш вопрос.
				                  Стоимость услуги обсуждаются индивидуально, не переживайте о цене договоримся.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AndrejI-463492',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['balakovo'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Назмутдинов',
                'first_name' => 'Михаил',
                'middle_name' => 'Наильевич',
                'phone' => '+7 927 225-45-94',
                'rating' => 4.7,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2000,
                'count_realized_orders' => 87,
                'education' => 'Профессиональное училище №62, каменщик-монтажник по монтажу стальных и ж/б к-ций,
                                электросварщик ручной сварки.',
                'description' => 'Все виды работ по Сантехнике от замены крана до монтажа отопления. Также
                                  электромонтажные работы, сборка мебели, мелкий домашний ремонт. Профессиональный
                                  подход к своему делу.',
                'url_source' => 'https://uslugi.yandex.ru/profile/MikhailN-1193334',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['balashiha'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Белянко',
                'first_name' => 'Владимир',
                'middle_name' => '',
                'phone' => '+7 905 500-61-01',
                'rating' => 5.0,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2012,
                'count_realized_orders' => 34,
                'education' => 'Среднее специальное (техник). Высшее (инженер).',
                'description' => 'Качественно выполняю любые сантехнические работы от смесителя до монтажа котельной, опыт более 10 лет.',
                'url_source' => 'https://uslugi.yandex.ru/profile/VladimirB-2599731',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['barnaul'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Решетников',
                'first_name' => 'Константин',
                'middle_name' => 'Сергеевич',
                'phone' => '+7 913 213-06-06',
                'rating' => 5,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 44,
                'education' => 'Им. Ползунова Политехнический институт. Алтайский государственный колледж.',
                'description' => 'Занимаюсь долгое время могу сделать любую работу быстро качественно и по адекватной цене.',
                'url_source' => 'https://uslugi.yandex.ru/profile/KonstantinReshetnikov-379939',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['bataysk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Берувиков',
                'first_name' => 'Андрей',
                'middle_name' => 'Иванович',
                'phone' => '+7 961 273-85-69',
                'rating' => 5,
                'start_working_hours' => '6:00',
                'end_working_hours' => '23:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2017,
                'count_realized_orders' => 356,
                'education' => 'Пермское авиационное инженерное училище. Инженер. Эксплуатация и ремонт авиационного оборудования',
                'description' => 'Специалист по прочистке канализации и устранению засоров. Работаю без посредников.
				Добросовестно и профессионально отношусь к выполнению работы. Использую
				профессиональное оборудование и передовые технологии по прочистке, промывке и видеодиагностики
				канализационных систем.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AndrejB-532776',
                'on_front' => false, 'actual' => false
            ],
            [
                'city_id' => $citiesData['belgorod'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Герасимов',
                'first_name' => 'Дмитрий',
                'middle_name' => 'Андреевич',
                'phone' => '+7 910 221-65-52',
                'rating' => 5.0,
                'start_working_hours' => '7:00',
                'end_working_hours' => '23:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2015,
                'count_realized_orders' => 23,
                'education' => 'Мастер сантехник мы те кому можно доверять выполняем работу как для себя любые
                                сантехнические услуги отопление, водоснабжение, канализация, установка сантехники.',
                'description' => 'Высшее.',
                'url_source' => 'https://uslugi.yandex.ru/profile/DmitrijAndreevichG-527608',
                'on_front' => false, 'actual' => false
            ],
            [
                'city_id' => $citiesData['berdsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Иванов',
                'first_name' => 'Василий',
                'middle_name' => '',
                'phone' => '+7 963 507-37-04',
                'rating' => 5.0,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2007,
                'count_realized_orders' => 17,
                'education' => '',
                'description' => 'Мастера по сантехническим работам и водоотведению. Опыт работы более 10 лет. Аккуратны
                                  и пунктуальны. Все виды сантехнических работ: вызов сантехника на дом для устранения
                                  засоров и протечек, замена счетчиков воды, установка унитаза и смесителя и многое
                                  другое. Качественно и недорого выполняю все сантехнические услуги. Большой опыт
                                  работы в данном направлении. Работаем во всех районах Новосибирска, а также в
                                  области. Помимо этого, услуги гидродинамики, отогрев домов, отопления. Размораживание
                                  холодной воды. Подключение бытовой техники. Гарантия на указанные услуги.
                                  Видеодиагностика канализации.',
                'url_source' => 'https://uslugi.yandex.ru/profile/VasilijIvanov-1577095',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['berezniki'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Резников',
                'first_name' => 'Георгий',
                'middle_name' => 'Георгиевич',
                'phone' => '+7 912 069-78-84',
                'rating' => 4.9,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2016,
                'count_realized_orders' => 9,
                'education' => 'Средне-специальное',
                'description' => 'Здравствуйте, занимаюсь сантехникой уже 7 лет. Имею большой и положительный опыт',
                'url_source' => 'https://uslugi.yandex.ru/profile/GeorgijR-1229642',
                'on_front' => false, 'actual' => false
            ],
			 [
                'city_id' => $citiesData['biisk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Мартынов',
                'first_name' => 'Дмитрий',
                'middle_name' => 'Петрович',
                'phone' => '+7 913 020-90-43',
                'rating' => 4.7,
                'start_working_hours' => '0:00',
                'end_working_hours' => '0:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 14,
                'education' => 'Среднее специальное "Техник-механник"',
                'description' => 'Здравствуйте, меня зовут Дмитрий. Постоянно изучаю новые технологии в своей отрасли. Работаю с удовольствием. Мне нравиться когда клиент доволен.',
                'url_source' => 'https://uslugi.yandex.ru/profile/DmitrijM-1636946',
                'on_front' => false, 'actual' => false
            ],
            [
                'city_id' => $citiesData['blagoveshensk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Жуков',
                'first_name' => 'Александр',
                'middle_name' => 'Иванович',
                'phone' => '+7 914 550-20-26',
                'rating' => 5.0,
                'start_working_hours' => '9:00',
                'end_working_hours' => '18:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2015,
                'count_realized_orders' => 29,
                'education' => '...',
                'description' => 'Услуги сантехника, услуги электрика, услуги реставрации (восстановления, "эмалировка") ванны, подключение бытовой техники, услуги «Мужа на час» в Благовещенске.
Ответственный мастер, не пьет, не кидает заказчиков, приезжает в оговоренное время. Работу выполняет в срок и за оговоренную ранее оплату.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AleksandrZh-230165',
                'on_front' => false, 'actual' => false
            ],
            [
                'city_id' => $citiesData['bratsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Чункин',
                'first_name' => 'Андрей',
                'middle_name' => 'Владимирович',
                'phone' => '+7 964 281-66-75',
                'rating' => 5,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2016,
                'count_realized_orders' => 8,
                'education' => 'ВСГТУ, инженер-технолог; СКСиП, техник-экономист;Мастер -консультань "НВАЯ ВАННА"',
                'description' => 'Новая Ванна. Боле 7 лет.
Я знаю как работать с жидким акрилом . Я профи в сфере ремонта ванных и реставрации ванн жидким
 акрилом.Я знаю как сделать так,что бы ваша старая ванна превратилась в новую ванну и стала
 настоящим  украшением вашей ванной комнаты.Консультации по ремонту ванной, реставрации самой ванны,
поддона душевой кабины это моё призвание. И не важно чем отделана ваша ванная комната, керамической плиткой,
панелями пвх или пластиковыми панелями, жидкий акрил облагородит любую ванну преобразив её до неузнаваемости.
Я убедился, что любая ванна, чугунная, акриловая ванна или стальная, станет вновь новой,
так как наливной акрил, очень качественный материал. Вам не придётся тратить колоссальные
средства на покупку новой ванны. Вы из "старой" сделаете Новую.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AndrejVladimirovichCh-437204',
                'on_front' => false, 'actual' => false
            ],
            [
                'city_id' => $citiesData['bryansk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Минченко',
                'first_name' => 'Сергей',
                'middle_name' => '',
                'phone' => '+7 900 371-02-14',
                'rating' => 4.9,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2015,
                'count_realized_orders' => 180,
                'education' => '',
                'description' => 'Занимаюсь мелкими ремонтными работы, опыт с 2015 года, делаю всё бюджетно,
                                  качественно и с душой.',
                'url_source' => 'https://uslugi.yandex.ru/profile/SergejMinchenko-2435841',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['velikiy-novgorod'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Клюев',
                'first_name' => 'Сергей',
                'middle_name' => '',
                'phone' => '+7 980 064-10-79',
                'rating' => 5.0,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2014,
                'count_realized_orders' => 27,
                'education' => '',
                'description' => 'Я профессиональный мастер-сантехник. Оказываю полный перечень услуг по установке и
                                  замене сантехники.',
                'url_source' => 'https://uslugi.yandex.ru/profile/SergejKlyuev-2625819',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['vidnoe'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Гынку',
                'first_name' => 'Денис',
                'middle_name' => 'Витальевич',
                'phone' => '+7 965 293-38-91',
                'rating' => 5.0,
                'start_working_hours' => '8:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2014,
                'count_realized_orders' => 147,
                'education' => 'Высшее "Специалист сервиса". Среднее специальное "Автомеханик".',
                'description' => 'Добрый день, меня зовут Денис. Могу вам быть полезным в вопросе отопления, сантехники,
                                  засора и все, что связано с водой. Мы команда мастеров частников из 2 человек,
                                  работаем по всем районам Москвы и МО за разумную цену. Свою работу выполняем
                                  добросовестно вот уже более 12 лет. Выезжаем в день обращения, если нет пробок,
                                  то в течении 45 — 120 мин. Гарантия на выполненную работу. Звоните в любое время,
                                  будем рады помочь.',
                'url_source' => 'https://uslugi.yandex.ru/profile/DenisG-155327',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['vladivostok'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Корнеев',
                'first_name' => 'Павел',
                'middle_name' => 'Владимирович',
                'phone' => '+7 914 660-93-50',
                'rating' => 5.0,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 10,
                'count_realized_orders' => 9,
                'education' => 'ФГОУ СПО, Строительство и эксплуатация зданий и сооружений, техник',
                'description' => 'Порядочный, ответственный, без вредных привычек.
				Богатый строительный опыт, грамотный подход в отделочных работах и
				правильное понимание в технологических процессах.',
                'url_source' => 'https://uslugi.yandex.ru/profile/PavelVladimirovichK-1039150',
                'on_front' => false, 'actual' => false
            ],
            [
                'city_id' => $citiesData['vladimir'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Ракитин',
                'first_name' => 'Артур',
                'middle_name' => 'Эдуардович',
                'phone' => '+7 900 479-04-39',
                'rating' => 4.7,
                'start_working_hours' => '7:00',
                'end_working_hours' => '0:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2015,
                'count_realized_orders' => 62,
                'education' => 'Высшее.',
                'description' => 'Предлагаю весь спектр сантехнических услуг. Большой опыт работы. Использую профессиональный инструмент.',
                'url_source' => 'https://uslugi.yandex.ru/profile/ArturR-112054',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['volgograd'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'С.',
                'first_name' => 'Дмитрий',
                'middle_name' => '',
                'phone' => '+7 961 060-99-21',
                'rating' => 5.0,
                'start_working_hours' => '9:00',
                'end_working_hours' => '19:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2005,
                'count_realized_orders' => 16,
                'education' => 'Техническое',
                'description' => 'Работаю профессионально. Выполняю работу быстро и качественно. Срочный выезд в
                                  течение 15 минут. Оплатить можно на карту через Сбербанк Онлайн. Предоставляю чеки и
                                  квитанции, даю гарантию на свою работу.',
                'url_source' => 'https://uslugi.yandex.ru/profile/DmitrijS-1917199',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['volgodonsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Адонин',
                'first_name' => 'Николай',
                'middle_name' => 'Петрович',
                'phone' => '+7 961 273-67-56',
                'rating' => 4.6,
                'start_working_hours' => '8:00',
                'end_working_hours' => '20:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2009,
                'count_realized_orders' => 33,
                'education' => '',
                'description' => 'С большим опытом работ по разным сферам. От мастер на час до отделки ванной комнаты под "ключ".',
                'url_source' => 'https://uslugi.yandex.ru/profile/NikolajAdonin-372391',
                'on_front' => false, 'actual' => false
            ],
            [
                'city_id' => $citiesData['volzhskiy'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Григорьев',
                'first_name' => 'Руслан',
                'middle_name' => 'Александрович',
                'phone' => '+7 969 654-25-30',
                'rating' => 5,
                'start_working_hours' => '8:00',
                'end_working_hours' => '18:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 42,
                'education' => 'Слесарь-сантехник',
                'description' => 'Я — мастер по ремонту. Опыт+ качество. Выбор+доставка материала. Оплата нал, безнал. Договор. Вызов+ консультация- бесплатно.',
                'url_source' => 'https://uslugi.yandex.ru/profile/RuslanAleksandrovichGrigorev-1264103',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['vologda'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Ш.',
                'first_name' => 'Александр',
                'middle_name' => 'Николаевич',
                'phone' => '+7 953 513-83-11',
                'rating' => 4.6,
                'start_working_hours' => '7:00',
                'end_working_hours' => '23:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2005,
                'count_realized_orders' => 33,
                'education' => 'Высшее',
                'description' => 'Профессиональный сантехник',
                'url_source' => 'https://uslugi.yandex.ru/profile/AleksandrNikolaevichSh-1379113',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['voronezh'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Кочетков',
                'first_name' => 'Евгений',
                'middle_name' => '',
                'phone' => '+7 920 222-06-54',
                'rating' => 4.8,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2014,
                'count_realized_orders' => 22,
                'education' => 'Среднее специальное.',
                'description' => 'Приветствую Вас. Я частный мастер по ремонту почти любой бытовой техники. Делаю
                                  качественно и с гарантией на мою работу. Выезд по городу и области возможен.
                                  Основные запчасти вожу с собой и ремонт возможен на месте.',
                'url_source' => 'https://uslugi.yandex.ru/profile/EvgenijKochetkov-2360345',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['derbent'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Уружбеков',
                'first_name' => 'Вадим',
                'middle_name' => 'Игоревич',
                'phone' => '+7 963 371-99-04',
                'rating' => 5,
                'start_working_hours' => '8:00',
                'end_working_hours' => '20:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 6,
                'education' => 'Среднее специальное.',
                'description' => 'Сантехнические работы',
                'url_source' => 'https://uslugi.yandex.ru/profile/VadimIgorevichUruzhbekov-540638',
                'on_front' => false, 'actual' => false
            ],
            [
                'city_id' => $citiesData['dzerzhinsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Холодов',
                'first_name' => 'Вадим',
                'middle_name' => '',
                'phone' => '+7 920 078-71-71',
                'rating' => 5.0,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2003,
                'count_realized_orders' => 47,
                'education' => 'Средне-техническое.',
                'description' => 'Здравствуйте. Образование средне-техническое. Опыт работы в обслуживающих компаниях
                                  большой. Знание всех коммуникаций многоквартирных домов. Произвожу замены и установку
                                  отопления, водопровода, канализации, смесителей, унитазов, полотенцесушителей,
                                  батарей.',
                'url_source' => 'https://uslugi.yandex.ru/profile/VadimKholodov-298305',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['dimitrovgrad'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Чирка',
                'first_name' => 'Алексей',
                'middle_name' => 'Валерьевич',
                'phone' => '+7 902 006-40-24',
                'rating' => 5,
                'start_working_hours' => '8:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 5,
                'professional_activity_year' => 2008,
                'count_realized_orders' => 10,
                'education' => 'Высшее',
                'description' => 'Ищете услуги профессиональных и грамотных сантехников?
                                  Тогда Вы обратились по адресу!Экономьте свое время, деньги и затраты на переделывание!
                                  Имеем 15 лет успешной работы в сфере любых сантехнических работ
                                  Работаем на совесть,как для себя!Предоставляем ГАРАНТИЮ до 5 лет.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AleksejChirka-259744',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['dolgoprudny'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Д.',
                'first_name' => 'Василий',
                'middle_name' => '',
                'phone' => '+7 904 196-78-21', // +7 901 779-89-14
                'rating' => 4.8,
                'start_working_hours' => '8:00',
                'end_working_hours' => '20:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2000,
                'count_realized_orders' => 181,
                'education' => 'СПТУ 9, сварщик. УлГТУ инженер теплотехник',
                'description' => 'Здравствуйте, уважаемые заказчики! Я являюсь прямыми исполнителем сантехнических услуг.
                                  Всегда буду рад принять как мелкие,так и крупные заказы в исполнение.
                                  Стараюсь предоставлять конкурентноспособные и адекватные цены на мои работы,
                                  высочайшего качества. Позвоните мне и убедитесь в этом сами.',
                'url_source' => 'https://uslugi.yandex.ru/profile/VasilijD-218621',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['domodedovo'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Гынку',
                'first_name' => 'Денис',
                'middle_name' => 'Витальевич',
                'phone' => '+7 965 293-38-91',
                'rating' => 5.0,
                'start_working_hours' => '8:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2014,
                'count_realized_orders' => 147,
                'education' => 'Высшее "Специалист сервиса". Среднее специальное "Автомеханик".',
                'description' => 'Добрый день, меня зовут Денис. Могу вам быть полезным в вопросе отопления, сантехники,
                                  засора и все, что связано с водой. Мы команда мастеров частников из 2 человек,
                                  работаем по всем районам Москвы и МО за разумную цену. Свою работу выполняем
                                  добросовестно вот уже более 12 лет. Выезжаем в день обращения, если нет пробок,
                                  то в течении 45 — 120 мин. Гарантия на выполненную работу. Звоните в любое время,
                                  будем рады помочь.',
                'url_source' => 'https://uslugi.yandex.ru/profile/DenisG-155327',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['evpatoriya'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Наумов',
                'first_name' => 'Геннадий',
                'middle_name' => '',
                'phone' => '+7 918 080-77-42',
                'rating' => 5.0,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2010,
                'count_realized_orders' => 13,
                'education' => 'Высшее',
                'description' => 'Качественное выполнение услуг, пунктуальность.
                                  В работе используется современное немецкое электрооборудование.',
                'url_source' => 'https://uslugi.yandex.ru/profile/GennadijNaumov-923778',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['ekb'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Чернов',
                'first_name' => 'Александр',
                'middle_name' => 'Валерьевич',
                'phone' => '+7 912 052‑10‑01',
                'rating' => 5.0,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2010,
                'count_realized_orders' => 160,
                'education' => 'Екатеринбургский Машиностроительный Колледж.',
                'description' => 'Выполняю работы по электрике, сантехнике, также оказываю услуги мастера на час. Инструмент
                                  в наличии. Имею огромный опыт работы за спиной.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AleksandrValerevichCh-251420',
                'on_front' => false, 'actual' => false
            ],
            [
                'city_id' => $citiesData['essentuki'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Солнов',
                'first_name' => 'Антон',
                'middle_name' => 'Евгеньевич',
                'phone' => '+7 928 355-21-13',
                'rating' => 4.8,
                'start_working_hours' => '7:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 41,
                'education' => ' ',
                'description' => 'Выполняю мелкие работы по дому, по сантехнике и электрике.
				Работаю по г. Ессентуки и ст. Ессентукской Звоните уточняйте буду рад помочь
				до 21:00 без выходных.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AntonS-309648',
                'on_front' => false, 'actual' => false
            ],
            [
                'city_id' => $citiesData['zhukovsky'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Б.',
                'first_name' => 'Владимир',
                'middle_name' => '',
                'phone' => '+7 905 500-61-01',
                'rating' => 5.0,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2012,
                'count_realized_orders' => 34,
                'education' => 'Среднее специальное (техник). Высшее (инженер).',
                'description' => 'Качественно выполняю любые сантехнические работы от смесителя до монтажа котельной, опыт более 10 лет.',
                'url_source' => 'https://uslugi.yandex.ru/profile/VladimirB-2599731',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['zlatoust'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Фоменков',
                'first_name' => 'Евгений',
                'middle_name' => '',
                'phone' => '+7 909 074-55-24',
                'rating' => 5.0,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2011,
                'count_realized_orders' => 14,
                'education' => 'Среднее',
                'description' => 'Мастер сантехнических работ',
                'url_source' => 'https://uslugi.yandex.ru/profile/EvgenijFomenkov-1763022',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['ivanovo'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Г.',
                'first_name' => 'Илья',
                'middle_name' => '',
                'phone' => '+7 980 691‑03‑05',
                'rating' => 4.8,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2005,
                'count_realized_orders' => 24,
                'education' => 'Среднее.',
                'description' => 'Универсальный мастер с большим опытом и руками из нужного места. Адекватные цены,
                                  иду на уступки. Выполню работу , качественно, чисто, аккуратно и со знанием дела.
                                  На все работы гарантия. Дружелюбный, ответственный, коммуникабельный. Люблю свою
                                  работу и помогать решать проблемы по дому людям. Есть все необходимые
                                  профессиональные инструменты. Буду рад Вам помочь! Звоните!',
                'url_source' => 'https://uslugi.yandex.ru/profile/IlyaG-1124296',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['izhevsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Н.',
                'first_name' => 'Рахимжан',
                'middle_name' => '',
                'phone' => '+7 963 063‑45‑20',
                'rating' => 4.9,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2005,
                'count_realized_orders' => 111,
                'education' => 'Высшее',
                'description' => 'Здравствуйте Дорогие!
                                  Меня зовут Рахим, выполняю сантехнические, электромонтажные работы, а также разный
                                  бытовой ремонт по дому. Я не являюсь посредником. Имею все необходимые
                                  профессиональные инструменты! Стаж работы: более 10 лет в Теплоэнерго специалистом
                                  тепловых пунктов и более 5 лет в строительной компании.
                                  Обращайтесь если кому нужны выше указанные услуги!
                                  Честные отзывы от реальных людей.',
                'url_source' => 'https://uslugi.yandex.ru/profile/RakhimzhanN-466785',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['irkutsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Проховник',
                'first_name' => 'Алексей',
                'middle_name' => 'Леонидович',
                'phone' => '+7 964 281-63-27',
                'rating' => 5,
                'start_working_hours' => '9:00',
                'end_working_hours' => '18:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2017,
                'count_realized_orders' => 33,
                'education' => 'Иркутский государственный университет, специальность – инженер-эколог',
                'description' => 'Сборка и разборка мебели; Ремонт элетроточек ; Замена розеток,
				выключателей; Навешивание люстр, гардин, шкафов, ковров; Монтаж электрической проводки,
				водопровода, канализации;Ремонт сантехники; Устранение засоров ; Перестановка мебели; И многое другое.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AleksejProkhovnik-219649',
                'on_front' => false, 'actual' => false
            ],
            [
                'city_id' => $citiesData['joshkar-ola'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'А.',
                'first_name' => 'Владимир',
                'middle_name' => '',
                'phone' => '+7 927 872‑15‑43',
                'rating' => 5.0,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2015,
                'count_realized_orders' => 15,
                'education' => 'Высшее',
                'description' => 'Мастер-сантехник на все руки',
                'url_source' => 'https://uslugi.yandex.ru/profile/VladimirA-1415806',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['kazan'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Ш.',
                'first_name' => 'Ильнар',
                'middle_name' => '',
                'phone' => '+7 908 332-33-01',
                'rating' => 4.9,
                'start_working_hours' => '8:00',
                'end_working_hours' => '23:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2012,
                'count_realized_orders' => 90,
                'education' => 'Высшее',
                'description' => 'Мастер-сантехник на все руки',
                'url_source' => 'https://uslugi.yandex.ru/profile/IlnarSh-1215352',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['kaliningrad'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Сергеев',
                'first_name' => 'Алексей',
                'middle_name' => 'Михайлович',
                'phone' => '+7 921 108‑34‑11',
                'rating' => 4.8,
                'start_working_hours' => '8:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2007,
                'count_realized_orders' => 99,
                'education' => 'Инженер-строитель, КГТУ, 1998–2002 гг. Радиоинженер, Калининградское высшее инженерное морское училище, 1989–1993 гг.',
                'description' => 'Здравствуйте, предоставляю сантехнические услуги, услуги мастер на час и др.
                                  Имею высшее инженерно-техническое и строительное образование. Большой опыт работы.
                                  Пожалуйста звоните, консультация - бесплатно. Есть ватцап и вайбер, которые указаны
                                  в профиле. Всегда стараюсь выполнять работу аккуратно и качественно, также предоставлю
                                  гарантию на выполненные услуги.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AleksejMikhajlovichS-1025044',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['kaluga'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Семенов',
                'first_name' => 'Алексей',
                'middle_name' => '',
                'phone' => '+7 920 879‑83‑29',
                'rating' => 4.8,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2010,
                'count_realized_orders' => 135,
                'education' => 'Высшее',
                'description' => 'Занимаюсь сантехникой более 10 лет, до тонкостей изучил эту профессию. Поэтому
                                  гарантирую хороший результат, несмотря на сложность работы. Могу проконсультировать,
                                  помочь выбрать оборудование, а также доставить его. Выполняю работу аккуратно,
                                  стараюсь найти индивидуальный подход к каждому. Надеюсь, Вы станете одним из моих
                                  постоянных клиентов!',
                'url_source' => 'https://uslugi.yandex.ru/profile/AleksejSemenov-376832',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['kamensk-uralskiy'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Зотов',
                'first_name' => 'Олег',
                'middle_name' => 'Борисович',
                'phone' => '+7 912 052-13-75',
                'rating' => 5,
                'start_working_hours' => '0:00',
                'end_working_hours' => '0:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 45,
                'education' => 'Уральский федеральный университет имени первого Президента России Б.Н. Ельцина',
                'description' => 'Рад приветствовать Вас в моем объявлении, это первый шаг к решению
				Ваших сантехнических проблем! Работаю один. Использую только качественный профессиональный
				инструмент, что позволяет выполнять качественно свою работу! При необходимости, поеду в
				магазин, закуплю необходимый материал и отчитаюсь перед Вами по чеку. Гарантирую
				оперативность, аккуратность, порядочность и отсутствие доплат. Так же, о других услугах,
				можете уточнить по телефону. Выезд на заказ в течении получаса.
				Весь инструмент с собой. Гарантия на работу! Звоните, обязательно договоримся!',
                'url_source' => 'https://uslugi.yandex.ru/profile/OlegB-1863987',
                'on_front' => false, 'actual' => false
            ],
            [
                'city_id' => $citiesData['kamyshin'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Р.',
                'first_name' => 'Максим',
                'middle_name' => 'Анатольевич',
                'phone' => '+7 904 402-53-55',
                'rating' => 4.8,
                'start_working_hours' => '08:00',
                'end_working_hours' => '19:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2016,
                'count_realized_orders' => 19,
                'education' => 'Высшее',
                'description' => 'Услуги от опытных мастеров по электрике,сантехнике,ремонту по дому! Любая сложность. Срочный выезд. Низкие цены!',
                'url_source' => 'https://uslugi.yandex.ru/profile/MaksimAnatolevichR-1379034',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['kaspiysk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Алиев',
                'first_name' => 'Вугар',
                'middle_name' => 'Бедросович',
                'phone' => '+7 988 466-48-55',
                'rating' => 5,
                'start_working_hours' => '08:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 41,
                'education' => '',
                'description' => 'Мы оказываем услуги населению во всех сферах ремонтно-строительных работ.
								Наши цены вас приятно удивят. 	Команда квалифицированных мастеров окажет услуги качественно и в сроки',
                'url_source' => 'https://uslugi.yandex.ru/profile/VugarAliev-1208465',
                'on_front' => false, 'actual' => false
            ],
            [
                'city_id' => $citiesData['kemerovo'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Дыдыгин',
                'first_name' => 'Андрей',
                'middle_name' => '',
                'phone' => '+7 960 920-73-70',
                'rating' => 5,
                'start_working_hours' => '09:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2005,
                'count_realized_orders' => 8,
                'education' => 'Средне-специальное',
                'description' => 'Мастер-сантехник с высоким стажем',
                'url_source' => 'https://uslugi.yandex.ru/profile/AndrejDydygin-272041',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['kerch'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'К.',
                'first_name' => 'Александр',
                'middle_name' => '',
                'phone' => '+7 978 207-67-02',
                'rating' => 5.0,
                'start_working_hours' => '08:00',
                'end_working_hours' => '19:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2011,
                'count_realized_orders' => 15,
                'education' => 'Высшее',
                'description' => 'Настойчив к победе. Выполняю работы качественно. Использую современные технологии для
                                  коммуникации и качественный инструмент. Не разделяю богатых и бедных. Вежливое
                                  рабочее отношение ко всем одинаковое.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AleksandrK-372938',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['kirov'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Немчанинов',
                'first_name' => 'Андрей',
                'middle_name' => '',
                'phone' => '+7 982 387-77-31',
                'rating' => 5,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 87,
                'education' => 'Высшее',
                'description' => 'Профессиональный мастер-сантехник',
                'url_source' => 'https://uslugi.yandex.ru/profile/AndrejNemchaninov-1773971',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['kislovodsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Ларионов',
                'first_name' => 'Артем',
                'middle_name' => 'Александрович',
                'phone' => '+7 905465-67-40',
                'rating' => 4.3,
                'start_working_hours' => '8:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 19,
                'education' => '',
                'description' => 'Качество и сжатые сроки гарантированно!',
                'url_source' => 'https://uslugi.yandex.ru/profile/ArtyomAleksandrovichLarionov-597731',
                'on_front' => false, 'actual' => false
            ],
            [
                'city_id' => $citiesData['kovrov'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'К.',
                'first_name' => 'Алексей',
                'middle_name' => '',
                'phone' => '+7 904-257-61-97',
                'rating' => 4.6,
                'start_working_hours' => '8:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 12,
                'education' => 'Средне-специальное',
                'description' => 'Здравствуйте! Я, Алексей! Занимаюсь строительством, ремонтом и
                                  отделкой жилых и нежилых помещений. Индивидуальный доброжелательный подход к
                                  каждому заказчику. Буду рад сотрудничать с вами. Звоните!',
                'url_source' => 'https://uslugi.yandex.ru/profile/AleksejK-1017554',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['kolomna'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Гоглев',
                'first_name' => 'Вадим',
                'middle_name' => '',
                'phone' => '+7 965 369‑65‑96',
                'rating' => 5.0,
                'start_working_hours' => '8:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2012,
                'count_realized_orders' => 69,
                'education' => 'СПТУ 70 Г Ершов Саратовская область . 2003.',
                'description' => 'Слесарь-сантехник с большим опытом работы в профессии.
                                  Мне 34года. Русский. Живу на постоянном месте жительства в Москве. Общий стаж работы
                                  слесарем-сантехником более 10 лет. Буду рад ответить на телефонный звонок.
                                  Есть большой опыт работы по проведению ремонтных работ по сантехнике, начиная с
                                  мелкого, в благоустроенном жилье многоквартирных домов, частном секторе ( дома,
                                  коттеджи) и сантехническому обслуживанию. Оказываю профессиональные, на качественно
                                  высоком уровне услуги, связанные с широким спектром сантехнических работ по
                                  направлениям: «Сантехника и отопление», «Водоснабжение и ремонт канализации»,
                                  «Сварочные работы». Обладаю уверенными знаниями по принципам работы отопления,
                                  водоснабжения, канализации.',
                'url_source' => 'https://uslugi.yandex.ru/profile/VadimG-129576',
                'on_front' => false, 'actual' => false
            ],
            [
                'city_id' => $citiesData['komsomolsk-na-amure'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Лесик',
                'first_name' => 'Андрей',
                'middle_name' => 'Вадимович',
                'phone' => '+7 914 410-36-90',
                'rating' => 4.4,
                'start_working_hours' => '8:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 66,
                'education' => 'КнаГТУ',
                'description' => 'Доброго времени суток. Вам нужно выполнить работы качественно
				и в срок? Тогда вы обратились к нужному Мастеру. Весь нужный инструмент и
				многолетний опыт работ.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AndrejLesik-1381483',
                'on_front' => false, 'actual' => false
            ],
            [
                'city_id' => $citiesData['kopeysk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Завьялов',
                'first_name' => 'Иван',
                'middle_name' => '',
                'phone' => '+7 951 803-55-56',
                'rating' => 4.6,
                'start_working_hours' => '8:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2015,
                'count_realized_orders' => 23,
                'education' => 'ГОУ НПО, Слесарь-электрик. АНО ДПО Учебный центр перспектива, профессиональная
                                подготовка по профессии «слесарь аварийно-восстановительных работ».',
                'description' => 'Меня зовут Иван.
                                  Доброжелательный и ориентированный на помощь людям специалист. К своей специальности отношусь с энтузиазмом, работаю на репутацию.
                                  Занимаюсь ремонтом систем водоснабжения и водоотведения уже более 10 лет.
                                  Зарекомендованный специалист в муниципальном учреждении. Имею подтверждающие документы, прохожу аттестации и курсы по повышению квалификационных навыков.',
                'url_source' => 'https://uslugi.yandex.ru/profile/IvanZavyalov-333243',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['korolev'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Гилевский',
                'first_name' => 'Сергей',
                'middle_name' => 'Гавриилович',
                'phone' => '+7 905 502-18-64',
                'rating' => 4.9,
                'start_working_hours' => '10:00',
                'end_working_hours' => '20:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2009,
                'count_realized_orders' => 91,
                'education' => '',
                'description' => 'Я профессиональный сантехник работаю по профессии с момента окончания учебного
                                  заведения, уже более 15 лет. Образование среднее-специальное. Коммуникабельный,
                                  вежливый, порядочный и чистоплотный. После проведения работ всегда навожу порядок.
                                  Стоимость услуг зависит от сложности работ и необходимости в дополнительных расходах,
                                  таких как различные расходные материалы, большинство из которых, обычно я имею при
                                  себе. Всегда предоставляю гарантию на все работы, проведенные мной. Выполняю как
                                  простые работы, так и сложный сантехнический ремонт. Спасибо, за то что выбрали меня
                                  для оказания сантехнических услуг!',
                'url_source' => 'https://uslugi.yandex.ru/profile/SergejGavriilovichGilevskij-150529',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['kostroma'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'К.',
                'first_name' => 'Дмитрий',
                'middle_name' => '',
                'phone' => '+7 950 248-56-86',
                'rating' => 5.0,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 1,
                'count_realized_orders' => 57,
                'education' => 'Высшее ТмТИ. Средне-специальное КТТ.',
                'description' => 'Ответственный, пунктуальный, вежливый . Сантехник, мастер на час.',
                'url_source' => 'https://uslugi.yandex.ru/profile/DmitrijK-2567650',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['krasnogorsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Д.',
                'first_name' => 'Василий',
                'middle_name' => '',
                'phone' => '+7 904 196-78-21', // +7 901 779-89-14
                'rating' => 4.8,
                'start_working_hours' => '8:00',
                'end_working_hours' => '20:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2000,
                'count_realized_orders' => 181,
                'education' => 'СПТУ 9, сварщик. УлГТУ инженер теплотехник',
                'description' => 'Здравствуйте, уважаемые заказчики! Я являюсь прямыми исполнителем сантехнических услуг.
                                  Всегда буду рад принять как мелкие,так и крупные заказы в исполнение.
                                  Стараюсь предоставлять конкурентноспособные и адекватные цены на мои работы,
                                  высочайшего качества. Позвоните мне и убедитесь в этом сами.',
                'url_source' => 'https://uslugi.yandex.ru/profile/VasilijD-218621',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['ksdr'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Усов',
                'first_name' => 'Виктор',
                'middle_name' => 'Николаевич',
                'phone' => '+7 918 472-88-94',
                'rating' => 4.9,
                'start_working_hours' => '8:00',
                'end_working_hours' => '00:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2017,
                'count_realized_orders' => 21,
                'education' => 'Средне-специальное',
                'description' => 'Профессиональный сантехник с большим стажем и опытом',
                'url_source' => 'https://uslugi.yandex.ru/profile/ViktorNikolaevichUsov-730300',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['krsn'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Г.',
                'first_name' => 'Андрей',
                'middle_name' => '',
                'phone' => '+7 908 019-88-98',
                'rating' => 4.9,
                'start_working_hours' => '9:00',
                'end_working_hours' => '23:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 10,
                'education' => 'Колледж современных технологий',
                'description' => 'Более 10 лет занимаюсь установкой и ремонтом сантехники любой сложности. А так же
                                  ремонтом насосов в том числе канализационных и насосного оборудования. Выезд во все
                                  районы города и края. Сотрудничаю со многими сервисными центрами, что позволяет
                                  быстро решить вопрос с запчастями. Приезжаю быстро, работаю аккуратно без выходных.
                                  На связи круглосуточно. Постоянным клиентам скидки. Консультация бесплатно.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AndrejG-1478760',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['kurgan'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Алексеев',
                'first_name' => 'Сергей',
                'middle_name' => 'Антонович',
                'phone' => '+7 912 062-35-04',
                'rating' => 5,
                'start_working_hours' => '9:00',
                'end_working_hours' => '19:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 9,
                'education' => ' ',
                'description' => 'Добрый день. Выполняем работы по ремонту сантехники,
				электрики, мастер на час,демонтажу, отделке и другое. От бытового(мелкого)
				до капитального. Все работы выполняем качественно, в оговоренные сроки.Так же
				произведем подсчеты в день обращения. Проконсультируем о необходимом материале.
				На большие объемы или на очень срочные, есть  напарники высококвалифицированные мастера. Есть весь необходимый профессиональный электрический и ручной инструмент. Оперативный выезд.',
                'url_source' => 'https://uslugi.yandex.ru/profile/SergejA-1238200',
                'on_front' => false, 'actual' => false
            ],
            [
                'city_id' => $citiesData['kursk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'К.',
                'first_name' => 'Александр',
                'middle_name' => '',
                'phone' => '+7 910 312-97-76',
                'rating' => 5.0,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 122,
                'education' => 'Среднее-специальное',
                'description' => 'Меня зовут Александр,
                                  Живу в Курске. Занимаюсь оказанием услуг сантехника, электрика, мастер на час.
                                  Если вам нужна скорая помощь в решении вашей проблемы, Звоните по телефону
                                  указанному в профиле. Сообщения не просматриваются мгновенно.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AleksandrK-206567',
                'on_front' => false, 'actual' => true
            ],
			 [
                'city_id' => $citiesData['kyzyl'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Леонов',
                'first_name' => 'Руслан',
                'middle_name' => 'Игнатович',
                'phone' => '+7 983 365-10-56',
                'rating' => 5,
                'start_working_hours' => '9:00',
                'end_working_hours' => '18:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 1,
                'education' => 'Среднее-специальное',
                'description' => 'Делаем множество работ таких как:сварка труб, сварка отопления,металлоконструкций и т.д.',
                'url_source' => 'https://uslugi.yandex.ru/profile/RuslanL-1288217',
                'on_front' => false, 'actual' => false
            ],
            [
                'city_id' => $citiesData['lipetsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Д.',
                'first_name' => 'Павел',
                'middle_name' => '',
                'phone' => '+7 904 289-80-67',
                'rating' => 5,
                'start_working_hours' => '8:00',
                'end_working_hours' => '20:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 8,
                'education' => 'Высшее',
                'description' => 'ОПЫТНЫЙ САНТЕХНИК!',
                'url_source' => 'https://uslugi.yandex.ru/profile/PavelD-1385288',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['lyubertsy'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Белянко',
                'first_name' => 'Владимир',
                'middle_name' => '',
                'phone' => '+7 905 500-61-01',
                'rating' => 5.0,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2012,
                'count_realized_orders' => 34,
                'education' => 'Среднее специальное (техник). Высшее (инженер).',
                'description' => 'Качественно выполняю любые сантехнические работы от смесителя до монтажа котельной, опыт более 10 лет.',
                'url_source' => 'https://uslugi.yandex.ru/profile/VladimirB-2599731',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['magnitogorsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'М.',
                'first_name' => 'Алексей',
                'middle_name' => 'Анатольевич',
                'phone' => '+7 903 091-82-70',
                'rating' => 4.5,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2014,
                'count_realized_orders' => 69,
                'education' => 'Магнитогорский государственный университет',
                'description' => 'Здравствуйте, меня зовут Алексей. Я помогу Вам! Быстро приеду и сделаю все
                                  качественно. Работаю так, чтобы Вы были довольны и рекомендовали меня другим!',
                'url_source' => 'https://uslugi.yandex.ru/profile/AleksejAnatolevichM-592020',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['miass'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Десятков',
                'first_name' => 'Александр',
                'middle_name' => '',
                'phone' => '+7 951 784-70-37',
                'rating' => 4.6,
                'start_working_hours' => '8:00',
                'end_working_hours' => '20:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 21,
                'education' => 'Средне-специальное, техническое.',
                'description' => 'Выполняю качественно, добросовестно, аккуратно, оставляю после себя порядок.
                                  Даю гарантии за свою работу. Закупаю только проверенный материал,отчитываюсь по чекам.
                                  После работы за собой убирают весь мусор.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AleksandrDesyatkov-460169',
                'on_front' => false, 'actual' => true
            ],
			 [
                'city_id' => $citiesData['mihaylovsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Кулаков',
                'first_name' => 'Алексей',
                'middle_name' => 'Геннадьевич',
                'phone' => '+7 919 363-36-45',
                'rating' => 5,
                'start_working_hours' => '9:00',
                'end_working_hours' => '18:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 10,
                'education' => '  ',
                'description' => 'Сантехник, электрик. ',
                'url_source' => 'https://uslugi.yandex.ru/profile/AleksejKulakov-1146698',
                'on_front' => false, 'actual' => false
            ],
            [
                'city_id' => $citiesData['msk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Павлов',
                'first_name' => 'Сергей',
                'middle_name' => 'Викторович',
                'phone' => '+7 925 602-33-22',
                'rating' => 5,
                'start_working_hours' => '7:00',
                'end_working_hours' => '23:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2012,
                'count_realized_orders' => 68,
                'education' => 'НИУ МГСУ',
                'description' => 'Уже более 7 лет я работаю сантехником в Москве и области. Выполняю сантехнические
                 работы любой сложности, а также работы по отоплению и разводке трубы. Помогу с выбором, покупкой
                 и доставкой материалов для работы. Передвигаюсь на своем авто, весь инструмент всегда при себе,
                 от простого до сложного. Есть напарник для больших объёмов. Стоимость работ смогу озвучить по фото
                 или видео. Вам не придётся ничего искать, подбирать или ехать куда либо, я всё могу сделать за Вас.
                 Гарантия на работы от 6 месяцев до 2 лет(зависит от вида работ). Наличный и безналичный расчёты.
                 Если есть вопросы, то звоните или пишите. Рад буду помочь!',
                'url_source' => 'https://uslugi.yandex.ru/profile/SergejViktorovichP-418500',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['murmansk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Павлов',
                'first_name' => 'Олег',
                'middle_name' => 'Андреевич',
                'phone' => '+7 906 288-15-96',
                'rating' => 4.8,
                'start_working_hours' => '9:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 88,
                'education' => ' ПТУ №12, трубопроводчик, трубогибщик судовой',
                'description' => 'Сделаю ремонт в квартире, в приоритете ремонты ванных
				комнат и туалетов. Со мной работает профессиональный плиточник и мастер
				по отделке квартир. Выполним как ремонт ванной комнаты и туалета, так
				и отделку всей квартиры под ключ с фото отчётом. Основная моя специальность,
				сантехник. Долгое время я работал в аварийной службе и выполнял срочные
				сантехнические работы.',
                'url_source' => 'https://uslugi.yandex.ru/profile/EvgenijPavlov-505556',
                'on_front' => false, 'actual' => false
            ],
            [
                'city_id' => $citiesData['murom'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Л.',
                'first_name' => 'Виктор',
                'middle_name' => '',
                'phone' => '+7 920 622-56-53',
                'rating' => 4.7,
                'start_working_hours' => '8:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 24,
                'education' => 'РГОТУПС АТС',
                'description' => 'Частник. Работаю один, или с напарником. Работаем качественно.
				                  Выезжаем на рекламацию. Выполняем любые просьбы заказчика.',
                'url_source' => 'https://uslugi.yandex.ru/profile/ViktorL-238060',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['mytishi'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Гилевский',
                'first_name' => 'Сергей',
                'middle_name' => 'Гавриилович',
                'phone' => '+7 903 241-21-95',
                'rating' => 4.8,
                'start_working_hours' => '10:00',
                'end_working_hours' => '20:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 87,
                'education' => ' Среднее-специальное,Ежегодные курсы повышения квалификации для сантехников.',
                'description' => 'Я профессиональный сантехник работаю по профессии с
				момента окончания учебного заведения, уже более 15 лет. Образование
				среднее-специальное. Коммуникабельный, вежливый, порядочный и чистоплотный.
				После проведения работ всегда навожу порядок. Стоимость услуг зависит от
				сложности работ и необходимости в дополнительных расходах, таких как
				различные расходные материалы, большинство из которых, обычно я имею при себе.
				Всегда предоставляю гарантию на все работы, проведенные мной. Выполняю как
				простые работы, так и сложный сантехнический ремонт. Спасибо, за то что
				выбрали меня для оказания сантехнических услуг!',
                'url_source' => 'https://uslugi.yandex.ru/profile/SergejGavriilovichGilevskij-150529',
                'on_front' => false, 'actual' => false
            ],
            [
                'city_id' => $citiesData['nchelny'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Мягков',
                'first_name' => 'Алексей',
                'middle_name' => '',
                'phone' => '+7 960 081-09-75',
                'rating' => 4.6,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 59,
                'education' => 'Высшее',
                'description' => 'Профессиональный сантехник',
                'url_source' => 'https://uslugi.yandex.ru/profile/AleksejMyagkov-1250516',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['nazran'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Тестов',
                'first_name' => 'Тест',
                'middle_name' => 'Тестович',
                'phone' => '+7 984 150-52-17',
                'rating' => 4.7,
                'start_working_hours' => '7:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 10,
                'education' => 'среднеспециальное',
                'description' => 'Сантехнические работы и монтаж отопления',
                'url_source' => 'https://uslugi.yandex.ru/profile/SergejS-703155',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['nahodka'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Семенов',
                'first_name' => 'Сергей',
                'middle_name' => 'Ринатович',
                'phone' => '+7 984 150-52-17',
                'rating' => 4.7,
                'start_working_hours' => '7:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 10,
                'education' => 'среднеспециальное',
                'description' => 'Сантехнические работы и монтаж отопления',
                'url_source' => 'https://uslugi.yandex.ru/profile/SergejS-703155',
                'on_front' => false, 'actual' => false
            ],
            [
                'city_id' => $citiesData['nevinnomyssk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Радченко',
                'first_name' => 'Сергей',
                'middle_name' => 'Ринатович',
                'phone' => '+7 919 744-10-32',
                'rating' => 4.5,
                'start_working_hours' => '7:00',
                'end_working_hours' => '23:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 10,
                'education' => 'Ростовский государственный строительный университет',
                'description' => 'Круглосуточная прочистка канализации, устранение засоров.
Аварийно-сантехническая бригада профессионально и быстро устранит все ваши проблемы с
канализацией. Выезд по КЧР и СК. После нас не нужно убирать! Работаем чисто и быстро!
Прочистка канализационных труб проводится с использованием профессионального оборудования.
Устраняем сложные и особо-сложные засоры в унитазах, раковинах, канализационных трубах,
ливневках и магистралях , колодцах, септиках, выгребных ямах. Чистим трубы диаметром от 50 мм.
до 400мм. Моем колодцы, септики и ямы от иловых и жировых отложений, восстанавливаем фильтрацию дна
с использованием гидродинамической прочистной машины. Кроме того, проводится видео диагностика
(телеинспекция) труб и систем на предмет слома и нарушений целостности. В описаниях представлены
реальные наши фото с реальных наших объектов, мы не скачиваем фото из интернета, мы реально и добросовестно выполняем свою работу и постоянно совершенствуемся!',
                'url_source' => 'https://uslugi.yandex.ru/profile/SergejR-101929',
                'on_front' => false, 'actual' => false
            ],
            [
                'city_id' => $citiesData['neftekamsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Саетов',
                'first_name' => 'Ринат',
                'middle_name' => '',
                'phone' => '+7 996 400-23-36',
                'rating' => 4.5,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2017,
                'count_realized_orders' => 14,
                'education' => 'Среднее-специальное',
                'description' => 'Добросовестное отношение к работе, вежливость, аккуратность',
                'url_source' => 'https://uslugi.yandex.ru/profile/RinatSaetov-632838',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['nefteyugansk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Смуров',
                'first_name' => 'Иван',
                'middle_name' => '',
                'phone' => '+7 922 427-95-18',
                'rating' => 5,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2010,
                'count_realized_orders' => 6,
                'education' => 'Высшее',
                'description' => 'Профессиональный мастер-сантехник',
                'url_source' => 'https://uslugi.yandex.ru/profile/IvanSmurov-1578007',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['nizhnevartovsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'С',
                'first_name' => 'Денис',
                'middle_name' => '',
                'phone' => '+7 982 552-39-63',
                'rating' => 4.8,
                'start_working_hours' => '6:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 32,
                'education' => 'ПТУ-41',
                'description' => 'Исполнительный, ответственный, аккуратный. Работаю с различными электроинструментом.',
                'url_source' => 'https://uslugi.yandex.ru/profile/DenisS-1462892',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['nizhnekamsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Губайдуллин',
                'first_name' => 'Риваль',
                'middle_name' => '',
                'phone' => '+7 937 628-65-47',
                'rating' => 4.8,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 24,
                'education' => 'Высшее',
                'description' => 'Доброго времени суток! Занимаюсь услугами сантехники для населения уже более 15-ти
                                  лет, к задачам отношусь ответственно, золотые руки и огромный опыт!',
                'url_source' => 'https://uslugi.yandex.ru/profile/RivalGubajdullin-1909996',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['nn'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'С',
                'first_name' => 'Дмитрий',
                'middle_name' => '',
                'phone' => '+7 964 832-17-45',
                'rating' => 5.0,
                'start_working_hours' => '10:00',
                'end_working_hours' => '19:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 14,
                'education' => 'ПТУ-29 слесарь-сантехник',
                'description' => 'Качественно оказываю Сантехнические услуги',
                'url_source' => 'https://uslugi.yandex.ru/profile/DmitrijS-2237780',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['nizhnij-tagil'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'И',
                'first_name' => 'Михаил',
                'middle_name' => '',
                'phone' => '+7 963 444-00-49',
                'rating' => 5.0,
                'start_working_hours' => '8:00',
                'end_working_hours' => '02:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 13,
                'education' => 'Высшее',
                'description' => 'Мастер сантехник работаю 10 лет все делаю качественно и аккуратно выезжаю всегда сам
                                  от мелкого ремонта крана до кап ремонта Работаю по всем р-н города',
                'url_source' => 'https://uslugi.yandex.ru/profile/MikhailI-446146',
                'on_front' => false, 'actual' => true
            ],
                      [
                'city_id' => $citiesData['novokuzneck'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Сергей',
                'first_name' => 'Г',
                'middle_name' => '',
                'phone' => '+7 960-932-55-66',
                'rating' => 5.0,
                'start_working_hours' => '9:00',
                'end_working_hours' => '20:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 9,
                'education' => 'Высшее',
                'description' => 'Профессиональный мастер-сантехник',
                'url_source' => 'https://uslugi.yandex.ru/profile/SergejG-1755278',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['novomoskovsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Гунько',
                'first_name' => 'Дмитрий',
                'middle_name' => 'Владимирович',
                'phone' => '+7 960 617-70-50',
                'rating' => 4.4,
                'start_working_hours' => '8:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 24,
                'education' => 'Слесарь-сантехник.ТКСТ.2001год.',
                'description' => 'Расчёт,подбор материала и монтаж систем отопления,водопровода
				и водоотведения.ДИАГНОСТИКА и устранение неисправностей в уже смонтированных
				системах.Установка сантехнического оборудования любой сложности.Гарантия на
				выполняемые работы.Обслуживание установленного оборудования.ИНДИВИДУАЛЬНЫЙ
				ПОДХОД К КАЖДОМУ КЛИЕНТУ.Также возможны консультации удалённо.Промывка систем
				отопления и бойлеров ГВС.ГАРАНТИЯ НА ПРОИЗВОДИМЫЕ РАБОТЫ ТРИ ГОДА.',
                'url_source' => 'https://uslugi.yandex.ru/profile/VadimVeber-143014',
                'on_front' => false, 'actual' => false
            ],
            [
                'city_id' => $citiesData['novorossijsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Устинов',
                'first_name' => 'Алексей',
                'middle_name' => '',
                'phone' => '+7 960 489-30-69',
                'rating' => 5.0,
                'start_working_hours' => '9:00',
                'end_working_hours' => '19:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 17,
                'education' => 'Техническое',
                'description' => 'Профессиональный мастер-сантехник',
                'url_source' => 'https://uslugi.yandex.ru/profile/AleksejUstinov-2132209',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['novosib'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Бородаенко',
                'first_name' => 'Николай',
                'middle_name' => 'Анатольевич',
                'phone' => '+7 913 732-08-83',
                'rating' => 5,
                'start_working_hours' => '9:00',
                'end_working_hours' => '23:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 60,
                'education' => 'Высшее НГТУ, Автоматизация процессов и производств',
                'description' => 'Мастер по сантехническим работам и водоотведению. Опыт работы
				более 10лет. Аккуратен и пунктуален.Все виды сантехнических работ: вызов
				сантехника на дом для устранения засоров и протечек, замена счетчиков воды,
				установка унитаза и смесителя и многое другое. Качественно и недорого выполняю
				все сантехнические услуги. Большой опыт работы в данном направлении. Работаю во
				всех районах Новосибирска, а также в области.Помимо этого, услуги гидродинамики,
				отогрев домов, отопления. Размораживание холодной воды. Подключение бытовой
				техники. Гарантия на указанные услуги.',
                'url_source' => 'https://uslugi.yandex.ru/profile/NikolajAnatolevichB-1628090',
                'on_front' => false, 'actual' => false
            ],
            [
                'city_id' => $citiesData['novocheboksarsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'К',
                'first_name' => 'Владимир',
                'middle_name' => '',
                'phone' => '+7 987 668-42-40',
                'rating' => 5.0,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 15,
                'education' => 'Высшее',
                'description' => 'Я сантехник, стаж работы более 10 лет, делаю работу качественно, даю гарантию на свою работу.
                                  Выезжаю на адрес, провожу консультации на объекте или по телефону. Оплата после выполненных
                                  работ. Работаю со всеми видами труб, полипропилен, металлопласт, шитый полиэтилен,
                                  стальные трубы.',
                'url_source' => 'https://uslugi.yandex.ru/profile/VladimirK-2689540',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['novocherkassk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Зиновьев',
                'first_name' => 'Станислав',
                'middle_name' => '',
                'phone' => '+7 909 433-46-33',
                'rating' => 5.0,
                'start_working_hours' => '6:00',
                'end_working_hours' => '23:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2015,
                'count_realized_orders' => 10,
                'education' => 'Средне-специальное',
                'description' => 'Имею большой опыт работы как "Мастер на час", "Сантехник на час", Электрик на час". Знаю где приобретать необходимые материалы, у меня там скидка. Работаю по Новочеркасску и пригороду.',
                'url_source' => 'https://uslugi.yandex.ru/profile/StanislavZinovev-2266711',
                'on_front' => false, 'actual' => true
            ],
                        [
                'city_id' => $citiesData['novosahtinsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Кулинин',
                'first_name' => 'Алексей',
                'middle_name' => 'Анатольевич',
                'phone' => '+7 989 501-83-08',
                'rating' => 4.8,
                'start_working_hours' => '7:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 277,
                'education' => ' ',
                'description' => 'Я профессиональный строитель. Найду подход и верное решение
				к каждому клиенту. Звоните рад Вас слышать! Фирмы, прорабы и посредники
				просьба не беспокоить.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AleksejK-1215264',
                'on_front' => false, 'actual' => false
            ],
            [
                'city_id' => $citiesData['noviy-urengoy'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Сулейманов',
                'first_name' => 'Ринат',
                'middle_name' => '',
                'phone' => '+7 922 284-34-25',
                'rating' => 4.7,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 12,
                'education' => '',
                'description' => 'Сантехник с большим стажем и девизом "Работу свою нужно делать идеально"',
                'url_source' => 'https://uslugi.yandex.ru/profile/RinatSulejmanov-841265',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['noginsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Олинин',
                'first_name' => 'Сергей',
                'middle_name' => 'Иванович',
                'phone' => '+7 962 952-20-39',
                'rating' => 5,
                'start_working_hours' => '7:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 11,
                'education' => ' ',
                'description' => 'Доброго времени суток! Я со своей бригадой оказываю
				услуги по созданию систем водоснабжения и канализации, являюсь опытным
				специалистом в данном направлении, деятельность свою веду самостоятельно.
Звоните, буду рад сотрудничеству.',
                'url_source' => 'https://uslugi.yandex.ru/profile/SergejO-1231261',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['norilsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Ашуров',
                'first_name' => 'Тахир',
                'middle_name' => 'Заирович',
                'phone' => '+7 960 754-16-81',
                'rating' => 5,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 6,
                'education' => 'Сертификат Кнауф, немецкий стандарт «Сухое строительство»2022 г.',
                'description' => 'Здравствуйте. Меня зовут Тахир. Строительством, ремонтом и отделкой домов,
				квартир и комерчиских помещений я занимаюсь уже 15 лет. Большой опыт работы в этой сфере.
				Работаю в команде с высококлассными специалистами. За качество отвечаю лично !',
                'url_source' => 'https://uslugi.yandex.ru/profile/TakhirAshurov-1589009',
                'on_front' => false, 'actual' => false
            ],
            [
                'city_id' => $citiesData['noyabrsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Жилин',
                'first_name' => 'Валерий',
                'middle_name' => 'Владимирович',
                'phone' => '+7 919 550-19-09',
                'rating' => 4.7,
                'start_working_hours' => '9:00',
                'end_working_hours' => '19:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 13,
                'education' => ' Среднее специальное',
                'description' => 'Сантехнические работы и услуги.',
                'url_source' => 'https://uslugi.yandex.ru/profile/ValerijVladimirovichZh-903693',
                'on_front' => false, 'actual' => false
            ],
            [
                'city_id' => $citiesData['obninsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Аксенов',
                'first_name' => 'Виктор',
                'middle_name' => 'Петрович',
                'phone' => '+7 926 180-37-57',
                'rating' => 4.5,
                'start_working_hours' => '7:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2015,
                'count_realized_orders' => 56,
                'education' => 'Высшее.АНО ДПО «УКК «Мособлгаз».Обучение для допуска к обслуживанию
				и ремонту газового оборудования марки Протерм, Вайланд, Бош, Будерус, Бакси.
				Насосы Грунфус.Обучение по установке и обслуживанию , ремонту газовых котлов
				котлов, Vaillant (Вайлант), Viessmann (Висман), Protherm ( Протерм) .',
                'description' => 'Квалифицированный и аккуратный мастер по ремонту газовых котлов.
								Обслуживание и ремонт котельных частных домов. Конденсационные котлы ремонт и обслуживание.
Отопление дома. Монтаж под ключ.Опыт работы более 8 лет.Консультирую по подбору газового и электрического оборудования.
Выполняю выездной ремонт и техническое обслуживание газового и электрического оборудования.
Консультация по телефону бесплатно.Автоматика котлов Buderus (Будерус), Vaillant (Вайлант).
 Качественный ремонт всех неисправностей, в том числе и очень сложных поломок, прямо у Вас дома!
Не предоставляю заведомо ненужные услуги.Гарантия на работу до 12 месяцев.Произвожу качественный и
надежный ремонт, что исключает возможность повторного ремонта. Подъеду в удобное для Вас, время !
Запасные части заказчика или на заказ ( так же работаю по безналичному расчету). Газовые котлы
настенные, напольные. Ремонт автоматики с гарантией. Так же монтаж и обслуживании инженерных
коммуникаций: водоснабжение, ГВС, балансирую гидравлическую систему отопления (для правильной ее
 работы). Устанавливаю, обслуживаю и ремонтирую газовые водонагревательные бойлеры косвенного
 нагрева. Запасные части заказчика или на заказ (могу выставить счет на оплату). На все работы
 предоставляется гарантия!Промываю теплообменники, бойлеры, водонагреватели - только
 профессиональным реагентом! для лучшей работоспособности оборудования. Установка и настройкой
 системы ZONT– это GSM-термостат, предназначенный для дистанционного контроля и управления работой
 системы отопления с помощью телефона, планшета или компьютера. ZONT позволяет:1)быстро оповещать
 владельца при аварии котла.2)отключении питания или охранной сигнализации дома и других событиях.
3)экономить до 30% на отоплении дома в месяц.4) комфортно дистанционно регулировать температуру в помещениях вашего дома.',
                'url_source' => 'https://uslugi.yandex.ru/profile/ViktorPetrovichA-630439',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['odintsovo'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Кулин',
                'first_name' => 'Николай',
                'middle_name' => 'Иванович',
                'phone' => '+7 965 305-83-36',
                'rating' => 4.8,
                'start_working_hours' => '7:00',
                'end_working_hours' => '23:00',
                'warranty period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 275,
                'education' => ' ГУУ Серго Орджоникидзе',
                'description' => 'День добрый . Для выполнения различных видов работ используется профильный инструмент различного назначения. Инструмент делится на измерительный, электроинструмент. диагностический, ручной и специальный инструмент.
Используемый измерительный инструмент:
1. Линейка
2. Рулетка механическая
3. Угольник
4. Рулетка лазерная
5. Лазерный нивелир
6. Уровень пузырьковый
Используемый электроинструмент:
1.Шуруповёрт
2.Дрель
3.Перфоратор
4.Реноватор
5.Электролобзик
6.Торцевая пила ручная
7.Торцевая пила стационарная
8.Фрезер ручной
9.Сабельная пила
10.Паяльное оборудование для труб ПВХ
11. Штроборезы
12. Промышленный пылесос
13.Шлифовальная машина
14.Фен промышленный
15. Зарядные устройство
16. Станок для резки плитки
Диагностический инструмент:
1. Сканер проводки
2.Тестер
Ручной инструмент:
1.Не поддаётся описанию из за количества.
Специальный инструмент:
1.В основном это ручной инструмент собственного изготовления без аналогов.
Основополагающим фактором в выполнении работ является качество, гарантия, минимальные сроки.',
                'url_source' => 'https://uslugi.yandex.ru/profile/NikolajK-387994',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['oktyabrskiy'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Аталов',
                'first_name' => 'Альберт',
                'middle_name' => 'Владимирович',
                'phone' => '+7 987-041-08-14',
                'rating' => 5,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 4,
                'education' => 'Среднее',
                'description' => 'Профессиональный подход к работе. Возможна покупка материала со скидкой.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AlbertA-288644',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['omsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Яшкин',
                'first_name' => 'Иван',
                'middle_name' => 'Сергеевич',
                'phone' => '+7 913 140-69-32',
                'rating' => 4.9,
                'start_working_hours' => '9:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 119,
                'education' => 'ОАТК автомеханик',
                'description' => 'Вежливый, отзывчивый. Помогу решить ваши бытовые проблемы
				качественно и в срок. Выезжаю на адрес, оцениваю поставленную задачу.
				Обсуждаем нюансы и приступаю к работе. Руки растут из нужного места.
				Могу забрать ваш прибор или технику к себе в мастерскую для дальнейшего ремонта.
				Можете сами привезти ко мне на ремонт. Выезд на адрес платный.',
                'url_source' => 'https://uslugi.yandex.ru/profile/IvanSergeevichYa-1509079',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['orel'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'М',
                'first_name' => 'Василий',
                'middle_name' => '',
                'phone' => '+7 910 304-94-96',
                'rating' => 4.6,
                'start_working_hours' => '7:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 53,
                'education' => 'Средне-специальное. СПТУ 79',
                'description' => 'Читайте пожалуйста внимательно. Работаю по городу. Все цены указаны от... В связи с этим цены уточняйте.
                                  Я мастер-универсал с большим опытом работы (как в России, так и за рубежом) в разных сферах услуг, которые я подробно описал и предлагаю населению по разумным ценам и с гарантией на работу до 1 года в городе. На выполненную работу при необходимости выдаю гарантийный талон. Я добросовестный, ответственный, порядочный, без вредных привычек, славянской национальности. Стараюсь делать свою работу быстро, аккуратно и качественно. При необходимости беру с собой помощника. Весь необходимый инструмент и инвентарь имеется в наличии. Все работы по возможности делаю на дому у клиента. Работаю без посредников.
                                  К постоянным клиентам выезжаем в первую очередь и делаю небольшие скидки. Конфиденциальность клиента гарантируем.
                                  Общаюсь с клиентами только по телефону или мессенджеру ватсап. На смс не отвечаю и не прослеживаю.
                                  Точная цена за оказанную услугу оговаривается индивидуально с каждым клиентом и только после осмотра. Минимальная цена состоит из вызова+диагностики+работы без учета расходных материалов (всё зависит от расстояния+срочности+предоставляемой услуги).
                                  В некоторых случаях за отдельную плату есть возможность решить вашу проблему (проконсультировать) по телефону или мессенджеру ватсап.
                                  Большая просьба о времени и дате договариваться заранее.
                                  Официально зарегистрирован в налоговой инспекции, как самозанятый.
                                  Дополнительная информация на личном сайте.',
                'url_source' => 'https://uslugi.yandex.ru/profile/VasilijM-1227296',
                'on_front' => false, 'actual' => true
            ],
			[
                'city_id' => $citiesData['oren'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Ковалев',
                'first_name' => 'Максим',
                'middle_name' => '',
                'phone' => '+7 908 322-81-44',
                'rating' => 4.9,
                'start_working_hours' => '6:00',
                'end_working_hours' => '23:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 34,
                'education' => 'Высшее',
                'description' => 'Здравствуйте уважаемые клиенты. Меня зовут Максим, я частный мастер уже более 12 лет занимаюсь любимым делом. Я очень люблю свою работу и стараюсь помочь каждому клиенту Имею большой опытом работы по сантехнике, электрике и мелкому ремонту. Вообщем мастер на все руки. Ответственно подхожу к поставленным мне задачам. Делаю работу качественно с чувством с толком как для себя.
                                  Мой опыт позволяет не допускать ошибок неопытных мастеров!
                                  Буду рад помочь с решение абсолютно любым проблем в домах, квартирах, офисах и тогдалее. Для меня очень важно, чтобы мои клиенты оставались довольными и рекомендовали меня другим! Ведь не зря говорят, что сарафанное радио лучший способ рекламы! Именно поэтому я стараюсь выполнить работу недорого, качественно и в срок!️️️️️',
                'url_source' => 'https://uslugi.yandex.ru/profile/MaksimKovalev-1930811',
                'on_front' => false, 'actual' => true
            ],
			[
                'city_id' => $citiesData['orekhovo-zuyevo'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Куринов',
                'first_name' => 'Андрей',
                'middle_name' => 'Викторович',
                'phone' => '+7 966 319-58-14',
                'rating' => 4.9,
                'start_working_hours' => '0:00',
                'end_working_hours' => '0:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 21,
                'education' => ' ',
                'description' => 'Здравствуйте, я мастер со стажем и опытом. Сборка и ремонт
				различной мебели, сантехники, электрики и другие бытовые работы . Могу сделать,
				повесить, наладить, поменять, отремонтировать и тд. за оговоренные с Заказчиком
				цены. Есть база для ремонта и обработки заказов , профессиональный инструмент,
				личный авто-универсал. Личные качества: ответственность, внимательность,
				исполнительность. Предоставляю гарантию, скидку на материалы и работы.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AndrejK-622646',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['orsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Трофимов',
                'first_name' => 'Дмитрий',
                'middle_name' => 'Викторович',
                'phone' => '+7 961 941-53-62',
                'rating' => 5,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 18,
                'education' => '9 классов',
                'description' => 'Энергичный, коммуникабельный, аккуратный',
                'url_source' => 'https://uslugi.yandex.ru/profile/AndrejK-622646',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['penza'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Сувин',
                'first_name' => 'Максим',
                'middle_name' => 'Михайлович',
                'phone' => '+7 902 080-23-46',
                'rating' => 4.7,
                'start_working_hours' => '9:00',
                'end_working_hours' => '20:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 76,
                'education' => 'ПГУ. Технология и оборудования сварочного производства.',
                'description' => 'Выездной мастер: сантехник, сервисный мастер, ремонт газовых
				колонок, котлов, водонагревателей. Прочие работы указанные в профиле.',
                'url_source' => 'https://uslugi.yandex.ru/profile/MaksimMikhajlovichS-145436',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['pervouralsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Быков',
                'first_name' => 'Олег',
                'middle_name' => 'Михайлович',
                'phone' => '+7 912 052-13-75',
                'rating' => 5,
                'start_working_hours' => '0:00',
                'end_working_hours' => '0:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 46,
                'education' => 'Уральский федеральный университет имени первого Президента России Б.Н. Ельцина',
                'description' => 'Рад приветствовать Вас в моем объявлении, это первый шаг к решению
				Ваших сантехнических проблем! Работаю один. Использую только качественный профессиональный
				инструмент, что позволяет выполнять качественно свою работу! При необходимости, поеду в
				магазин, закуплю необходимый материал и отчитаюсь перед Вами по чеку. Гарантирую
				оперативность, аккуратность, порядочность и отсутствие доплат. Так же, о других услугах,
				можете уточнить по телефону. Выезд на заказ в течении получаса. Весь инструмент с собой.
				Гарантия на работу! Звоните, обязательно договоримся!',
                'url_source' => 'https://uslugi.yandex.ru/profile/OlegB-1863987',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['perm'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Котов',
                'first_name' => 'Вадим',
                'middle_name' => 'Олегович',
                'phone' => '+7 965 550-83-31',
                'rating' => 5,
                'start_working_hours' => '0:00',
                'end_working_hours' => '0:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 17,
                'education' => 'Мастер сталроно-плотничных паркетных и стекольных работ, Слесарь-сантехник 3 разряда, Облицовщик-плиточник 3 разряда',
                'description' => 'Специалист с образованием, произвожу ремонтные работы в сфере
				сантехники и мебели, замена старой сантехники, сборка мебели',
                'url_source' => 'https://uslugi.yandex.ru/profile/VadimOlegovichK-2235846',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['petrozavodsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Усов',
                'first_name' => 'Александр',
                'middle_name' => 'Олегович',
                'phone' => '+7 981 401-37-61',
                'rating' => 4.9,
                'start_working_hours' => '8:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 84,
                'education' => 'Мастер сталроно-плотничных паркетных и стекольных работ,
				Слесарь-сантехник 3 разряда, Облицовщик-плиточник 3 разряда',
                'description' => 'Александр, 39 лет. Начал работать на себя с 18 лет.
				Большой опыт работы, в сфере оказания услуг по ремонту компьютеров ( Поиск
				неисправности, установка опер. систем, сборка/продажа компьютеров и комплектующих )
				Также выполняю мелкие бытовые услуги ( навес карнизов , шкафов, люстр, установка
				розеток )',
                'url_source' => 'https://uslugi.yandex.ru/profile/AleksandrU-429361',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['p-kamchatskii'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Grigoriev',
                'first_name' => 'Zheniy',
                'middle_name' => 'Олегович',
                'phone' => '+7 914 620-47-85',
                'rating' => 5,
                'start_working_hours' => '8:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 4,
                'education' => '   ',
                'description' => 'Опыт работ больше 15-ти лет, от общестроя до мебели и бань.
				Комплект аккумуляторного инструмента и всё возможной периферии к нему, помогут
				в выполнении любых задач.',
                'url_source' => 'https://uslugi.yandex.ru/profile/ZheniyGrigoriev-1307444',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['podolsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Олин',
                'first_name' => 'Сергей',
                'middle_name' => 'Олегович',
                'phone' => '+7 962 952-20-39',
                'rating' => 5,
                'start_working_hours' => '8:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 10,
                'education' => '   ',
                'description' => 'Доброго времени суток! Я со своей бригадой оказываю услуги по
				созданию систем водоснабжения и канализации, являюсь опытным специалистом в
				данном направлении, деятельность свою веду самостоятельно. Звоните, буду рад
				сотрудничеству.',
                'url_source' => 'https://uslugi.yandex.ru/profile/SergejO-1231261',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['prokopyevsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Елизаров',
                'first_name' => 'Александр',
                'middle_name' => 'Иванович',
                'phone' => '+7 960 912-45-61',
                'rating' => 5,
                'start_working_hours' => '9:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 65,
                'education' => 'средне - техническое',
                'description' => 'Выполняем любые сантехнические работы без посредников в
				Новокузнецке, а так же выезжаем в ближайшие города Кемеровской обл.
заключим,договор,выдадим чек об оказании услуг! Готовы взять отдельностоящие здания, а так же
 офисы на обслуживание. Доставка материалов к вашей двери ,организационные вопросы берем на себя .
 Большой стаж работы в области сантехники и сварки .Отвечу н
а ваши вопросы по телефону . Осуществляем онлайн консультации по телефону.Выезд на мелкий ремонт
на квартиры осуществляется при наличии свободного времени .',
                'url_source' => 'https://uslugi.yandex.ru/profile/AleksandrElizarov-583342',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['pskov'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'П.',
                'first_name' => 'Владимир',
                'middle_name' => '',
                'phone' => '+7 952 229-39-27',
                'rating' => 4.7,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 67,
                'education' => 'Высшее',
                'description' => 'Сантехник выполню любые работы по этой услуге',
                'url_source' => 'https://uslugi.yandex.ru/profile/VladimirP-367019',
                'on_front' => false, 'actual' => true
            ],
            [
                'city_id' => $citiesData['pushkino'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Тестовщиков',
                'first_name' => 'Тестовщик',
                'middle_name' => 'Тестовщиквич',
                'phone' => '+7 962 001-26-04',
                'rating' => 4.7,
                'start_working_hours' => '8:00',
                'end_working_hours' => '19:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 16,
                'education' => '',
                'description' => 'Занимаюсь оказанием строительных услуг разного направления,
				сварочными кровельными бетонными работами бурением водяных скважин. ремонтом
				бытовой техники работаю Пятигорск-КМВ выезжаю по Ставропольскому краю если есть
				объем.',
                'url_source' => 'https://uslugi.yandex.ru/profile/SergejViktorovichKh-568339',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['pyatigorsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Хозников',
                'first_name' => 'Сергей',
                'middle_name' => 'Викторович',
                'phone' => '+7 962 001-26-04',
                'rating' => 4.7,
                'start_working_hours' => '8:00',
                'end_working_hours' => '19:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 16,
                'education' => '',
                'description' => 'Занимаюсь оказанием строительных услуг разного направления,
				сварочными кровельными бетонными работами бурением водяных скважин. ремонтом
				бытовой техники работаю Пятигорск-КМВ выезжаю по Ставропольскому краю если есть
				объем.',
                'url_source' => 'https://uslugi.yandex.ru/profile/SergejViktorovichKh-568339',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['ramenskoe'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Павлов',
                'first_name' => 'Евгений',
                'middle_name' => 'Иванович',
                'phone' => '+7 965 381-88-75',
                'rating' => 5,
                'start_working_hours' => '7:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 247,
                'education' => 'Профессиональный лицей 7(ПЛ-7). По образованию являюсь
				мотористом,рулевым 1 класса судов,3 штурманом,3 помощником механика 3 группы
				свдов',
                'description' => 'Гражданин РФ. Среднее техническое образование,работаю сантехником 5 лет.
				Произвожу как инженерную работу,так и установку сантехники. Даю гарантию на
				свою работу,с клиентом поддерживаю общение .',
                'url_source' => 'https://uslugi.yandex.ru/profile/EvgenijPavlov-505556',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['reutov'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Семенов',
                'first_name' => 'Александр',
                'middle_name' => 'Иванович',
                'phone' => '+7 910 419-29-89',
                'rating' => 4.9,
                'start_working_hours' => '0:00',
                'end_working_hours' => '23:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 162,
                'education' => ' Стерлитамакский колледж Строительства, Экономики и Права.
				Строительство и эксплуатация зданий и сооружений. Старший техник.',
                'description' => 'Гражданин РФ. Среднее техническое образование,работаю сантехником 5 лет.
				Произвожу как инженерную работу,так и установку сантехники. Даю гарантию на
				свою работу,с клиентом поддерживаю общение .',
                'url_source' => 'https://uslugi.yandex.ru/profile/AleksandrS-1284152',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['rnd'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Киблицкий',
                'first_name' => 'Евгений',
                'middle_name' => 'Александрович',
                'phone' => '+7 988 990-80-46',
                'rating' => 4.3,
                'start_working_hours' => '7:00',
                'end_working_hours' => '23:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2015,
                'count_realized_orders' => 151,
                'education' => ' Стерлитамакский колледж Строительства, Экономики и Права.
				Строительство и эксплуатация зданий и сооружений. Старший техник.',
                'description' => 'Специалист по прочистки канализации и устранение засоров.
				Более 8 лет работаю в этой профессии, имею огромный опыт.Работаю без
				посредников.Отсюда и цены минимальные и адекватные!
Стоимость работ обсуждается по телефону перед выездом. Имеется все необходимое оборудование
для выполнения работ любой сложности.Устраним любой засор в квартире,частном доме,от люка,
выпуски.Профессионально и качественно выполняю работы с гарантией.
Гидродинамическая(гидро-форсунка).Электромеханическая(спец-аппарат).
Видеодиагностика(камера,эндоскоп).',
                'url_source' => 'https://uslugi.yandex.ru/profile/EvgenijK-115019',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['rubcovsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Киров',
                'first_name' => 'Николай',
                'middle_name' => 'Александрович',
                'phone' => '+7 983 550-31-85',
                'rating' => 5,
                'start_working_hours' => '7:00',
                'end_working_hours' => '23:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 2,
                'education' => '  ',
                'description' => 'Все виды сантехнических работ установка - ремонт
				водонагревателей, стиральных машин, насосных ствнций.Установка унитазов,
				радиаторов.Прочистка засоров. Замена канализации,стояков,разводки и т. д .
				А также мелкие сантехнические работы. Поможем в выборе и доставке матерьяла.
				Пенсионрам скидки.без выходных',
                'url_source' => 'https://uslugi.yandex.ru/profile/NikolajK-174612',
                'on_front' => false, 'actual' => false
            ],
				[
                'city_id' => $citiesData['rybinsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Глазунов',
                'first_name' => 'Денис',
                'middle_name' => 'Александрович',
                'phone' => '+7 980 660-24-88',
                'rating' => 5,
                'start_working_hours' => '7:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 3,
                'education' => 'РРУ им. Калашникова',
                'description' => 'От мелкого до крупного ремонта. Сборка, разборка мебели.
Монтаж-демонтаж техники. Электрика, сантехника.',
                'url_source' => 'https://uslugi.yandex.ru/profile/DenisGlazunov-2004683',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['ryazan'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Рахматуллин',
                'first_name' => 'Рашид',
                'middle_name' => 'Ринатович',
                'phone' => '+7 906 546-27-14',
                'rating' => 5,
                'start_working_hours' => '8:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 68,
                'education' => '',
                'description' => 'Здравствуйте!Меня зовут Рашид.Я очень рано начал
				заниматься строительством колодцев, а именно с 13 лет.В 90-ые года мой отец
				был бригадиром в Московской области и меня возил с собой , мои деды тоже
				строили срубовые колодца из дуба т.к. раньше не было ж.б. колец.Отец тоже
				посвятил всю свою жизнь этой сфере, а это не мало 47 лет круглогодичная
				ручная копка колодцев.Я тоже пошёл по этим же стопам.Так что уважаемые
				клиенты обращаясь к нам потомственным колодезникам вы не пожалеете ! Мой
				личный опыт в этой сфере более 20 лет, за это время вырыто очень много
				колодцев . На протяжении более 10 лет являюсь директором большой компании .
				В нашей команде работают 7 бригад специалистов.Нам доверяют т.к. имеем
				заслужанную репутацию .И это видно даже здесь по отзывам некоторых наших
				клиентов.Если вас интересует строительство либо бурение питьевых ,
				технических,канализационных колодцев то смело обращайтесь к нам!.',
                'url_source' => 'https://uslugi.yandex.ru/profile/RashidRakhmatullin-317576',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['salavat'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Кугубашев',
                'first_name' => 'Артур',
                'middle_name' => 'Ринатович',
                'phone' => '+7 965 924-79-45',
                'rating' => 5,
                'start_working_hours' => '9:00',
                'end_working_hours' => '19:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2015,
                'count_realized_orders' => 5,
                'education' => '',
                'description' => 'Мы занимаемся реставрацией ванн больше 8 лет. За это
				время мы получили огромный опыт ремонта ванн и делаем свою работу очень
				качественно с заключением договора и реальной гарантией. Ремонт ванн - наш
				профиль. Прежде чем купить ванну - обратитесь к нашим специалистам, и ваша в
				анна будет лучше новой. Наша компания имеет большой штат сотрудников и два
				своих офиса, а так же партнёрскую сеть, которая работает в 57 городах России.
				Все мастера проходят обучение и работают качественной краской Работаем по
				договору и предоставляем гарантию на результат работы. Реставрация ванны
				жидким акрилом - современный и безопасный способ обновить покрытие ванной,
				раковины или душевого поддона. Для реставрации подходит: чугунная ванна,
				стальная ванна, акриловая ванна, раковина, поддон душевой',
                'url_source' => 'https://uslugi.yandex.ru/profile/ArturKubagushev-1072635',
                'on_front' => false, 'actual' => false
            ],
						[
                'city_id' => $citiesData['salsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Лютиков',
                'first_name' => 'Михаил',
                'middle_name' => 'Иванович',
                'phone' => '+7 961 277-20-16',
                'rating' => 4.3,
                'start_working_hours' => '0:00',
                'end_working_hours' => '23:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2015,
                'count_realized_orders' => 22,
                'education' => '',
                'description' => 'Прочистка канализации с гарантией. Нашли дешевле - сделаем скидку!
- Условия честные! Оплата после работы. Выезд бесплатно.
- Прочистка гидродинамическим или электро - механическим оборудованием. При необходимости, есть возможность видео-диагностики.
- Прочистка любого засор в квартире или частном доме. Быстро!
- Прочистка канализационных сетей в кафе и ресторанах.
- Цены человеческие.
- Выезд в любое удобное для вас время.
- Работы осуществляются в городе и за его пределами до 50 км.
- Диаметр прочищаемой трубы 40-300 мм.
Звоните или пишите в whatsapp для консультации и помощи',
                'url_source' => 'https://uslugi.yandex.ru/profile/MikhailL-522883',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['samara'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Шутов',
                'first_name' => 'Вячеслав',
                'middle_name' => 'Иванович',
                'phone' => '+7 906 344-61-89',
                'rating' => 4.7,
                'start_working_hours' => '7:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 29,
                'education' => '',
                'description' => 'Здравствуйте. Буду рад оказать посильную помощь по
				ремонту и монтажу сантехники и сантехнического оборудования, ремонту и
				установке стиральных и посудомоечных машин, холодильников и водонагревателей.
				Работаю честно, без дополнительных накруток на материалы и надуманной работы.
				Качество выполненных работ гарантирую. Оплата по факту выполнения работ.
				Звоните!',
                'url_source' => 'https://uslugi.yandex.ru/profile/VyacheslavSh-1280523',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['sankt-peterburg'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Смирнов',
                'first_name' => 'Андрей',
                'middle_name' => 'Иванович',
                'phone' => '+7 905 268-37-11',
                'rating' => 4.8,
                'start_working_hours' => '9:00',
                'end_working_hours' => '19:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 116,
                'education' => '',
                'description' => 'Опыт работы с 2000года, специализируюсь на инженерных сетях в
				загородных домах',
                'url_source' => 'https://uslugi.yandex.ru/profile/AndrejSmirnov-1474458',
                'on_front' => false, 'actual' => false
            ],
				[
                'city_id' => $citiesData['saransk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Тимофеев',
                'first_name' => 'Денис',
                'middle_name' => 'Валерьвич',
                'phone' => '+7 960 333-05-87',
                'rating' => 5,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 54,
                'education' => 'Лукояновский педагогический колледж2004–2008 гг., Арзамасский педагогический институт',
                'description' => 'Опытный мастер с большим арсеналом инструмента и крепежа.
				На авто. Пунктуальный, ответственный, коммуникабельный. Ценю чужое и
				свое время.',
                'url_source' => 'https://uslugi.yandex.ru/profile/DenisTimofeev-1049332',
                'on_front' => false, 'actual' => false
            ],
				[
                'city_id' => $citiesData['saratov'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Быков',
                'first_name' => 'Павел',
                'middle_name' => 'Валерьвич',
                'phone' => '+7 909 331-87-16',
                'rating' => 5,
                'start_working_hours' => '8:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 29,
                'education' => ' СГТУ, инженер',
                'description' => 'Пунктуальный, ответственный. Использую индивидуальный
				подход к каждому клиенту. За плечами богатый опыт ремонтных работ. Применяю
				современные электро инструменты.',
                'url_source' => 'https://uslugi.yandex.ru/profile/PavelB-1067669',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['sevastopol'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Сысоев',
                'first_name' => 'Антон',
                'middle_name' => 'Валерьвич',
                'phone' => '+7 918 021-33-70',
                'rating' => 4.8,
                'start_working_hours' => '7:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2015,
                'count_realized_orders' => 31,
                'education' => ' СГТУ, инженер, очное',
                'description' => 'Качественное выполнение услуг, пунктуальность. В работе используется современное немецкое электрооборудование.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AntonS-103452',
                'on_front' => false, 'actual' => false
            ],
					[
                'city_id' => $citiesData['severodvinks'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Элисов',
                'first_name' => 'Дмитрий',
                'middle_name' => 'Валерьвич',
                'phone' => '+7 911 056-13-23',
                'rating' => 5,
                'start_working_hours' => '8:00',
                'end_working_hours' => '18:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2015,
                'count_realized_orders' => 18,
                'education' => ' ',
                'description' => 'Сделаю все максимально качественно и с гарантией!много разных инструментов, в том числе с пылеудалением!',
                'url_source' => 'https://uslugi.yandex.ru/profile/DmitrijEh-1864267',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['seversk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Сурнин',
                'first_name' => 'Дмитрий',
                'middle_name' => 'Владимирович',
                'phone' => '+7 962 782-06-55',
                'rating' => 5,
                'start_working_hours' => '6:00',
                'end_working_hours' => '23:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 80,
                'education' => 'ТПУ',
                'description' => 'Мастер со стажем более 15 лет. Выполню сантехнические работы. Подбор и доставка материалов на объект. Расчет системы отопления и водоснабжения',
                'url_source' => 'https://uslugi.yandex.ru/profile/DmitrijVladimirovichSurnin-1940088',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['sergiev-posad'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Балахнин',
                'first_name' => 'Сергей',
                'middle_name' => 'Владимирович',
                'phone' => '+7 916 486-08-40',
                'rating' => 4.7,
                'start_working_hours' => '8:00',
                'end_working_hours' => '20:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2017,
                'count_realized_orders' => 134,
                'education' => ' МГСУ им. Куйбышева. теплогазоснабжение, вентиляция и кондиционирование',
                'description' => 'Продажа кондиционеров с установкой.Продажа газовых , электрокотлов с установкой.Проэктирование кондиционеров и вентиляции.Сервисное обслуживание.Устанавливаю кондиционеры в дома ПИК из вашего окна , без участия соседей.
Опыт работы в данной сфере более 10 лет.Образование МГСУ им. Куйбышева, специальность кондиционирования и вентиляция.
Проектирую и устанавливаю системы, вентиляции, бризеры, прецизионные кондиционеры всех типов от +5 до -35.
Материалы ( медние трубы, провода по ГОСТу.Гарантия на оборудование от 3 до 5 лет.Гарантия на работу 2 года.',
                'url_source' => 'https://uslugi.yandex.ru/profile/SergejB-794231',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['serpukhov'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Мунтян',
                'first_name' => 'Иван',
                'middle_name' => 'Леонидович',
                'phone' => '+7 916 850-90-29',
                'rating' => 5,
                'start_working_hours' => '8:00',
                'end_working_hours' => '23:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2017,
                'count_realized_orders' => 32,
                'education' => ' ',
                'description' => 'Я профессиональный сантехник работаю по профессии с момента окончания учебного заведения, уже более 7 лет. Образование среднее-специальное. Коммуникабельный, вежливый, порядочный и чистоплотный. После проведения работ всегда навожу порядок. Стоимость услуг зависит от сложности работ и необходимости в дополнительных расходах, таких как различные расходные материалы, большинство из которых, обычно я имею при себе. Всегда предоставляю гарантию на все работы, проведенные мной и моей командой. Выполняю как простые работы, так и сложный сантехнический ремонт.',
                'url_source' => 'https://uslugi.yandex.ru/profile/IvanM-1151916',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['simferopol'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Силов',
                'first_name' => 'Денис',
                'middle_name' => 'Леонидович',
                'phone' => '+7 918 021-35-07',
                'rating' => 5,
                'start_working_hours' => '8:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2017,
                'count_realized_orders' => 33,
                'education' => ' ',
                'description' => 'Выполняем все виды работ по сантехнике и отоплению любой
				сложности',
                'url_source' => 'https://uslugi.yandex.ru/profile/DenisS-245784',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['smolensk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Кудымов',
                'first_name' => 'Дмитрий',
                'middle_name' => 'Сергеевич',
                'phone' => '+7 906 519-69-06',
                'rating' => 4.8,
                'start_working_hours' => '6:00',
                'end_working_hours' => '23:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 96,
                'education' => 'СФМЭИ, электроэнергетика, теплоэнергетика',
                'description' => 'Сантехнические и электромонтажные работы в квартирах
				и частных домах',
                'url_source' => 'https://uslugi.yandex.ru/profile/DmitrijK-1476436',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['sochi'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Лихацкий',
                'first_name' => 'Виктор',
                'middle_name' => 'Сергеевич',
                'phone' => '+7 918 404-65-65',
                'rating' => 4.8,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 47,
                'education' => 'Кубанский Государственный Аграрный Университет',
                'description' => 'Работаю специалистом более 13 лет, в работе использую только качественный расходный материал. Гарантия на все виды работ. Я работаю не один,

				со мной слаженная команда первоклассных специалистов в области кондиционирования, вентиляции, сантехники, алмазного бурения. Подписываем акты выполненных работ.
				Рад помочь в выборе техники!',
                'url_source' => 'https://uslugi.yandex.ru/profile/ViktorLikhackij-305727',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['stavropol'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Геворков',
                'first_name' => 'Артур',
                'middle_name' => 'Эдуардович',
                'phone' => '+7 961 469-21-86',
                'rating' => 4.8,
                'start_working_hours' => '6:00',
                'end_working_hours' => '23:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 56,
                'education' => 'Частное профессиональное образовательное учреждения "Ставропольский кооперативный техникум" г. Ставрополь.В РГУП "КЧЦ по ПК для ЖКХ и ГС"НАКС.
				ООО "НАУЧНО ИССЛЕДОВАТЕЛЬСКИЙ ИНСТИТУТ ПО МОНТАЖНЫМ РАБОТАМ"',
                'description' => 'Работаю специалистом более 13 лет, в работе использую только качественный расходный материал. Гарантия на все виды работ. Я работаю не один,
				со мной слаженная команда первоклассных специалистов в области кондиционирования, вентиляции, сантехники, алмазного бурения. Подписываем акты выполненных работ.
				Рад помочь в выборе техники!',
                'url_source' => 'https://uslugi.yandex.ru/profile/ArturEhduardovichG-1509515',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['staryj-oskol'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Реутов',
                'first_name' => 'Фанис',
                'middle_name' => 'Эдуардович',
                'phone' => '+7 910 221-68-59',
                'rating' => 5,
                'start_working_hours' => '7:00',
                'end_working_hours' => '23:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 85,
                'education' => 'ПЛ2 радиомеханик 4 года, Электромонтажник по силовым сетям и
				электрооборудованию, Газарезчик, Монтажник технологического оборудования и
				преллегающих к ним канструкциям,Стропольщик,',
                'description' => 'Личные качества: Коммуникабельный, ответственный. Добиваюсь
				поставленных целей. Обучаем. Быстро ориентируюсь в ситуации.',
                'url_source' => 'https://uslugi.yandex.ru/profile/FanisR-1652020',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['sterlitamak'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Кулов',
                'first_name' => 'Михаил',
                'middle_name' => 'Вячеславович',
                'phone' => '+7 965 924-98-09',
                'rating' => 4.7,
                'start_working_hours' => '8:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 31,
                'education' => 'Среднеспециальное',
                'description' => 'Здравствуйте, меня зовут Михаил, я занимаюсь монтажем
				отопления, водоснабжения, канализации, устранением засоров,прочисткой труб.
				Использую свой профессиональный инструмент. Все работы выполняю сам.
				Использую проверенный временем материал. Делаю как себе - на совесть.
				Даю гарантию до 3-х лет. Есть личное авто. Звоните',
                'url_source' => 'https://uslugi.yandex.ru/profile/MikhailVyacheslavovichK-150066',
                'on_front' => false, 'actual' => false
            ],
				[
                'city_id' => $citiesData['surgut'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Рулькин',
                'first_name' => 'Андрей',
                'middle_name' => 'Игоревич',
                'phone' => '+7 909 039-47-60',
                'rating' => 5,
                'start_working_hours' => '8:00',
                'end_working_hours' => '20:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 28,
                'education' => 'Профессионально-техническое',
                'description' => 'Электрика.Сантехника.Установка и подключение бытовой техники. ',
                'url_source' => 'https://uslugi.yandex.ru/profile/AndrejIgorevichR-1423079',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['syzran'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Васильев',
                'first_name' => 'Ильдар',
                'middle_name' => 'Ахматович',
                'phone' => '+7 987 903-70-83',
                'rating' => 5,
                'start_working_hours' => '9:00',
                'end_working_hours' => '23:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 13,
                'education' => 'Профессионально-техническое',
                'description' => 'Здравствуйте . Предлагаем услуги по монтажу сантехники любого уровня сложности в квартире, частном доме или даче. Опыт работы более 10 лет . Имеется все необходимое оборудование . Промывка канализации гидродинамикой . Разморозка водопровода и канализации.
Гарантия на выполнение работ,Звоните. Работаем без выходных.',
                'url_source' => 'https://uslugi.yandex.ru/profile/IldarVasilev-1383789',
                'on_front' => false, 'actual' => false
            ],
				[
                'city_id' => $citiesData['syktyvkar'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Макаров',
                'first_name' => 'Александр',
                'middle_name' => 'Ильич',
                'phone' => '+7 963 022-09-45',
                'rating' => 4.2,
                'start_working_hours' => '9:00',
                'end_working_hours' => '18:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 9,
                'education' => 'Мастер общестроительных работ',
                'description' => 'Меня зовут Александр, мне 37 лет, женат, воспитываю сына.В
								строительную сферу попал в 14 лет( подрабатывал с ребятами).
								Затем поступил в ПЛ-8, профессию "мастер общестроительных работ".
								На сегодняшний день имею большой опыт работы в сфере ремонта
								квартир,. Выполняю ремонт квартир от эконом до премиум класса.
								Оказываю помощь в выборе материала, предоставляю скидки в
								большинстве строительных магазинах Сыктывкара, оказываю помощь с
								доставкой материала. Наша бригада состоит из опытных мастеров с
								большим опытом работы. Мы соблюдаем все технологии и даём
								гарантию на все выполненные нами работы от 1- го года. Все
								наши мастера ответственные, исполнительные, без вредных
								привычек, каждый знает свою работу и за счёт этого мы всегда
								укладываемся в более сжатые сроки, тем самым экономя Ваше время.
								На рабочем месте всегда поддерживаем порядок и чистоту. Следим
								за появлением на рынке новых видов отделочных материалов,
								отслеживаем цены на рынке строительных материалов.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AleksandrMakarov-1879869',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['taganrog'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Камышев',
                'first_name' => 'Алексей',
                'middle_name' => 'Ильич',
                'phone' => '+7 961 277-70-58',
                'rating' => 4.8,
                'start_working_hours' => '9:00',
                'end_working_hours' => '18:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 7,
                'education' => 'Таганрогский металлургический лицей, Таганрогский педагогический институт имени Чехова',
                'description' => 'Здравствуйте меня зовут Алексей, имею большой опыт в сфере
				сантехнике, канализации, водопровода. Делаю все качественно и на совесть.
				Цены доступные.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AleksejKamyshev-1542253',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['tambov'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Зенкин',
                'first_name' => 'Дмитрий',
                'middle_name' => 'Вячеславович',
                'phone' => '+7 906 659-03-86',
                'rating' => 5,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 43,
                'education' => 'Мичуринский Аграрный Университет Высшее образование Инженер-Электрик',
                'description' => 'Ответственный подход к выполняемой работе, Всегда готов Вам помочь.',
                'url_source' => 'https://uslugi.yandex.ru/profile/DmitrijZ-127575',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['tver'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Белов',
                'first_name' => 'Алексей',
                'middle_name' => 'Анатольевич',
                'phone' => '+7 910 530-90-37',
                'rating' => 4.9,
                'start_working_hours' => '0:00',
                'end_working_hours' => '0:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 93,
                'education' => 'Среднеспециальное',
                'description' => 'Мастер на все руки, аккуратность и качество выполняемых работ гарантирую',
                'url_source' => 'https://uslugi.yandex.ru/profile/AleksejBelov-531724',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['tobolsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Собенников',
                'first_name' => 'Михаил',
                'middle_name' => 'Анатольевич',
                'phone' => '+7 912 078-17-35',
                'rating' => 5,
                'start_working_hours' => '8:00',
                'end_working_hours' => '20:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 14,
                'education' => ' ',
                'description' => 'Ремонт и строительство',
                'url_source' => 'https://uslugi.yandex.ru/profile/MikhailSobennikov-532423',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['tolyatti'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Каскеев',
                'first_name' => 'Сергей',
                'middle_name' => 'Анатольевич',
                'phone' => '+7 964 981-30-78',
                'rating' => 4.5,
                'start_working_hours' => '8:00',
                'end_working_hours' => '18:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 17,
                'education' => 'Технический колледж',
                'description' => 'Сергей 48лет,живу в Тольятти,сантехник,плиточник,плотник,слесарь опыт 10 лет',
                'url_source' => 'https://uslugi.yandex.ru/profile/SergejKaskeev-987692',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['tomsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Макаренко',
                'first_name' => 'Сергей',
                'middle_name' => 'Анатольевич',
                'phone' => '+7 913 100-30-84',
                'rating' => 4.8,
                'start_working_hours' => '7:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 31,
                'education' => 'ПУ 27 ТОМСК',
                'description' => 'Профессионально оказываю любые сантехнические услуги выполняю
				любые сварочные работы. Услуги сантехника. Услуги сварщика. Опыт более 25 лет.
				Выезд на осмотр по городу и ближайший пригород бесплатный. При больших обьемах
				скидки. Звоните обговорим если вдруг не беру трубку значит выполняю работы
				перезвоню, а также можете отправлять информацию по работе с фото на ватсап
				постараюсь оперативно ответить.Услуги сантехника - качественно выполню
				сантехнические работы в городе Томске и томском районе, большое количество
				выполненных объектов с довольными клиентами. Монтаж систем отопления домов
				квартир. Пайка водопровода полипропилен медь и любой другой материал.
Бесплатная консультация. Сантехник Томск выезд на осмотр бесплатный в некоторых случаях
 могу приступить сразу же к работе, так как всегда с собой полный комплект инструментов.
 Устранения аварий Сварные работы приварить петли на гараж или изготовить ворота, печь для бани,
 мангалы, буржуйки, ремонт кузовов большегрузной техники.',
                'url_source' => 'https://uslugi.yandex.ru/profile/SergejM-144652',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['tula'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Шкедко',
                'first_name' => 'Роман',
                'middle_name' => 'Ильич',
                'phone' => '+7 960 618-15-57',
                'rating' => 4.8,
                'start_working_hours' => '8:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 57,
                'education' => 'СПТУ-29',
                'description' => 'Сантехник газовщик, универсал. Сварщик, электромонтаж,
				Творческий подход к работе. Газовые колонки ремонт и прочистка. Тёплые полы,
				сшитый полиэтилен. Работаю на радость людям.',
                'url_source' => 'https://uslugi.yandex.ru/profile/RomanIlichSh-265076',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['tyumen'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Красноперов',
                'first_name' => 'Андрей',
                'middle_name' => 'Игоревич',
                'phone' => '+7 982 770-99-49',
                'rating' => 4.9,
                'start_working_hours' => '7:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 60,
                'education' => '  ',
                'description' => 'Опыт работы в строительных сферах, крупных и мелких ремонтах
				с 2013г.Полное наличие своего инструмента.Хорошо дружу с геометрией и уровнем.Самозанятость открыта,
возможна работа с юридическими лицами.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AndrejKrasnoperov-1423462',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['ulan-ude'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Котовщиков',
                'first_name' => 'Дмитрий',
                'middle_name' => 'Валерьевич',
                'phone' => '+7 964 400-63-38',
                'rating' => 4.9,
                'start_working_hours' => '7:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 191,
                'education' => '  ',
                'description' => 'Алло Cантехник.Здравствуйте. Меня зовут Дмитрий.Живу в г. Улан-удэ.
Предоставляю услуги сантехник, сварщик:Сантехнические работы от А до Я.
Сварочные работы.Работаю сам, стаж более 10 лет.Индивидуально к каждому клиенту.
Быстро, качественно, недорого.Выезд в частный сектор, жилые массивы.Выходные и праздники не помеха.
Выезд на аварии, устранение.Отогрев канализации, трубопроводов.Засор унитаза.
Засор канализации.Каждому клиенту магнитик в подарок.',
                'url_source' => 'https://uslugi.yandex.ru/profile/DmitrijValerevichKotovshhikov-173675',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['ulyanovsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Шумилов',
                'first_name' => 'Филипп',
                'middle_name' => 'Владимирович',
                'phone' => '+7 917 639-04-14',
                'rating' => 5,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 250,
                'education' => 'Ульяновский Государственный Технический Университет, 2004, магистратура, Машиностроительный факультет, красный диплом ',
                'description' => ' Быстро, аккуратно, качественно и без лишних вопросов, выполняю поставленные Вами задачи.
Оказываю услуги широкого профиля, организовываю сложные процессы, несу ответственность за результат! Читайте отзывы, сами убедитесь.
Звоните или пишите прямо сейчас, опишите подробно задачу, как минимум получите консультацию!
Если задача мне по зубам, Организую и Выполню в Лучшем виде, "под ключ", даю гарантию!
Доступен в Viber, Whatsapp, Telegram, Я.Мессенджер, e-mail.
Отвечаю быстро, на связи 24/7.
Если задача сложная, сразу присылайте фото, файлы или проекты, подробное описание, чтобы разговаривать предметно!
Образование Высшее, Техническое, Магистратура.
Проживаю в Самаре, организовываю работу и услуги по Самарской области и другим регионам.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AleksejAnatolevichSh-1293169',
                'on_front' => false, 'actual' => true,
                'address' => 'ул. Московское шоссе, д. 80'
            ],
			[
                'city_id' => $citiesData['ussuriysk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Крыжановский',
                'first_name' => 'Евгений',
                'middle_name' => 'Игоревич',
                'phone' => '+7 914 660 96-26',
                'rating' => 4.9,
                'start_working_hours' => '6:00',
                'end_working_hours' => '23:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 27,
                'education' => 'Слесарь-сантехник1998 г.',
                'description' => ' Здравствуйте! Выполняю практически весь спектр сантехнических услуг. Спокойный,честный,коммуникабельный,работу свою люблю,отношусь ответственно.
Стараюсь работать быстро, и реально качественно,не люблю откладывать на потом, или потом что то переделывать. Нужные материалы для работы при необходимости закупаю и доставляю сам.
Звоните,пишите в WhatSapp, спрашивайте узнавайте,консультация бесплатна. ',
                'url_source' => 'https://uslugi.yandex.ru/profile/AleksejAnatolevichSh-1293169',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['ufa'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Латыпов',
                'first_name' => 'Станислав',
                'middle_name' => 'Владимирович',
                'phone' => '+7 965 924-03-18',
                'rating' => 4.9,
                'start_working_hours' => '6:00',
                'end_working_hours' => '0:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 29,
                'education' => 'Слесарь-сантехник1998 г.',
                'description' => ' Работаю как самозанятый, могу предоставить чек с налоговой службы на свою работу, оперативно, качественно, с гарантией 6 месяцев, Имеется весь необходимый инструмент для сантехнических работ и для ремонта и сборки душевых кабин, уголков, ширм так и для прочистки канализации и для пайки полипропиленовых труб.',
                'url_source' => 'https://uslugi.yandex.ru/profile/StanislavVladimirovichLatypov-227779',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['habarovsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Шышкин',
                'first_name' => 'Вячеслав',
                'middle_name' => 'Владимирович',
                'phone' => '+7 914 410-45-44',
                'rating' => 4.8,
                'start_working_hours' => '7:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 29,
                'education' => 'ТОГУ инженер,  Вяземский лесхоз техникум, ПТУ 49 Нижний Тагил',
                'description' => ' Здравствуйте приветствую вас на своей страничке .
Если вам нужны качественные услуги,то вы правильно зашли на мой профиль.
Всегда могу выслушать вашу проблему и предложить пути ее решения.',
               'url_source' => 'https://uslugi.yandex.ru/profile/VyacheslavSh-215236',
                'on_front' => false, 'actual' => false
            ],
[
                'city_id' => $citiesData['hanty-mansiisk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Чумин',
                'first_name' => 'Геннадий',
                'middle_name' => 'Владимирович',
                'phone' => '+7 905 827-58-92',
                'rating' => 4.6,
                'start_working_hours' => '7:00',
                'end_working_hours' => '23:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 77,
                'education' => ' ',
                'description' => ' Ремонт и строительство',
               'url_source' => 'https://uslugi.yandex.ru/profile/GennadijCh-490461',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['hasavyrt'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Ульянов',
                'first_name' => 'Шамил',
                'middle_name' => 'Ильгизович',
                'phone' => '+7 962 774-63-50',
                'rating' => 5,
                'start_working_hours' => '9:00',
                'end_working_hours' => '18:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 5,
                'education' => ' ',
                'description' => ' Ремонт и строительство',
               'url_source' => 'https://uslugi.yandex.ru/profile/ShamilU-2334476',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['habarovsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Шулкин',
                'first_name' => 'Вячеслав',
                'middle_name' => 'Ильгизович',
                'phone' => '+7 914 410-45-44',
                'rating' => 4.8,
                'start_working_hours' => '7:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 72,
                'education' => 'ТОГУ инженер,Вяземский лесхоз техникум,ПТУ 49 Нижний Тагил',
                'description' => 'Здравствуйте приветствую вас на своей страничке .
Если вам нужны качественные услуги,то вы правильно зашли на мой профиль.
Всегда могу выслушать вашу проблему и предложить пути ее решения',
               'url_source' => 'https://uslugi.yandex.ru/profile/VyacheslavSh-215236',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['himki'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Лыков',
                'first_name' => 'Игорь',
                'middle_name' => 'Ильгизович',
                'phone' => '+7 965 306-01-57',
                'rating' => 5,
                'start_working_hours' => '9:00',
                'end_working_hours' => '18:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 49,
                'education' => ' Спту 37',
                'description' => ' Лыков Игорь родился в Пензенской области учился в спту 37
				специальность слесарь сантехник живу в химках стаж работы более 10 лет
				работаю с любым материалом от метала до шитого полиотелена',
               'url_source' => 'https://uslugi.yandex.ru/profile/IgorLykov-424740',
                'on_front' => false, 'actual' => false
            ],
						[
                'city_id' => $citiesData['cheboksary'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Яковлев',
                'first_name' => 'Евгений',
                'middle_name' => 'Ильич',
                'phone' => '+7 917 064-06-88',
                'rating' => 4.8,
                'start_working_hours' => '7:00',
                'end_working_hours' => '23:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 87,
                'education' => ' ЧиМПУ, 2009',
                'description' => ' Квалифицированная команда частных электриков, сантехников,
				мастера на час, готовая оказать услуги электрика, сантехника и
				электро- сантехмонтажные работы, монтаж электрооборудования в Чебоксарах,
				Новочебоксарске и по ЧР. Электромонтаж и сантехмонтаж в квартирах, в домах, в
				офисах, в магазинах, в торговых залах и др. помещениях. Опытом свыше 8 лет.
				Подход к работе ответственный с профессиональным оборудованием.',
               'url_source' => 'https://uslugi.yandex.ru/profile/EvgenijYakovlev-110153',
                'on_front' => false, 'actual' => false
            ],
[
                'city_id' => $citiesData['chel'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Гулыгин',
                'first_name' => 'Егор',
                'middle_name' => 'Петрович',
                'phone' => '+7 912 081-48-80',
                'rating' => 4.7,
                'start_working_hours' => '8:00',
                'end_working_hours' => '23:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 89,
                'education' => ' Всероссийский заочный финансово-экономический институт,Южно-Уральский государственный технический колледж,Челябинский государственный университет',
                'description' => ' Здравствуйте! Оказываю услуги по ремонту с 2011г. Работаю с людьми ОВЗ.
Также произвожу независимую техническую экспертизу состояния частной собственности (перед покупкой-продажей недвижимости). Оцениваю перспективность инвестиций в недвижимость.
Провожу экспертизу и оценку ущерба при заливе. Помогаю собрать пакет документов, сопровождение.
Приёмка квартир: черновая, пред чистовая, чистовая от застройщика или подрядчика.Внимание заказчики! Принимаю заказы на вечер и поздний вечер. Выезды в  ситуации: "Мир в опасности, спасите нас,  только вы можете т.д.",- принимаю со всей ответственностью по экстренному тарифу.
Сдаю измерительные приборы в аренду.Гарантия на работы. Мастер даёт гарантию на все произведённые им работы на конкретном объекте в течение гарантийного срока  установленного законом согласно ГК РФ ст. 755  части 1,2,3,4.  В случае вызова по гарантийному обязательству оплачиваются только транспортные расходы, работы по устранению не оплачиваются в соответствии с Законом РФ от 07.02.1992 N 2300-1 (ред. от 05.12.2022) "О защите прав потребителей" статья №29.
Проектирую электросеть, систему водоснабжения в квартире и вентиляцию, подбираю оптимальное оборудование. Создаю условия для жизни людей.
Внимание! Прошу Вас не обращаться ко мне: если вы используете "мат" (таких не обслуживаю и с такими не работаю). Также: если вам надо быстро, нам подешевле, лишь бы работало, объём работы для бригады.
Выезд на обследование объекта с консультацией платный.
Работая со мною, вы можете заказать - супер сервис, т.е. вам никуда не нужно ходить, искать и покупать, это всё делает мастер. Вы оплачиваете счета на работу, материалы с доставками, и принимаете готовую работу. Исполнитель ведёт с вами живой диалог, в котором выбираются лучшие инновационные решения для каждой операции или по конкретному виду работ.
Заказчики! Мастер работает и делает видео отчёты и ведёт корректную переписку с вами, если вы в не зоны личного доступа к объекту. (например: квартира съёмная или у вас 100% занятость и нужно решить проблему). Да, самое главное: "Я работаю волшебником".',
               'url_source' => 'https://uslugi.yandex.ru/profile/EgorPetrovichG-1635192',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['cherepovec'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $profiSourcesId,
                'last_name' => 'Тюлев',
                'first_name' => 'Кирилл',
                'middle_name' => 'Андреевич',
                'phone' => '+7 912 081-48-80',
                'rating' => 5,
                'start_working_hours' => '8:00',
                'end_working_hours' => '23:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 1,
                'education' => ' Череповецкий металлургический колледж, бухгалтер2007–2010 гг.',
                'description' => ' Ремонт ванных комнат и санузлов под ключ. Благоустройство жилых и коммерческих помещений. Работаю как один так и в составе профессиональных отделочников. Смета, договор, гарантия. Поможем с чистовыми материалами по оптовой цене.',
               'url_source' => 'https://profi.ru/profile/TyulevKA/',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['chita'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Неутов',
                'first_name' => 'Анатолий',
                'middle_name' => 'Петрович',
                'phone' => '+7 914 473-11-91',
                'rating' => 5,
                'start_working_hours' => '9:00',
                'end_working_hours' => '18:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 5,
                'education' => ' Средне-техническое',
                'description' => ' Натяжные потолки. Замер и консультация бесплатно. Обращайтесь всё сделаем на высшем уровне. Звоните всегда предложим выгодное решение . Цены вас приятно порадуют , всегда можно найти компромиссное решения на любой вопрос. Также делаем ремонт потолка ( устранение пореза, замена блоков управления, добавление светильников, замена и.т.д)',
               'url_source' => 'https://uslugi.yandex.ru/profile/AnatolijN-1061953',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['sahty'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Колесников',
                'first_name' => 'Алексей',
                'middle_name' => 'Петрович',
                'phone' => '+7 989 501-83-08',
                'rating' => 4.8,
                'start_working_hours' => '7:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 277,
                'education' => '  ',
                'description' => ' Я профессиональный строитель. Найду подход и верное решение к каждому клиенту. Звоните рад Вас слышать! Фирмы, прорабы и посредники просьба не беспокоить.',
               'url_source' => 'https://uslugi.yandex.ru/profile/AleksejK-1215264',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['shchelkovo'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Гулкин',
                'first_name' => 'Виктор',
                'middle_name' => 'Петрович',
                'phone' => '+7 965 310-26-60',
                'rating' => 5,
                'start_working_hours' => '10:00',
                'end_working_hours' => '20:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 44,
                'education' => 'Слесарь-сантехник,Электрик',
                'description' => ' Я занимаюсь отоплением и водоснабжением. Выезд платный. 1. Работу выполняю качественно, на совесть. 2. Быстрые сроки исполнения. 3. На свою работу даю гарантию12 месяцев.',
               'url_source' => 'https://uslugi.yandex.ru/profile/ViktorG-153915',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['scherbinka'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Вайнерт',
                'first_name' => 'Игорь',
                'middle_name' => 'Васильевич',
                'phone' => '+7 966 332-31-74',
                'rating' => 5,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 75,
                'education' => 'высшее техническое,средне специальное техническое ',
                'description' => 'Инженер в области сантехнических работ и электрики, высшее техническое образование, выполняю крупные заказы, а также небольшие заказы "мастер на час" имеется весь необходимый набор инструмента, передвигаюсь на личном авто.
Возможен срочный выезд на заказ.',
               'url_source' => 'https://uslugi.yandex.ru/profile/IgorV-257791',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['elektrostal'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Чукин',
                'first_name' => 'Алексей',
                'middle_name' => 'Васильевич',
                'phone' => '+7 966 332-31-74',
                'rating' => 4.9,
                'start_working_hours' => '8:00',
                'end_working_hours' => '20:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 209,
                'education' => ' ',
                'description' => 'Здравствуйте меня зовут Алексей занимаюсь мелкими работами по дому в наличии весь инструмент необходимый для мелкого ремонта. При необходимости я куплю и доставлю все необходимые комплектующие для ремонта. Вы лишь оплачиваете стоимость . В отличии от большинства фирм, я бесплатно предоставляю следующие услуги: выезд в любой район, консультирование по подбору материалов и видам ремонтных работ, высокое качество работ по разумной цене. Звоните буду рад помочь',
               'url_source' => 'https://uslugi.yandex.ru/profile/AleksejCh-940214',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['elista'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Наранов',
                'first_name' => 'Наран',
                'middle_name' => 'Борисович',
                'phone' => '+7 961 542-04-17',
                'rating' => 4.1,
                'start_working_hours' => '8:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 11,
                'education' => ' ',
                'description' => 'Опытный мастер по ремонту газовых колонок, запчасти в наличии, гарантия качества. Установка, замена и перенос колонки из одного помещения в другое. Сантехнические работы. Звоните!',
               'url_source' => 'https://uslugi.yandex.ru/profile/NaranBorisovichNaranov-1127128',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['engels'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Лагунов',
                'first_name' => 'Виталий',
                'middle_name' => 'Евгеньевич',
                'phone' => '+7 905 033-03-89',
                'rating' => 4.8,
                'start_working_hours' => '0:00',
                'end_working_hours' => '23:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 162,
                'education' => 'Саратовский Авиационный Техникум. Мастер бытовой радиоэлектронной аппаратуры ',
                'description' => 'Опыт с 2008 года. Выполню любые сантехнические работы. От мелкого ремонта до монтажа "Под ключ". Помогу сэкономить ваше время, деньги и нервы!
При выполнении работы подхожу к каждому случаю индивидуально: учитываю ваши пожелания и материальные возможности. Использую новые технологии, в наличие все необходимые инструменты. Помогу закупить и привезти материалы, что сокращает время проведения работ.
Мои преимущества:
1. Опытный мастер сантехник. Знаю о сантехнике очень много: работаю с оборудованием и материалами последнего поколения, владею новыми технологиями, обладаю обширными знаниями и квалификацией.
2. Качество. По окончании работ провожу испытания и предоставляю гарантию на услуги.
3. Широкий спектр услуг. Выполняю все работы, связанные с сантехникой: от мелкого ремонта до монтажа под ключ.
4. Принимаю заказы круглосуточно. Вам не придется ждать утра в аварийной ситуации',
               'url_source' => 'https://uslugi.yandex.ru/profile/VitalijL-477688',
                'on_front' => false, 'actual' => false
            ],
			[
                'city_id' => $citiesData['yuzhno-sahalinsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Соломатов',
                'first_name' => 'Игорь',
                'middle_name' => 'Валерьевич',
                'phone' => '+7 962 102-333-05',
                'rating' => 5,
                'start_working_hours' => '9:00',
                'end_working_hours' => '18:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 10,
                'education' => ' ',
                'description' => 'Сантехнические работы и монтаж отопления',
               'url_source' => 'https://uslugi.yandex.ru/profile/VitalijL-477688',
                'on_front' => false, 'actual' => false
            ],
					[
                'city_id' => $citiesData['yakutsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Легостаев',
                'first_name' => 'Никита',
                'middle_name' => 'Валерьевич',
                'phone' => '+7 914-280-29-26',
                'rating' => 5,
                'start_working_hours' => '9:00',
                'end_working_hours' => '18:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 6,
                'education' => 'Высшее ',
                'description' => 'Сантехнические работы и монтаж отопления',
               'url_source' => 'https://uslugi.yandex.ru/profile/NikitaLegostaev-1295627',
                'on_front' => false, 'actual' => false
            ],
							[
                'city_id' => $citiesData['yakutsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Гурин',
                'first_name' => 'Алексей',
                'middle_name' => 'Валерьевич',
                'phone' => '+7 910 960-32-63',
                'rating' => 5,
                'start_working_hours' => '8:00',
                'end_working_hours' => '20:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 132,
                'education' => ' Высшее',
                'description' => 'Работаю качественно как для себя.Выезжаю во все районы. После работ, всегда убераю мусор.
Я выезжаю сразу после вашего звонка.Приезжаю к вам на дом, при себе есть весь профессиональный инструмент и часть материалов.
Если возникает гарантийный случай, я его устраняю абсолютно бесплатно.
Даю собственную скидку на материалы, для вас покупка новой сантехники будет значительно дешевле!
После выполнения работ, вы будите приятно удивлены качеством выполнения. С радостью приеду к вам или вашим знакомым по новому заданию!
Дорожу своими постоянными клиентами По звонку я смогу решить большую часть проблем.
Звоните, Буду рад сотрудничеству.',
               'url_source' => 'https://uslugi.yandex.ru/profile/NikitaLegostaev-1295627',
                'on_front' => false, 'actual' => false
            ]
        ]);
    }
}
