<?php
/**
 * @package sf
 * @since sf 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
			<?php sf_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'sf' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'sf' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'sf' ) );

			if ( ! sf_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = '<a href="#"><i class="icon-tags"></i></a>&nbsp; %2$s. <a href="%3$s"><i class="icon-link"></i></a>&nbsp;<a href="%3$s" title="'.__("Permalink to", "sf"). ' %4$s" rel="bookmark">'.__("permalink", "sf").'</a>' ;
				} else {
					$meta_text = '<a href="%3$s"><i class="icon-link"></i></a>&nbsp;<a href="%3$s" title="'.__("Permalink to", "sf"). ' %4$s" rel="bookmark">'.__("permalink", "sf").'</a>';
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = '<a href="#"><i class="icon-folder-close"></i></a>&nbsp;%1$s <a href="#"><i class="icon-tags"></i></a>&nbsp; %2$s. <a href="%3$s"><i class="icon-link"></i></a>&nbsp;<a href="%3$s" title="'.__("Permalink to", "sf"). ' %4$s" rel="bookmark">'.__("permalink", "sf").'</a>';
				} else {
					$meta_text = '<a href="#"><i class="icon-folder-close"></i></a>&nbsp;%1$s. <a href="%3$s"><i class="icon-link"></i></a>&nbsp;<a href="%3$s" title="'.__("Permalink to", "sf"). ' %4$s" rel="bookmark">'.__("permalink", "sf").'</a>';
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink(),
				the_title_attribute( 'echo=0' )
			);
		?>

		<?php edit_post_link( __( 'Edit', 'sf' ), '<span class="edit-link"><a href="'.get_edit_post_link().'"><i class="icon-edit"></i></a>&nbsp;', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
