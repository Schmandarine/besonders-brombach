<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package besonders-coi
 */

get_header();
?>

	<main id="primary" class="site-main container">
		<div class="row">
			<div class="col-lg-8">
			<?php
			while ( have_posts() ) :
				the_post(); ?>


				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">

						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

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

					</header><!-- .entry-header -->

					<?php besonders_coi_post_thumbnail(); ?>

					<div class="entry-content">
						<?php
						the_content();
						?>
					</div><!-- .entry-content -->


				</article>

				<?php the_post_navigation(
					array(
						'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Vorheriger Beitrag:', 'besonders-coi' ) . '</span> <span class="nav-title">%title</span>',
						'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Nächster Beiträg:', 'besonders-coi' ) . '</span> <span class="nav-title">%title</span>',
					)
				);

			endwhile; // End of the loop.
			?>
			</div>
			<div class="col-lg-4">
				<div class="singe_post_sidebar bg-light p-3 d-none d-lg-block">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</main><!-- #main -->

<?php
get_footer();
