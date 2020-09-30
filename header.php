<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package besonders-brombach
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		body {
			visibility: hidden;
			transition: all 150ms;
			opacity: 0;
		}
	</style>
	
	<!--
	<script src="<?php echo includes_url(); ?>js/jquery/jquery.js"></script>

	<link rel="preload" as="style" href="<?php echo get_stylesheet_uri(); ?>">
	<link rel="preload" as="font" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800&display=swap">	
	-->
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
<h1>Is it connected???</h1>
	<header id="masthead" class="site-header subpage-header">
		<div class="site-navigation-wrapper" data-visibility="hidden">
			<div class="site-navigation-container">
				<div class="site-branding">
					<a href="<?php echo get_home_url(); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/img/test-logo.png" alt="">
					</a>
				</div>
			<?php the_site_navigation(); ?>
			</div>
		</div>
	</header><!-- #masthead -->
