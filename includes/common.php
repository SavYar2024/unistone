<?php
function uc_config(): array {
    static $config = null;
    if ($config === null) {
        $config = require __DIR__ . '/config.php';
    }
    return $config;
}

function uc_translations(): array {
    return [
        'ua' => [
            'meta_title' => 'Unistone Capital — промислові активи, M&A та індустріальна нерухомість в Україні',
            'meta_description' => 'Бутиковий advisory для власників активів, інвесторів та індустріальних парків. Продаж і придбання промислових бізнесів, нерухомості та землі від $1 млн.',
            'nav_services' => 'Експертиза',
            'nav_sellers' => 'Для продавців',
            'nav_buyers' => 'Для покупців',
            'nav_parks' => 'Індустріальні парки',
            'nav_contact' => 'Контакти',
            'nav_cta' => 'Надіслати запит',
            'eyebrow' => 'Industrial Assets • M&A • Real Estate • Land',
            'hero_title' => 'Бутиковий advisory з промислових активів та M&A в Україні',
            'hero_text' => 'Unistone Capital супроводжує угоди з виробничими бізнесами, індустріальною нерухомістю, земельними ділянками та проектами індустріальних парків. Ми фокусуємось на активах від $1 млн та на секторах, де критично важлива реальна галузева експертиза.',
            'hero_cta_1' => 'Пропоную актив',
            'hero_cta_2' => 'Шукаю актив',
            'hero_note' => 'Конфіденційна робота для власників, інвесторів, операторів та індустріальних парків по всій Україні.',
            'stat_1_label' => 'Мінімальний розмір', 'stat_1_value' => 'від $1 млн',
            'stat_2_label' => 'Ключова спеціалізація', 'stat_2_value' => 'Building materials',
            'stat_3_label' => 'Формат роботи', 'stat_3_value' => 'Buy-side / Sell-side',
            'services_eyebrow' => 'Експертиза',
            'services_title' => 'Сфери, де Unistone Capital створює реальну цінність',
            'services_1_title' => 'Промислові бізнеси та M&A',
            'services_1_text' => 'Пошук, пакування, позиціонування та супровід угод купівлі-продажу промислових бізнесів, у тому числі виробництв будівельних матеріалів.',
            'services_2_title' => 'Індустріальна нерухомість',
            'services_2_text' => 'Заводи, виробничі комплекси, логістичні та складські майданчики, інженерно підготовлені ділянки під промислове використання.',
            'services_3_title' => 'Земля під промислові проекти',
            'services_3_text' => 'Підбір і оцінка земельних ділянок для виробництва, логістики, індустріальних парків та суміжних інвестиційних сценаріїв.',
            'services_4_title' => 'Індустріальні парки',
            'services_4_text' => 'Комерційне залучення резидентів, формування інвестиційної воронки та підготовка інвестпропозицій для керуючих компаній та власників парків.',
            'position_title' => 'Чим ми відрізняємось',
            'position_text' => 'Ми не універсальний брокер. Unistone Capital — це вузькопрофільний партнер по промислових активах, де важливі операційна логіка бізнесу, технологічна специфіка майданчика, CAPEX-контекст та реалістичний інвесторський запит.',
            'position_p1' => 'Глибший рівень аналізу, ніж у звичайного агентства нерухомості.',
            'position_p2' => 'Розуміння виробничої логіки сектору building materials та суміжних сегментів.',
            'position_p3' => 'Орієнтація на конфіденційні та часто off-market можливості.',
            'position_p4' => 'Фокус на угодах, а не на випадковому потоці лідів.',
            'seller_eyebrow' => 'Для продавців',
            'seller_title' => 'Продаж промислового активу',
            'seller_text' => 'Якщо ви плануєте продати виробничий бізнес, завод, промислову нерухомість або земельну ділянку під індустріальний проект, ми допоможемо правильно упакувати актив, сформувати професійну інвестиційну історію та вивести його на релевантну аудиторію.',
            'seller_points' => ['Пакування активу та інвестиційна логіка', 'Конфіденційний buyer outreach', 'Попередня кваліфікація інтересу', 'Супровід переговорів та структурування угоди'],
            'seller_form_title' => 'Форма для власника / продавця',
            'buyer_eyebrow' => 'Для покупців',
            'buyer_title' => 'Пошук та придбання промислового активу',
            'buyer_text' => 'Ми допомагаємо інвесторам, стратегічним покупцям та операторам знайти релевантні заводи, бізнеси, індустріальну нерухомість, земельні ділянки та проекти індустріальних парків в Україні.',
            'buyer_points' => ['Підбір активів під мандат', 'Off-market та непублічні можливості', 'Первинний інвестскринінг', 'Підтримка в структурі входу в угоду'],
            'buyer_form_title' => 'Форма для покупця / інвестора',
            'parks_eyebrow' => 'Industrial parks',
            'parks_title' => 'Співпраця з індустріальними парками',
            'parks_text' => 'Unistone Capital зацікавлена у співпраці з індустріальними парками для комерційного залучення резидентів, побудови ринкового позиціонування та пошуку компаній, яким потрібні готові виробничі локації.',
            'process_eyebrow' => 'Як ми працюємо',
            'process_title' => 'Структурований процес без хаосу',
            'process_1_t' => 'Первинний бриф', 'process_1_d' => 'Фіксуємо тип активу, бюджет, географію, технічні вимоги та ціль угоди.',
            'process_2_t' => 'Кваліфікація', 'process_2_d' => 'Відсіюємо нерелевантні кейси та перевіряємо готовність сторін до предметної роботи.',
            'process_3_t' => 'Мандат та упаковка', 'process_3_d' => 'Готуємо матеріали, формуємо позиціонування та логіку комунікації.',
            'process_4_t' => 'Угода', 'process_4_d' => 'Організовуємо наступні кроки: NDA, data room, переговори та перехід до структурування.',
            'contact_eyebrow' => 'Контакти',
            'contact_title' => 'Конфіденційні запити та партнерства',
            'contact_text' => 'Для власників активів, інвесторів, індустріальних парків та стратегічних партнерів.',
            'field_name' => 'Ім’я / контактна особа',
            'field_company' => 'Компанія',
            'field_email' => 'Email',
            'field_phone' => 'Телефон',
            'field_type_sell' => 'Тип активу',
            'field_type_buy' => 'Що шукаєте',
            'field_location' => 'Локація / регіон',
            'field_value' => 'Орієнтир вартості / бюджет',
            'field_message' => 'Опис',
            'field_consent' => 'Підтверджую згоду на обробку даних та ділову комунікацію',
            'option_business' => 'Бізнес / M&A',
            'option_real_estate' => 'Індустріальна нерухомість',
            'option_land' => 'Земельна ділянка',
            'option_park' => 'Індустріальний парк',
            'submit_sell' => 'Надіслати актив',
            'submit_buy' => 'Надіслати запит',
            'footer_text' => 'Unistone Capital — boutique advisory платформа для промислових активів, індустріальної нерухомості, землі та M&A в Україні.',
            'thanks_title' => 'Дякуємо. Ваш запит надіслано.',
            'thanks_text' => 'Ми отримали заявку і повернемося з наступним кроком після первинного перегляду.',
            'back_home' => 'Повернутись на сайт',
        ],
        'en' => [
            'meta_title' => 'Unistone Capital — industrial assets, M&A and industrial real estate in Ukraine',
            'meta_description' => 'Boutique advisory for owners, investors and industrial parks. Sale and acquisition of industrial businesses, real estate and land starting from $1M.',
            'nav_services' => 'Expertise',
            'nav_sellers' => 'For sellers',
            'nav_buyers' => 'For buyers',
            'nav_parks' => 'Industrial parks',
            'nav_contact' => 'Contacts',
            'nav_cta' => 'Submit inquiry',
            'eyebrow' => 'Industrial Assets • M&A • Real Estate • Land',
            'hero_title' => 'Boutique advisory for industrial assets and M&A in Ukraine',
            'hero_text' => 'Unistone Capital supports transactions involving manufacturing businesses, industrial real estate, land plots and industrial park projects. We focus on assets starting from $1M and on sectors where real industry expertise matters.',
            'hero_cta_1' => 'Sell asset',
            'hero_cta_2' => 'Acquire asset',
            'hero_note' => 'Confidential work for owners, investors, operators and industrial parks across Ukraine.',
            'stat_1_label' => 'Minimum size', 'stat_1_value' => 'from $1M',
            'stat_2_label' => 'Core specialization', 'stat_2_value' => 'Building materials',
            'stat_3_label' => 'Engagement model', 'stat_3_value' => 'Buy-side / Sell-side',
            'services_eyebrow' => 'Expertise',
            'services_title' => 'Where Unistone Capital creates real value',
            'services_1_title' => 'Industrial businesses & M&A',
            'services_1_text' => 'Sourcing, packaging, positioning and execution support for industrial business transactions, including building materials production assets.',
            'services_2_title' => 'Industrial real estate',
            'services_2_text' => 'Factories, production compounds, logistics assets, warehouse platforms and technically prepared industrial sites.',
            'services_3_title' => 'Land for industrial projects',
            'services_3_text' => 'Selection and evaluation of land plots for production, logistics, industrial parks and related investment scenarios.',
            'services_4_title' => 'Industrial parks',
            'services_4_text' => 'Commercial attraction of residents, investment funnel building and proposition design for operators and owners of parks.',
            'position_title' => 'Why we are different',
            'position_text' => 'We are not a generic broker. Unistone Capital is a focused partner in industrial assets where operational logic, technical context, CAPEX profile and a realistic investment thesis matter.',
            'position_p1' => 'A deeper layer of analysis than a standard real estate agency.',
            'position_p2' => 'Sector-specific understanding of building materials and adjacent production segments.',
            'position_p3' => 'Orientation toward confidential and often off-market opportunities.',
            'position_p4' => 'Transaction focus rather than random lead flow.',
            'seller_eyebrow' => 'For sellers',
            'seller_title' => 'Sell an industrial asset',
            'seller_text' => 'If you plan to sell a manufacturing business, a factory, industrial real estate or land for an industrial project, we help package the asset properly, build a credible investment story and reach the right audience.',
            'seller_points' => ['Asset packaging and investment logic', 'Confidential buyer outreach', 'Pre-qualification of interest', 'Negotiation and deal structuring support'],
            'seller_form_title' => 'Form for owners / sellers',
            'buyer_eyebrow' => 'For buyers',
            'buyer_title' => 'Source and acquire an industrial asset',
            'buyer_text' => 'We help investors, strategic buyers and operators identify relevant factories, businesses, industrial real estate, land plots and industrial park opportunities in Ukraine.',
            'buyer_points' => ['Mandate-based asset search', 'Off-market and non-public opportunities', 'Primary investment screening', 'Support in transaction entry strategy'],
            'buyer_form_title' => 'Form for buyers / investors',
            'parks_eyebrow' => 'Industrial parks',
            'parks_title' => 'Cooperation with industrial parks',
            'parks_text' => 'Unistone Capital is interested in working with industrial parks to attract residents on a commercial basis, shape market positioning and connect locations with suitable manufacturing companies.',
            'process_eyebrow' => 'How we work',
            'process_title' => 'A structured process without noise',
            'process_1_t' => 'Initial brief', 'process_1_d' => 'We define asset type, budget, geography, technical requirements and transaction objective.',
            'process_2_t' => 'Qualification', 'process_2_d' => 'We filter out non-relevant cases and verify whether the parties are ready for serious work.',
            'process_3_t' => 'Mandate & packaging', 'process_3_d' => 'We prepare materials, positioning and the communication logic for the next stage.',
            'process_4_t' => 'Execution', 'process_4_d' => 'We organize next steps: NDA, data room, negotiations and transition into structuring.',
            'contact_eyebrow' => 'Contacts',
            'contact_title' => 'Confidential inquiries and partnerships',
            'contact_text' => 'For asset owners, investors, industrial parks and strategic partners.',
            'field_name' => 'Name / contact person',
            'field_company' => 'Company',
            'field_email' => 'Email',
            'field_phone' => 'Phone',
            'field_type_sell' => 'Asset type',
            'field_type_buy' => 'Looking for',
            'field_location' => 'Location / region',
            'field_value' => 'Estimated value / budget',
            'field_message' => 'Description',
            'field_consent' => 'I consent to personal data processing and business communication',
            'option_business' => 'Business / M&A',
            'option_real_estate' => 'Industrial real estate',
            'option_land' => 'Land plot',
            'option_park' => 'Industrial park',
            'submit_sell' => 'Submit asset',
            'submit_buy' => 'Submit request',
            'footer_text' => 'Unistone Capital — boutique advisory platform for industrial assets, industrial real estate, land and M&A in Ukraine.',
            'thanks_title' => 'Thank you. Your inquiry has been submitted.',
            'thanks_text' => 'We have received your submission and will revert with the next step after an initial review.',
            'back_home' => 'Back to website',
        ]
    ];
}

