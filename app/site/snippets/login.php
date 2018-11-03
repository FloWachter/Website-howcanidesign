<div calss="login">
	<form class="px-4 py-3 login--form shadow-lg rounded" method="post">
		<h1 class="login--headline"><?= $page->title()->html() ?></h1>
		<div class="form-group ">
			<!-- <label for="exampleDropdownFormEmail1">Email address</label> -->
			<input type="text" name="username" class="form-control" id="username" placeholder="<?= $page->username() ?>">
		</div>
		<div class="form-group ">
			<!-- <label for="exampleDropdownFormPassword1">Password</label> -->
			<input type="password" name="password" class="form-control" id="password" placeholder="<?= $page->password() ?>">
		</div>
		<!-- <div class="form-check">
			<input type="checkbox" class="form-check-input" id="pswCheck">
			<label class="form-check-label" for="pswCheck">
				Remember me
			</label>
		</div> -->
		<div class="form-group ">
			<button type="submit" name="login" class="btn btn-primary login-btn-submit" value="<?= $page->button()->html() ?>" >Sign in</button>	
		</div>
	</form>
	<!-- <div class="login--addons">
		<a class="dropdown-item" href="#">Forgot password?</a>
	</div> -->
	<div class="login--error">
		<?php if($error): ?>
			<p class="alert"><?= $page->alert()->html() ?></p>
		<?php endif ?>		
	</div>
</div>