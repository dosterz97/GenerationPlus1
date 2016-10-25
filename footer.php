<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gen+1
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
		
			<span class="sep"> </span>
			<?php printf( esc_html__( '%1$s by %2$s.', 'gen1' ), 'gen1', '<a href="http://dosterz97.github.io" rel="designer">Zachary Doster</a>' ); ?>
		</div><!-- .site-info -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
