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
    <div  class="site-content" role="main">
        <div class="row">

            <div id="main" class="large-12 columns" role="main">
                <?php
                if ( is_active_sidebar('top') ) {
                    // Display some text
                    echo('<div class="row"><div class="large-12 columns">');
                    get_sidebar('top');
                    echo('</div></div>');
                } else {
                    // Display none
                };
                ?>
                <?php if ( have_posts() ) : ?>
                
                <div id="posts_wrapper" class="am-container sf-gallery ">
                   
                <?php /* Start the Loop */ ?>
                 <?php while ( have_posts() ) : the_post(); ?>
                        <?php 
                         $img = get_field('bild');
                         $img = wp_get_attachment_image_src( $img['id'], 'medium' ); 
                         ?>
                          <a href="#"><img data-width="<?php echo($img[1]);?>" data-height="<?php echo($img[2]);?>" src="<?php echo($img[0]);?>"></img></a>
                      <a href="#"><img data-width="<?php echo($img[1]);?>" data-height="<?php echo($img[2]);?>" src="<?php echo($img[0]);?>"></img></a>
                          
                        
               <?php  endwhile; ?>
                    
                </div>
                
                <script type="text/javascript">
             jQuery(function($) {
        
                var $container  = $('#posts_wrapper'),
                    $imgs       = $container.find('img').show(),
                    totalImgs   = $imgs.length,
                    cnt         = 0;
                
                $imgs.each(function(i) {
                    var $img    = $(this);
                    jQuery('<img/>').load(function() {
                        ++cnt;
                        if( cnt === totalImgs ) {
                            $imgs.show();
                            
                            $container.montage({
                               maxh:200,
                                margin: 0
                            });
                        }
                    }).attr('src',$img.attr('src'));
                }); 
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
            <!-- #content .site-content -->
        </div>
    </div>
    <!-- #primary .content-area -->

    
</section>
<?php get_footer(); ?>