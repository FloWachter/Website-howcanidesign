<?php snippet('header') ?>

<div class="main-wrapper">
    <?php snippet('breadcrumb') ?>
    <?php snippet('listing') ?>

    <!-- Pagaination -->
    <?php if( page() ): ?>
        <?php if($page->hasNextVisible() ): ?>
            <strong>Read Next</strong> <br />
            <a href="<?= $page->nextVisible()->url(); ?>" class="h1"><?= $page->nextVisible()->title(); ?></a> &rarr;
        <?php else: ?>
            <strong>End.</strong> <br />
            <a href="<?= $site->url(); ?>" class="h1">Start over</a> &rarr;
        <?php endif; ?>
    <?php endif; ?>

    <hr />
</div>

<?php snippet('footer') ?>