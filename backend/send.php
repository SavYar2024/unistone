<?php
require __DIR__ . '/common.php';
require dirname(__DIR__) . '/vendor/PHPMailer/src/Exception.php';
require dirname(__DIR__) . '/vendor/PHPMailer/src/PHPMailer.php';
require dirname(__DIR__) . '/vendor/PHPMailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if ($_SERVER['REQUEST_METHOD'] !== 'POST') json_response(['ok' => false, 'message' => 'Method not allowed'], 405);
$type = $_POST['type'] ?? '';
$name = trim((string)($_POST['name'] ?? ''));
$phone = trim((string)($_POST['phone'] ?? ''));
$email = trim((string)($_POST['email'] ?? ''));
$assetType = trim((string)($_POST['asset_type'] ?? ''));
$budget = trim((string)($_POST['budget'] ?? ''));
$price = trim((string)($_POST['price'] ?? ''));
$region = trim((string)($_POST['region'] ?? ''));
$message = trim((string)($_POST['message'] ?? ''));
$lang = ($_POST['lang'] ?? 'uk') === 'en' ? 'en' : 'uk';
if (!in_array($type, ['buy', 'sell'], true)) json_response(['ok' => false, 'message' => 'Wrong type'], 422);
if ($name === '' || $phone === '') json_response(['ok' => false, 'message' => 'Name and phone required'], 422);
if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) json_response(['ok' => false, 'message' => 'Invalid email'], 422);
$lead = ['id' => time() . random_int(100, 999),'type' => $type,'name' => $name,'phone' => $phone,'email' => $email,'asset_type' => $assetType,'budget' => $budget,'price' => $price,'region' => $region,'message' => $message,'status' => 'new','note' => '','lang' => $lang,'created_at' => date('c')];
$leads = load_leads($config); array_unshift($leads, $lead); save_leads($config, $leads); append_csv($config, $lead);
function make_mailer(array $config): PHPMailer { $mail = new PHPMailer(true); $mail->CharSet = 'UTF-8'; $mail->isSMTP(); $mail->Host = $config['smtp']['host']; $mail->Port = (int)$config['smtp']['port']; $mail->SMTPAuth = (bool)$config['smtp']['auth']; $mail->Username = $config['smtp']['username']; $mail->Password = $config['smtp']['password']; $mail->SMTPSecure = (($config['smtp']['encryption'] ?? '') === 'ssl') ? PHPMailer::ENCRYPTION_SMTPS : PHPMailer::ENCRYPTION_STARTTLS; $mail->setFrom($config['site']['from_email'], $config['site']['from_name']); return $mail; }
$adminBody = '<div style="font-size:14px;line-height:1.8;color:#d8e2ef"><p style="margin:0 0 16px">Нова заявка з сайту.</p><table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse;background:#0f1825;border-radius:18px;overflow:hidden">'
  . '<tr><td style="padding:14px 18px;border-bottom:1px solid rgba(255,255,255,.06);color:#8ea1b8">Тип</td><td style="padding:14px 18px;border-bottom:1px solid rgba(255,255,255,.06);color:#fff">' . h($type === 'buy' ? 'Купівля' : 'Продаж') . '</td></tr>'
  . '<tr><td style="padding:14px 18px;border-bottom:1px solid rgba(255,255,255,.06);color:#8ea1b8">Ім’я</td><td style="padding:14px 18px;border-bottom:1px solid rgba(255,255,255,.06);color:#fff">' . h($name) . '</td></tr>'
  . '<tr><td style="padding:14px 18px;border-bottom:1px solid rgba(255,255,255,.06);color:#8ea1b8">Телефон</td><td style="padding:14px 18px;border-bottom:1px solid rgba(255,255,255,.06);color:#fff">' . h($phone) . '</td></tr>'
  . '<tr><td style="padding:14px 18px;border-bottom:1px solid rgba(255,255,255,.06);color:#8ea1b8">Email</td><td style="padding:14px 18px;border-bottom:1px solid rgba(255,255,255,.06);color:#fff">' . h($email ?: '—') . '</td></tr>'
  . '<tr><td style="padding:14px 18px;border-bottom:1px solid rgba(255,255,255,.06);color:#8ea1b8">Актив</td><td style="padding:14px 18px;border-bottom:1px solid rgba(255,255,255,.06);color:#fff">' . h($assetType ?: '—') . '</td></tr>'
  . '<tr><td style="padding:14px 18px;border-bottom:1px solid rgba(255,255,255,.06);color:#8ea1b8">Бюджет / ціна</td><td style="padding:14px 18px;border-bottom:1px solid rgba(255,255,255,.06);color:#fff">' . h($budget ?: ($price ?: '—')) . '</td></tr>'
  . '<tr><td style="padding:14px 18px;border-bottom:1px solid rgba(255,255,255,.06);color:#8ea1b8">Регіон</td><td style="padding:14px 18px;border-bottom:1px solid rgba(255,255,255,.06);color:#fff">' . h($region ?: '—') . '</td></tr>'
  . '<tr><td style="padding:14px 18px;color:#8ea1b8">Коментар</td><td style="padding:14px 18px;color:#fff">' . nl2br(h($message ?: '—')) . '</td></tr></table>'
  . '<p style="margin:18px 0 0"><a href="' . h(rtrim($config['site']['base_url'], '/')) . '/admin/" style="display:inline-block;padding:12px 18px;border-radius:14px;background:#1d6cf0;color:#fff;text-decoration:none;font-weight:700">Відкрити адмін-панель</a></p></div>';
