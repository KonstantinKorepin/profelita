<?php

namespace Database\Seeders;

use App\Models\Master;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterElectricianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // специализация
        $specializationId = DB::table('specializations')
            ->select('id')
            ->where('code', '=', 'electrician')
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
                'last_name' => 'Силизнев',
                'first_name' => 'Алексей',
                'middle_name' => 'Викторович',
                'phone' => '+7 929 312-78-88',
                'rating' => 4.9,
                'start_working_hours' => '8:00',
                'end_working_hours' => '19:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 84,
                'education' => 'Высшее',
                'description' => 'Я частный мастер универсал. Выполняю практически любую мужскую работу по дому,
				имеется профессиональный аккумуляторный инструмент, доставка материалов,
				имеются скидки на материалы в магазинах. Есть бригада. Работаем аккуратно, большой опыт.
				Полное сопровождение объекта Гарантия на все выполненные работы.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AleksejViktorovichS-482779',
                'on_front' => true
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
                'on_front' => true
            ],
            [
                'city_id' => $citiesData['angarsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Скитальцев',
                'first_name' => 'Кирилл',
                'middle_name' => 'Константинович',
                'phone' => '+7 964 281-50-74',
                'rating' => 4.6,
                'start_working_hours' => '9:00',
                'end_working_hours' => '23:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2016,
                'count_realized_orders' => 32,
                'education' => 'ИрГТУ. Инженер электрик',
                'description' => 'Добрый день, меня зовут Кирилл. Я квалифицированный специалист в области электрики и электромонтажа. Так же оказываю услуги мастера на час, сантехнические работы, сборки мебели и демонтажные работы.',
                'url_source' => 'https://uslugi.yandex.ru/profile/KirillS-123668',
                'on_front' => true
            ],
            [
                'city_id' => $citiesData['arzamas'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Кутоев',
                'first_name' => 'Алексей',
                'middle_name' => 'Валерьевич',
                'phone' => '+7 903 055-15-79',
                'rating' => 4.8,
                'start_working_hours' => '8:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 38,
                'education' => 'Среднее',
                'description' => 'Здраствуйте я частный мастер.Выполняю отделочно строительные работы, сантехнические.Работу выполняю в срок .Цены адекватные.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AleksejK-1283581',
                'on_front' => true
            ],
            [
                'city_id' => $citiesData['armavir'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Тарасенко',
                'first_name' => 'Дмитрий',
                'middle_name' => 'Алексеевич',
                'phone' => '+7 918 071-07-43',
                'rating' => 4.7,
                'start_working_hours' => '00:00',
                'end_working_hours' => '00:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 76,
                'education' => 'Машиностроительный техникум, техник-электромеханик',
                'description' => '...',
                'url_source' => 'https://uslugi.yandex.ru/profile/DmitrijAlekseevichTarasenko-445901',
                'on_front' => true
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
                'on_front' => true
            ],
            [
                'city_id' => $citiesData['arkhangelsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Николаев',
                'first_name' => 'Сергей',
                'middle_name' => '',
                'phone' => '+7 905 293‑69‑74',
                'rating' => 4.6,
                'start_working_hours' => '8:00',
                'end_working_hours' => '23:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2008,
                'count_realized_orders' => 95,
                'education' => 'Сантехник. САФУ',
                'description' => 'Сантехник в Архангельске не дорого без посредников.
                                  Стаж в сфере сантехничаских услуг 15 лет. Выполняю любые работы по сантехнике, любой сложности.
                                  Работаю сам лично! Без посредников и диспетчеров! Честная гарантия!
                                  Вызов сантехника. Монтаж отопления в Вашем доме. Ремонт неправильных систем отопления с гарантией!
                                  Устранение чужих ошибок неправильных мотажей отопления, водопровода, канализации, сделанных
                                  не профессионалами.',
                'url_source' => 'https://uslugi.yandex.ru/profile/SergejN-639444',
                'on_front' => false
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
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['achinsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Эдуард',
                'first_name' => 'Пугачев',
                'middle_name' => 'Сергеевич',
                'phone' => '+7 913 032-50-95',
                'rating' => 4.5,
                'start_working_hours' => '7:00',
                'end_working_hours' => '23:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2017,
                'count_realized_orders' => 10,
                'education' => '',
                'description' => 'Добрый день, если Вы на моей странице значит вас заинтересовали мои услуги,
				я приложу все усилия чтобы помочь решить ваш вопрос.
				Стоимость услуги обсуждаются индивидуально, не переживайте о цене договоримся.',
                'url_source' => 'https://uslugi.yandex.ru/profile/EhduardPugachev-450766',
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['balakovo'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Алмаз',
                'first_name' => 'Борисов',
                'middle_name' => 'Сергеевич',
                'phone' => '+7 917 021-43-77',
                'rating' => 4.5,
                'start_working_hours' => '6:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 10,
                'education' => 'Курсы по монтажу инженерной сантехники',
                'description' => 'Выполняем все сантехнические работы. Замена ТРУБ (водоснабжение, канализация) стояки, разводки
ПРОФЕССИОНАЛЬНЫЙ МОНТАЖ ОТОПЛЕНИЯ в коттеджах, новостройках и стандартных квартирах (котлы, радиаторы, коллектора, теплые полы)
Бурение скважин на воду. Установка и замена СЧЁТЧИКОВ (помогаем в опломбировке).Установка ВОДОНАГРЕВАТЕЛЕЙ, газовых колонок, СТИРАЛЬНЫХ машин, посудомоечных машин
Замена ПОЛОТЕНЦЕСУШИТЕЛЯ. Обвязка скважин.Установка Сантех ГАРНИТУРЫ (унитазов, ванн, смесителей, раковин и прочей сантехники)
Земляные работы, монтаж наружного водопровода и канализации, установка колец, септиков . Прочистка засоров. Вообщем все что связано с трубами, водой и теплом. Находим выход из нестандартных ситуаций. С удовольствием рассматриваем новые идеи и предложения!!!
Работаем по городу и области. При комплексных работах скидка. Сантехник. Сантехник номер 1. САНТЕХНИК 24. Сантехнические. Отопление под ключ.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AlmazB-597238',
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['balashiha'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Смекалкин',
                'first_name' => 'Роман',
                'middle_name' => '',
                'phone' => '+7 965 316-98-20',
                'rating' => 4.9,
                'start_working_hours' => '7:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2008,
                'count_realized_orders' => 91,
                'education' => 'Высшее юридическое.',
                'description' => 'Работаю в сфере услуг для населения с 2008 года. Опыт работы более чем достаточный для
                                  профессионального подхода к работе. Имеется весь ручной и электрический инструмент.
                                  Много навыков работы в области сантехнических, плотницких и электромонтажных работ
                                  бытового уровня. Коммуникабельность, ответственность, пунктуальность и работа
                                  на результат - мои основные черты.',
                'url_source' => 'https://uslugi.yandex.ru/profile/RomanSmekalkin-985297',
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['barnaul'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Лугунов',
                'first_name' => 'Иван',
                'middle_name' => 'Сергеевич',
                'phone' => '+7 960 947-75-23',
                'rating' => 5,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 36,
                'education' => 'БГППК , АлтГТУим Ползунова.',
                'description' => 'Работа на результат, моя цель довольный клиент.
Есть большой набор профессионального инструмента , от бензопил,до сварочных аппаратов,есть весь электроинструмент.
 Выполняю большой спектр работ самостоятельно. Большой опыт. Занимаюсь безвоздушной покраской любых
 поверхностей . Вежливость ,открытость ,прозрачность и честность всех выполняемых работ ,закупок и т.д.
 Ответственный. Уверенный пользователь ПК Автокад.Exel.Word.',
                'url_source' => 'https://uslugi.yandex.ru/profile/IvanSergeevichL-994233',
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['berdsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Панфилов',
                'first_name' => 'Денис',
                'middle_name' => 'Андреевич',
                'phone' => '+7 913 003-46-53',
                'rating' => 4.1,
                'start_working_hours' => '6:00',
                'end_working_hours' => '3:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 17,
                'education' => '....',
                'description' => 'Специалист сантехник предлагаю услуги сантехника. Все виды сантехнических работ:
				вызов сантехника на дом для устранения засоров и протечек, прочистка канализации и устранение засоров труб,
				гидродинамическая промывка канализации. Качественно и недорого выполняю все сантехнические услуги.
				Профессиональный инструмент. Большой опыт работы в данном направление.
Целеустремлен. Пунктуален. Нацелен на результат. Занимаюсь прочисткой труб канализации и устранением засоров любой
сложности, прочистка, разморозка труб канализации в Новосибирске и НСО. Диаметр труб от 32мм до 400 мм. Я работаю
круглосуточно. Форма оплаты: наличный/безналичный расчет, оплата картой.
Выезд в течении 20 минут после подтверждения заказа. Акты выполненных работ.
Заключение договоров аварийного и профилактического обслуживания.
Бесплатный выезд. Индивидуальный подход к каждому клиенту.',
                'url_source' => 'https://uslugi.yandex.ru/profile/DenisP-473525',
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['bryansk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Борвиков',
                'first_name' => 'Алексей',
                'middle_name' => '',
                'phone' => '+7 906 500-46-25',
                'rating' => 5.0,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2008,
                'count_realized_orders' => 15,
                'education' => '',
                'description' => 'Выполняю монтаж отопления, водопровода и сантехнического оборудования.
                                  Опыт работы более 15 лет. Осуществляю помощь в выборе и доставке материалов.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AleksejBorvikov-847339',
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['velikiy-novgorod'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Гончаров',
                'first_name' => 'Владимир',
                'middle_name' => 'Николаевич',
                'phone' => '+7 911 041-31-73',
                'rating' => 4.8,
                'start_working_hours' => '8:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2002,
                'count_realized_orders' => 31,
                'education' => '',
                'description' => 'Профессионал по дверям и окнам, столярные и плотницкие работы, сантехника и электрика.
                                  Свой авто и инструмент.',
                'url_source' => 'https://uslugi.yandex.ru/profile/VladimirNikolaevichG-743160',
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['vidnoe'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Корнеев',
                'first_name' => 'Владимир',
                'middle_name' => 'Иванович',
                'phone' => '+7 966 082-70-41',
                'rating' => 5.0,
                'start_working_hours' => '9:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2014,
                'count_realized_orders' => 73,
                'education' => 'Среднее специальное',
                'description' => 'Все вопросы можно уточнить по телефону или в вотсапе. Инструмент имеется практически
                                  любой и ручной и электрический. Гарантия на
                                  выполненные работы даётся.',
                'url_source' => 'https://uslugi.yandex.ru/profile/VladimirK-965068',
                'on_front' => false
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
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['vladimir'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Баринов',
                'first_name' => 'Владимир',
                'middle_name' => 'Алексеевич',
                'phone' => '+7 910 090-74-55',
                'rating' => 5.0,
                'start_working_hours' => '7:00',
                'end_working_hours' => '0:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2015,
                'count_realized_orders' => 10,
                'education' => '',
                'description' => 'Предлагаю весь спектр крупного и мелкого ремонта, а так же мастер на час.
                                  Используется профессиональный и точный инструмент.Выезжаю в срочном порядке
                                  при аварийной ситуации.Вежлив, пунктуальный,без вредных привычек,ответственный.
                                  Договор, гарантия.',
                'url_source' => 'https://uslugi.yandex.ru/profile/VladimirBarinov-811341',
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['volgograd'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Коновалов',
                'first_name' => 'Роман',
                'middle_name' => 'Иванович',
                'phone' => '+7 961 657-46-01',
                'rating' => 5.0,
                'start_working_hours' => '8:00',
                'end_working_hours' => '20:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 18,
                'education' => 'Волгоградский курсовой комбинат',
                'description' => 'Ремонт сантехники, отопления, стояков ХВС и ГВС. Меняю старые трубы на полипропилен
                                  из качественных материалов. Выезд на место для оценки работ платный. Цены приемлемые.',
                'url_source' => 'https://uslugi.yandex.ru/profile/RomanKonovalov-617298',
                'on_front' => false
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
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['volzhskiy'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Григорьев',
                'first_name' => 'Руслан',
                'middle_name' => 'Александрович',
                'phone' => '+7 969 652-56-93',
                'rating' => 5,
                'start_working_hours' => '8:00',
                'end_working_hours' => '18:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 25,
                'education' => 'Слесарь-сантехник',
                'description' => 'Я — мастер по ремонту. Опыт+ качество. Выбор+доставка материала. Оплата нал, безнал. Договор. Вызов+ консультация- бесплатно.',
                'url_source' => 'https://uslugi.yandex.ru/profile/RuslanAleksandrovichGrigorev-1264103',
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['vologda'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Зажигин',
                'first_name' => 'Александр',
                'middle_name' => 'Владимирович',
                'phone' => '+7 911 047-68-02',
                'rating' => 5.0,
                'start_working_hours' => '8:00',
                'end_working_hours' => '18:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2005,
                'count_realized_orders' => 15,
                'education' => 'Среднее специальное.',
                'description' => 'Верующий, непьющий, аккуратный, позитивный.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AleksandrVladimirovichZazhigin-580202',
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['voronezh'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Петров',
                'first_name' => 'Игорь',
                'middle_name' => 'Александрович',
                'phone' => '+7 980 543-26-74',
                'rating' => 4.6,
                'start_working_hours' => '7:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2014,
                'count_realized_orders' => 89,
                'education' => 'Среднее специальное.',
                'description' => 'Здравствуйте! Я частный мастер по сантехническим работам,работаю очень давно,
                                  акуратный вежливый ответственный понктуальный,всегда за свою работу в ответе,
                                  имеется весь необходимый инструмент в наличии,работу свою уважаю.',
                'url_source' => 'https://uslugi.yandex.ru/profile/IgorAleksandrovichP-234992',
                'on_front' => false
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
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['dzerzhinsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Холодов',
                'first_name' => 'Вадим',
                'middle_name' => 'Петрович',
                'phone' => '+7 960 176-30-01',
                'rating' => 4.9,
                'start_working_hours' => '9:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2003,
                'count_realized_orders' => 39,
                'education' => 'Средне-техническое.',
                'description' => 'Здравствуйте. Образование средне-техническое. Опыт работы в обслуживающих компаниях
                                  большой. Знание всех коммуникаций многоквартирных домов. Произвожу замены и установку
                                  отопления, водопровода, канализации, смесителей, унитазов, полотенцесушителей,
                                  батарей.',
                'url_source' => 'https://uslugi.yandex.ru/profile/VadimKholodov-298305',
                'on_front' => false
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
                'warranty_period' => 1,
                'professional_activity_year' => 2008,
                'count_realized_orders' => 10,
                'education' => 'Высшее',
                'description' => 'Ищете услуги профессиональных и грамотных сантехников?
Тогда Вы обратились по адресу!Экономьте свое время, деньги и затраты на переделывание!
Имеем 15 лет успешной работы в сфере любых сантехнических работ
Работаем на совесть,как для себя!Предоставляем ГАРАНТИЮ до 5 лет.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AleksejChirka-259744',
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['dolgoprudny'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Гук',
                'first_name' => 'Александр',
                'middle_name' => 'Сергеевич',
                'phone' => '+7 966 076-54-71',
                'rating' => 4.9,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2012,
                'count_realized_orders' => 50,
                'education' => 'Среднее специальное. Коледж Архитектуры Дизайна и Инжиниринга номер 26.г Москва.',
                'description' => 'Сантехник со стажем. На личном автомобиле. В связи с пробками и форс мажором
                                  у предыдущего клиента, могу опоздать на следующий заказ. Работаю в Москве и области.
                                  Гражданин РФ с детства. Инструмент весь имеется. Шитый полиэтилен любого производителя.
                                  Полипропилен. Медь. Металлопласт. ПНД. Ацинковка и метал. Установка. Всей финишной
                                  сантехники.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AleksandrSergeevichGuk-144413',
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['domodedovo'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Макаров',
                'first_name' => 'Андрей',
                'middle_name' => '',
                'phone' => '+7 925 517‑42‑16',
                'rating' => 4.8,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2002,
                'count_realized_orders' => 71,
                'education' => 'Высшее МИИТ специализация управление.',
                'description' => 'Я частный мастер, качественно и быстро помогу ПОЧИНИТЬ или УСТАНОВИТЬ сантехнику,
                                  водопровод, систему отопления. Помогу снизить на 30...60% энергозатраты на отопление,
                                  канализация или вентиляция , СОБЕРУ МЕБЕЛЬ , двери, ПОВЕШУ КАРНИЗ ,
                                  проведу ЭЛЕКТРОПРОВОДКУ ,заменю выключатели, розетки и люстры, выполню быстро и
                                  ОЧЕНЬ КАЧЕСТВЕННО профессиональным инструментом ШТРОБЛЕНИЕ в бетоне кирпиче и т.д.,
                                  сварочные работы, бурю мотобуром отверстия в земле под забор или столбчатый фундамент
                                  до 2 метров и многое-многое другое. 25 летний опыт работ УСЛУГИ ЧЕСТНОГО И ОПЫТНОГО
                                  ПРОРАБА (технический надзор за рабочими) при строительстве коттеджей , весь инструмент
                                  и авто в наличии, цена разумная.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AndrejM-522989',
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['evpatoriya'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Сулик',
                'first_name' => 'Антон',
                'middle_name' => 'Иванович',
                'phone' => '+7 918 021-33-70',
                'rating' => 4.8,
                'start_working_hours' => '8:00',
                'end_working_hours' => '20:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2015,
                'count_realized_orders' => 30,
                'education' => 'СГТУ, инженер, очное',
                'description' => 'Качественное выполнение услуг, пунктуальность.
				В работе используется современное немецкое электрооборудование.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AndrejM-522989',
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['zhukovsky'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Самогоров',
                'first_name' => 'Геннадий',
                'middle_name' => '',
                'phone' => '+7 917 505‑68‑42',
                'rating' => 4.9,
                'start_working_hours' => '8:00',
                'end_working_hours' => '20:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2000,
                'count_realized_orders' => 61,
                'education' => 'МВТУ им. Баумана',
                'description' => 'Занимаюсь монтажом инженерных систем с 2000 года.
                                  Выполняю весь комплекс инженерных услуг от проекта до сдачи заказчику. Подбор
                                  необходимого оборудования согласно бюджету и пожеланиям заказчика. Разные схемы
                                  монтажа. Рекомендую вам лучшую исходя из условий. Сам монтирую. Несу гарантию за
                                  выполненную работу. Ценю ваше доверие и дорожу своей репутацией.',
                'url_source' => 'https://uslugi.yandex.ru/profile/GennadijS-940905',
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['zlatoust'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Десятков',
                'first_name' => 'Александр',
                'middle_name' => 'Иванович',
                'phone' => '+7 909 070-72-46',
                'rating' => 4.3,
                'start_working_hours' => '8:00',
                'end_working_hours' => '20:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2017,
                'count_realized_orders' => 14,
                'education' => 'Среднеспециальное,техническое',
                'description' => 'Работаю уже более 6-ти лет.
— Оказываю услуги в сфере электромонтажных работ.
—Сантехнических работ.
—Натяжных потолков.
—Мастера на час.
—Установка и Ремонт электро
бытовой технике.
Стараюсь выполнять,качественно добросовестно аккуратно ,оставляю после себя порядок,даю Гарантии за свою работу.
Закупаем только проверенный материал,отчитываюсь по чекам.
Если надо есть бригада можем выезжать и проживать на обекте с ночевкой.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AleksandrDesyatkov-460169',
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['ivanovo'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Болотов',
                'first_name' => 'Николай',
                'middle_name' => '',
                'phone' => '+7 910 691‑21‑10',
                'rating' => 4.5,
                'start_working_hours' => '8:00',
                'end_working_hours' => '20:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2001,
                'count_realized_orders' => 19,
                'education' => 'Среднее.',
                'description' => 'Мастер универсал . Стаж20лет. Цена договорная. Выполню любые виды работ по ремонту
                                  квартир и офисов.Помощь в расчете и закупке материала.К работе отношусь отстветсвенно.',
                'url_source' => 'https://uslugi.yandex.ru/profile/NikolajB-626476',
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['izhevsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Благодатских',
                'first_name' => 'Алексей',
                'middle_name' => '',
                'phone' => '+7 912 742‑20‑71',
                'rating' => 4.8,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2005,
                'count_realized_orders' => 50,
                'education' => '',
                'description' => 'Все больше людей начинает пользоваться услугами частного сантехника. Потому что он
                                  оказывает профессиональные услуги, выполняя свою работу качественно и на совесть.
                                  Дорожит своей репутацией. Частного сантехника можно вызвать в любое время. Как только
                                  вы заметите неполадки в функционировании сантехнических приборов, сразу же обратитесь
                                  ко мне. Помогу.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AleksejBlagodatskikh-667994',
                'on_front' => false
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
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['joshkar-ola'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Булатов',
                'first_name' => 'Константин',
                'middle_name' => 'Геннадьевич',
                'phone' => '+7 905 379‑09‑10',
                'rating' => 5.0,
                'start_working_hours' => '8:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2015,
                'count_realized_orders' => 15,
                'education' => 'Марийский Государственный Технический Университет, инженер, стандартизация и сертификация, очно.',
                'description' => 'Меня зовут Константин. Занимаюсь сантехническими работами. Имеется все необходимое оборудование.
                                  Эта работа для меня, больше, как хобби. Дома также люблю все ремонтировать своими руками.',
                'url_source' => 'https://uslugi.yandex.ru/profile/KonstantinGennadevichBulatov-1767071',
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['kazan'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Юхневич',
                'first_name' => 'Евгений',
                'middle_name' => '',
                'phone' => '+7 987 262-68-14',
                'rating' => 4.9,
                'start_working_hours' => '8:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2008,
                'count_realized_orders' => 179,
                'education' => 'Среднее специальное.',
                'description' => 'Меня зовут Евгений, я оказываю услуги сантехника, услуги мастер на час. Стаж работы в этой сфере более1 5лет.',
                'url_source' => 'https://uslugi.yandex.ru/profile/EvgenijYukhnevich-623153',
                'on_front' => false
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
                'education' => 'Инженер-строитель, КГТУ, 1998–2002 гг',
                'description' => 'Здравствуйте, предоставляю сантехнические услуги, услуги мастер на час и др.
                                  Имею высшее инженерно-техническое и строительное образование. Большой опыт работы.
                                  Пожалуйста звоните, консультация - бесплатно. Есть ватцап и вайбер, которые указаны
                                  в профиле. Всегда стараюсь выполнять работу аккуратно и качественно, также предоставлю
                                  гарантию на выполненные услуги.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AleksejMikhajlovichS-1025044',
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['kaluga'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Аглюлин',
                'first_name' => 'Руслан',
                'middle_name' => 'Рафаэльевич',
                'phone' => '+7 962 096‑35‑30',
                'rating' => 4.8,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2010,
                'count_realized_orders' => 60,
                'education' => 'Горно-металургический колледж, 2005–2008 гг.',
                'description' => 'Профессиональный сантехник, имеющий более чем 13-летний опыт работы. 3 года являлся сотрудником
                                  частной фирмы, и вот уже как 10 лет занимаюсь самостоятельной деятельностью.
                                  Прочистка канализации, промывка труб, устранение засоров механическим способом и гидродинамическим
                                  способом! Очистка канализационных труб гидродинамическим способом. Промывка труб в квартире после
                                  ремонта от отложений шпаклевки,штукатурки, клеёв и т.д. Звоните буду рад помочь вам.',
                'url_source' => 'https://uslugi.yandex.ru/profile/RuslanA-249848',
                'on_front' => false
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
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['kamyshin'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Плотников',
                'first_name' => 'Евгений',
                'middle_name' => 'Борисович',
                'phone' => '+7 987 641-19-43',
                'rating' => 4.8,
                'start_working_hours' => '07:00',
                'end_working_hours' => '0:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2016,
                'count_realized_orders' => 19,
                'education' => 'Высшее (ВолгГТУ)',
                'description' => 'Сантехник, сварщик
- Любые сантехнические работы
- Сварочные работы
- Электрика - поменять проводку, заменить розетку, заменить сгоревший автомат, подключить светильник и т.д.
- Установка и подключение бытовой техники - вытяжки, мойки, стир. машины и др.
Звоните, буду рад помочь!',
                'url_source' => 'https://uslugi.yandex.ru/profile/EvgenijPlotnikov-533377',
                'on_front' => false
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
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['kemerovo'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Васильев',
                'first_name' => 'Евгенинй',
                'middle_name' => 'Викторович',
                'phone' => '+7 903 993-10-29',
                'rating' => 5,
                'start_working_hours' => '08:00',
                'end_working_hours' => '20:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 4,
                'education' => 'Кемеровский Технический колледж. Техник-электрик',
                'description' => 'С опытом и стажем, работа по чертежам, есть все
				необходимое оборудование для сварочных работ, есть цех для выполнения
				разных типов сварочных работ. Нахожусь в Кемерово и проживаю, есть выезд
				в не отдалённые города.',
                'url_source' => 'https://uslugi.yandex.ru/profile/EvgenijV-2272366',
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['kerch'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Котов',
                'first_name' => 'Александр',
                'middle_name' => 'Викторович',
                'phone' => '+7 918 067-07-45',
                'rating' => 5,
                'start_working_hours' => '08:00',
                'end_working_hours' => '19:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 13,
                'education' => ' ',
                'description' => 'Настойчив к победе. Выполняю работы качественно.
				Использую современные технологии для коммуникации и качественный инструмент.
				Не разделяю богатых и бедных. Вежливое рабочее отношение ко всем одинаковое.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AleksandrK-372938',
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['kirov'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Орлов',
                'first_name' => 'Константин',
                'middle_name' => 'Владимирович',
                'phone' => '+7 909 132-00-25',
                'rating' => 4.5,
                'start_working_hours' => '7:00',
                'end_working_hours' => '23:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2016,
                'count_realized_orders' => 105,
                'education' => '',
                'description' => 'Мастер на все руки! работаю с напарником, своим инструментом, имеется автомобиль.
                                  Без вредных привычек! Аккуратный, опрятный. Любой вид помощи в бытовом ремонте.
                                  Звоните, с удовольствием помогу решить Вашу проблему. 24/7',
                'url_source' => 'https://uslugi.yandex.ru/profile/KonstantinVladimirovichO-1302721',
                'on_front' => false
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
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['kovrov'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Акулов',
                'first_name' => 'Алексей',
                'middle_name' => 'Викторович',
                'phone' => '+7 906-559-44-71',
                'rating' => 4.6,
                'start_working_hours' => '8:00',
                'end_working_hours' => '20:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 12,
                'education' => 'Строительное',
                'description' => 'Здравствуйте! Я, Алексей! Занимаюсь строительством, ремонтом и
				отделкой жилых и нежилых помещений. Индивидуальный доброжелательный подход к
				каждому заказчику. Буду рад сотрудничать с вами. Звоните!',
                'url_source' => 'https://uslugi.yandex.ru/profile/AleksejA-1209350',
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['kopeysk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Скобелькин',
                'first_name' => 'Максим',
                'middle_name' => 'Вадимович',
                'phone' => '+7 909 085-26-09',
                'rating' => 4.4,
                'start_working_hours' => '9:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 61,
                'education' => '',
                'description' => 'Подходим творчески к любой работе, сложности не пугают.
Помощь в прэктировании, подбор и закуп материалов. Обслуживаем квартиры частный сектор: дома,
 котеджи, дачи, а также работаем с предприятиями. Возможен безналичный расчёт. По всём
 вопросом звоните или пишите в чат',
                'url_source' => 'https://uslugi.yandex.ru/profile/MaksimSkobelkin-1455644',
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['korolev'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Чаадаев',
                'first_name' => 'Алексей',
                'middle_name' => '',
                'phone' => '+7 966 043-18-38',
                'rating' => 4.9,
                'start_working_hours' => '8:00',
                'end_working_hours' => '20:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2011,
                'count_realized_orders' => 200,
                'education' => '',
                'description' => 'Здравствуйте меня зовут Алексей занимаюсь мелкими работами по дому в наличии весь
                                  инструмент необходимый для мелкого ремонта. При необходимости я куплю и доставлю
                                  все необходимые комплектующие для ремонта. Вы лишь оплачиваете стоимость. В отличии
                                  от большинства фирм, я бесплатно предоставляю следующие услуги: выезд в любой район,
                                  консультирование по подбору материалов и видам ремонтных работ, высокое качество
                                  работ по разумной цене. Звоните буду рад помочь.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AleksejCh-940214',
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['kostroma'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Котеров',
                'first_name' => 'Дмитрий',
                'middle_name' => '',
                'phone' => '+7 910 190-21-35',
                'rating' => 4.9,
                'start_working_hours' => '6:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 1,
                'professional_activity_year' => 1,
                'count_realized_orders' => 57,
                'education' => 'Средне-специальное Технология строительства "НаМР"',
                'description' => 'Мастер на все руки, ответственный, пунктуальный, выезжаю оперативно к клиенту,
                                  помощь в закупке и доставке материала Сантехника, электрика, отделка квартир.',
                'url_source' => 'https://uslugi.yandex.ru/profile/DmitrijK-1739799',
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['krasnogorsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Корнеев',
                'first_name' => 'Алексей',
                'middle_name' => 'Иванович',
                'phone' => '+7 965 305-95-72',
                'rating' => 4.8,
                'start_working_hours' => '9:00',
                'end_working_hours' => '23:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2008,
                'count_realized_orders' => 72,
                'education' => '',
                'description' => 'Сантехник с большим опытом работы. Буду рад Вам помочь. Выполняю весь спектр
                                  сантехнических работ. Готов оказать помощь в подборе и приобретении недостоющих
                                  материалов. Быстро и качественно. Индивидуальный подход, работа на качественный
                                  результат.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AleksejK-1208701',
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['ksdr'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Царьков',
                'first_name' => 'Илья',
                'middle_name' => 'Викторович',
                'phone' => '+7 918 441-31-39',
                'rating' => 4.8,
                'start_working_hours' => '7:00',
                'end_working_hours' => '23:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2017,
                'count_realized_orders' => 21,
                'education' => 'Токарь, Столяр-строительный, Электрогазосварщик',
                'description' => 'Здравствуйте, уважаемые жители города Краснодар! Предлагаю вам свои услуги:
Изготовление, монтаж/демонтаж мебели; Сантехнические работы; Электромонтажные работы - монтаж БТ, ремонт розеток, монтаж осветительных приборов и др.
Звоните! Пенсионерам, участникам, ветеранам ВД, СВО, скидки. С уважением, Илья!',
                'url_source' => 'https://uslugi.yandex.ru/profile/IlyaCarkov-1069216',
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['krsn'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Румынин',
                'first_name' => 'Дмитрий',
                'middle_name' => 'Егорович',
                'phone' => '+7 913 560-86-61',
                'rating' => 4.9,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 62,
                'education' => 'МаНХиГС, инженер-энергетик',
                'description' => 'Качественно выполняю работы которые указаны в профиле.
				Использую проффесиональный инструмент. Применяются самые последние технологии.',
                'url_source' => 'https://uslugi.yandex.ru/profile/DmitrijR-1314355',
                'on_front' => false
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
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['kursk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Кишов',
                'first_name' => 'Александр',
                'middle_name' => 'Антонович',
                'phone' => '+7 910 270-66-14',
                'rating' => 4.9,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 104,
                'education' => 'Среднее-специальное',
                'description' => 'Меня зовут Александр,
Живу в Курске. Занимаюсь оказанием услуг сантехника, электрика, мастер на час.
Если вам нужна скорая помощь в решении вашей проблемы, Звоните по телефону
указанному в профиле. Сообщения не просматриваются мгновенно.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AleksandrK-206567',
                'on_front' => false
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
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['lipetsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Артамонов',
                'first_name' => 'Вячеслав',
                'middle_name' => 'Антонович',
                'phone' => '+7 919 161-43-23',
                'rating' => 5,
                'start_working_hours' => '6:00',
                'end_working_hours' => '23:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 8,
                'education' => 'Мастер',
                'description' => 'Русский ответственный, большой опыт.',
                'url_source' => 'https://uslugi.yandex.ru/profile/VyacheslavArtamonov-126665',
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['lyubertsy'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Осиков',
                'first_name' => 'Сергей',
                'middle_name' => 'Игоревич',
                'phone' => '+7 962 952-20-39',
                'rating' => 5,
                'start_working_hours' => '8:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 11,
                'education' => ' ',
                'description' => 'Доброго времени суток! Я со своей бригадой оказываю услуги
				по созданию систем водоснабжения и канализации, являюсь опытным специалистом
				в данном направлении, деятельность свою веду самостоятельно.
Звоните, буду рад сотрудничеству.',
                'url_source' => 'https://uslugi.yandex.ru/profile/SergejO-1231261',
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['magnitogorsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Иванов',
                'first_name' => 'Дмитрий',
                'middle_name' => 'Денисович',
                'phone' => '+7 909 085-01-15',
                'rating' => 4.6,
                'start_working_hours' => '7:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2014,
                'count_realized_orders' => 46,
                'education' => ' Высшее экономическое. Анализ и аудит хозяйственной деятельности',
                'description' => 'Дмитрий. Занимаюсь Сантехническими работами профессионально.
				Решаю вечные проблемы с сантехникой, имею большой опыт именно в бытовых и
				квартирных проблемах с сантехникой. Устранение засора в квартирах.Замена
				старого железа на полимерные трубы, в том числе опыт работы с переходом на
				пластик по канализации в многоквартирных домах.
Звоните, посоветуем и подборем подходящий для Вас вариант.',
                'url_source' => 'https://uslugi.yandex.ru/profile/DmitrijIvanov-410467',
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['miass'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Иванов',
                'first_name' => 'Валерий',
                'middle_name' => 'Геннадьевич',
                'phone' => '+7 912 310-51-42',
                'rating' => 5,
                'start_working_hours' => '9:00',
                'end_working_hours' => '23:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 9,
                'education' => ' Мгрт, Юргу',
                'description' => 'Сантехник, электрик. Засоры. Поверку счетчиков не делаю.
				Ответственный работник. Работы выполняются с гарантией. Профессионально
				занимаюсь ремонтом сантехники, электрики более 20 лет. Ремонт любой сложности.
				Обслуживание по сантехнике и электрике Налоговой Миасс, Овд города миасса
				(все участки, отделы, опорные пункты ...)',
                'url_source' => 'https://uslugi.yandex.ru/profile/ValerijGennadevichI-541509',
                'on_front' => false
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
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['msk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Павлов',
                'first_name' => 'Евгений',
                'middle_name' => 'Георгевич',
                'phone' => '+7 965 381-88-75',
                'rating' => 5,
                'start_working_hours' => '7:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2019,
                'count_realized_orders' => 245,
                'education' => ' Профессиональный лицей 7(ПЛ-7). По образованию являюсь
				мотористом,рулевым 1 класса судов,3 штурманом,3 помощником механика
				3 группы свдов',
                'description' => 'Гражданин РФ. Среднее техническое образование,работаю
				сантехником 5 лет. Произвожу как инженерную работу,так и установку сантехники.
				Даю гарантию на свою работу,с клиентом поддерживаю общение .',
                'url_source' => 'https://uslugi.yandex.ru/profile/EvgenijPavlov-505556',
                'on_front' => false
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
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['murom'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Лютин',
                'first_name' => 'Виктор',
                'middle_name' => 'Леонидович',
                'phone' => '+7 910 670-77-05',
                'rating' => 4.8,
                'start_working_hours' => '8:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 20,
                'education' => ' РГОТУПС АТС',
                'description' => 'Частник. Работаю один, или с напарником. Работаем качественно.
				Выезжаем на рекламацию. Выполняем любые просьбы заказчика.',
                'url_source' => 'https://uslugi.yandex.ru/profile/ViktorL-238060',
                'on_front' => false
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
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['nchelny'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Гуманов',
                'first_name' => 'Винер',
                'middle_name' => 'Гавриилович',
                'phone' => '+7 967 467-78-77',
                'rating' => 5,
                'start_working_hours' => '7:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 5,
                'education' => 'МЭСИ',
                'description' => 'Меня зовут ВИНЕР. Являюсь мастером с 10 летним опытом
				работы в предоставлении услуг по сантехнике в городе Набережные Челны.',
                'url_source' => 'https://uslugi.yandex.ru/profile/VinerG-2146725',
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['nazran'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Тестищев',
                'first_name' => 'Тестищ',
                'middle_name' => 'Тестищович',
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['neftekamsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Назмутдинов',
                'first_name' => 'Марсель',
                'middle_name' => 'Шарипович',
                'phone' => '+7 965 927-04-57',
                'rating' => 4.4,
                'start_working_hours' => '7:00',
                'end_working_hours' => '23:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2017,
                'count_realized_orders' => 14,
                'education' => 'Среднее специальное',
                'description' => 'Добросовестное отношение к работе, вежливость, аккуратность',
                'url_source' => 'https://uslugi.yandex.ru/profile/MarselNazmutdinov-1103672',
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['nefteyugansk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Чузин',
                'first_name' => 'Иван',
                'middle_name' => 'Маратович',
                'phone' => '+7 982 881-68-63',
                'rating' => 5,
                'start_working_hours' => '8:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2010,
                'count_realized_orders' => 6,
                'education' => '',
                'description' => 'Замена счетчиков холодной и горячей воды, замена одного 250 рублей, замена
				двух 400. Также возможна установка счетчиков, замена старых труб на металлопласт и пропилен.
				Установка радиаторов отопления и др сантех работы. Подбор и приобретение материала.Пишите
				так-же можете отправлять фото whats app и viber Звонить с 8°° до 22°°.Буду рад
				у вас поработать',
                'url_source' => 'https://uslugi.yandex.ru/profile/IvanCh-619975',
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['nizhnevartovsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Карпов',
                'first_name' => 'Евгений',
                'middle_name' => 'Иванович',
                'phone' => '+7 905 828-16-36',
                'rating' => 4.8,
                'start_working_hours' => '7:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 32,
                'education' => '',
                'description' => 'Бригада выполнит все виды строительных и отделочных работ.
Отделка квартир и домов под ключ.Строительство домов, гаражей, бань.Быстро, качественно, недорого.
Гарантия качества. Договор. Рассрочка',
                'url_source' => 'https://uslugi.yandex.ru/profile/EvgenijKarpov-448748',
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['nizhnekamsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Валиахметов',
                'first_name' => 'Ильдус',
                'middle_name' => 'Флерович',
                'phone' => '+7 917 922-83-00',
                'rating' => 4.8,
                'start_working_hours' => '8:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 24,
                'education' => 'высшее, художественная школа',
                'description' => 'Работаю в сфере ремонта ванных и реставрации ванн жидким
				акрилом более 7 лет!Квартирный ремонт начинается с ремонта ванной комнаты и
				тут встает вопрос что делать с ванной- купить акриловую ванну, сделать
				эмалировку чугунной ванны, наливной акрил, акриловый вкладыш?
Я решу ваши вопросы!Обратившись ко мне вы получаете профессиональную консультацию и 100
% гарантию. Работаю по договору. Всегда в наличии несколько вариантов покрытия наливного акрила,
акриловые вкладыши, обновление затирки межплиточных швов, замена сантехнических труб. Ваша ванна будет счастливой после встречи со мной!)',
                'url_source' => 'https://uslugi.yandex.ru/profile/IldusFlerovichValiakhmetov-907425',
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['nn'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Леонов',
                'first_name' => 'Игорь',
                'middle_name' => 'Константинович',
                'phone' => '+7 905 011-30-51',
                'rating' => 4.8,
                'start_working_hours' => '8:00',
                'end_working_hours' => '20:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 34,
                'education' => 'Автомеханический техникум',
                'description' => 'Сантехника это мое хобби, которым я занимаюсь профессионально.
				Люблю свою работу и постоянно повышаю квалификацию. Умею работать и имею
				возможность работать со всеми видами труб: - нержавейка на пресс фитингах,
				пайка меди твердым и мягким припоем, сварка труб под давление, работаю со
				всеми видами пластиковых труб в том числе трубы из сшитого полиэтилена любого
				производителя. Обожаю проектировать и монтировать системы отопления и
				водоснабжения для частных домов, могу смонтировать с нуля недорогую по
				стоимости материалов и по обслуживанию одновременно надежную систему отопления.
				Обожаю дорабатывать и доводить до ума уже имеющиеся системы отопления.',
                'url_source' => 'https://uslugi.yandex.ru/profile/IgorKonstantinovichL-449066',
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['nizhnij-tagil'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Никонов',
                'first_name' => 'Евгений',
                'middle_name' => 'Константинович',
                'phone' => '+7 909 701-64-12',
                'rating' => 4.9,
                'start_working_hours' => '0:00',
                'end_working_hours' => '00:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 38,
                'education' => ' ',
                'description' => 'Свою работу,выполняю-добросовестно,ответственно,качественно,на
совесть,с гарантией. Весь необходимый инструмент,есть в наличии. Использую последние технологии
ремонта.ВНИМАНИЕ!!! Работу выполняю Сам лично,никого вместо себя не посылаю! Если кто-то говорит,
что от моего имени выполнит работу,смело гоните в шею!',
                'url_source' => 'https://uslugi.yandex.ru/profile/EvgenijN-1227097',
                'on_front' => false
            ],
                      [
                'city_id' => $citiesData['novokuzneck'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Вебер',
                'first_name' => 'Вадим',
                'middle_name' => 'Константинович',
                'phone' => '+7 961-725-08-81',
                'rating' => 4.9,
                'start_working_hours' => '9:00',
                'end_working_hours' => '20:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 75,
                'education' => 'СибГиУ, Инженер систем водоснабжения и водоотведения',
                'description' => 'Чаты не читаю. Звоните, это быстрее и удобнее. Услуги сантехника
				в Новокузнецке. Работаю с 2009 года. 🛠 🔨 Услуги сантехника, сантехнические работы
				Новокузнецк, вызов сантехника. Меня зовут Вадим и я занимаюсь сантехникой с 2009 года.
				Даю гарантию на выполненные работы 12 месяцев. Работаю один или с напарником, без посредников, гражданин России. Не оставляю грязи и мусора после выполненных работ. Не стесняйтесь звонить с небольшими заказами! Для настоящего мастера не существует мелочей.
Проконсультирую по необходимым материалам и помогу с выбором, покупкой. Выезжаю в любой район
Новокузнецка. Звоните в любой день недели с 9 до 20. Пишите на viber, whatsapp, смс. Почему стоит обратиться к нам?
✅ Огромный стаж работ. ✅ В нашей бригаде 2 человека на случай больших объёмов работ. ✅ Имеется хороший профессиональный инструмент.
✅ Умеренные цены без наценок и посредников. ✅ Не теряемся после выполненных работ. ✅ Гарантия на свою работу.
✅ Выезжаем в квартиры, офисы, кафе и магазины.  📞 Звоните сейчас, я на связи! 👉 Быстрая консультация и расчет стоимости в WhatsApp или Viber по Вашим фотографиям
Краткий список наших работ: 🔸 Вызов сантехника, мелкий ремонт сантехники. 🔸 Устранение и прочистка засоров, течей. 🔸 Замена батарей со сваркой (смотрите отдельное объявление в моем профиле). 🔸 Разводка хол/гор воды. Установка и замена счетчиков. 🔸 Штробление стен и замена труб. 🔸 Установка ванн, раковин, унитазов, биде. 🔸 Установка смесителей, бытовой техники. 🔸 Подключение стиральных и посудомоечных машин. 🔸 Установка полотенцесушителя, радиаторов отопления. 🔸 Монтаж, демонтаж канализации и многое другое...',
                'url_source' => 'https://uslugi.yandex.ru/profile/VadimVeber-143014',
                'on_front' => false
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
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['novorossijsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Бородаенко',
                'first_name' => 'Евгений',
                'middle_name' => 'Александрович',
                'phone' => '+7 988 888-51-32',
                'rating' => 4.7,
                'start_working_hours' => '9:00',
                'end_working_hours' => '19:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 23,
                'education' => 'Краснодарский кооперативный институт, специальность – специалист по сервису2007 г.',
                'description' => 'Работаю оперативно и аккуратно, сантехника, ремонт мебели.',
                'url_source' => 'https://uslugi.yandex.ru/profile/EvgenijBorodaenko-1016552',
                'on_front' => false
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
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['novocheboksarsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Яковлев',
                'first_name' => 'Евгений',
                'middle_name' => 'Анатольевич',
                'phone' => '+7 917 064-06-88',
                'rating' => 4.8,
                'start_working_hours' => '7:00',
                'end_working_hours' => '23:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 87,
                'education' => 'ЧиМПУ, 2009',
                'description' => 'Квалифицированная команда частных электриков, сантехников,
				мастера на час, готовая оказать услуги электрика, сантехника и
				электро- сантехмонтажные работы, монтаж электрооборудования в Чебоксарах,
				Новочебоксарске и по ЧР. Электромонтаж и сантехмонтаж в квартирах, в домах,
				в офисах, в магазинах, в торговых залах и др. помещениях. Опытом свыше 8 лет.
				Подход к работе ответственный с профессиональным оборудованием.',
                'url_source' => 'https://uslugi.yandex.ru/profile/EvgenijYakovlev-110153',
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['novocherkassk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Китов',
                'first_name' => 'Евгений',
                'middle_name' => 'Анатольевич',
                'phone' => '+7 988 990-80-46',
                'rating' => 4.3,
                'start_working_hours' => '7:00',
                'end_working_hours' => '23:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2015,
                'count_realized_orders' => 151,
                'education' => 'Средние техническое',
                'description' => 'Специалист по прочистки канализации и устранение засоров.
				Более 8 лет работаю в этой профессии, имею огромный опыт.Работаю без посредников.
				Отсюда и цены минимальные и адекватные!Стоимость работ обсуждается по телефону
				перед выездом.Имеется все необходимое оборудование для выполнения работ любой
				сложности.Устраним любой засор в квартире,частном доме,от люка,выпуски.
Профессионально и качественно выполняю работы с гарантией.Гидродинамическая(гидро-форсунка).
Электромеханическая(спец-аппарат).Видеодиагностика(камера,эндоскоп).',
                'url_source' => 'https://uslugi.yandex.ru/profile/EvgenijK-115019',
                'on_front' => false
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
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['noviy-urengoy'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Николаев',
                'first_name' => 'Андрей',
                'middle_name' => 'Иванович',
                'phone' => '+7 961 554-56-04',
                'rating' => 4.5,
                'start_working_hours' => '7:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 31,
                'education' => ' ',
                'description' => 'Мастер с большим стажем Работы, выполнит работу качественно и
				в минимальный срок. Работаю только профессиональным инструментом. За качество
				своей работы я отвечаю и предоставляю гарантию. Более детально обсужу и подскажу
				как лучше выполнить ту или иную работу непосредственно по месту ее проведения.
				Лучше звоните, но если я не смог ответить, или я вдруг окажусь недоступен, то
				открыв вкладку чат на моей странице, вы сможете мне оставить сообщение, желательно
				в ватсап и я обязательно свяжусь с вами. Ничего невозможного не бывает.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AndrejIvanovichN-733438',
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
            ],
			[
                'city_id' => $citiesData['orel'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Егоров',
                'first_name' => 'Андрей',
                'middle_name' => 'Сергеевич',
                'phone' => '+7 905 166-33-26',
                'rating' => 4.8,
                'start_working_hours' => '8:00',
                'end_working_hours' => '22:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 52,
                'education' => 'Средне-техническое',
                'description' => 'Бесплатный выезд на место, осмотр, покупка и доставка материала
				на место производства работ. Наличие профессионального оборудования. Работаю
				качественно, быстро, аккуратно. Гарантия и послегарантийное обслуживание.
				Зарегистрирован как самозанятый. На все работы по желанию заказчика выдаю чеки,
				как в электронном виде, так и бумажном или заключаю договор на оказанные услуги.
				Гибкая система скидок на работу и материал. Рад буду оказать свои услуги всем
				желающим.',
                'url_source' => 'https://uslugi.yandex.ru/profile/AndrejEgorov-600966',
                'on_front' => false
            ],
			[
                'city_id' => $citiesData['oren'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Зуровик',
                'first_name' => 'Сергей',
                'middle_name' => 'Викторович',
                'phone' => '+7 950 184-11-88',
                'rating' => 4.8,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 43,
                'education' => 'Инженер-строитель. ОрПтИ',
                'description' => 'Здравствуйте, я мастер со стажем и опытом. Сборка и ремонт
				различной мебели, сантехники, электрики и другие бытовые работы . Могу сделать,
				повесить, наладить, поменять, отремонтировать и тд. за оговоренные с Заказчиком
				цены. Есть база для ремонта и обработки заказов , профессиональный инструмент,
				личный авто-универсал. Личные качества: ответственность, внимательность,
				исполнительность. Предоставляю гарантию, скидку на материалы и работы.',
                'url_source' => 'https://uslugi.yandex.ru/profile/SergejViktorovichZ-539182',
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
            ],
			[
                'city_id' => $citiesData['pskov'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Петрушкин',
                'first_name' => 'Владимир',
                'middle_name' => 'Иванович',
                'phone' => '+7 960 222-66-46',
                'rating' => 4.7,
                'start_working_hours' => '9:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2018,
                'count_realized_orders' => 52,
                'education' => 'средне - техническое',
                'description' => 'Занемаюсь ремонтом квартир офисов домов более 16 лет большой
				опыт возможно безналичный расчёт',
                'url_source' => 'https://uslugi.yandex.ru/profile/VladimirP-367019',
                'on_front' => false
            ],
            [
                'city_id' => $citiesData['pushkino'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Тестеров',
                'first_name' => 'Тестер',
                'middle_name' => 'Тестерович',
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
            ],
			[
                'city_id' => $citiesData['ulyanovsk'],
                'specialization_id' => $specializationId,
                'master_sources_id' => $yandexSourcesId,
                'last_name' => 'Шотов',
                'first_name' => 'Алексей',
                'middle_name' => 'Анатольевич',
                'phone' => '+7 917 813-55-18',
                'rating' => 4.9,
                'start_working_hours' => '7:00',
                'end_working_hours' => '21:00',
                'warranty_period' => 1,
                'professional_activity_year' => 2013,
                'count_realized_orders' => 250,
                'education' => 'Самарский Государственный Технический Университет, 2004, магистратура, Машиностроительный факультет, красный диплом ',
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
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
                'on_front' => false
            ]
        ]);
    }
}
