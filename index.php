<?php get_header(); ?>
			
			<div id="content">
			
			         <div class="row">

    <!-- Main Blog Content -->
    <div class="<?php echo ($sf_big_col);?> columns" role="content">

				    <div id="main" class="eightcol first clearfix" role="main">
						<div id="posts_wrapper">
					    <?php if (have_posts()) : while (have_posts()) : the_post();
					
						    get_template_part( 'content', get_post_format() );
						
						    endwhile; ?>	
							</div>
							<div id="pagenavigation_wrapper">
						        <?php if (function_exists('foundation_page_navi')) { ?>
						            <?php foundation_page_navi(); ?>
						        <?php } else { ?>
						            <nav class="wp-prev-next">
						                <ul class="clearfix">
						        	        <li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', "sf")) ?></li>
						        	        <li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', "sf")) ?></li>
						                </ul>
						            </nav>
						        <?php } ?>		
							</div>
							<?php else : ?>

							<?php get_template_part( 'no-results', 'index' ); ?>
						    <?php endif; ?>
			
		   				 </div> 
				    </div> <!-- end #main -->
				    <?php get_sidebar(); ?>
				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>
