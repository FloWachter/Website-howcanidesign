<?php  
	// Acess to all Sites
	$_site = panel()->site();
	$_pages = $_site->children();


?>


<!DOCTYPE html>
<html>
<head>
	<title>kirbycomments widget</title>
	<style type="text/css" media="screen">
	h1{
		font-size: 32px;
		margin-bottom: 1em;
	}
	h3{
		font-size: 21px;
		margin-bottom: 0.5em;	
	}
	h4{
		font-size: 16px;
		margin-bottom: 0.3em;	
		margin-left: 1.5em;	
	}
	
	.comment-widget-section-link {
		position: relative;
		display: block;

		box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  		transition: all 0.3s cubic-bezier(.25,.8,.25,1);

	}
	.comment-widget-section-link:hover {
		position: relative;
		display: block;
		box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
	}

	.comment-widget-section {
		position: relative;
		display: flex;
		

	}
	
	.new {
		background-color: rgba(31,222,145, 0.8);
	}

	.not-so-new {
		background-color: rgba(31,222,145, 0.2);
	}

	.data-info {
		font-size: 10px;
		opacity: 0.5;
	}
	
	.data-name {
		margin-top: .2em;
		font-size: 14px;
		font-weight: 800;
		opacity: 1;
	}

	.data-msg {
		margin-top: .3em;
		font-size: 14px;
		opacity: 1;
	}

	.comment-widget-section--label {
		position: relative;
		display: block;

		text-align: right;
		flex: 20%;
    	padding: 10px;
	}

	.comment-widget-section--information {
		position: relative;
		display: block;

		text-align: left;		
		flex: 80%;
    	padding: 10px;
	}

	.comment-widget-section--delete-btn {
		background-color: orange; /* Green */
	    display: inline-block;
	    border: none;
	    padding: 5px 5px;
	    font-size: 12px;
	    color: white;
	    text-align: center;
	    text-decoration: none;
	    margin-left: 50px;

	}
	.comment-widget-section--delete-btn:hover {
		background-color: red;	
	}

	/*----- Accordion -----*/
	.accordion,
	.accordion * {
		-webkit-box-sizing:border-box;
		-moz-box-sizing:border-box;
		box-sizing:border-box;
		/* padding-left: 0.2em; */
	}

	.accordion {
		overflow:hidden;
		/* box-shadow:0px 1px 3px rgba(0,0,0,0.25); */
		border-radius: 3px;
		background:#f7f7f7;
		margin-left: 2em;
	}

	/*----- Section Titles -----*/
	.accordion-section-title {
		width:100%;
		padding: 5px;
		display: inline-block;
		border-bottom: 1px solid #111;
		transition:all linear 0.15s;
		background: transparent;
		color: #111;
		font-size: 16px;
	}

	.accordion-section-title.active,
	.accordion-section-title:hover {
		background:#77777a;
		text-decoration:none;
	}

	.accordion-section:last-child .accordion-section-title {
		border-bottom:none;
	}

	.accordion-section-content {
		padding:15px;
		display:none;
	}
</style>

<script type="text/javascript">
	$(document).ready(function() {
		function close_accordion_section() {
			$('.accordion .accordion-section-title').removeClass('active');
			$('.accordion .accordion-section-content').slideUp(300).removeClass('open');
		}
		$('.accordion-section-title').click(function(e) {
			var currentAttrValue = $(this).attr('href');

			if($(e.target).is('.active')) {
				close_accordion_section();
			}else {
				close_accordion_section();
				$(this).addClass('active');
				$('.accordion ' + currentAttrValue).slideDown(300).addClass('open');
			}
			e.preventDefault();
		});
	});
</script>
</head>
<body>
	<?php $c = 0; ?>
	<h1>Comments</h1>
	
	<?php foreach ($_pages->visible() as $key => $_page) { ?>

		<!-- PAGES TITLES -->
		<h3><?php echo $_page->title(); ?></h3> 
		<div class="accordion">
			<div class="accordion-section">

				<!-- ARTICLES TITLES -->
				<?php foreach ($_page->children() as $_articles => $_article) { ?>			
					
					<a class="accordion-section-title" href="#accordion-<?php echo $c ?>">
						<?php echo $_article->title(); ?> — comments: <?php echo $_article->comments()->count() ?>
					</a>
					<div id="accordion-<?php echo $c ?>" class="accordion-section-content">
						<!-- A Comment -->
						<?php foreach ($_article->comments() as $_comments => $_comment) { ?>									
							


							<a class="comment-widget-section-link" href="<?= kirby()->urls()->index() ?>/panel/pages/<?php echo $_page->uid() ?>/<?php echo $_article->uid() ?>/comments/comment-<?php echo $_comment->id() ?>/edit" title="<?php echo "comment-".$_comment->id(); ?>"> 
								
								<div class="comment-widget-section <?php if(strtotime($_comment->date()) > strtotime('30 days ago')){
											echo 'new'; 
										} 
										if(strtotime($_comment->date()) < strtotime('30 days ago') && strtotime($_comment->date()) > strtotime('60 days ago')){
											echo 'not-so-new'; 
										}
										?>">
									
									<div class="comment-widget-section--label">
										<p class="data-info">ID:</p>
										<p class="data-info">Date:</p>	
										<p class="data-name">Name:</p>
										<p class="data-msg">Message:</p>	
									</div>

									<div class="comment-widget-section--information">
										<p class="data-info"><?php echo $_comment->id(); ?></p>
										<p class="data-info"><?php echo $_comment->date(); ?></p>	
										<p class="data-name"><?php echo $_comment->name(); ?></p>
										<p class="data-msg"><?php echo $_comment->message(); ?></p>	
									</div>

								</div>
								
							</a>




							
						<?php  }?>
					</div>
					<?php $c++; ?>
				<?php  }?>
			</div>
		</div>
	<?php  }?>
	

</body>
</html>


























