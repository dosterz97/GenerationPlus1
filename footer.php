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
	<div class="hidden">
<?php printf( esc_html__( '%1$s by %2$s.', 'gen1' ), 'gen1', '<a  href="http://dosterz97.github.io" target="_blank" rel="designer">Zachary Doster</a>' ); ?>
	</div>
	<footer id="colophon" class="site-footer" role="contentinfo">
	<nav class="navbar navbar-default nomargin navbar-fixed-bottom" id="footeroverride">
        <div class="container-fluid nopadding">
          <div class="navbar-header">
          </div>
          <div id="footer_nav" class="navbar-collapse collapse">
			<span class="symbol" title="circletwitterbird"><?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu', 'menu_class' => 'footer_links container-fluid nav navbar-nav navbar-right' ) ); ?></span>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
     </nav>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
