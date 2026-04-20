<?php
require __DIR__ . '/../includes/common.php';
session_start();
if (empty($_SESSION['uc_admin'])) {
    header('Location: index.php');
    exit;
}
$leads = uc_leads();
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=unistone-leads.csv');
echo "\xEF\xBB\xBF";
$out = fopen('php://output', 'w');
fputcsv($out, ['created_at', 'kind', 'status', 'name', 'company', 'email', 'phone', 'asset_type', 'location', 'value', 'message']);
foreach ($leads as $lead) {
    fputcsv($out, [
        $lead['created_at'] ?? '', $lead['lead_kind'] ?? '', $lead['status'] ?? '', $lead['name'] ?? '', $lead['company'] ?? '',
        $lead['email'] ?? '', $lead['phone'] ?? '', $lead['asset_type'] ?? '', $lead['location'] ?? '', $lead['value'] ?? '', $lead['message'] ?? ''
    ]);
}
fclose($out);
