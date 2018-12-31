<div class="">
	<div class="row">
		<div class="col-8">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
		            <?php foreach($site->breadcrumb() as $crumb): ?>
				    <li class="breadcrumb-item">
				      <a href="<?= $crumb->url() ?>">
				        <?= html($crumb->title()) ?>
				      </a>
				    </li>
				    <?php endforeach ?>
				</ol>
			</nav>
		</div>
		<div class="col-4">
			<button type="button" class="btn btn-light search-btn" onclick="location.href='/search'">
				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
					<title>
						search
					</title>
					<path d="M19 17l-5.15-5.15a7 7 0 1 0-2 2L17 19zM3.5 8A4.5 4.5 0 1 1 8 12.5 4.5 4.5 0 0 1 3.5 8z"/>
				</svg>
			</button>
		</div>
	</div>
</div>