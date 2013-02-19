<?php
/**
 * @package sf
 * @since sf 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="h2 entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'sf' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
	    <?php sf_posted_on(); ?>
	    <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
            <?php if (get_comments_number()>0) { ?><a href="<?php the_permalink(); ?>"<i class="icon-comment"></i></a><?php } ?>&nbsp;<span class="comments-link"><?php comments_popup_link( __( '', 'sf' ), __( '1 Comment', 'sf' ), __( '% Comments', 'sf' ) ); ?></span>
            <?php endif; ?>
		<?php endif; ?>
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
            <?php
                /* translators: used between list items, there is a space after the comma */
                $categories_list = get_the_category_list( __( ', ', 'sf' ) );
                if ( $categories_list && sf_categorized_blog() ) :
            ?>
            <span class="cat-links">
                <a href="#"><i class="icon-folder-close"></i></a>&nbsp;<?php printf( __( '%1$s', 'sf' ), $categories_list ); ?>
            </span>
            <?php endif; // End if categories ?>

            <?php
            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list( '', __( ', ', 'sf' ) );
            if ( $tags_list ) :
            ?>
            <span class="tags-links">
                <a href="#"><i class="icon-tags"></i></a>&nbsp;<?php printf( '%1$s ', $tags_list ); ?>
            </span>
            <?php endif; // End if $tags_list ?>
        <?php endif; // End if 'post' == get_post_type() ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'sf' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'sf' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'sf' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
