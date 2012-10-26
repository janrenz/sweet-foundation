<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
    <header class="article-header">
	
	    <h3 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
	
	    <p class="byline vcard"><?php _e("Posted", "bonestheme"); ?> <time class="updated" datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('F jS, Y'); ?></time> <?php _e("by", "bonestheme"); ?> <span class="author"><?php the_author_posts_link(); ?></span> <span class="amp">&</span> <?php _e("filed under", "bonestheme"); ?> <?php the_category(', '); ?>.</p>

    </header> <!-- end article header -->

    <section class="entry-content clearfix">

	    <?php the_post_thumbnail( 'bones-thumb-300' ); ?>

	    <?php the_excerpt(); ?>

    </section> <!-- end article section -->

    <footer class="article-footer">
	
    </footer> <!-- end article footer -->

</article> <!-- end article -->