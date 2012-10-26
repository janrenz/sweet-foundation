<?php
/*
 Template Name: Full Width
 */
?>
<?php get_header(); ?>
            
            <div id="content">
            
            <div class="row">
   <?php //get_sidebar(); ?>
    <!-- Main Blog Content -->
    <div class="twelve columns" role="content">

                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    
                        <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
                        
                                         
                            <section class="entry-content clearfix" itemprop="articleBody">
                                <?php the_content(); ?>
                            </section> <!-- end article section -->
                        
                            <footer class="article-footer">
            
                                <?php the_tags('<p class="tags"><span class="tags-title">Tags:</span> ', ', ', '</p>'); ?>
                            
                            </footer> <!-- end article footer -->
                            
                            <?php comments_template(); ?>
                    
                        </article> <!-- end article -->
                    
                        <?php endwhile; else : ?>
                    
                            <article id="post-not-found" class="hentry clearfix">
                                <header class="article-header">
                                    <h1><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
                                </header>
                                <section class="entry-content">
                                    <p><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
                                </section>
                                <footer class="article-footer">
                                    <p><?php _e("This is the error message in the page.php template.", "bonestheme"); ?></p>
                                </footer>
                            </article>
                    
                        <?php endif; ?>
            
                    </div> <!-- end #main -->
    
                 
                    
                </div> <!-- end #inner-content -->
    
            </div> <!-- end #content -->

<?php get_footer(); ?>