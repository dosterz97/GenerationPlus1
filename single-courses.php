<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package gen+1
 */

get_header(); 
	$image = get_field('course_image');
	if( !empty($image) ): ?>
	<div class="slide" style="background-image: url(<?php echo $image['url']; ?>">
	<?php endif; ?>
	<div id="primary" class="project-content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();
		?>	
		<div class="container project-background"/>
			<article class="project-border" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="project-entry-header">
					<?php 
					if ( is_single() ) :
						the_title( '<h1 class="project-entry-title">', '</h1>');
						
					else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;
			
					if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php gen1_posted_on(); ?>
					</div><!-- .entry-meta -->
					<?php
					endif; ?>
				</header><!-- .entry-header -->
			
				<div class="project-entry-content">
					<?php
						the_content( sprintf(
							/* translators: %s: Name of current post. */
							wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'gen1' ), array( 'span' => array( 'class' => array() ) ) ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
						) );
			
						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gen1' ),
							'after'  => '</div>',
						) );
					?>
				</div><!-- .entry-content -->
			
				<footer class="entry-footer">
					<?php gen1_entry_footer(); ?>
				</footer><!-- .entry-footer -->
			</article><!-- #post-## -->
		<?php

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php if(!empty($image) ):?> 
		</div>
		<?php endif; ?>
<?php
get_footer();
