<div class="search ">
  <form class="search--form input-group mb-3 mt-3" action="search">
    <input type="search" name="q" class="form-control" placeholder='Search' aria-label="Recipient's username" aria-describedby="button-addon2" value="<?= esc($query) ?>">
    <div class="input-group-append">
      <button class="btn btn-outline-secondary" type="submit" id="button-addon2" value="Search" >Search</button>
    </div>
  </form>
  <section class="search-result card-columns">
    <?php foreach($results as $result): ?>
      <article class=" card mb-4 mt-4" >        
        <?php
        if($result->image($result->cover_image())):     
          $image = $result->image($result->cover_image());
          $image->bla();?>
          <a href="<?= $result->url() ?>" class="card-img-search">
            <div class="card-img-search" style="background-image: url('<?= $image->focusCrop(400, 100)->url() ?>')"></div>
          </a>
        <?php endif ?>
        <div class="card-body">
          <h2 class="card-title mt-1 mb-1">
            <?= $result->title()->html() ?>
          </h2>
          <p class="card-text">
           <?= $result->text()->kirbytext()->excerpt(20, 'words') ?>
           <a href="<?= $result->url() ?>" class="al article-more">&rarr;</a>
         </p>
         <div class="article--tags-sm mt-3">
          <?php 
          $string = preg_replace('/\.$/', '', $result->tags() ); 
          $array = explode(',', $string); 
          foreach($array as $value) {
            ?>
            <a class="article--tags--link" href="/search?q=<?php   echo $value . PHP_EOL; ?>"><?php   echo $value . PHP_EOL; ?></a>
          <?php }?>
        </div>
        <p class="card-text mt-3">
          <small class="text-muted">
            <?= $result->date('F jS, Y') ?>
          </small>
        </p>
      </div>
    </article>  
  <?php endforeach ?>
</section>

</div>