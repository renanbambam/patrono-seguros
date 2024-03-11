<?php
/**
 * Template Name: Contato
 * @package WordPress
 * @subpackage PatronoSeguros
 * @since PatronoSeguros 1.0
 */

get_header(); 

if ( have_posts() ) :

    $banner_descricao = get_field('banner_descricao');
    $banner_desktop = get_field('banner_desktop');
    $banner_mobile = get_field('banner_mobile');
    $banner_title = get_field('banner_titulo');
?>
    <div class="content">
        <div class="banner-dynamic container" style="background-image: url(<?php echo $banner_desktop ?>)">
            <div class="banner-dynamic__box">
                <div class="banner-dynamic__content">
                    <div class="banner-dynamic__content__text">
                        <h2 class="banner-dynamic__title"><?php echo $banner_title ?></h2>
                        <h2 class="banner-dynamic__title banner-dynamic__title--bold"><?php //echo str_replace(strtoupper()) ?></h2>
                        <p class="banner-dynamic__desc">
                            <?php echo $banner_descricao ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="banner__blackout"></div>
        </div>
        <div class="forms container">
            <div class="forms__left">
                <div class="content__box content__box--forms">
                    <h2 class="content__box__title content__box__title--forms-title">Entre em contato conosco</h2>
                    <p class="content__box__message content__box__message--forms-message">Preencha o formulário abaixo e deixe o restante conosco</p>
                </div>
                <div class="forms__box">
                    <?php the_content(); ?>
                </div>
            </div>
            <div>
                <div class="forms__right forms__right--questions-mobile">
                    <h3 class="forms__right__title">Outros seguros</h3>
                    <h6 class="forms__right__description">Tire suas dúvidas sobre outros seguros disponíveis clicando abaixo:</h6>
                    <div class="forms__right__links">
                        <?php
                            $lastpostss = get_posts( array(
                                'category_name' => 'seguro',
                                'orderby'        => 'title',
                                'order' => 'ASC',
                                'numberposts'      => 9,
                            ) );
                            
                            if ( $lastpostss ) {
                                foreach ( $lastpostss as $post ) :
                                    setup_postdata( $post ); 
                                    ?>
                                        <a href="<?php the_permalink(); ?>" class="forms__right__link">
                                            <div class="forms__right__link__text"><?php echo get_the_title() ?></div>
                                            <div class="forms__right__link__icon"></div>
                                        </a>
                                    <?php
                                endforeach; 
                                wp_reset_postdata();
                            }
                        ?>
                    </div>
                    <h3 class="forms__right__title">Saiba ainda sobre</h3>
                    <h6 class="forms__right__description">Dúvidas gerais sobre a importância de ser uma pessoa segurada, como também das competências de cada pessoa em um seguro contratado, dentre outras:</h6>
                    <div class="forms__right__links">
                    <?php
                        $lastposts = get_posts( array(
                            'category_name' => 'duvidas',
                            'orderby'        => 'title',
                            'order' => 'menu_order',
                            'numberposts'      => 11,
                        ) );
                            
                        if ( $lastposts ) {
                            foreach ( $lastposts as $post ) :
                                setup_postdata( $post ); 
                                global $wp;
                                $current_url = home_url( add_query_arg( array(), $wp->request ) );
                                if (get_permalink() != $current_url .'/') {
                                ?>
                                    <a href="<?php the_permalink(); ?>" class="forms__right__link">
                                        <div class="forms__right__link__text">
                                            <?php 
                                                $search = ['Dúvidas'];
                                                $replace = [""];
                                                $str = "Qual o papel do corretor de seguros";
                                                $str_2 = "Principais coberturas seguro auto";
                                                $title = get_the_title();
                                                
                                                if(strcmp($str, $title) === 0 || strcmp($str_2, $title) === 0) {
                                                    echo get_the_title();
                                                } else {
                                                    echo 'Seguro' .str_replace($search, $replace, get_the_title());
                                                } 
                                            ?>
                                        </div>
                                        
                                        <div class="forms__right__link__icon"></div>
                                    </a>
                                <?php
                                } else { ?>
                                    <a href="<?php the_permalink(); ?>" class="forms__right__link forms__right__link--active">
                                        <div class="forms__right__link__text">
                                            <?php 
                                                $search = ["Dúvidas"];
                                                $replace = [""];
                                                $str = 'Qual o papel do corretor de seguros';
                                                $str_2 = "Principais coberturas seguro auto";
                                                $title = get_the_title();
                                                if (strcmp($str, $title) === 0 || strcmp($str_2, $title) === 0) {
                                                    echo get_the_title();
                                                } else {
                                                    echo 'Seguro' .str_replace($search, $replace, get_the_title());
                                                }
                                            ?>
                                        </div>
                                        <div class="forms__right__link__icon"></div>
                                    </a>
                                <?php 
                                }
                            endforeach; 
                            wp_reset_postdata();
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
    endif;
get_footer(); 
?>