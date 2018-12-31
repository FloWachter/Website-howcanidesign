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
    <?= js('assets/scripts/vendor/fancybox.js') ?>
    <!-- BOOTSTRAP -->
    <?= js('assets/scripts/vendor/collapse.js') ?>
    <?= js('assets/scripts/vendor/util.js') ?>
</head>

<body class="<?= $site->navigationtype() ?>">
    <!-- TO PROTECT THE PAGE WHEN NOT LOGGIN IN -->
    <?php if(!$site->user()) go('/login') ?>

    <aside>        
        <?php snippet('menu') ?>
    </aside>
    
    <!-- Header -->
    <header class="header wrap-fluid cf" role="banner">
        <div class="wrap-fluid">
            <a href="<?= url() ?>" class="logo al" rel="home"><?= $site->title()->html() ?></a>
        </div>
        <div class="hamburger-container">
            <div class="hamburger-menu">
                <div class="bar"></div>
            </div>
        </div>
    </header>

    <div id="canvas">
        <!-- body -->
        <div id="container">
            
