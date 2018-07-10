<?php  
	// Acess to all Sites
	$site = panel()->site()->children()

	// function deleComment($path){
	// 	$file = $page->file($path);

	// 	try {

	// 	  $file->delete();
	// 	  echo 'The file has been deleted';

	// 	} catch(Exception $e) {

	// 	  echo 'The file could not be deleted';
	// 	  // optional reason: echo $e->getMessage();

	// 	}
	// }
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
	.comment-widget-section {
		margin-top: 0.5em;
		margin-bottom: 0.5em;
		margin-left: 2.5em;	

	}

	.comment-widget-section--information {
		width: 50%;
		display: inline-block;
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
		padding-left: 0.2em;

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
	<?php foreach ($site->visible() as $key => $_pages) { ?>
		<!-- PAGES TITLES -->
		<h3><?php echo $_pages->title(); ?></h3> 
		<div class="accordion">
			<div class="accordion-section">

				<!-- ARTICLES TITLES -->
				<?php foreach ($_pages->children() as $_articles => $_article) { ?>			
					
					<a class="accordion-section-title" href="#accordion-<?php echo $c ?>">
						<?php echo $_article->title(); ?> — comments: <?php echo $_article->comments()->count() ?>

					</a>
					<div id="accordion-<?php echo $c ?>" class="accordion-section-content">

						<!-- A Comment -->
						<?php foreach ($_article->comments() as $_comments => $_comment) { ?>		
							
							<section class="comment-widget-section">
								<div class="comment-widget-section--information">
									<p><?php echo $_comment->name(); ?></p>
									<p>ID: <?php echo $_comment->id(); ?></p>
									<p>Message:</p>
									<p><?php echo $_comment->message(); ?></p>	
									<p><?php echo $_comment->date(); ?></p>	
								
								</div>
								
								<button class="comment-widget-section--delete-btn" attr="cid-<?php echo $_comment->id();?>" type="button" >Delete</button>
								
							</section>
							
						<?php  }?>
					</div>
					<?php $c++; ?>
				<?php  }?>
			</div>
		</div>
	<?php  }?>
	

</body>
</html>


























