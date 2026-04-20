<?php
require __DIR__ . '/includes/common.php';
$lang = uc_lang();
$cfg = uc_config();
$site = $cfg['site'];
?>
<!doctype html>
<html lang="<?= uc_esc($lang) ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= uc_esc(uc_t('meta_title', $lang)) ?></title>
  <meta name="description" content="<?= uc_esc(uc_t('meta_description', $lang)) ?>">
  <link rel="icon" type="image/svg+xml" href="assets/img/logo.svg">
  <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<div class="bg-orb bg-orb-1"></div>
<div class="bg-orb bg-orb-2"></div>
<header class="site-header">
  <div class="container nav-shell glass">
    <a class="brand" href="index.php?lang=<?= uc_esc($lang) ?>"><img src="assets/img/logo.svg" alt="Unistone Capital"></a>
    <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="mobile-menu"><span></span><span></span><span></span></button>
    <nav class="nav-links" id="mobile-menu">
      <a href="#services"><?= uc_esc(uc_t('nav_services', $lang)) ?></a>
      <a href="#seller"><?= uc_esc(uc_t('nav_sellers', $lang)) ?></a>
      <a href="#buyer"><?= uc_esc(uc_t('nav_buyers', $lang)) ?></a>
      <a href="#parks"><?= uc_esc(uc_t('nav_parks', $lang)) ?></a>
      <a href="#contact"><?= uc_esc(uc_t('nav_contact', $lang)) ?></a>
      <div class="lang-switcher">
        <a class="<?= $lang === 'ua' ? 'active' : '' ?>" href="index.php?lang=ua">UA</a>
        <a class="<?= $lang === 'en' ? 'active' : '' ?>" href="index.php?lang=en">EN</a>
      </div>
      <a class="nav-cta" href="#forms"><?= uc_esc(uc_t('nav_cta', $lang)) ?></a>
    </nav>
  </div>
