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
                    <a class="article--tags--link" href="/search?q=<?php   echo $value . PHP_EOL; ?>"><?php   echo $value . PHP_EOL; ?></a>
            <?php }?>
        </div>


        <div class="article--readlater">
            <?php echo readlater($page->title(), 'pocket', 'Read later'); ?>
        </div>

        <div class="article--author">
            
            <a class="article--tags--link" href="/search?q=<?php echo $page->author()->text(). PHP_EOL; ?>"><?php echo $page->author()->text(). PHP_EOL; ?></a> 
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