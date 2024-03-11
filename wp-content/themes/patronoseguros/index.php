<?php
/**
 * @package WordPress
 * @subpackage PatronoSeguros
 * @since PatronoSeguros 1.0
 */

get_header();

the_post();

$banner_titulo =  get_field('banner_titulo');
$banner_descricao = get_field('banner_descricao');
$banner_link = get_field('banner_link');
$banner_desktop = get_field('banner_desktop');
$banner_mobile = get_field('banner_mobile');

$seguros_titulo = get_field('seguros_titulo');
$seguros_descricao = get_field('seguros_descricao');

$quem_somos_titulo = get_field('quem_somos_titulo');
$quem_somos_descricao = get_field('quem_somos_descricao');
$quem_somos_box_1 = get_field('quem_somos_box_1');
$quem_somos_box_2 = get_field('quem_somos_box_2');
$quem_somos_box_3 = get_field('quem_somos_box_3');

$parceiros_titulo = get_field('parceiros_titulo');
$parceiros_descricao = get_field('parceiros_descricao');
?>

<div class="content">
    <div class="container">
        <div class="banner" style="background-image: url(<?php echo $banner_desktop; ?>)">
                <div class="banner__info">
                    <h2 class="banner__info__title"><?php echo $banner_titulo ?></h2>
                    <p class="banner__info__desc">
                        <?php echo $banner_descricao ?>
                    </p>
                    <?php     
                        if( $banner_link ): 
                            $link_url = $banner_link['url'];
                            $link_title = $banner_link['title'];
                            $link_target = $banner_link['target'] ? $banner_link['target'] : '_self';
                    ?>
                            <a class="banner__info__action" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                                <div class="banner__info__link" title="<?php echo $link_title; ?>">
                                    <?php echo $link_title; ?>
                                </div>
                            </a>
                    <?php endif; ?>
                </div>
                <div class="banner__blackout"></div>
                <div class="banner__img">
                    <div class="banner__blackout banner__blackout--mobile"></div>
                    <img class="banner__img__mobile" src="<?php echo $banner_mobile; ?>" alt="" />
                </div>
            </div>
        </div>

        <div class="insurance">
            <div class="container">
                <div class="content__box">
                    <h2 class="content__box__title"><?php echo $seguros_titulo ?></h2>
                    <p class="content__box__message"><?php echo $seguros_descricao ?></p>
                </div>
                <div class="insurance__cards">
                    <?php
                        $lastposts = get_posts( array(
                            'category'         => '1',
                            'orderby'        => 'title',
                            'order' => 'ASC',
                            'taxonomy'        => 'seguros',
                            'posts_per_page' => 9,
                        ) );
                        
                        if ( $lastposts ) {
                            foreach ( $lastposts as $post ) :
                                setup_postdata( $post ); 
                                
                                $icone = get_field('icone_imagem');
                    ?>
                                <a href="<?php the_permalink(); ?>" class="insurance__card">
                                    <div class="insurance__card__box-img">
                                        <img class="insurance__card__img" src="<?php echo $icone ?>" alt="" />
                                    </div>
                                    <div class="insurance__card__box-items">
                                        <div class="insurance__card__items">
                                            <p class="insurance__card__title">seguro</p>
                                            <h6 class="insurance__card__desc"><?php echo str_replace(strtoupper("Seguro"),"", strtoupper(get_the_title())) ?></h6>
                                        </div>
                                    </div>
                                </a>
                    <?php
                            endforeach; 
                            wp_reset_postdata();
                        }
                    ?>
                </div>
            </div>
        </div>

        <div class="about" id="about">
            <div class="container">
                <div class="content__box">
                    <h2 class="content__box__title"><?php echo $quem_somos_titulo ?></h2>
                    <p class="content__box__message"><?php echo $quem_somos_descricao ?></p>
                </div>
                <div class="about__box">
                    <div class="about__card">
                        <div class="about__card__text">
                            <h3 class="about__card__definition about__card__definition--bolder">
                                <?php echo $quem_somos_box_1 ?>
                            </h3>
                            <p class="about__card__important">
                                * Superintendência de Seguros Privados
                            </p>
                        </div>
                        <div class="about__card__custum">
                            <img
                                class="about__card__img"
                                src="<?php bloginfo('template_url'); ?>/assets/img/quem-somos/image-01.png"
                                alt=""
                            />
                        </div>
                    </div>
                    <div class="about__card">
                        <div class="about__card__text">
                            <h3 class="about__card__definition">
                                <?php echo $quem_somos_box_2 ?>
                            </h3>
                        </div>
                        <div class="about__card__custum">
                            <img
                                class="about__card__img"
                                src="<?php bloginfo('template_url'); ?>/assets/img/quem-somos/image-02.png"
                                alt=""
                            />
                        </div>
                    </div>

                    <div class="about__card">
                        <div class="about__card__text">
                            <h3 class="about__card__definition">
                            <?php echo $quem_somos_box_3 ?>
                            </h3>
                        </div>
                        <div class="about__card__custum">
                            <img
                                class="about__card__img"
                                src="<?php bloginfo('template_url'); ?>/assets/img/quem-somos/image-03.png"
                                alt=""
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="partners">
            <div class="container">
                <div class="content__box">
                    <h2 class="content__box__title"><?php echo $parceiros_titulo ?></h2>
                    <p class="content__box__message"><?php echo $parceiros_descricao ?></p>
                </div>
                <div class="partners__box">
                    <div class="partners__box owl-carousel">
                        <div class="item">
                            <img
                                src="<?php bloginfo('template_url'); ?>/assets/img/parceiros/seguros-allianz-seguradora.png"
                                class="partners__img"
                                alt=""
                            />
                        </div>
                        <div class="item">
                            <img
                                src="<?php bloginfo('template_url'); ?>/assets/img/parceiros/seguros-azul-seguradora.png"
                                class="partners__img"
                                alt=""
                            />
                        </div>
                        <div class="item">
                            <img
                                src="<?php bloginfo('template_url'); ?>/assets/img/parceiros/seguros-berkley-seguradora.png"
                                class="partners__img"
                                alt=""
                            />
                        </div>
                        <div class="item">
                            <img
                                src="<?php bloginfo('template_url'); ?>/assets/img/parceiros/seguros-bradesco-seguradora.png"
                                class="partners__img"
                                alt=""
                            />
                        </div>
                        <div class="item">
                            <img
                                src="<?php bloginfo('template_url'); ?>/assets/img/parceiros/seguros-chubb-seguradora.png"
                                class="partners__img"
                                alt=""
                            />
                        </div>
                        <div class="item">
                            <img
                                src="<?php bloginfo('template_url'); ?>/assets/img/parceiros/seguros-generali.png"
                                class="partners__img"
                                alt=""
                            />
                        </div>
                        <div class="item">
                            <img
                                src="<?php bloginfo('template_url'); ?>/assets/img/parceiros/seguros-hdi-seguradora.png"
                                class="partners__img"
                                alt=""
                            />
                        </div>
                        <div class="item">
                            <img
                                src="<?php bloginfo('template_url'); ?>/assets/img/parceiros/seguros-liberty-seguradora.png"
                                class="partners__img"
                                alt=""
                            />
                        </div>
                        <div class="item">
                            <img
                                src="<?php bloginfo('template_url'); ?>/assets/img/parceiros/seguros-mapfre-seguradora.png"
                                class="partners__img"
                                alt=""
                            />
                        </div>
                        <div class="item">
                            <img
                                src="<?php bloginfo('template_url'); ?>/assets/img/parceiros/seguros-alfa-seguradora.png"
                                class="partners__img"
                                alt=""
                            />
                        </div>
                        <div class="item">
                            <img
                                src="<?php bloginfo('template_url'); ?>/assets/img/parceiros/seguros-metlife-seguradora.png"
                                class="partners__img"
                                alt=""
                            />
                        </div>
                        <div class="item">
                            <img
                                src="<?php bloginfo('template_url'); ?>/assets/img/parceiros/seguros-mitsui-seguradora.png"
                                class="partners__img"
                                alt=""
                            />
                        </div>
                        <div class="item">
                            <img
                                src="<?php bloginfo('template_url'); ?>/assets/img/parceiros/seguros-porto-seguro.png"
                                class="partners__img"
                                alt=""
                            />
                        </div>
                        <div class="item">
                            <img
                                src="<?php bloginfo('template_url'); ?>/assets/img/parceiros/seguros-sompo-seguradora.png"
                                class="partners__img"
                                alt=""
                            />
                        </div>
                        <div class="item">
                            <img
                                src="<?php bloginfo('template_url'); ?>/assets/img/parceiros/seguros-sul-america-seguradora.png"
                                class="partners__img"
                                alt=""
                            />
                        </div>
                        <div class="item">
                            <img
                                src="<?php bloginfo('template_url'); ?>/assets/img/parceiros/seguros-tokio-marine-seguradora.png"
                                class="partners__img"
                                alt=""
                            />
                        </div>
                        <div class="item">
                            <img
                                src="<?php bloginfo('template_url'); ?>/assets/img/parceiros/seguros-zurich-seguradora.png"
                                class="partners__img"
                                alt=""
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer() ?>