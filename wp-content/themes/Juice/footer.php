<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Juice
 */
global $opt_settings;
?>

	</div><!-- #content -->

	<footer>
		<div class="footer" style="background: url(<?= $opt_settings['footer']['url']?>) no-repeat;background-size: cover;">
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-4">
						<span>
							<i class="fa fa-phone"></i>
							<p><?= $opt_settings['number'] ?></p>
						</span>
					</div>
					<div class="col-md-6">
						<span>
							<i class="fa fa-comment"></i>
							<p><?= $opt_settings['email'] ?></p>
						</span>
					</div>
				</div>
			</div>
			<div class="col-md-6"></div>
		</div>
	</footer> <!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
