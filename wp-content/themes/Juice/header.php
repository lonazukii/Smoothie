<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Juice
 */
global $opt_settings;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Poppins|Quicksand" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php //body_class(); ?>>
<!-- <div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'Juice' ); ?></a> -->
<?php if (is_front_page()): ?>
	<nav class="navbar navbar-light navbar-expand-lg fixed-top navbar-default menu-top">
        <a class="navbar-brand" href="<?= home_url() ?>">
            <img src="<?php echo $opt_settings['llogo']['url'] ?>" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" 
        		aria-controls="navbart" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		</button>

        <div class="collapse navbar-collapse" id="navbar">
            <?php            
                wp_nav_menu( 
                    array(
                        'theme_location' => 'menu-1',
                        'container' => 'ul',
                        'menu_class' => '',
                        'menu_id' => 'primary-menu',
                    )
                );
            ?>
        </div>
        
        <!-- <div id="sm">
        	<div class="row">
        		<div class="col-md-6" style="display: -webkit-inline-block;">
        			<ul class="social-media">
        				<li> <a href=""> A </a> </li>
        				<li> <a href=""> B </a> </li>
        				<li> <a href=""> C </a> </li>
        			</ul>
        		</div>
        		
        	</div>
        </div> -->
	</nav>
	<?php endif ?>
<?php if (!is_front_page()): ?>	
	<nav class="navbar navbar-dark navbar-expand-lg fixed-top navbar-default menu-top">
        <a class="navbar-brand" href="<?= home_url() ?>">
            <img src="<?php echo $opt_settings['dlogo']['url'] ?>" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" 
        		aria-controls="navbart" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		</button>

        <div class="collapse navbar-collapse" id="navbar">
            <?php            
                wp_nav_menu( 
                    array(
                        'theme_location' => 'menu-1',
                        'container' => 'ul',
                        'menu_class' => '',
                        'menu_id' => 'primary-menu',
                    )
                );
            ?>
        </div>
        
        <!-- <div id="sm">
        	<div class="row">
        		<div class="col-md-6" style="display: -webkit-inline-block;">
        			<ul class="social-media">
        				<li> <a href=""> A </a> </li>
        				<li> <a href=""> B </a> </li>
        				<li> <a href=""> C </a> </li>
        			</ul>
        		</div>
        		
        	</div>
        </div> -->
	</nav>
<?php endif ?>
	<div id="content" class="site-content">
