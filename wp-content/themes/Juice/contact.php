<?php  
/**
Template Name: Contact
*/ 
get_header();
?>
<section>
	<?= $opt_settings['gm'] ?>
</section>
<section>
	<div class="container">
		<div class="row contact-content">
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 contact-form">
				<?= do_shortcode('[contact-form-7 id="10" title="Contact form 1"]') ?>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<h1 class="contact-title"><?= $opt_settings['c-title'] ?></h1>
				<p class="contact-desc"> <?= $opt_settings['c-desc'] ?> </p>
				<ul class="c-list">
					<li> <a> <i class="fa fa-facebook"></i>	<?= $opt_settings['c-email']  ?> </a> </li>
					<li> <a> <i class="fa fa-facebook"></i> <?= $opt_settings['c-phone']  ?> </a> </li>
					<li> <a> <i class="fa fa-facebook"></i> <?= $opt_settings['c-resume'] ?> </a> </li>
				</ul>
			</div>
		</div>
	</div>
</section>
<?php get_footer() ?>