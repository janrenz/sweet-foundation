<?php get_header(); ?>

<div id="content">

	<div class="row">

		<div id="main"
			class="large-<?php echo ($sf_big_col);?> columns postswrapper" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php get_template_part( 'content', 'single' ); ?>
			<?php
			// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || '0' != get_comments_number() )
				comments_template( '', true );
			?>
			<?php endwhile; ?>
			<?php endif; ?>

		</div>
		<!-- end #main -->

		<?php get_sidebar(); ?>

	</div>
	<!-- end #inner-content -->

</div>
<!-- end #content -->

<?php get_footer(); ?>