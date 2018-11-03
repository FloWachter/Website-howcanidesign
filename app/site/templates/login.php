<!doctype html>
<html lang="<?= site()->language() ? site()->language()->code() : 'en' ?>" class="js">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title><?= $site->title()->html() ?> &middot; <?= $page->title()->html() ?></title>
  <meta name="description" content="<?= $site->description()->html() ?>">

  <meta name="twitter:image" content="http://themes.yordanoff.net/kompact/kompact-01.gif" />
  <meta name="og:image" content="http://themes.yordanoff.net/kompact/kompact-01.gif" />

  <link rel="shortcut icon" href="<?php echo $site->url() ?>/assets/images/favicon.ico" type="image/x-icon" />

  <?= css('assets/fonts/font-face.css') ?>
  <?= css('assets/css/main.css') ?>
  <?= js('assets/scripts/vendor/jquery_v331.js') ?> 
</head>

<body>

  <header class="header wrap-fluid cf" role="banner">
    <div class="wrap-fluid">
      <a href="<?= url() ?>" class="logo al" rel="home"><?= $site->title()->html() ?></a>
    </div>
  </header>

  <main class="main--login">
    <section class="container main--login--wrapper ">
      <div class=" main--login--wrapper--row row justify-content-center">
        <div class="col-lg-4 col-md-6 col-sm-12 align-self-center">
          <?php snippet('login') ?>    
        </div>
      </div>
    </section>
  </main>

  <!-- PAGE SCRIPTS -->
</body>
</html>
