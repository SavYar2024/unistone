<?php
session_start();
$config = require dirname(__DIR__) . '/config.php';
date_default_timezone_set($config['site']['timezone'] ?? 'Europe/Kyiv');

function json_response(array $payload, int $status = 200): void {
  http_response_code($status);
  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
  exit;
}
function h(string $v): string { return htmlspecialchars($v, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); }
function load_leads(array $config): array {
  $path = $config['storage']['json'];
  if (!file_exists($path)) return [];
  $raw = file_get_contents($path);
  $data = json_decode($raw ?: '[]', true);
  return is_array($data) ? $data : [];
}
function save_leads(array $config, array $leads): bool {
  $path = $config['storage']['json'];
  return file_put_contents($path, json_encode(array_values($leads), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES), LOCK_EX) !== false;
}
function append_csv(array $config, array $lead): void {
  $fp = fopen($config['storage']['csv'], 'a');
  if (!$fp) return;
  fputcsv($fp, [
    $lead['id'] ?? '', $lead['type'] ?? '', $lead['name'] ?? '', $lead['phone'] ?? '', $lead['email'] ?? '',
    $lead['asset_type'] ?? '', $lead['budget'] ?? ($lead['price'] ?? ''), $lead['region'] ?? '', $lead['message'] ?? '',
    $lead['status'] ?? '', $lead['note'] ?? '', $lead['lang'] ?? '', $lead['created_at'] ?? ''
  ]);
  fclose($fp);
}
function require_admin(): void {
  if (empty($_SESSION['unistone_admin'])) {
    http_response_code(403);
    exit('Forbidden');
  }
}
function render_email_shell(string $title, string $intro, string $bodyHtml): string {
  return '<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"></head><body style="margin:0;padding:0;background:#081018;font-family:Arial,sans-serif;color:#eef4fb;">'
    . '<table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background:#081018;padding:32px 12px;"><tr><td align="center">'
    . '<table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="max-width:680px;background:linear-gradient(180deg,#0c1622,#0b121c);border:1px solid rgba(255,255,255,.08);border-radius:24px;overflow:hidden;box-shadow:0 18px 48px rgba(0,0,0,.35);">'
    . '<tr><td style="padding:28px 32px;background:linear-gradient(135deg,#0e1a29,#0b1320);border-bottom:1px solid rgba(255,255,255,.06);">'
    . '<div style="font-size:12px;letter-spacing:.18em;text-transform:uppercase;color:#cba15a;font-weight:700;">Unistone.Capital</div>'
    . '<div style="font-size:28px;line-height:1.2;color:#ffffff;font-weight:800;margin-top:10px;">'.h($title).'</div>'
    . '<div style="font-size:15px;line-height:1.7;color:#b9c6d7;margin-top:10px;">'.h($intro).'</div>'
    . '</td></tr>'
    . '<tr><td style="padding:28px 32px;">'.$bodyHtml.'</td></tr>'
    . '<tr><td style="padding:20px 32px;border-top:1px solid rgba(255,255,255,.06);font-size:13px;line-height:1.7;color:#94a6bc;">Unistone.Capital · Київ, вул. Мокра 16, оф. 216<br>Email: office@unistone.capital · Тел.: +38 (067) 248 52 25</td></tr>'
    . '</table></td></tr></table></body></html>';
}
