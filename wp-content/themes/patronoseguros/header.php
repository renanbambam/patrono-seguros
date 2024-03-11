<?php
/**
 * @package WordPress
 * @subpackage PatronoSeguros
 * @since PatronoSeguros 1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<!-- <meta property="og:title" content="<?php  wp_title(); ?>" />
	<meta property="og:url" content="<?php echo get_permalink(); ?>" />
	<meta name="description" content="<?php echo $excerpt; ?>">
	<meta name="og:description" content="<?php echo $excerpt; ?>" />
	<meta property="og:image" content="<?php echo $url . '?v=' . rand(0, 100);?>"/> -->

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?php
        /*
        * Print the <title> tag based on what is being viewed.
        */
        global $page, $paged;

        wp_title( '|', false, 'right' );

        // Add the blog name.
        bloginfo( 'name' );

        // Add the blog description for the home/front page.
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) )
            echo "Patrono Seguros - $site_description";

        // Add a page number if necessary:
        if ( $paged >= 2 || $page >= 2 )
            echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );
	?></title>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Source+Sans+Pro&family=Titillium+Web:wght@400;700;900&display=swap" />
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet"  href="<?php bloginfo('template_url'); ?>/assets/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/owl-carousel/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/owl-carousel/assets/owl.theme.default.min.css" />
    <link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css" />
</head>

