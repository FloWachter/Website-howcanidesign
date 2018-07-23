<?php
$articles = $page->children()->visible()->sortBy('date', 'desc');
?>
<section>
    <?php if($articles->count() && $page != $site->homePage()): ?>
    <!-- *********************************************** -->
    <!-- BLOG ENTIES - ARTICLE CAtegories -->
    <!-- *********************************************** -->
    
    <?php $page->title()->html(); ?>


    <?php foreach($articles as $article): ?>
        <article class="article index">
            <header>
                <h2>
                    <a href="<?= $article->url() ?>" class="al"><?= $article->title()->html() ?></a>
                </h2>
                <?php
                if($article->image($article->cover_image())):     
                    $image = $article->image($article->cover_image());
                    $image->bla();
                    ?>
                    <figure>
                        <img src="<?= $image->focusCrop(400, 100)->url() ?>" class="thumb-home" alt="">
                    </figure>
                <?php endif ?>
            </header>
            <div class="text">
                <p>
                    <?= $article->text()->kirbytext()->excerpt(20, 'words') ?>
                    <a href="<?= $article->url() ?>" class="al article-more">&rarr;</a>
                </p>
            </div>
            <br />
            <p class="article-date">
                <?= $article->date('F jS, Y') ?>
            </p>
        </article>
        <hr />
    <?php endforeach ?>
<?php endif ?>


<?php if(!$articles->count() && $page != $site->homePage()): ?>
<!-- *********************************************** -->
<!-- NO ENTRY BLOG -->
<!-- *********************************************** -->
<article class="article index">
    
    <header>
        <h2>
            Sorry,
        </h2>
    </header>
    <div class="text">
       <p>This blog does not contain any articles yet.</p>
   </div>
</article>
<?php endif ?>

<?php if(!$articles->count() && $page == $site->homePage()): ?>
<?php 
$lastArticles = $site->pages()->children()->sortBy('date', 'desc'); 
$count = 0;
?>
<!-- *********************************************** -->
<!-- HOME PAGE -->
<!-- *********************************************** -->
<?php foreach($lastArticles as $article): ?>
    <!-- it puplish only the last 5 created articles on the home site -->
    <?php if ($count++ < 5): ?>
        <article class="article index">
            <header>
                <h2>
                    <a href="<?= $article->url() ?>" class="al"><?= $article->title()->html() ?></a>
                </h2>
                <?php
                
                if($article->image($article->cover_image())):     
                    $image = $article->image($article->cover_image());
                    $image->bla();    
                
                    ?>
                    <figure>
                        <img src="<?= $image->focusCrop(400, 100)->url() ?>" class="thumb-home" alt="">
                    </figure>
                <?php endif ?>
            </header>
            <div class="text">
                <p>
                    <?= $article->text()->kirbytext()->excerpt(20, 'words') ?>
                    <a href="<?= $article->url() ?>" class="al article-more">&rarr;</a>
                </p>
            </div>

            <div class=article--tags-sm>
            <?php 
                $string = preg_replace('/\.$/', '', $article->tags()); 
                $array = explode(',', $string); 
                foreach($array as $value) {
            ?>
                    <a class="article--tags--link" href="/search?q=<?php   echo $value . PHP_EOL; ?>"><?php   echo $value . PHP_EOL; ?></a>
            <?php }?>
            </div>

            <br />
            <p class="article-date">
                <?= $article->date('F jS, Y') ?>
            </p>
        </article>
    <?php endif ?>
<?php endforeach ?>
<?php endif ?>
</section>
