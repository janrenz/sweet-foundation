<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Sweet_Foundation
 * @since Sweet Foundation 1.0
 */

get_header(); ?>
<div id="content">
	<div class="row">
    	<!-- Main Blog Content -->
    	<div class="<?php echo ($sf_big_col);?> columns" role="content">
			<div id="content" role="main">

			<?php if ( have_posts() ) : ?>
				
					<header class="page-header">
						<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'sweet-foundation' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
					</header>
					<div id="posts_wrapper">
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'searchresult', get_post_type() );
					?>

				<?php endwhile; ?>
				</div>
				<div id="pagenavigation_wrapper">
				        <?php if (function_exists('foundation_page_navi')) { ?>
					        <?php foundation_page_navi(); ?>
				        <?php } else { ?>
					        <nav class="wp-prev-next">
						        <ul class="clearfix">
							        <li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', "af")) ?></li>
							        <li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', "af")) ?></li>
						        </ul>
				    	    </nav>
				        <?php } ?>
				     </div>
			<?php else : ?>
					<article id="post-0" class="post no-results not-found">
						<header class="entry-header">
							<h1 class="entry-title"><?php _e( 'Nothing Found', 'sweet-foundation' ); ?></h1>
						</header><!-- .entry-header -->

						<div class="entry-content">
							<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'sweet-foundation' ); ?></p>
							<?php get_search_form(); ?>
						</div><!-- .entry-content -->
					</article><!-- #post-0 -->
			<?php endif; ?>

			</div> <!-- end #main --><!-- #content -->
</div> <!-- end #inner-content -->

    <div
    class="<?php echo ($sf_small_col);?> columns padding-top-ten sidebar" role="content">

                    <?php get_sidebar(); ?>
                </div>
</div> <!-- end #content -->
</div>
<?php get_footer(); ?>