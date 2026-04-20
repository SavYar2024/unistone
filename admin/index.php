<?php
require __DIR__ . '/../includes/common.php';
session_start();
$config = uc_config();
$error = '';
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $login = (string)($_POST['login'] ?? '');
    $password = (string)($_POST['password'] ?? '');
    if ($login === $config['admin']['login'] && $password === $config['admin']['password']) {
        $_SESSION['uc_admin'] = true;
        header('Location: index.php');
        exit;
    }
    $error = 'Wrong login or password';
}
if (empty($_SESSION['uc_admin'])): ?>
<!doctype html>
<html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Unistone CRM</title><link rel="stylesheet" href="../assets/css/styles.css"></head><body class="admin-body"><div class="admin-login glass"><img src="../assets/img/logo.svg" alt="Unistone Capital" class="admin-logo"><h1>CRM / Dashboard</h1><?php if ($error): ?><div class="flash error"><?= uc_esc($error) ?></div><?php endif; ?><form class="lead-form" method="post"><label><span>Login</span><input type="text" name="login" required></label><label><span>Password</span><input type="password" name="password" required></label><button class="btn btn-primary full" type="submit">Enter dashboard</button></form></div></body></html><?php exit; endif;
$leads = uc_leads();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['lead_id'], $_POST['status'])) {
    foreach ($leads as &$lead) {
        if ($lead['id'] === $_POST['lead_id']) {
            $lead['status'] = $_POST['status'];
            break;
        }
    }
    unset($lead);
    uc_save_leads($leads);
    header('Location: index.php');
    exit;
}
$total = count($leads);
$new = count(array_filter($leads, fn($l) => ($l['status'] ?? 'new') === 'new'));
$qualified = count(array_filter($leads, fn($l) => ($l['status'] ?? '') === 'qualified'));
$buyers = count(array_filter($leads, fn($l) => ($l['lead_kind'] ?? '') === 'buyer'));
?>
<!doctype html>
<html lang="en">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Unistone CRM</title><link rel="stylesheet" href="../assets/css/styles.css"></head>
<body class="admin-body">
<div class="container admin-wrap">
  <div class="admin-top glass"><div><img src="../assets/img/logo.svg" alt="Unistone Capital" class="admin-logo"><h1>CRM / Dashboard</h1><p>Lead overview for Unistone Capital</p></div><div class="admin-actions"><a class="btn btn-secondary" href="export.php">Export CSV</a><a class="btn btn-primary" href="?logout=1">Logout</a></div></div>
  <div class="cards-grid four admin-stats">
    <div class="glass card"><span>Total leads</span><strong><?= $total ?></strong></div>
    <div class="glass card"><span>New</span><strong><?= $new ?></strong></div>
    <div class="glass card"><span>Qualified</span><strong><?= $qualified ?></strong></div>
    <div class="glass card"><span>Buyer requests</span><strong><?= $buyers ?></strong></div>
  </div>
  <div class="table-wrap glass">
    <table class="crm-table">
      <thead><tr><th>Date</th><th>Kind</th><th>Name / Company</th><th>Type</th><th>Location</th><th>Value / Budget</th><th>Contacts</th><th>Message</th><th>Status</th></tr></thead>
      <tbody>
      <?php foreach ($leads as $lead): ?>
        <tr>
          <td><?= uc_esc($lead['created_at'] ?? '') ?></td>
          <td><?= uc_esc($lead['lead_kind'] ?? '') ?></td>
          <td><strong><?= uc_esc($lead['name'] ?? '') ?></strong><br><small><?= uc_esc($lead['company'] ?? '') ?></small></td>
          <td><?= uc_esc($lead['asset_type'] ?? '') ?></td>
          <td><?= uc_esc($lead['location'] ?? '') ?></td>
          <td><?= uc_esc($lead['value'] ?? '') ?></td>
          <td><a href="mailto:<?= uc_esc($lead['email'] ?? '') ?>"><?= uc_esc($lead['email'] ?? '') ?></a><br><?= uc_esc($lead['phone'] ?? '') ?></td>
          <td><?= nl2br(uc_esc($lead['message'] ?? '')) ?></td>
          <td>
            <form method="post" class="status-form">
              <input type="hidden" name="lead_id" value="<?= uc_esc($lead['id'] ?? '') ?>">
              <span class="status status-<?= uc_esc($lead['status'] ?? 'new') ?>"><?= uc_esc(uc_status_label($lead['status'] ?? 'new')) ?></span>
              <select name="status"><option value="new">New</option><option value="in_progress">In progress</option><option value="qualified">Qualified</option><option value="closed">Closed</option></select>
              <button class="btn btn-secondary small" type="submit">Save</button>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>