</header>
<main>
  <section class="hero container">
    <div class="hero-copy">
      <div class="eyebrow"><?= uc_esc(uc_t('eyebrow', $lang)) ?></div>
      <h1><?= uc_esc(uc_t('hero_title', $lang)) ?></h1>
      <p class="hero-text"><?= uc_esc(uc_t('hero_text', $lang)) ?></p>
      <div class="hero-actions">
        <a href="#seller-form" class="btn btn-primary"><?= uc_esc(uc_t('hero_cta_1', $lang)) ?></a>
        <a href="#buyer-form" class="btn btn-secondary"><?= uc_esc(uc_t('hero_cta_2', $lang)) ?></a>
      </div>
      <p class="hero-note"><?= uc_esc(uc_t('hero_note', $lang)) ?></p>
      <div class="stats-grid">
        <div class="glass stat-card"><div class="stat-label"><?= uc_esc(uc_t('stat_1_label', $lang)) ?></div><div class="stat-value"><?= uc_esc(uc_t('stat_1_value', $lang)) ?></div></div>
        <div class="glass stat-card"><div class="stat-label"><?= uc_esc(uc_t('stat_2_label', $lang)) ?></div><div class="stat-value"><?= uc_esc(uc_t('stat_2_value', $lang)) ?></div></div>
        <div class="glass stat-card"><div class="stat-label"><?= uc_esc(uc_t('stat_3_label', $lang)) ?></div><div class="stat-value"><?= uc_esc(uc_t('stat_3_value', $lang)) ?></div></div>
      </div>
    </div>
    <div class="hero-visual glass">
      <img src="assets/img/generated/hero-industrial.svg" alt="Industrial illustration">
      <div class="floating-card glass">
        <span class="tag">Unistone Capital</span>
        <strong>Industrial assets & deal advisory</strong>
        <small>Factories • Real Estate • Land • Parks</small>
      </div>
    </div>
  </section>
  <section id="services" class="section container">
    <div class="section-head"><span class="eyebrow"><?= uc_esc(uc_t('services_eyebrow', $lang)) ?></span><h2><?= uc_esc(uc_t('services_title', $lang)) ?></h2></div>
    <div class="cards-grid four">
      <article class="glass card"><h3><?= uc_esc(uc_t('services_1_title', $lang)) ?></h3><p><?= uc_esc(uc_t('services_1_text', $lang)) ?></p></article>
      <article class="glass card"><h3><?= uc_esc(uc_t('services_2_title', $lang)) ?></h3><p><?= uc_esc(uc_t('services_2_text', $lang)) ?></p></article>
      <article class="glass card"><h3><?= uc_esc(uc_t('services_3_title', $lang)) ?></h3><p><?= uc_esc(uc_t('services_3_text', $lang)) ?></p></article>
      <article class="glass card"><h3><?= uc_esc(uc_t('services_4_title', $lang)) ?></h3><p><?= uc_esc(uc_t('services_4_text', $lang)) ?></p></article>
    </div>
  </section>
  <section class="section container split-section">
    <div>
      <div class="section-head left"><span class="eyebrow">Advisory DNA</span><h2><?= uc_esc(uc_t('position_title', $lang)) ?></h2></div>
      <p class="hero-text"><?= uc_esc(uc_t('position_text', $lang)) ?></p>
      <div class="pill-grid">
        <div class="glass pill"><?= uc_esc(uc_t('position_p1', $lang)) ?></div>
        <div class="glass pill"><?= uc_esc(uc_t('position_p2', $lang)) ?></div>
        <div class="glass pill"><?= uc_esc(uc_t('position_p3', $lang)) ?></div>
        <div class="glass pill"><?= uc_esc(uc_t('position_p4', $lang)) ?></div>
      </div>
    </div>
    <div class="glass side-visual"><img src="assets/img/generated/focus-materials.svg" alt="Focus"></div>
  </section>
  <section id="forms" class="section container dual-grid forms-premium">
    <article id="seller" class="glass duo-card seller-card">
      <span class="eyebrow"><?= uc_esc(uc_t('seller_eyebrow', $lang)) ?></span>
      <h3><?= uc_esc(uc_t('seller_title', $lang)) ?></h3>
      <p><?= uc_esc(uc_t('seller_text', $lang)) ?></p>
      <ul class="feature-list">
        <?php foreach (uc_arr('seller_points', $lang) as $point): ?>
          <li><?= uc_esc($point) ?></li>
        <?php endforeach; ?>
      </ul>
      <div class="form-shell compact" id="seller-form">
        <h4><?= uc_esc(uc_t('seller_form_title', $lang)) ?></h4>
        <form class="lead-form" action="api/submit.php" method="post">
          <input type="hidden" name="lang" value="<?= uc_esc($lang) ?>">
          <input type="hidden" name="lead_kind" value="seller">
          <div class="field-grid two">
            <label><span><?= uc_esc(uc_t('field_name', $lang)) ?></span><input type="text" name="name" required></label>
            <label><span><?= uc_esc(uc_t('field_company', $lang)) ?></span><input type="text" name="company"></label>
          </div>
          <div class="field-grid two">
            <label><span><?= uc_esc(uc_t('field_email', $lang)) ?></span><input type="email" name="email" required></label>
            <label><span><?= uc_esc(uc_t('field_phone', $lang)) ?></span><input type="text" name="phone"></label>
          </div>
          <div class="field-grid two">
            <label><span><?= uc_esc(uc_t('field_type_sell', $lang)) ?></span><select name="asset_type"><option><?= uc_esc(uc_t('option_business', $lang)) ?></option><option><?= uc_esc(uc_t('option_real_estate', $lang)) ?></option><option><?= uc_esc(uc_t('option_land', $lang)) ?></option><option><?= uc_esc(uc_t('option_park', $lang)) ?></option></select></label>
            <label><span><?= uc_esc(uc_t('field_value', $lang)) ?></span><input type="text" name="value"></label>
          </div>
          <label><span><?= uc_esc(uc_t('field_location', $lang)) ?></span><input type="text" name="location"></label>
          <label><span><?= uc_esc(uc_t('field_message', $lang)) ?></span><textarea name="message"></textarea></label>
          <label class="checkbox"><input type="checkbox" name="consent" value="1" required><span><?= uc_esc(uc_t('field_consent', $lang)) ?></span></label>
          <button class="btn btn-primary full" type="submit"><?= uc_esc(uc_t('submit_sell', $lang)) ?></button>
        </form>
      </div>
    </article>
    <article id="buyer" class="glass duo-card buyer-card">
      <span class="eyebrow"><?= uc_esc(uc_t('buyer_eyebrow', $lang)) ?></span>
      <h3><?= uc_esc(uc_t('buyer_title', $lang)) ?></h3>
      <p><?= uc_esc(uc_t('buyer_text', $lang)) ?></p>
      <ul class="feature-list">
        <?php foreach (uc_arr('buyer_points', $lang) as $point): ?>
          <li><?= uc_esc($point) ?></li>
        <?php endforeach; ?>
      </ul>
      <div class="form-shell compact" id="buyer-form">
        <h4><?= uc_esc(uc_t('buyer_form_title', $lang)) ?></h4>
        <form class="lead-form" action="api/submit.php" method="post">
          <input type="hidden" name="lang" value="<?= uc_esc($lang) ?>">
          <input type="hidden" name="lead_kind" value="buyer">
          <div class="field-grid two">
            <label><span><?= uc_esc(uc_t('field_name', $lang)) ?></span><input type="text" name="name" required></label>
            <label><span><?= uc_esc(uc_t('field_company', $lang)) ?></span><input type="text" name="company"></label>
          </div>
          <div class="field-grid two">
            <label><span><?= uc_esc(uc_t('field_email', $lang)) ?></span><input type="email" name="email" required></label>
            <label><span><?= uc_esc(uc_t('field_phone', $lang)) ?></span><input type="text" name="phone"></label>
          </div>
          <div class="field-grid two">
            <label><span><?= uc_esc(uc_t('field_type_buy', $lang)) ?></span><select name="asset_type"><option><?= uc_esc(uc_t('option_business', $lang)) ?></option><option><?= uc_esc(uc_t('option_real_estate', $lang)) ?></option><option><?= uc_esc(uc_t('option_land', $lang)) ?></option><option><?= uc_esc(uc_t('option_park', $lang)) ?></option></select></label>
            <label><span><?= uc_esc(uc_t('field_value', $lang)) ?></span><input type="text" name="value"></label>
          </div>
          <label><span><?= uc_esc(uc_t('field_location', $lang)) ?></span><input type="text" name="location"></label>
          <label><span><?= uc_esc(uc_t('field_message', $lang)) ?></span><textarea name="message"></textarea></label>
          <label class="checkbox"><input type="checkbox" name="consent" value="1" required><span><?= uc_esc(uc_t('field_consent', $lang)) ?></span></label>
          <button class="btn btn-primary full" type="submit"><?= uc_esc(uc_t('submit_buy', $lang)) ?></button>
        </form>
      </div>
    </article>
  </section>
  <section id="parks" class="section container dual-grid">
    <div class="glass duo-card duo-wide"><div><span class="eyebrow"><?= uc_esc(uc_t('parks_eyebrow', $lang)) ?></span><h3><?= uc_esc(uc_t('parks_title', $lang)) ?></h3><p><?= uc_esc(uc_t('parks_text', $lang)) ?></p></div><img src="assets/img/generated/industrial-park.svg" alt="Industrial parks"></div>
  </section>
  <section class="section container">
    <div class="section-head"><span class="eyebrow"><?= uc_esc(uc_t('process_eyebrow', $lang)) ?></span><h2><?= uc_esc(uc_t('process_title', $lang)) ?></h2></div>
    <div class="timeline-grid">
      <article class="glass timeline-card"><h3><?= uc_esc(uc_t('process_1_t', $lang)) ?></h3><p><?= uc_esc(uc_t('process_1_d', $lang)) ?></p></article>
      <article class="glass timeline-card"><h3><?= uc_esc(uc_t('process_2_t', $lang)) ?></h3><p><?= uc_esc(uc_t('process_2_d', $lang)) ?></p></article>
      <article class="glass timeline-card"><h3><?= uc_esc(uc_t('process_3_t', $lang)) ?></h3><p><?= uc_esc(uc_t('process_3_d', $lang)) ?></p></article>
      <article class="glass timeline-card"><h3><?= uc_esc(uc_t('process_4_t', $lang)) ?></h3><p><?= uc_esc(uc_t('process_4_d', $lang)) ?></p></article>
    </div>
  </section>
  <section id="contact" class="section container form-section">
    <div class="form-copy">
      <span class="eyebrow"><?= uc_esc(uc_t('contact_eyebrow', $lang)) ?></span>
      <h2><?= uc_esc(uc_t('contact_title', $lang)) ?></h2>
      <p><?= uc_esc(uc_t('contact_text', $lang)) ?></p>
      <div class="glass contact-card">
        <h3>Unistone Capital</h3>
        <a href="mailto:<?= uc_esc($site['email']) ?>"><?= uc_esc($site['email']) ?></a>
        <a href="tel:<?= uc_esc($site['phone_href']) ?>"><?= uc_esc($site['phone']) ?></a>
        <p><?= uc_esc($site['address']) ?></p>
        <a class="btn btn-secondary" href="admin/index.php">CRM / Dashboard</a>
      </div>
    </div>
    <div class="glass form-shell showcase-card">
      <img src="assets/img/generated/dashboard-preview.svg" alt="Dashboard preview">
    </div>
  </section>
</main>
<footer class="site-footer">
  <div class="container footer-shell glass">
    <img src="assets/img/logo.svg" alt="Unistone Capital">
    <div><p><?= uc_esc(uc_t('footer_text', $lang)) ?></p><small>© <?= date('Y') ?> Unistone Capital</small></div>
    <div class="footer-links"><a href="mailto:<?= uc_esc($site['email']) ?>"><?= uc_esc($site['email']) ?></a><a href="tel:<?= uc_esc($site['phone_href']) ?>"><?= uc_esc($site['phone']) ?></a></div>
  </div>
</footer>
<script src="assets/js/app.js"></script>
</body>
</html>
