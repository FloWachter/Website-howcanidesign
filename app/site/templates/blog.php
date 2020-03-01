<?php snippet('header'); ?>
<?php snippet('breadcrumb'); ?>

<div class="main-wrapper">
    <h1><?= $page->title() ?></h1>
    <div class="h1">
        <?= $page->text()->kirbytext() ?>
    </div>
    <hr />
    <?php snippet('blog') ?>
</div>
<?php snippet('footer') ?>
