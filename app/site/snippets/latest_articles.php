<?php
$articles = $page->children()->visible()->sortBy('date', 'desc');
?>
<section class="card-columns">
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



      <article class=" card mb-4 mt-4" >        
        <?php
        if($article->image($article->cover_image())):     
          $image = $article->image($article->cover_image());
          $image->bla();?>
          <a href="<?= $article->url() ?>" class="card-img-search">
            <div class="card-img-search" style="background-image: url('<?= $image->focusCrop(400, 100)->url() ?>')"></div>
          </a>
        <?php endif ?>
        <div class="card-body">
          <h2 class="card-title mt-1 mb-1">
            <?= $article->title()->html() ?>
          </h2>
          <p class="card-text">
           <?= $article->text()->kirbytext()->excerpt(20, 'words') ?>
           <a href="<?= $article->url() ?>" class="al article-more">&rarr;</a>
         </p>
         <div class="article--tags-sm mt-3">
          <?php 
          $string = preg_replace('/\.$/', '', $article->tags() ); 
          $array = explode(',', $string); 
          foreach($array as $value) {
            ?>
            <a class="article--tags--link" href="/search?q=<?php   echo $value . PHP_EOL; ?>"><?php   echo $value . PHP_EOL; ?></a>
          <?php }?>
        </div>
        <p class="card-text mt-3">
          <small class="text-muted">
            <?= $article->date('F jS, Y') ?>
          </small>
        </p>
      </div>
    </article>  



  <?php endif ?>
<?php endforeach ?>
<?php endif ?>	
</section>