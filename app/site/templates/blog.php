<?php
    snippet('header');
?>
<div class="wrap-fluid">
    <h1><?= $page->title() ?></h1>
    <div class="h1">
        <?= $page->text()->kirbytext() ?>
    </div>
    <hr />
    <?php snippet('blog') ?>
</div>
<?php snippet('footer') ?>
