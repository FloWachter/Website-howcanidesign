
<ul class="menu cf">
	<li>
		<a class="al" href="<?= url('panel') ?>">Panel</a>
	</li> 
	<div class="menue--line">
		<div class=menue--line--item></div>
	</div>


	<?php foreach($pages->visible() as $el) { ?>
	    <?php  if(!$el->is($pages->visible()->last())) { ?>
		    <li>
		        <a class="al <?php e($el->isOpen(), ' active') ?>" href="<?php echo $el->url() ?>">
		            <?php echo $el->title()->html() ?>
		        </a>
		    </li>    
		<?php } else {?>    
			 <div class="menue--line">
			 	<div class=menue--line--item></div>
			 </div>
			<li>
		        <a class="al <?php e($el->isOpen(), ' active') ?>" href="<?php echo $el->url() ?>">
		            <?php echo $el->title()->html() ?>
		        </a>
		    </li> 

		    <!-- LOGIN --> 
		    <?php if($user = $site->user()): ?>
		    <li>
		      <a href="<?= url('logout') ?>">Logout</a>
		    </li>
		    <?php endif ?>
		    <!-- LOGIN ENDE -->

		<?php } ?>
	<?php } ?>
</ul>