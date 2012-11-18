<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package sf
 * @since sf 1.0
 */

get_header(); ?>
			
			<div id="content">
			
				<div class="row">
				
				    <div id="main" class="<?php echo ($sf_big_col);?> columns" role="main">
				
					    <?php if (is_category()) { ?>
						    <h1 class="archive-title h2">
							    <span><?php _e("Posts Categorized:", "bonestheme"); ?></span> <?php single_cat_title(); ?>
					    	</h1>
					    
					    <?php } elseif (is_tag()) { ?> 
						    <h1 class="archive-title h2">
							    <span><?php _e("Posts Tagged:", "bonestheme"); ?></span> <?php single_tag_title(); ?>
						    </h1>
					    
					    <?php } elseif (is_author()) { 
					    	global $post;
					    	$author_id = $post->post_author;
					    ?>
						    <h1 class="archive-title h2">

						    	<span><?php _e("Posts By:", "bonestheme"); ?></span> <?php echo get_the_author_meta('display_name', $author_id); ?>

						    </h1>
					    <?php } elseif (is_day()) { ?>
						    <h1 class="archive-title h2">
	    						<span><?php _e("Daily Archives:", "bonestheme"); ?></span> <?php the_time('l, F j, Y'); ?>
						    </h1>
		
		    			<?php } elseif (is_month()) { ?>
			    		    <h1 class="archive-title h2">
				    	    	<span><?php _e("Monthly Archives:", "bonestheme"); ?></span> <?php the_time('F Y'); ?>
					        </h1>
					
					    <?php } elseif (is_year()) { ?>
					        <h1 class="archive-title h2">
					    	    <span><?php _e("Yearly Archives:", "bonestheme"); ?></span> <?php the_time('Y'); ?>
					        </h1>
					    <?php } ?>
					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
						<div id="posts_wrapper">
					    <?php get_template_part( 'content', get_post_format() ); ?>
						</div>
					
					    <?php endwhile; ?>	
					
					        <?php if (function_exists('foundation_page_navi')) { ?>
						        <?php foundation_page_navi(); ?>
					        <?php } else { ?>
						        <nav class="wp-prev-next">
							        <ul class="clearfix">
								        <li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', "bonestheme")) ?></li>
								        <li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', "bonestheme")) ?></li>
							        </ul>
					    	    </nav>
					        <?php } ?>
						<?php else : ?>
						<?php get_template_part( 'no-results', 'archive' ); ?>
					
					    <?php endif; ?>
			
    				</div> <!-- end #main -->
    
                    <?php get_sidebar(); ?>
         
                
                </div> <!-- end #inner-content -->
                
			</div> <!-- end #content -->

<?php get_footer(); ?>