<?php
    snippet('header');
?>
<div class="wrap-fluid">
    <div class="h1">
        <?= $page->text()->kirbytext() ?>
    </div>
    <hr />
    <?php snippet('search') ?>
    <?php snippet('listing') ?>
</div>
<?php snippet('footer') ?>
