<h1><?= $page->title()->html() ?></h1>

<?php if($error): ?>
<div class="alert"><?= $page->alert()->html() ?></div>
<?php endif ?>

<form class="login--form" method="post">
  <div class="login--form--item">
    <input type="text" id="username" name="username" placeholder="<?= $page->username() ?>">
  </div>
  <div class="login--form--item">
    <input type="password" id="password" name="password" placeholder="<?= $page->password() ?>">
  </div>
  <div class="login--form--item">
    <input type="submit" name="login" value="<?= $page->button()->html() ?>">
  </div>
</form>