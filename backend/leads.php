<?php
require __DIR__ . '/common.php';
require_admin();
$leads = load_leads($config);
usort($leads, fn($a,$b) => strcmp($b['created_at'] ?? '', $a['created_at'] ?? ''));
json_response(['ok' => true, 'leads' => $leads]);
