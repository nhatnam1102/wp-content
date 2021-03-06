<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Total
 * @since Total 1.0
 */

// Get site header
get_header(); ?>
	
	<?php
	// Display the page header - see functions/page-header.php
	wpex_page_header(); ?>
	
	<?php
	// Displays full-width slider, see functions/post-slider.php
	wpex_post_slider(); ?>
    
	<div id="content-wrap" class="container clr <?php echo wpex_get_post_layout_class(); ?>">
		<section id="primary" class="content-area clr">
			<div id="content" class="clr site-content" role="main">
				<?php while ( have_posts() ) : the_post(); ?>
					<article class="clr">
						<?php
						// Display featured image if one has been set
						if ( has_post_thumbnail() ) { ?>
							<div id="page-featured-img" class="clr">
								<?php the_post_thumbnail(); ?>
							</div><!-- #page-featured-img -->
						<?php } ?>
						<div class="entry-content entry clr">
							<?php the_content(); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-links clr">', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
						</div><!-- .entry-content -->
						<?php
						// Display social sharing links
						// See functions/social-share.php
						wpex_social_share(); ?>
					</article><!-- #post -->
					<?php
					// Display comments template if enabled in the admin
					if ( wpex_option( 'page_comments', '0' ) == '1' ) {
						comments_template();
					} ?>
				<?php endwhile; ?>
			</div><!-- #content -->
		</section><!-- #primary -->
		<?php
		// Get sidebar if needed
		get_sidebar(); ?>
	</div><!-- #content-wrap -->

<?php
// Get site footer
get_footer(); ?>