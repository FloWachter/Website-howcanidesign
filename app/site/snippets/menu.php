<ul class="menu cf">
<?php foreach($pages->visible() as $el) { ?>
    
    <?php  if(!$el->is($pages->visible()->last())) { ?>
	    <li>
	        <a class="al <?php e($el->isOpen(), ' active') ?>" href="<?php echo $el->url() ?>">
	            <?php echo $el->title()->html() ?>
	        </a>
	    </li>    
	<?php } else {?>    
		 <div class="menue--line">
		 	<div class=menue--line--item>
		 		
		 	</div>
		 	
		 </div>

		<li>
	        <a class="al <?php e($el->isOpen(), ' active') ?>" href="<?php echo $el->url() ?>">
	            <?php echo $el->title()->html() ?>
	        </a>
	    </li>    
	<?php } ?>
<?php } ?>
</ul>