<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="initial-scale=1, minimum-scale=1, width=device-width" name="viewport">
    <title><?php wp_title(); ?></title>
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
	  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
    <?php wp_head(); ?>
</head>
<body class="adwords-overview">
	 <header class="header <?php echo get_theme_mod('header_menu_pos_setting'); ?>" role="banner">
      <div class="product-logo">
          <div class="logo-container"><?php the_custom_logo(); ?></div>
          <a href="<?php echo bloginfo('url'); ?>"><span class="site-name d-none"><?php echo bloginfo('title'); ?></span></a>
      </div>
      <?php global $post; ?>
      <nav class="main-navigation <?php if( is_page('how-it-works') || ($post->post_parent>0) || is_page('tools') ) { echo 'contains-sub-nav'; } ?>">
        <div class="product-logo logo-mobile-nav"><?php echo bloginfo('title'); ?></div>
        <?php 
        	  wp_nav_menu	(array(	'menu' => 'primary-menu', 'menu_class' => 'outer-nav', 'menu_id' => 'adw-primary-menu', 'container' => 'ul', 'container_class' => 'outer-nav',)); 
        ?>
        <div class="cta cta-wrapper cus-wrapper d-md-none d-lg-block">
          <div class="cta-phone-wrap">
            <a class="cta-phone terms-hover" data-rs-min-padding="100" href="tel:0982588080" rs-hideable-nav-item="">
              <svg class="icon-phone-green hotline-color" enable-background="new 0 0 32 32" height="14px" version="1.1" viewbox="0 0 32 32" width="14px" x="0px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" y="0px">
                <path d="M6.4,13.9c2.6,5,6.7,9.1,11.7,11.7l3.9-3.9c0.5-0.5,1.2-0.6,1.8-0.4c2,0.7,4.1,1,6.4,1c1,0,1.8,0.8,1.8,1.8v6.2 c0,1-0.8,1.8-1.8,1.8C13.5,32,0,18.5,0,1.8C0,0.8,0.8,0,1.8,0H8c1,0,1.8,0.8,1.8,1.8c0,2.2,0.4,4.4,1,6.4c0.2,0.6,0.1,1.3-0.4,1.8 L6.4,13.9z"></path>
              </svg> 
              <span class="hotline-color">0909 58 8080<!-- <?php is_active_sidebar(dynamic_sidebar('bds_tel'));  ?> --></span>
            </a>
            <div class="nav-terms">
              <p>
                * Hỗ trợ qua điện thoại miễn phí cho doanh nghiệp từ thứ Hai - thứ Sáu, 9 giờ sáng
                - 6 giờ chiều.
              </p>
            </div>
          </div>
          <a class="cta-call" href="tel:0982588080">
            <svg class="icon-phone-green" enable-background="new 0 0 32 32" height="16px" version="1.1" viewbox="0 0 32 32" width="16px" x="0px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"xmlns:xlink="http://www.w3.org/1999/xlink" y="0px">
              <path d="M6.4,13.9c2.6,5,6.7,9.1,11.7,11.7l3.9-3.9c0.5-0.5,1.2-0.6,1.8-0.4c2,0.7,4.1,1,6.4,1c1,0,1.8,0.8,1.8,1.8v6.2 c0,1-0.8,1.8-1.8,1.8C13.5,32,0,18.5,0,1.8C0,0.8,0.8,0,1.8,0H8c1,0,1.8,0.8,1.8,1.8c0,2.2,0.4,4.4,1,6.4c0.2,0.6,0.1,1.3-0.4,1.8 L6.4,13.9z"></path>
            </svg> Gọi điện cho chúng tôi
          </a>
        </div>
      </nav>
      <button aria-label="chuyển đổi menu điều hướng" class="nav-toggle-button">
          <span class="icon-menu-els">
            <span class="menu-bar"></span> 
            <span class="menu-bar"></span> 
            <span class="menu-bar"></span>
          </span>
      </button>
    </header>
    <?php 
      if( !is_page() && !is_404() ) {
          if ( function_exists('yoast_breadcrumb') ) {
              yoast_breadcrumb( '<div class="container"><p id="breadcrumbs">','</p></div>' );
          }
      }
    ?>

