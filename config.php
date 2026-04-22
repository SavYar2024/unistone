<?php
return [
  'site' => [
    'name' => 'Unistone.Capital',
    'base_url' => 'https://your-domain.com',
    'admin_email' => 'office@unistone.capital',
    'from_email' => 'no-reply@your-domain.com',
    'from_name' => 'Unistone.Capital',
    'timezone' => 'Europe/Kyiv',
  ],
  'admin' => [
    'username' => 'admin',
    'password' => 'CHANGE_ME_STRONG_PASSWORD',
  ],
  'storage' => [
    'json' => __DIR__ . '/storage/leads.json',
    'csv' => __DIR__ . '/storage/leads.csv',
    'logs' => __DIR__ . '/storage/logs',
  ],
  'smtp' => [
    'host' => 'mx1.mirohost.net',
    'port' => 587,
    'encryption' => 'tls',
    'username' => 'YOUR_SMTP_LOGIN',
    'password' => 'YOUR_SMTP_PASSWORD',
    'auth' => true,
  ],
];
