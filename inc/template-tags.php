<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package besonders-brombach
 */

if ( ! function_exists( 'besonders_brombach_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function besonders_brombach_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( '%s', 'post date', 'besonders-brombach' ),
			'<span>' . $time_string . '</span>'
		);

		echo '<div class="posted-on">' . $posted_on . '</div>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'besonders_brombach_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function besonders_brombach_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'besonders-brombach' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'besonders_brombach_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function besonders_brombach_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'besonders-brombach' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'besonders-brombach' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'besonders-brombach' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'besonders-brombach' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'besonders-brombach' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'besonders-brombach' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;


if ( ! function_exists( 'besonders_brombach_post_categorys' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function besonders_brombach_post_categorys() {

			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'besonders-brombach' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'besonders-brombach' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

	}
endif;


if ( ! function_exists( 'besonders_brombach_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function besonders_brombach_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;



if ( ! function_exists( 'the_site_navigation' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function the_site_navigation() { ?>

		<div class="button-wrapper menu-toggle"><!-- Hamburger Menu -->
			<span id="button-text">menu</span>
			<button class="hamburger hamburger--3dx" type="button">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</button>
		</div>

		<nav id="site-navigation" class="main-navigation">
			
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'site_navigation_menu',
					'menu_class'	=> ''
				)
			);
			?>
		</nav><!-- #site-navigation -->

			<script>
				jQuery(document).ready(function() {
					console.log("site-navigation init");

					var item_with_child = jQuery('.menu-item-has-children > a');
					var site_navi_wrapper = jQuery('.site-navigation-wrapper');
					var sub_menu_wrapper = jQuery(".site-navigation-sub-wrapper");
									

					item_with_child.click(function(e){

						var clicked_item = jQuery(this);
						var rel_sub_menu = jQuery(this).parent().find('.sub-menu');
						var sub_menu_height = rel_sub_menu.height();

						e.preventDefault();
						console.log("Link has Submenu");

						if (site_navi_wrapper.attr('data-visibility') == 'hidden')
							{
								console.log("show the submenu");
								// Show the Submenu
								site_navi_wrapper.attr('data-visibility', 'visible');
								sub_menu_wrapper.animate({
									'height': sub_menu_height,
								} , 80);	

								rel_sub_menu.addClass("active");
								clicked_item.addClass("active");

							} else {

								if( clicked_item.is(".active") ){

									console.log("hide the submenu");
									// Hide the Submenus
									site_navi_wrapper.attr('data-visibility', 'hidden');
									sub_menu_wrapper.animate({
										'height': '0',
									} ,250);	
									rel_sub_menu.removeClass("active");
									clicked_item.removeClass("active");


								} else {

									console.log("update the submenu height");
									// Update the Submenu
									site_navi_wrapper.attr('data-visibility', 'visible');
									sub_menu_wrapper.animate({
										'height': sub_menu_height,
									} ,100);	

									jQuery('.sub-menu').removeClass("active");
									jQuery('.menu-item-has-children > a').removeClass("active");

									rel_sub_menu.addClass("active");
									clicked_item.addClass("active");

								}
							
						}
					})

					jQuery(".site-main, .hero-wrapper").on('click',function(){
						console.log("body document"+jQuery(this));

							// Hide the Submenus
							site_navi_wrapper.attr('data-visibility', 'hidden');
							sub_menu_wrapper.animate({
								'height': '0',
							} ,250);	
							jQuery('.sub-menu').removeClass("active");
							jQuery('.menu-item-has-children > a').removeClass("active");
							

					})

				});

				var toggle_button = document.querySelector('.menu-toggle');
				var main_navigation = document.querySelector('.main-navigation');

				toggle_button.onclick = function() {
					main_navigation.classList.toggle('active');
				}

				var btn_span = jQuery('#button-text');
				var btn_wrapper = jQuery('.button-wrapper');
				var video_wrapper = jQuery('.video-wrapper');
				var hamburger = jQuery('.button-wrapper button');

				btn_wrapper.on('click', function() {

					if(btn_span.is('.active')) {
					btn_span.removeClass('active');
					hamburger.removeClass('is-active');
					btn_span.text("menu");

					} else {
					btn_span.addClass('active');
					hamburger.addClass('is-active');
					btn_span.text("schließen");
					}

				})


			</script>

	<?php }
endif;