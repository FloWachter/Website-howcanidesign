<div class="search ">
  <form class="search--form input-group mb-3 mt-3" action="search">
    <input type="search" name="q" class="form-control" placeholder='Search' aria-label="Recipient's username" aria-describedby="button-addon2" value="<?= esc($query) ?>">
    <div class="input-group-append">
      <button class="btn btn-outline-secondary" type="submit" id="button-addon2" value="Search" >Search</button>
    </div>
  </form>


<div class="search-result">
    <?php foreach($results as $result): ?>
      <a href="<?= $result->url() ?>" class="card-link">
        <div class=" card mb-3 mt-3">
          <!-- <img class="card-img-top" src=".../100px180/" alt="Card image cap"> -->
          <div class="card-img-search" style="background-image: url('<?= $result->image()->url() ?>')"></div>
          <div class="card-body">
            <h2 class="card-title mt-1 mb-1"><?= $result->title() ?></h2>
            <p class="card-text">
              <?= $result->text()->excerpt(20, 'words') ?>
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
        </div>  
      </a> 
    <?php endforeach ?>
  </div>

  </div>