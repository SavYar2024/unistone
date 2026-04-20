<?php
return [
    'site' => [
        'name' => 'Unistone Capital',
        'domain' => 'unistone.capital',
        'email' => 'office@unistone.capital',
        'phone' => '+38(067) 248 52 25',
        'phone_href' => '+380672485225',
        'address' => 'Україна, м. Київ, вул. Мокра 16, оф. 216',
    ],
    'admin' => [
        'login' => 'admin',
        'password' => 'CHANGE_THIS_PASSWORD',
    ],
    'notifications' => [
        'email_to' => 'office@unistone.capital',
        'email_from' => 'office@unistone.capital',
        'email_subject' => 'New lead — Unistone Capital',
        'telegram_enabled' => false,
        'telegram_bot_token' => 'PUT_YOUR_BOT_TOKEN_HERE',
        'telegram_chat_id' => 'PUT_YOUR_CHAT_ID_HERE',
    ],
    'storage' => [
        'json' => __DIR__ . '/../storage/leads.json',
        'log' => __DIR__ . '/../logs/app.log',
    ],
];
