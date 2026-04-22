<?php
require __DIR__ . '/common.php';
require_admin();
if ($_SERVER['REQUEST_METHOD'] !== 'POST') json_response(['ok' => false], 405);
$id = (string)($_POST['id'] ?? '');
$action = $_POST['action'] ?? 'update';
$leads = load_leads($config);
$found = false;
foreach ($leads as $i => $lead) {
  if ((string)($lead['id'] ?? '') !== $id) continue;
  $found = true;
  if ($action === 'delete') array_splice($leads, $i, 1);
  else { $leads[$i]['status'] = $_POST['status'] ?? ($lead['status'] ?? 'new'); $leads[$i]['note'] = trim((string)($_POST['note'] ?? ($lead['note'] ?? ''))); }
  break;
}
if (!$found) json_response(['ok' => false, 'message' => 'Not found'], 404);
save_leads($config, $leads);
json_response(['ok' => true]);
