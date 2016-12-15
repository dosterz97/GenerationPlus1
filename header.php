 <?php
/**
.menu-item-14{
	margin-top:25px!important;
    border-radius: 25px;
    background-color:#1c1b41;
    width: 120px;
    height: 40px; 
}
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gen+1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
<header>



	<nav class="navbar navbar-default" id="navbarOverride">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            
          </div>
          <div id="navbar" class="navbar-collapse collapse">
		  <a class="navbar-brand site-branding logo" href="<?php echo get_home_url();?>"><img src="<?php echo get_bloginfo('stylesheet_directory' ); ?>/images/genplus1_4C.png" alt="generation + 1 logo"/></a>
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'nav navbar-nav navbar-right' ) ); ?>
      
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
     </nav>
</header>