function uc_lang(): string {
    $lang = $_GET['lang'] ?? 'ua';
    return in_array($lang, ['ua', 'en'], true) ? $lang : 'ua';
}

function uc_t(string $key, string $lang): string {
    $all = uc_translations();
    return $all[$lang][$key] ?? $key;
}

function uc_arr(string $key, string $lang): array {
    $all = uc_translations();
    $value = $all[$lang][$key] ?? [];
    return is_array($value) ? $value : [];
}

function uc_esc(string $v): string {
    return htmlspecialchars($v, ENT_QUOTES, 'UTF-8');
}

function uc_leads(): array {
    $file = uc_config()['storage']['json'];
    if (!file_exists($file)) {
        file_put_contents($file, json_encode([], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
    $data = json_decode((string) file_get_contents($file), true);
    return is_array($data) ? $data : [];
}

function uc_save_leads(array $leads): void {
    file_put_contents(uc_config()['storage']['json'], json_encode($leads, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

function uc_log(string $message): void {
    $line = '[' . date('Y-m-d H:i:s') . '] ' . $message . PHP_EOL;
    file_put_contents(uc_config()['storage']['log'], $line, FILE_APPEND);
}

function uc_status_label(string $status): string {
    return match($status) {
        'in_progress' => 'In progress',
        'qualified' => 'Qualified',
        'closed' => 'Closed',
        default => 'New',
    };
}
