<footer class="footer" role="contentinfo">

	<div id="footer" class="full-width">
		<div class="row">
			<div class="four columns">
				<p class="source-org copyright">
					&copy; <?php echo date('Y'); ?>
					<?php bloginfo('name'); ?>.
				</p>
			</div>
			<div class="eight columns">
				<ul class="link-list right">
	<?php if ( is_active_sidebar( 'footer1' ) ) :
	?>

	<?php dynamic_sidebar('footer1'); ?>

	<?php else : ?>

	<!-- This content shows up if there are no widgets defined in the backend. -->

	<?php endif; ?>
				</ul>
			</div>
		</div>
	</div>
</footer>
<!-- end footer -->
<?php wp_footer(); ?>

</div> <!-- end #container -->

</body>

</html> <!-- end page. what a ride! -->