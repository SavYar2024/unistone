<?php
require __DIR__ . '/../includes/common.php';
$config = uc_config();
$lang = in_array($_POST['lang'] ?? 'ua', ['ua', 'en'], true) ? $_POST['lang'] : 'ua';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index.php?lang=' . $lang);
    exit;
}
$name = trim((string)($_POST['name'] ?? ''));
$email = trim((string)($_POST['email'] ?? ''));
$company = trim((string)($_POST['company'] ?? ''));
$phone = trim((string)($_POST['phone'] ?? ''));
$leadKind = trim((string)($_POST['lead_kind'] ?? 'buyer'));
$assetType = trim((string)($_POST['asset_type'] ?? ''));
$location = trim((string)($_POST['location'] ?? ''));
$value = trim((string)($_POST['value'] ?? ''));
$message = trim((string)($_POST['message'] ?? ''));
$consent = isset($_POST['consent']) ? 'yes' : 'no';
if ($name === '' || $email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || $consent !== 'yes') {
    uc_log('Validation error while submitting lead.');
    header('Location: ../index.php?lang=' . $lang . '#forms');
    exit;
}
$lead = [
    'id' => uniqid('lead_', true),
    'created_at' => date('Y-m-d H:i:s'),
    'lang' => $lang,
    'status' => 'new',
    'lead_kind' => $leadKind,
    'name' => $name,
    'company' => $company,
    'email' => $email,
    'phone' => $phone,
    'asset_type' => $assetType,
    'location' => $location,
    'value' => $value,
    'message' => $message,
];
$leads = uc_leads();
array_unshift($leads, $lead);
uc_save_leads($leads);
$subject = $config['notifications']['email_subject'];
$body = "New lead on Unistone Capital\n\n"
    . "Type: {$leadKind}\n"
    . "Name: {$name}\n"
    . "Company: {$company}\n"
    . "Email: {$email}\n"
    . "Phone: {$phone}\n"
    . "Asset type: {$assetType}\n"
    . "Location: {$location}\n"
    . "Value/Budget: {$value}\n"
    . "Message: {$message}\n"
    . "Submitted at: {$lead['created_at']}\n";
$headers = 'From: ' . $config['notifications']['email_from'] . "\r\n" . 'Reply-To: ' . $email . "\r\n";
@mail($config['notifications']['email_to'], $subject, $body, $headers);
if (!empty($config['notifications']['telegram_enabled']) && !empty($config['notifications']['telegram_bot_token']) && !empty($config['notifications']['telegram_chat_id'])) {
    $text = "<b>New lead — Unistone Capital</b>%0A"
        . "<b>Type:</b> " . rawurlencode($leadKind) . "%0A"
        . "<b>Name:</b> " . rawurlencode($name) . "%0A"
        . "<b>Company:</b> " . rawurlencode($company) . "%0A"
        . "<b>Email:</b> " . rawurlencode($email) . "%0A"
        . "<b>Phone:</b> " . rawurlencode($phone) . "%0A"
        . "<b>Asset type:</b> " . rawurlencode($assetType) . "%0A"
        . "<b>Location:</b> " . rawurlencode($location) . "%0A"
        . "<b>Value/Budget:</b> " . rawurlencode($value) . "%0A"
        . "<b>Message:</b> " . rawurlencode($message);
    $url = 'https://api.telegram.org/bot' . $config['notifications']['telegram_bot_token'] . '/sendMessage?chat_id=' . $config['notifications']['telegram_chat_id'] . '&parse_mode=HTML&text=' . $text;
    @file_get_contents($url);
}
uc_log('Lead stored: ' . $lead['id']);
header('Location: ../thanks.php?lang=' . $lang);
