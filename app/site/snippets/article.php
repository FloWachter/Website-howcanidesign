 <article class="article index">
        <header>
            <h1><?= $page->title()->kirbytext() ?></h1>        

            <div class="article--edit-btn">
                <a class="btn btn-outline-info" href="<?=  url('panel') . '/pages/' . $page->uri() . '/edit' ?>">Edit</a>
            </div>
            <?php if($page->image($page->cover_image())):     
                $image = $page->image($page->cover_image());?>
                <!-- check if content is image -->
                <figure>
                    <img src="<?= $image->focusCrop(400, 200)->url() ?>" class="thumb-home" alt="">
                </figure>
            <?php endif ?>

            <?php if(Str::isURL($page->sourceWeb())):  ?>   
                <!-- check if content is url -->
                <p>Click <a href="<?php echo $page->sourceWeb()->url() ?>">here</a> for the Source information</p>
            <?php endif ?>
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
<div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Write a Comment
        </button>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        <div class="comments-form">
            <?php snippet('comments-form') ?>
        </div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Comments
        </button>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">    
        <div class="comments-list">
            <?php snippet('comments-list') ?>
        </div>
      </div>
    </div>
  </div>
</div>








    

    <hr />