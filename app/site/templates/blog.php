<?php snippet('header'); ?>

<div class="main-wrapper">
	<?php snippet('breadcrumb'); ?>
	

	<div class="blog--add-btn">
        <a class="btn btn-outline-info" href="<?= url('panel') . '/pages/' . $page->uri() . '/edit'; ?>"> Open Page</a>
    </div>




    <h1><?= $page->title() ?></h1>
    <div class="h1">
        <?= $page->text()->kirbytext() ?>
    </div>
    <hr />

    <?php snippet('blog') ?>
</div>
<?php snippet('footer') ?>
