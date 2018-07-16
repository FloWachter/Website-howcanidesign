<?php snippet('header') ?>

<div class="wrap-fluid">
    <article class="article index">
        <header>
            <h1><?= $page->title()->kirbytext() ?></h1>
        </header>
        <div class="text">
            <?= $page->text()->kirbytext() ?>
        </div>
        <?php if( page('blog') ): ?>
            <br />
            <p class="article-date">
                <?= $page->date('F jS, Y') ?>
            </p>
        <?php endif; ?>


        <!-- adding tags on the end of the article for search result -->
        <div class=article--tags>
            <h4>Article Tags</h4>

            <?php 
                $string = preg_replace('/\.$/', '', $page->tags()); 
                $array = explode(',', $string); 
                foreach($array as $value) {
            ?>
                    <a class="article--tags--link" href="#<?php   echo $value . PHP_EOL; ?>"><?php   echo $value . PHP_EOL; ?></a>
            <?php }?>
        </div>


    </article>
    <!-- COMMENTS -->            
            <div class="comments-form">
              <?php snippet('comments-form') ?>
            </div>
            <div class="comments-list">
                <?php snippet('comments-list') ?>
            </div>

    <hr />

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
