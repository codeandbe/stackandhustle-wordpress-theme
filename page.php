<?php
/**
 * Default Page Template
 *
 * Works with most classic (PHP-based) themes.
 * Place in your theme root as page.php
 */

get_header(); ?>

<main id="primary" class="site-main" role="main">

	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="https://schema.org/WebPage">
				<header class="entry-header">
					<h1 class="entry-title" itemprop="headline"><?php the_title(); ?></h1>

					<?php if ( has_post_thumbnail() ) : ?>
						<figure class="entry-thumbnail">
							<?php
							// Use a sensible size; theme can filter this.
							the_post_thumbnail( apply_filters( 'page_template_thumbnail_size', 'large' ), [
								'itemprop' => 'image',
								'loading'  => 'lazy',
							] );
							?>
						</figure>
					<?php endif; ?>
				</header>

				<div class="entry-content" itemprop="mainEntityOfPage">
					<?php
					the_content();

					// Support for paginated content via <!--nextpage-->
					wp_link_pages( array(
						'before' => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'textdomain' ) . '">',
						'after'  => '</nav>',
						'link_before' => '<span class="page-number">',
						'link_after'  => '</span>',
					) );
					?>
				</div>


			</article>

			<?php
	
		endwhile;
	else :
		?>


	<?php endif; ?>
</main>

<?php
// Optional sidebar: only outputs if the theme declares one.
if ( function_exists( 'is_active_sidebar' ) && ( is_active_sidebar( 'sidebar-1' ) || has_action( 'get_sidebar' ) ) ) {
	get_sidebar();
}

get_footer();
