<?php 
/**
Template Name: About Us
*/ 
get_header();
global $post;
$post_slug = $post->post_name;  
?>
<section class="first-section-ab parallax" style="background-image: url(<?= $opt_settings['ab-bg']['url'] ?>);">
	<h1 class="title">  <?= $post->post_title ?> </h1>	
	<img class="wave" src="<?= $opt_settings['wavebg']['url'] ?>">
</section>
<section class="second-section-ab">
	<div class="container">
		<div class="row">
			<?php foreach ($opt_settings['ab-type'] as $key => $value) : $link = wp_get_attachment_url($value);?>
			<div class="col-md-3 type">
				<img class="ab-type" src="<?=$value['image']?>" alt="">
				<h4 class="ab-icon-title"> <?= $value['title'] ?> </h4>
				<p> <?= $value['description'] ?> </p>	
			</div>	
			<?php endforeach ?>
		</div>

		<div class="row smoothie-content">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12" style="padding: 0;">
					<img src="<?= $opt_settings['ab-smbg']['url'] ?>" width="550px" height="452px">
				</div>
				<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 smoothie-content-desc">
					<h1 class="smoothie-title">	<?= $opt_settings['ab-cont-title'] ?> </h1>
					<p> <?= $opt_settings['ab-cont-desc'] ?> </p>
					<a href="<?= get_site_url(null, '/contact');?>"> <button class="btn btn-default"> Contact Us </button> </a>
				</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer() ?>