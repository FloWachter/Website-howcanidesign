<form>
  <input type="search" name="q" value="<?= esc($query) ?>">
  <input type="submit" value="Search">
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