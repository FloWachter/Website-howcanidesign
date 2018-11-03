<?php
    snippet('header');
?>
<div class="wrap-fluid">
    
	 <?php snippet('search') ?>

 	<div class="h1">
        <?= $page->text()->kirbytext() ?>
    </div>
    
    




   
    <?php snippet('latest_articles') ?>
</div>
<?php snippet('footer') ?>
