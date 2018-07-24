<?php 
// ---------------------------------------------------------
// Page contains all entries from a capter in the side menue
// ---------------------------------------------------------
?>
<?php
$articles = $page->children()->visible()->sortBy('date', 'desc');
?>
<?php if($articles->count()): ?>
<section>
    <?php foreach($articles as $article): ?>
        <!-- it puplish only the last 5 created articles on the home site -->

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
    <?php endforeach ?>
</section>

<?php endif ?>

<?php 
// ***********************************************
// NO ENTRY BLOG
// ***********************************************
 ?>

<?php if(!$articles->count()): ?>

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









</section>




