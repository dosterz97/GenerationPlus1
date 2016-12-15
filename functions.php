<?php
/**
 * gen+1 functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gen+1
 */

if ( ! function_exists( 'gen1_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function gen1_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on gen+1, use a find and replace
	 * to change 'gen1' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'gen1', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'gen1' ),
		'footer' => esc_html__('Footer','gen1')
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'gen1_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'gen1_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gen1_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'gen1_content_width', 640 );
}
add_action( 'after_setup_theme', 'gen1_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gen1_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'gen1' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'gen1' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'gen1_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function gen1_scripts() {
	wp_enqueue_style( 'gen1-style', get_stylesheet_uri() );
	
	
	wp_enqueue_script( 'gen1-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'gen1-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gen1_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';












/**********My Stuff**********/
function create_post_type() {
	register_post_type( 'projects',
		array(
			'labels' => array(
				'name' => __( 'Projects' ),
				'singular_name' => __( 'Projects' )
			),
		'public' => true,
		'has_archive' => false,
		'supports' => array( 'title', 'editor','custom-fields', 'thumbnail', 'page-attributes'),
		'menu_position' => 5,
		'hierarchical' => true,
		)
	);
	
	register_post_type( 'courses',
		array(
			'labels' => array(
				'name' => __( 'Courses' ),
				'singular_name' => __( 'Course' )
			),
		'public' => true,
		'has_archive' => false,
		'supports' => array( 'title', 'editor','custom-fields', 'thumbnail', 'page-attributes'),
		'menu_position' => 5,
		'hierarchical' => true,
		)
	);
}
add_action( 'init', 'create_post_type' );

function bootstrapScripts() {
	wp_enqueue_style('bootstrapcssmin', get_bloginfo('stylesheet_directory') . '/bootstrap/css/bootstrap.min.css');
	wp_enqueue_style('bootstrapthememin', get_bloginfo('stylesheet_directory') . '/bootstrap/css/bootstrap-theme.min.css');
	wp_enqueue_script('projectDropdown', get_bloginfo('stylesheet_directory'). '/js/projectDropdown.js',array('jquery'),'',true);
	wp_enqueue_script('bootstrapjsmain_footer', get_bloginfo('stylesheet_directory') . '/bootstrap/js/bootstrap.min.js',array('jquery'),'v3',true);
	//my javascript file
	
	
	//load the raleway font
	wp_enqueue_style('gen1-google-fonts', 'https://fonts.googleapis.com/css?family=Raleway|Yellowtail');
	//load the yellowtail font
	//load the local mono social icons font
	wp_enqueue_style('gen1-local-fonts', get_bloginfo('stylesheet_directory') . '/fonts/monosocialicons/monosocialiconsfont.css');	
}

add_action( 'wp_enqueue_scripts', 'bootstrapScripts',0 );



function templateStuff(){
	// check if the flexible content field has rows of data
	if( have_rows('element_creator') ):
	
		// loop through the rows of data
		while ( have_rows('element_creator') ) : the_row();
	
			// check current row layout
			//////////////////////////////////
			//Header Picture
			//////////////////////////////////
			if( get_row_layout() == 'header_picture' ):
				echo '<div class="header_picture container-fluid nopadding">';
				
					echo '<div class="col-xs-12">';
						// display a sub field valued
						$image = get_sub_field('image');
						if( !empty($image) ): ?>
						<div class="slide" style="background-image: url(<?php echo $image['url']; ?>">
						<div class="image_text">
							<?php 
							echo '<div class="image_title">';	
							echo get_sub_field('image_text');
							echo '</div>';	
							echo '<div class="image_subtext">';						
							echo get_sub_field('image_subtext');
							echo '</div>';
							
							echo '<div class="container-fluid button_text">';
							echo '<a href="'.get_sub_field('header_button').'" class="btn btn-primary">'.get_sub_field('button_text').'</a>';
							echo '</div>';
							?>
						</div>
						</div>
						<?php endif;
						
						
						
					echo '</div>';
								
				echo '</div>';
			//////////////////////////////////
			//Glyphicons
			//////////////////////////////////
			elseif( get_row_layout() == 'glyphicon_area' ):
				
				echo '<div class="glyphiconarea">';//Give styles to the glyphicon area
				
				echo '<div class="container">';
				
				if( have_rows('glyphicon_repeater') ):
						
					// loop through the rows of data
					while ( have_rows('glyphicon_repeater') ) : the_row();
						
						echo '<div class="col-xs-12 col-sm-4">';
						// display a sub field value
						
						$image = get_sub_field('image');

						if( !empty($image) ): ?>

						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

						<?php endif;
						echo '<div class="glyphicon_title">';
						echo get_sub_field('title');
						echo '</div>';
						echo get_sub_field('description');
						
						echo '</div>';
				
					endwhile;
				endif;
				
				echo '</div>';
				echo '</div>';
			//////////////////////////////////
			//Questions
			//////////////////////////////////
			elseif( get_row_layout() == 'question_area' ):?>				
				
				<div class="container questionMargin">
					
				<?php if( have_rows('question_repeater') ):
					
						$counter = 0;
					// loop through the rows of data
					while ( have_rows('question_repeater') ) : the_row(); 
						if($counter% 2 == 0) :
							echo '<div class="row questionOutline">';	
						
						endif;
						$counter++;
						?>
						
						<div class="col-xs-12 col-sm-6">
							<div class="question">
								<?php echo get_sub_field('question');?>
							</div>
							<div class="answer">
								<?php echo get_sub_field('answer');?>
							</div>						
						</div>
						<?php
						if($counter% 2==0) :
							echo '</div>';
						endif; 				
					endwhile;
				endif;?>
				</div>
			<?php
			//////////////////////////////////
			//Sign Up Options
			//////////////////////////////////
			elseif( get_row_layout() == 'sign_up_area' ): ?>
					
					<?php if( have_rows('sign_up_repeater') ):
					?>
					<div class="container">
					<?php 	
					// loop through the rows of data
					while ( have_rows('sign_up_repeater') ) : the_row();?>
						<div class="col-xs-12 col-md-4" >
							<div class="sign_up row" style="border-top:<?php echo get_sub_field('color'); ?> solid 5px">
								<div class="top">
									<div class="sign_up_title col-xs-6">
										<?php echo get_sub_field('title'); ?>
									</div>
									<div class="price col-xs-6">
										<?php echo get_sub_field('price'); ?>
									</div>
								</div>
								<div class="sign_up_body col-xs-12">
									<?php echo get_sub_field('description'); ?>
								</div>
								<div class="col-xs-12 sign_up_benefits">
									<?php echo get_sub_field('benefits'); ?>
								</div>
								<?php 
								$button = get_sub_field('image');
								if(get_sub_field('price')=='Free'): ?>
									<div class="col-sm-3"></div>
									<div class="col-xs-12 col-sm-6 sign_up_button" style="background-color:<?php echo get_sub_field('color'); ?>">
											<a href="http://localhost/Gen1/membership-join/membership-registration/"><?php echo get_sub_field('button'); ?></a>								
									</div>
									<div class="col-sm-3"></div>
								<?php 
								elseif(get_sub_field('price')=='$25'): ?>
									<div class="col-sm-3"></div>
									<div class="col-xs-12 col-sm-6 sign_up_button" style="background-color:<?php echo get_sub_field('color'); ?>">
											<?php echo do_shortcode('[swpm_payment_button id=225]');?>							
									</div>
									<div class="col-sm-3"></div>								
								<?php endif;?>
							</div>
						</div>
						
						<?php 
					endwhile;
				endif; ?>
				</div>
				<?php
				
			//////////////////////////////////
			//Home Header
			//////////////////////////////////
			elseif( get_row_layout() == 'home_header'):
				echo '<div class="home_header">';
					echo '<div class="container-fluid nopadding">';
						echo '<div class="homearound">';
						echo '<div class="home_header_title">';
							echo get_sub_field('title');
						echo '</div>';
						echo '<div class="home_header_subtitle">';
							echo get_sub_field('subtitle');
						echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			//////////////////////////////////
			//Login
			//////////////////////////////////
			elseif( get_row_layout() == 'login'):
					?><div class="container">
						<div class="col-sm-2 col-md-4"></div>
						<div class="login col-sm-8 col-md-4 login"><?php
						echo do_shortcode('[swpm_login_form]');
						?></div>
						<div class="col-sm-2 col-md-4"></div>
					</div><?php
			//////////////////////////////////
			//Register
			//////////////////////////////////
			elseif( get_row_layout() == 'register'):
					?><div class="container">
						<div class="col-sm-2 col-md-3"></div>
						<div class="login col-sm-8 col-md-6 login"><?php
						echo do_shortcode('[swpm_registration_form]');
						?></div>
						<div class="col-sm-2 col-md-3"></div>
					</div><?php
			//////////////////////////////////
			//Forgot Password
			//////////////////////////////////
			elseif( get_row_layout() == 'forgot_password'):
					?><div class="container">
						<div class="col-sm-2 col-md-3"></div>
						<div class="login col-sm-8 col-md-6"><?php
						echo do_shortcode('[swpm_reset_form]');
						?></div>
						<div class="col-sm-2 col-md-3"></div>
					</div><?php
			
			//////////////////////////////////
			//Contribute
			//////////////////////////////////
			elseif( get_row_layout() == 'contribute'):
				echo '<div class="contribute">';
					echo '<div class="container nopadding">';
						echo '<div class="col-md-6">';
							$image = get_sub_field('contribute_image');
							if( !empty($image) ):?>
								<img src="<?php echo $image['url']?>" alt="Contriubte to my website"/>
								<?php
							endif;?>
						</div>
						<div class="col-md-6">
						<div class="contribute_title">
						<?php
							echo get_sub_field('text_title');
						?>
						</div>
						<div class="contribute_text">
							<?php echo get_sub_field('contribute_text');?>
						</div>
						<div class="container-fluid button_text">
							<?php
							if(get_sub_field('button_text') != "hidden"):
							 echo '<a href="'.get_sub_field('button_link').'" class="btn btn-primary">'.get_sub_field('button_text').'</a>';
							 endif;?>
						</div>
						
						</div>
					</div>
				</div>
				<?php
				
			//////////////////////////////////
			//Projects
			//////////////////////////////////
			elseif( get_row_layout() == 'project_archive' ):
				$count = 0;
				// The Query
				$args = array('post_type' => 'projects', 'posts_per_page' => -1);
					$the_query = new WP_Query( $args );
					?>
					  <div class="container nopadding projectRow">
					  <?php
					// The Loop
					if ( $the_query->have_posts() ) {
						while ( $the_query->have_posts() ) {
							$the_query->the_post();
							$image = get_field('project_image');
								if( !empty($image) ): ?>
								
								<div class=" col-xs-12 col-sm-6 col-md-4 col-lg-3 small-padding">
								<a href="<?php echo get_permalink($post->ID); ?>" class="project-hover" >
								<div class="slide home_course" style= "background-image: url(<?php echo $image['url']; ?>) ">
								<div class="home_course_text">
									<?php 
									echo  get_the_title();
									?>
								</div>
								<?php endif;
								?>
								</div>
								</a>
								</div>
								<?php
							
						}
						/* Restore original Post Data */
						wp_reset_postdata();
					}
					?>
					</div>
					<?php
			//////////////////////////////////
			//Courses
			//////////////////////////////////
			elseif( get_row_layout() == 'course_archive' ):
				$count = 0;
				// The Query
				$args = array('post_type' => 'courses', 'posts_per_page' => -1);
					$the_query = new WP_Query( $args );
					?>
					<div class="panel-group">
					  <div class="panel panel-default container nopadding">
					  <?php
					// The Loop
					if ( $the_query->have_posts() ) {
						while ( $the_query->have_posts() ) {
							$the_query->the_post();
							if(is_front_page())
							{
								$image = get_field('course_image');
								if( !empty($image) ): ?>
								
								<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 small-padding ">
								<a class="home-course" href="<?php echo get_permalink($post->ID); ?>" >
								<div class="slide home_course" style= "background-image: url(<?php echo $image['url']; ?>) ">
								<div class="home_course_text">
									<?php 
									echo  get_the_title();
									?>
								</div>
								<?php endif;
								?>
								</div>
								</a>
								</div>
								<?php								
							}
							else
							{
								//get screen size and  set count
								?>
								
								<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 margin20" >
								<a href="<?php echo get_permalink($post->ID);?>" class="course" >
									<div class="course-label">
											<?php echo get_field('course_label'); ?>
									</div>
									<div class="course-title">
									<?php echo get_the_title();?>
									
									</div>
									<div class="course-description">
									<?php 
									echo get_the_excerpt();
									?>
									</div>
									</a>
								</div>
								
								<?php if($count == 1) { ?>
								<div class="clearfix visible-sm-block"></div>
								<?php } else if($count == 2) { ?>
								<div class="clearfix visible-md-block"></div>
								<?php } else if($count == 3) { ?>
								
								<div class="clearfix visible-lg-block"></div>
								<?php }  ?>
								
								
								
								
								<?php								
								$count++;								
							}
							
						}
						echo '</div>';
						/* Restore original Post Data */
						wp_reset_postdata();
						
						if($count != 0)
						{
							echo '</div>';	
						}
					}
					?>
					</div>
					</div>
					</div>
					<?php
				
			endif;
	
		endwhile;
	
	endif;
}
