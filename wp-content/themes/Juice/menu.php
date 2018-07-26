<?php 
/**
Template Name: Menu
*/ 
get_header();
?>
<section class="first-section-menu parallax-window" style="background-image: url(<?= $opt_settings['menu-bg']['url'] ?>); background-size: cover;background-position: 50% 0;">
	<h1 class="title">  <?= $post->post_title ?> </h1>	
	<img class="wave" src="<?= $opt_settings['wavebg']['url'] ?>">
</section>
<section class="list-menu">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<img class="title-menu" src="<?=$opt_settings['menu-list-title-1']['url']?>" alt="Menu">
				<div class="page-menu-list">
					<?php foreach ($opt_settings['menu-list-1'] as $key => $value): ?>
					<div class="qode-apl-item">
						<div class="qode-apl-item-top">
							<h4 class="qode-apl-item-title" style="color:#343434"> <?= $value['title'] ?> </h4>
							<div class="qode-apl-line" style="border-style:dotted;border-color:#343434" ></div>
							<h4 class="qode-apl-item-price" style="color:#343434"> $<?= $value['url'] ?> </h4>
						</div>
						<div class="qode-apl-item-bottom">
							<div class="qode-apl-item-description" style="color:#343434"> <?= $value['description'] ?> </div>
						</div>
					</div>
					<?php endforeach ?>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<img class="title-menu" src="<?=$opt_settings['menu-list-title-2']['url']?>" alt="Menu">
				<div class="page-menu-list">
					<?php foreach ($opt_settings['menu-list-2'] as $key => $value): ?>
					<div class="qode-apl-item">
						<div class="qode-apl-item-top">
							<h4 class="qode-apl-item-title" style="color:#343434"> <?= $value['title'] ?> </h4>
							<div class="qode-apl-line" style="border-style:dotted;border-color:#343434" ></div>
							<h4 class="qode-apl-item-price" style="color:#343434"> $<?= $value['url'] ?> </h4>
						</div>
						<div class="qode-apl-item-bottom">
							<div class="qode-apl-item-description" style="color:#343434"> <?= $value['description'] ?> </div>
						</div>
					</div>
					<?php endforeach ?>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<img class="title-menu" src="<?=$opt_settings['menu-list-title-3']['url']?>" alt="Menu">
				<div class="page-menu-list">
					<?php foreach ($opt_settings['menu-list-3'] as $key => $value): ?>
					<div class="qode-apl-item">
						<div class="qode-apl-item-top">
							<h4 class="qode-apl-item-title" style="color:#343434"> <?= $value['title'] ?> </h4>
							<div class="qode-apl-line" style="border-style:dotted;border-color:#343434" ></div>
							<h4 class="qode-apl-item-price" style="color:#343434"> $<?= $value['url'] ?> </h4>
						</div>
						<div class="qode-apl-item-bottom">
							<div class="qode-apl-item-description" style="color:#343434"> <?= $value['description'] ?> </div>
						</div>
					</div>
					<?php endforeach ?>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<img class="title-menu" src="<?=$opt_settings['menu-list-title-4']['url']?>" alt="Menu">
				<div class="page-menu-list">
					<?php foreach ($opt_settings['menu-list-4'] as $key => $value): ?>
					<div class="qode-apl-item">
						<div class="qode-apl-item-top">
							<h4 class="qode-apl-item-title" style="color:#343434"> <?= $value['title'] ?> </h4>
							<div class="qode-apl-line" style="border-style:dotted;border-color:#343434" ></div>
							<h4 class="qode-apl-item-price" style="color:#343434"> $<?= $value['url'] ?> </h4>
						</div>
						<div class="qode-apl-item-bottom">
							<div class="qode-apl-item-description" style="color:#343434"> <?= $value['description'] ?> </div>
						</div>
					</div>
					<?php endforeach ?>
				</div>
			</div>
			
		</div>
	</div>
</section>
<?php get_footer() ?>