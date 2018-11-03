
<!-- <form action="search">
  <input type="search" name="q" value="<?= esc($query) ?>" placeholder='Start Typing'>
  <input type="submit" value="Search">
</form>
 -->
<form action="search" class="input-group mb-3">
  <input type="search" name="q" class="form-control" placeholder='Ssearch' aria-label="Recipient's username" aria-describedby="button-addon2" value="<?= esc($query) ?>">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="submit" id="button-addon2" value="Search" >Search</button>
  </div>
</form>




<ul>
  <?php foreach($results as $result): ?>
    <li>
      <a href="<?= $result->url() ?>">
        <?= $result->title()->html() ?>
      </a>
    </li>
  <?php endforeach ?>
</ul>






