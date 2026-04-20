<?php
require __DIR__ . '/includes/common.php';
$lang = uc_lang();
?>
<!doctype html>
<html lang="<?= uc_esc($lang) ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= uc_esc(uc_t('thanks_title', $lang)) ?></title>
  <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body class="admin-body">
  <div class="admin-login glass" style="max-width:760px; text-align:center;">
    <img src="assets/img/logo.svg" alt="Unistone Capital" class="admin-logo">
    <h1><?= uc_esc(uc_t('thanks_title', $lang)) ?></h1>
    <p><?= uc_esc(uc_t('thanks_text', $lang)) ?></p>
    <a class="btn btn-primary" href="index.php?lang=<?= uc_esc($lang) ?>"><?= uc_esc(uc_t('back_home', $lang)) ?></a>
  </div>
</body>
</html>