<body>
    
    <div class="header">
      <div class="header__container container">
        <div class="header__navbar">
          <div class="header__offcanvas__icon">
            <a
              data-bs-toggle="offcanvas"
              href="#offcanvasExample"
              aria-controls="offcanvasExample"
            >
              <i class="fa-solid fa-bars icon-color"></i>
            </a>
          </div>
          <div
            class="header__mobile--offcanvas-box offcanvas offcanvas-start"
            tabindex="-1"
            id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel"
            style="top: 0"
          >
            <div class="header__mobile__head">
              <a href="<?php echo get_home_url();?>" class="header__mobile__logo">
                <img
                  class="header__mobile__logo--logo"
                  src="<?php bloginfo('template_url'); ?>/assets/img/logo/pictograma.png"
                />
              </a>
              <h4 class="header__mobile__back">Menu</h4>
              <button
                class="header__mobile__close"
                type="button"
                data-bs-dismiss="offcanvas"
                aria-label="Close"
              >
                <img
                  class="header__mobile__logo--close"
                  src="<?php bloginfo('template_url'); ?>/assets/img/icones/svg/acoes/[icone]-fechar.svg"
                />
              </button>
            </div>
            <div class="offcanvas-body offcanvas offcanvas--content">
              <ul class="header__offcanvas__items">
                
                <li class="header__offcanvas__item submenu">
                  <button class="menu-items submenu--open">
                  <div class="menu-items__icon">
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/icones/svg/seguros/[patrono]-[icone]-seguros.svg" class="offcanvas-seguros__icon" />
                  </div>
                    <div class="offcanvas-seguros">
                      <h6 class="header__offcanvas__subtitle">Seguros</h6>
                      <img src="<?php bloginfo('template_url'); ?>/assets/img/icones/svg/acoes/[icone]-seta.svg"/>
                    </div>
                  </button>
                  
                  <div class="header__mobile header__mobile--submenu closed">
                    <div class="header__mobile__head">
                      <button class="header__mobile__logo submenu--close">
                        <img class="header__mobile__logo--img fa-rotate-180" src="<?php bloginfo('template_url'); ?>/assets/img/icones/svg/acoes/[icone]-seta.svg" />
                      </button>
                      <h4 class="header__mobile__back">Seguros</h4>
                      <button class="header__mobile__close submenu--close">
                        <img class="header__mobile__logo--close" src="<?php bloginfo('template_url'); ?>/assets/img/icones/svg/acoes/[icone]-fechar.svg" />
                      </button>
                    </div>
                    <div class="header__mobile__content">
                      <?php 
                        wp_nav_menu( array( 
                          'theme_location' => 'MobileSeguros',
                          'menu_class' => 'header__offcanvas__items',
                          'add_li_class'  => 'header__offcanvas__item',
                          'add_a_class' => 'footer__link',
                        ));
                      ?>
                    </div>
                  </div>
                </li>
                <li class="header__offcanvas__item">
                  <a href="<?php echo get_home_url();?>/#about" class="menu-items">
                  <div class="menu-items__icon">
                    <img
                      src="<?php bloginfo('template_url'); ?>/assets/img/icones/svg/seguros/[patrono]-[icone]-empresa.svg"
                      class="offcanvas-seguros__icon"
                    />
                  </div>
                    <div class="offcanvas-sobre-nos">
                      <h6 class="header__offcanvas__subtitle">Sobre nós</h6>
                    </div>
                  </a>
                </li>
                <li class="header__offcanvas__item submenu">
                  <button class="menu-items submenu--open">
                    <div class="menu-items__icon">
                      <img src="<?php bloginfo('template_url'); ?>/assets/img/icones/svg/seguros/[patrono]-[icone]-duvida.svg" class="offcanvas-seguros__icon" />
                    </div>
                    <div class="offcanvas-seguros">
                      <h6 class="header__offcanvas__subtitle">Dúvidas</h6>
                      <img src="<?php bloginfo('template_url'); ?>/assets/img/icones/svg/acoes/[icone]-seta.svg"/>
                    </div>
                  </button>
                  
                  <div class="header__mobile header__mobile--submenu closed">
                    <div class="header__mobile__head">
                      <button class="header__mobile__logo submenu--close">
                        <img class="header__mobile__logo--img fa-rotate-180" src="<?php bloginfo('template_url'); ?>/assets/img/icones/svg/acoes/[icone]-seta.svg" />
                      </button>
                      <h4 class="header__mobile__back">Dúvidas</h4>
                      <button class="header__mobile__close submenu--close">
                        <img class="header__mobile__logo--close" src="<?php bloginfo('template_url'); ?>/assets/img/icones/svg/acoes/[icone]-fechar.svg" />
                      </button>
                    </div>
                    <div class="header__mobile__content">
                      <?php 
                        wp_nav_menu( array( 
                          'theme_location' => 'MobileDuvidas',
                          'menu_class' => 'header__offcanvas__items',
                          'add_li_class'  => 'header__offcanvas__item',
                          'add_a_class' => 'footer__link',
                        ));
                      ?>
                    </div>
                  </div>
                </li>
                <li class="header__offcanvas__item">
                  <a href="<?php echo get_home_url();?>/contato" class="menu-items">
                  <div class="menu-items__icon">
                    <img
                      src="<?php bloginfo('template_url'); ?>/assets/img/icones/svg/seguros/[patrono]-[icone]-contato.svg"
                      class="offcanvas-seguros__icon"
                    />
                  </div>
                    <div class="offcanvas-sobre-nos">
                      <h6 class="header__offcanvas__subtitle">Contato</h6>
                    </div>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="header__logo">
            <a href="<?php echo get_home_url();?>" title="Patrono Corretora de Seguros">
                <img
                class="header__logo__mobile"
                src="<?php bloginfo('template_url'); ?>/assets/img/logo/[patrono-seguros]-[logo-completa]-[negativa]-horizontal-mobile.png"
                alt="Patrono Corretora de Seguros"
                />
                <img
                  class="header__logo__pc"
                  src="<?php bloginfo('template_url'); ?>/assets/img/logo/[patrono-seguros]-[logo]-[negativa]-horizontal.png"
                  alt="Patrono Corretora de Seguros"
                />
            </a>
          </div>
            
            <?php wp_nav_menu( array( 
                'theme_location' => 'DesktopMenu',
                'menu_class' => 'header__menu',
            )); ?>
        </div>
      </div>
    </div>