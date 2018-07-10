<?php
    $articles = $page->children()->visible()->sortBy('date', 'desc');
?>
<section>
    
    <!-- *********************************************** -->
    <!-- BLOG ENTIES -->
    <!-- *********************************************** -->
    <?php if($articles->count() && $page != $site->homePage()): ?>
        <?php foreach($articles as $article): ?>
            <article class="article index">
                <header>
                    <h2>
                        <a href="<?= $article->url() ?>" class="al"><?= $article->title()->html() ?></a>
                    </h2>
                </header>
                <div class="text">
                    <p>
                        <?= $article->text()->kirbytext()->excerpt(50, 'words') ?>
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

    <!-- *********************************************** -->
    <!-- NO ENTRY BLOG -->
    <!-- *********************************************** -->
    <?php if(!$articles->count() && $page != $site->homePage()): ?>
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

    <!-- *********************************************** -->
    <!-- HOME PAGE -->
    <!-- *********************************************** -->
    <?php if(!$articles->count() && $page == $site->homePage()): ?>
        <?php 
            $lastArticles = $site->pages()->children()->sortBy('date', 'desc'); 
            $count = 0;
        ?>
        <?php foreach($lastArticles as $article): ?>
            <!-- it puplish only the last 5 created articles on the home site -->
            <?php if ($count++ < 5): ?>
                <article class="article index">
                <header>
                    <h2>
                        <a href="<?= $article->url() ?>" class="al"><?= $article->title()->html() ?></a>
                    </h2>

                    <?php
                        $image = $article->image($article->cover_image());    
                        if($image):     
                    ?>
                        <img src="<?= $image->focusCrop(400, 100)->url() ?>" class="thumb-home" alt="">
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
            <?php endif ?>
        <?php endforeach ?>
    <?php endif ?>
</section>
