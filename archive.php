<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package sf
 * @since sf 1.0
 */

get_header();?>

<section id="primary"
	class="content-area">
	<div id="content" class="site-content" role="main">
		<div class="row">

			<div id="main" class="large-<?php echo ($sf_big_col);?> columns" role="main">
                <?php
                if ( is_active_sidebar('top') ) {
                    // Display some text
                    echo('<div class="row"><div class="large-12 columns">');
                    get_sidebar();
                    echo('</div></div>');
                } else {
                    // Display none
                };
                ?>
				<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title">
						<?php
						if ( is_category() ) {
							printf( __( 'Category Archives: %s', 'sf' ), '<span>' . single_cat_title( '', false ) . '</span>' );

						} elseif ( is_tag() ) {
							printf( __( 'Tag Archives: %s', 'sf' ), '<span>' . single_tag_title( '', false ) . '</span>' );

						} elseif ( is_author() ) {
							/* Queue the first post, that way we know
							 * what author we're dealing with (if that is the case).
							*/
							the_post();
							printf( __( 'Author Archives: %s', 'sf' ), '<span class="vcard"><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
							/* Since we called the_post() above, we need to
							 * rewind the loop back to the beginning that way
							* we can run the loop properly, in full.
							*/
							rewind_posts();

						} elseif ( is_day() ) {
							printf( __( 'Daily Archives: %s', 'sf' ), '<span>' . get_the_date() . '</span>' );

						} elseif ( is_month() ) {
							printf( __( 'Monthly Archives: %s', 'sf' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

						} elseif ( is_year() ) {
							printf( __( 'Yearly Archives: %s', 'sf' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

						} else {
							_e( 'Archives', 'sf' );

						}
						?>
					</h1>
					<?php
					if ( is_category() ) {
						// show an optional category description
						$category_description = category_description();
						if ( ! empty( $category_description ) )
							echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );

					} elseif ( is_tag() ) {
						// show an optional tag description
						$tag_description = tag_description();
						if ( ! empty( $tag_description ) )
							echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
					}
					?>
				</header>
				<!-- .page-header -->

				<?php //sf_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<div id="posts_wrapper">
				<?php while ( have_posts() ) : the_post(); 
				/* Include the Post-Format-specific template for the content.
				 * If you want to overload this in a child theme then include a file
				* called content-___.php (where ___ is the Post Format name) and that will be used instead.
				*/
				if (get_post_type() != 'post'){
				    //this is a cpt
				    get_template_part( 'content', get_post_type() );
				}else{
    				get_template_part( 'content', get_post_format() );
				}
				endwhile; ?>
				</div>
				<?php //sf_content_nav( 'nav-below' ); ?>

				<?php else : ?>

				<?php get_template_part( 'no-results', 'archive' ); ?>

				<?php endif; ?>
				<div id="pagenavigation_wrapper">
				<?php if (function_exists('foundation_page_navi')) { ?>
				<?php foundation_page_navi(); ?>
				<?php } else { ?>
				<nav class="wp-prev-next">
					<ul class="clearfix">
						<li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', "sf")) ?>
						</li>
						<li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', "sf")) ?>
						</li>
					</ul>
				</nav>
				<?php } ?>
				</div>
			</div>
			<?php get_sidebar(); ?>
			<!-- #content .site-content -->
		</div>
	</div>
	<!-- #primary .content-area -->

	
</section>
<?php get_footer(); ?>