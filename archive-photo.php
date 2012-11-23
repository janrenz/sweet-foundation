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

<section id="primary"
	class="content-area">
	<div id="content" class="site-content" role="main">
		<div class="row">

			<div id="main" class="twelve columns" role="main">
                <?php
                if ( is_active_sidebar('top') ) {
                    // Display some text
                    echo('<div class="row"><div class="twelve columns">');
                    get_sidebar('top');
                    echo('</div></div>');
                } else {
                    // Display none
                };
                ?>
				<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<div id="posts_wrapper">
                         <img src="<?php 
                         get_field('photo');
                         ?>"></img>
				</div>
				<script type="javascript">
				    
    			 var $container  = $('#posts_wrapper'),
                        $imgs       = $container.find('img').hide(),
                        totalImgs   = $imgs.length,
                        cnt         = 0;
                    
                    $imgs.each(function(i) {
                        var $img    = $(this);
                        $('<img/>').load(function() {
                            ++cnt;
                            if( cnt === totalImgs ) {
                                $imgs.show();
                                $container.montage({
                                    fillLastRow             : true,
                                    alternateHeight         : true,
                                    alternateHeightRange    : {
                                        min : 90,
                                        max : 240
                                    }
                                });
                      
                            }
                        }).attr('src',$img.attr('src'));
                    }); 
				</script>
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