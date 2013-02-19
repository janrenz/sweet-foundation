<?php
GLOBAL $sf_small_col;
?>
<div
	class="<?php echo ($sf_small_col);?> columns sidebar"
	role="content">

	<?php if ( is_active_sidebar( 'sidebar1' ) ) :
	?>

	<?php dynamic_sidebar('sidebar1'); ?>

	<?php else : ?>

	<!-- This content shows up if there are no widgets defined in the backend. -->

	<?php endif; ?>
</div>

