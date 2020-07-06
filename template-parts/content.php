<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package besonders-coi
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		?>
	</header><!-- .entry-header -->
	<div class="d-flex pb-1">
		<?php 
		printf( __( '%s', 'textdomain' ), get_the_date() );
		echo " <div class=\"px-1\">|</div> "; 
			echo "<div class=\"posted-in\">";
			$post_categories = wp_get_post_categories( get_the_ID() );
			$cats = array();
				
			foreach($post_categories as $c){
				$cat = get_category( $c );
				array_push($cats, $cat->name );
			}
			echo implode(", ", array_values($cats));
			echo "</div>";
		?>
		</div><!-- .entry-meta -->
	<?php besonders_coi_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_excerpt();
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<a href="<?php echo get_permalink(); ?>" class="btn btn-primary">weiterlesen</a>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
