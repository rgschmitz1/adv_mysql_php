<?php
/**
 * The Header for our theme
 *
 * @package Circumference Lite
 * @since 1.0.4
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> style="font-size: <?php echo get_theme_mod( 'body_fontsize', '100' ); ?>%;">
<!-- add move to top feture -->
<?php do_action( 'lr_move_to_top', 'circumference-lite'); ?>

	<?php $pagewidth = get_theme_mod( 'page_width', 'default' );
	 switch ($pagewidth) {
		case "default" : 
			echo '<div id="cir-wrapper" style="border-color:';
			echo get_theme_mod( 'topborder', '#000000' ) . ';">';
		 break;
		case "boxedmedium" : 
			echo '<div id="cir-wrapper-boxed-medium" style="border-color:';
			echo get_theme_mod( 'topborder', '#000000' ) . ';">';
		break;			
		} 
	?>		
 

<div id="cir-ann-social-wrapper" style="background-color: <?php echo get_theme_mod( 'top_bg', '#25B7C3' ); ?>; border-color: <?php echo get_theme_mod( 'top_border', '#f3f3f3' ); ?>;">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div id="cir-social-wrapper"><?php get_template_part( 'partials/social-bar' ); ?></div>
      </div>
    </div>
  </div>
    
</div>


<header id="cir-site-header" style="background-color: <?php echo get_theme_mod( 'header_bg', '#ffffff' ); ?>;" role="banner">
  <div class="container">
    <div class="row">
    
		<div class="col-md-5">
            
        <div id="cir-logo-group-wrapper">
          <?php get_template_part( 'partials/logo-group' ); ?>
        </div>
      </div>     
    
      <div class="col-md-7">
      		<div id="navbar" class="navbar" style="margin: <?php echo get_theme_mod( 'nav_margin', '14px 0 0 0' ); ?>;">
				<nav id="site-navigation" class="navigation main-navigation" role="navigation">
                    <div class="menu-toggle-wrapper hidden-md hidden-lg">
                      <h3 class="menu-toggle"><?php _e( 'Menu', 'circumference-lite' ); ?></h3>
                    </div>
					<a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'circumference-lite' ); ?>">
					<?php _e( 'Skip to content', 'circumference-lite' ); ?></a>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false,'menu_class' => 'nav-menu' ) ); ?>
				</nav><!-- #site-navigation -->                
			</div><!-- #navbar -->                    
        </div>
        
    </div>
  </div>
  
</header>
	
<aside id="cir-banner" style="background-color: <?php echo get_theme_mod( 'banner_bg_colour', '#c6b274' ); ?>; <?php if ( get_header_image() ) : ?>background-image: url(<?php header_image(); ?>);<?php endif; ?>">
		
	<?php get_sidebar( 'banner' ); ?>
		
</aside>
	
    
<div id="cir-breadcrumbs-wrapper" style="background-color: <?php echo get_theme_mod( 'breadcrumbs_bg', '#e2e5e7' ); ?>; color:<?php echo get_theme_mod( 'breadcrumbs_text', '#9ca4a9' ); ?>;">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
      <?php 
	  	if(! is_front_page() ) : 
	  		if(function_exists('bcn_display')) {
			bcn_display();
			}
		 endif; 
		?>
    </div>
    </div>
  </div>
</div>

<?php get_sidebar( 'cta' ); ?>

<div id="cir-content-wrapper" style="background-color:<?php echo get_theme_mod( 'content_bg', '#ffffff' ); ?>; color:<?php echo get_theme_mod( 'content_text', '#656565' ); ?>;">