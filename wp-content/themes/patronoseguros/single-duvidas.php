<?php
/**
 * Template Post Type: post
 */
get_header(); 

if ( have_posts() ) :

    $banner_descricao = get_field('duvida_banner_descricao');
    $banner_desktop = get_field('duvida_banner_desktop');
    $banner_mobile = get_field('duvida_banner_mobile');
?>
    <div class="content">
        <div class="banner-dynamic container" style="background-image: url(<?php echo $banner_desktop ?>)">
                <div class="banner-dynamic__box">
                    <div class="banner-dynamic__content">
                        <div class="banner-dynamic__content__text">
                            <h2 class="banner-dynamic__title">DÚVIDAS?</h2>
                            <h2 class="banner-dynamic__title banner-dynamic__title--bold"><?php 
                            $search_seguro = ["Dúvidas", "Seguro", "Principais coberturas"];
                            $replace_seguro = ["", "Seguro", ""];
                            $str_1 = "Papel do corretor de seguros";
                            $str_2 = "Principais coberturas seguro auto";
                            $title_seguro = get_the_title();

                            if(strcmp($str_1, $title_seguro) === 0 || strcmp($str_2, $title_seguro) === 0) {
                                echo str_replace($search_seguro, $replace_seguro, get_the_title());
                            } else {
                                echo 'Seguro' .str_replace($search_seguro, $replace_seguro, get_the_title());
                            } 
                            ?></h2>
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
                        <h2 class="content__box__title content__box__title--forms-title content__box__title--questions-title"><?php 
                        $search_seguro = ["Dúvidas", "Seguro", "Principais coberturas"];
                        $replace_seguro = ["", "Seguro", ""];
                        $str_1 = "Qual o papel do corretor de seguros";
                        $str_2 = "Principais coberturas seguro auto";
                        $title_seguro = get_the_title();

                        if(strcmp($str_1, $title_seguro) === 0 || strcmp($str_2, $title_seguro) === 0) {
                            echo str_replace($search_seguro, $replace_seguro, get_the_title());
                        } else {
                            echo 'Seguro' .str_replace($search_seguro, $replace_seguro, get_the_title());
                        } 
                        ?></h2>
                    </div>
                    <div class="forms__box forms__box--questions">
                        <?php
                            if( have_rows('conteudo_destaque') ):
                                $indexConteudoDestaque = 0;
                                while( have_rows('conteudo_destaque') ): the_row();
                                    $titulo = get_sub_field('titulo');
                                    $descricao = get_sub_field('descricao');
                                    $descricao_secundaria = get_sub_field('descricao_secundaria');
                                    $imagem = get_sub_field('imagem');
                                ?>
                                    <div class="forms__right__box">
                                        <h6 class="forms__right__box__title"><?php echo $titulo ?></h6>
                                        <div class="forms__right__card <?= strlen($descricao) < 550 ? 'forms__right__card--questions' : ''?>">
                                            <div class="forms__right__card__img  <?= strlen($descricao) < 550 ? 'forms__right__card__img--questions-img' : ''?>" style="background-image: url(<?php echo $imagem ?>)"></div>
                                            <div class="forms__right__card__description <?= strlen($descricao) < 550 ? 'forms__right__card__description--questions-description' : ''?>"><?php echo $descricao ?></div>
                                        </div>
                                    </div>
                                <?php 
                                    $indexConteudoDestaque++;
                                endwhile;
                            endif;
                        ?>

                        <?php
                            if( have_rows('conteudo_expansivo') ):
                                $indexConteudoExpansivo = 0;
                                while( have_rows('conteudo_expansivo') ): the_row();
                                    $titulo = get_sub_field('titulo');
                                    $descricao = get_sub_field('descricao');
                                    $informacao = get_sub_field('informacao');
                                    $informacao_secundaria = get_sub_field('informacao_secundaria');
                                    $explicacao = get_sub_field('explicacao');
                                    $explicacao_2 = get_sub_field('explicacao_2');
                                    $explicacao_3 = get_sub_field('explicacao_3');
                                ?>
                                    <div class="forms__right__box">
                                        <h6 class="forms__right__box__title forms__right__box__title--light"><?php echo $titulo ?></h6>
                                        <h6 class="forms__right__box__title"><?php echo $descricao ?></h6>
                                        

                                        <?php
                                            if( have_rows('informativo') ):
                                                $indexInformativo = 0;
                                                
                                                ?>
                                                <div class="forms__right__card">

                                                    <div class='forms__right__card__description forms__right__card__description--box <?= $informacao === '' ? 'd-none' : ''?>'>
                                                        <?php 
                                                            if($informacao !== '') {
                                                                echo $informacao;  
                                                            }
                                                        ?>
                                                    </div>
                                                    <div class='forms__right__card__description forms__right__card__description--box <?= $informacao_secundaria === '' ? 'd-none' : ''?>'>
                                                        <?php 
                                                            if($informacao_secundaria !== '') {
                                                                echo $informacao_secundaria;  
                                                            } 
                                                        ?>
                                                    </div>

                                                    <div class="accordion" id="accordionPanelsStayOpenExample">
                                                        <?php
                                                            while( have_rows('informativo') ): the_row();
                                                                $titulo = get_sub_field('titulo');
                                                                $descricao = get_sub_field('descricao');
                                                                ?>
                                                                    <div class="accordion-item accordion-item--<?php echo $indexConteudoExpansivo % 2 === 0 ? 'plan' : 'payment' ?>">
                                                                        <h2 class="accordion-header" id="panelsStayOpen-info-<?php echo $indexInformativo ?>">
                                                                            <button class="accordion-button collapsed accordion-button--<?php echo $indexConteudoExpansivo % 2 === 0 ? 'plan' : 'payment' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#info-<?php echo $indexInformativo ?>">
                                                                                <?php echo $titulo ?>
                                                                            </button>
                                                                        </h2>
                                                                        <div id="info-<?php echo $indexInformativo ?>" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-info-<?php echo $indexInformativo ?>">
                                                                            <div class="accordion-body">
                                                                                <?php echo $descricao ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php
                                                                $indexInformativo++;
                                                            endwhile;
                                                        ?>
                                                    </div>

                                                    <div class="forms__right__card__description forms__right__card__description--box <?= $explicacao === '' ? 'd-none' : ''?> "><?php
                                                        if($explicacao !== '') {
                                                            echo $explicacao;
                                                        }
                                                            
                                                         ?></div>
                                                    <div class="forms__right__card__description forms__right__card__description--box <?= $explicacao_2 === '' ? 'd-none' : ''?> "><?php
                                                        if($explicacao_2 !== '') {
                                                            echo $explicacao_2;  
                                                        }  ?></div>
                                                    <div class="forms__right__card__description forms__right__card__description--box <?= $explicacao_3 === '' ? 'd-none' : ''?> "><?php 
                                                        if($explicacao_3 !== '') {
                                                            echo $explicacao_2;  
                                                        }  ?></div>

                                                </div>
                                            <?php
                                                endif;
                                            ?>

                                    </div>
                                    <?php 
                                endwhile;
                            endif;
                        ?>
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
    </div>
<?php 
    endif;
get_footer(); 
?>