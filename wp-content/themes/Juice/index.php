<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Juice
 */

get_header();
?>

	<section class="first-section parallax-window" data-parallax="scroll" data-image-src="<?= $opt_settings['homebg']['url'] ?>">
	<!-- <section class="first-section parallax-window" style="background-image: url('');"> -->
		<img class="title-web" src="<?=$opt_settings['webtitle']['url']?>" alt="Smoothie">
		<img class="wave" src="<?=$opt_settings['wavebg']['url']?>" alt="">
	</section>

	<section class="second-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<img class="smoothie" src="<?=$opt_settings['juice-bg']['url']?>" alt="">
				</div>
				<div class="col-md-6">
					<ul style="list-style: none;">
						<li>
							<div class="row">
								<div class="col-lg-4">
									<img src="<?=$opt_settings['img-desc1']['url']?>" alt="">
								</div>
								<div class="col-lg-8 desc">
									<h4 class="icon-title"> <?= $opt_settings['title-desc1'] ?> </h4>
									<p> <?= $opt_settings['desc1'] ?> </p>
								</div>
							</div>
						</li>
						<li>
							<div class="row">
								<div class="col-lg-4">
									<img src="<?=$opt_settings['img-desc2']['url']?>" alt="">
								</div>
								<div class="col-lg-8 desc">
									<h4 class="icon-title"> <?= $opt_settings['title-desc2'] ?> </h4>
									<p> <?= $opt_settings['desc2'] ?> </p>
								</div>
							</div>
						</li>
						<li>
							<div class="row">
								<div class="col-lg-4">
									<img src="<?=$opt_settings['img-desc3']['url']?>" alt="">
								</div>
								<div class="col-lg-8 desc">
									<h4 class="icon-title"> <?= $opt_settings['title-desc3'] ?> </h4>
									<p> <?= $opt_settings['desc3'] ?> </p>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>

			<div class="row">
				<div class="text-center">
					<img src="<?= $opt_settings['small-ico']['url'] ?>" alt="">
					<h2 class="title"> <?= $opt_settings['title-menu'] ?> </h2>
					<h5> <?= $opt_settings['subtitle-menu'] ?> </h5>
				</div>
				<div class="menu owl-carousel owl-theme">
					<?php 
						$id = explode(",", $opt_settings['best-menu']);
						foreach ($id as $key => $value) {
							$link = wp_get_attachment_url($value);
							echo "
								<div class='smoothiebg'>
									<img src='$link'>
								</div>
							";
						}
					?>
				</div>
			</div>
		</div>
	</section>
	<section class="third-section parallax-window" data-parallax="scroll" data-image-src="<?= $opt_settings['menubg']['url'] ?>">
	<!-- <section class="third-section parallax-window" style="background-image: url('');"> -->
		<img src="<?=$opt_settings['wavedownbg']['url']?>" alt="">
		<img class="title-menu" src="<?=$opt_settings['menutitle']['url']?>" alt="Menu">
		<div class="menu-list">
				<?php foreach ($opt_settings['menu'] as $key => $value): ?>
				<div class="qode-apl-item">
					<div class="qode-apl-item-top">
						<h4 class="qode-apl-item-title" style="color:#ffffff"> <?= $value['title'] ?> </h4>
						<div class="qode-apl-line" style="border-style:dotted;border-color:#ffffff" ></div>
						<h4 class="qode-apl-item-price" style="color:#ffffff"> $<?= $value['url'] ?> </h4>
					</div>
					<div class="qode-apl-item-bottom">
						<div class="qode-apl-item-description" style="color:#ffffff"> <?= $value['description'] ?> </div>
					</div>
				</div>
			<?php endforeach ?>
		</div>
		<img class="wave" src="<?=$opt_settings['wavebg']['url']?>" alt="">
	</section>
	<section class="fourth-section" style="background-image: url(<?= $opt_settings['taste-bg']['url']?>); background-size: cover;background-position: center center">
		<div class="container">
			<div class="row">
				<div class="text-center">
					<img src="<?= $opt_settings['small-ico']['url'] ?>" alt="">
						<h2 class="title"> <?= $opt_settings['taste-title'] ?> </h2>
						<h5> <?= $opt_settings['taste-subtitle'] ?> </h5>
				</div>
			</div>
			<div class="" style="padding-top: 20px;"> 
				<div class="row wrapper-taste" data-masonry='{ "itemSelector": ".block", "columnWidth": ".block" }'>
					<?php 
					$id = explode(",", /*$string*/ $opt_settings['taste-gallery']);
					foreach ($id as $key => $value) {
						$link = wp_get_attachment_url($value);
						print "<div class='block col-md-4'> <img src='$link' > </div>";
					}
					?>	
				</div>
			</div>
		</div>
	</section>
	
<?php
//get_sidebar();
get_footer();