$adminHtml = render_email_shell('Нова заявка з сайту', 'Перевірте деталі в CRM або в листі нижче.', $adminBody);
$clientTitle = $lang === 'uk' ? 'Заявку отримано' : 'Request received';
$clientIntro = $lang === 'uk' ? 'Дякуємо за звернення до Unistone.Capital. Ми зв’яжемося з вами найближчим часом.' : 'Thank you for contacting Unistone.Capital. We will get back to you shortly.';
$clientBody = '<div style="font-size:14px;line-height:1.8;color:#d8e2ef"><p style="margin:0 0 12px">' . ($lang === 'uk' ? 'Пане/пані' : 'Dear') . ' <strong style="color:#fff">' . h($name) . '</strong>,</p><p style="margin:0 0 16px">' . ($lang === 'uk' ? 'Ми зафіксували ваш запит та передали його менеджеру.' : 'Your request has been recorded and forwarded to our team.') . '</p><div style="padding:16px 18px;border-radius:18px;background:#0f1825;border:1px solid rgba(255,255,255,.06)"><div style="font-size:12px;letter-spacing:.08em;text-transform:uppercase;color:#cba15a;font-weight:700;margin-bottom:10px">' . ($lang === 'uk' ? 'Коротко по заявці' : 'Request summary') . '</div><div><strong>' . ($lang === 'uk' ? 'Тип:' : 'Type:') . '</strong> ' . h($type === 'buy' ? ($lang === 'uk' ? 'Купівля активу' : 'Asset acquisition') : ($lang === 'uk' ? 'Продаж активу' : 'Asset sale')) . '</div><div><strong>' . ($lang === 'uk' ? 'Актив:' : 'Asset:') . '</strong> ' . h($assetType ?: '—') . '</div><div><strong>' . ($lang === 'uk' ? 'Бюджет / ціна:' : 'Budget / price:') . '</strong> ' . h($budget ?: ($price ?: '—')) . '</div></div><p style="margin:16px 0 0">' . ($lang === 'uk' ? 'Контакти для оперативного зв’язку: office@unistone.capital · +38 (067) 248 52 25.' : 'For urgent contact: office@unistone.capital · +38 (067) 248 52 25.') . '</p></div>';
$clientHtml = render_email_shell($clientTitle, $clientIntro, $clientBody);
file_put_contents($config['storage']['logs'] . '/mail.log', '[' . date('Y-m-d H:i:s') . '] Lead #' . $lead['id'] . ' saved' . PHP_EOL, FILE_APPEND);
try { $adminMail = make_mailer($config); $adminMail->addAddress($config['site']['admin_email']); if ($email) $adminMail->addReplyTo($email, $name); $adminMail->Subject = 'Нова заявка — ' . ($type === 'buy' ? 'Купівля' : 'Продаж') . ' — ' . $name; $adminMail->isHTML(true); $adminMail->Body = $adminHtml; $adminMail->send(); if ($email) { $clientMail = make_mailer($config); $clientMail->addAddress($email, $name); $clientMail->Subject = $lang === 'uk' ? 'Unistone.Capital — заявку отримано' : 'Unistone.Capital — request received'; $clientMail->isHTML(true); $clientMail->Body = $clientHtml; $clientMail->send(); } } catch (Exception $e) { file_put_contents($config['storage']['logs'] . '/mail.log', '[' . date('Y-m-d H:i:s') . '] Mail error: ' . $e->getMessage() . PHP_EOL, FILE_APPEND); }
json_response(['ok' => true, 'message' => 'Saved']);
