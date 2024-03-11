<?php
/**
 * Template Post Type: post
 */
get_header(); 

if ( have_posts() ) :

    $banner_descricao = get_field('banner_descricao');
    $banner_desktop = get_field('banner_desktop');
    $banner_mobile = get_field('banner_mobile');

    $duvidas_descricao = get_field('duvidas_descricao');

    $duvidas_conteudo_destaque_titulo = get_field('duvidas_conteudo_destaque_titulo');
    $duvidas_conteudo_destaque_descricao = get_field('duvidas_conteudo_destaque_descricao');
    $duvidas_conteudo_destaque_imagem = get_field('duvidas_conteudo_destaque_imagem');
    
    $duvidas_card_2_titulo = get_field('duvidas_card_2_titulo');
    $duvidas_card_2_descricao = get_field('duvidas_card_2_descricao');

?>
<div class="content">
    <div class="banner-dynamic container" style="background-image: url(<?php echo $banner_desktop ?>)">
        <div class="banner-dynamic__box">
            <div class="banner-dynamic__content">
                <div class="banner-dynamic__content__text">
                    <h2 class="banner-dynamic__title">SEGURO</h2>
                    <h2 class="banner-dynamic__title banner-dynamic__title--bold"><?php echo str_replace(strtoupper("Seguro"),"", strtoupper(get_the_title())) ?></strong></h2>
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
                <h2 class="content__box__title content__box__title--forms-title">Diga-nos um pouco mais!</h2>
                <p class="content__box__message content__box__message--forms-message">Preencha o formulário abaixo e deixe o restante conosco</p>
            </div>
            <div class="forms__box">
                <?php the_content(); ?>
            </div>
        </div>
        <div class="forms__right">
            <h3 class="forms__right__title">Dúvidas frequentes</h3>
            <h6 class="forms__right__description"><?php echo $duvidas_descricao ?></h6>
            
            <?php if (!empty($duvidas_conteudo_destaque_titulo)): ?>
                <div class="forms__right__box">
                    <h6 class="forms__right__box__title"><?php echo $duvidas_conteudo_destaque_titulo ?></h6>
                    <div class="forms__right__card">
                        <div class="forms__right__card__img forms__right__card__img--insurance" style="background-image: url(<?php echo $duvidas_conteudo_destaque_imagem ?>)"></div>
                        <div class="forms__right__card__description"><?php echo $duvidas_conteudo_destaque_descricao ?></div>
                    </div>
                </div>
            <?php endif; ?>

            <?php
                if( have_rows('duvidas_conteudo') ):
                    $indexConteudo = 0;
                    while( have_rows('duvidas_conteudo') ): the_row();
                        $conteudo_titulo = get_sub_field('titulo');
                        $descricao_titulo = get_sub_field('descricao');
                        ?>
                            <div class="forms__right__box">
                                <h6 class="forms__right__box__title forms__right__box__title--light"><?php echo $conteudo_titulo ?></h6>
                                <h6 class="forms__right__box__title"><?php echo $descricao_titulo ?></h6>
                                <?php
                                    if( have_rows('informativo') ):
                                        $indexInformativo = 0;
                                        ?>
                                            <div class="forms__right__card">
                                                <div class="accordion" id="accordionPanelsStayOpenExample">
                                                    <?php
                                                        while( have_rows('informativo') ): the_row();
                                                            $titulo = get_sub_field('titulo');
                                                            $descricao = get_sub_field('descricao');
                                                            ?>
                                                                <div class="accordion-item accordion-item--<?php echo $indexConteudo % 2 === 0 ? 'plan' : 'payment' ?>">
                                                                    <h2 class="accordion-header" id="panelsStayOpen-info-<?php echo $indexInformativo ?>">
                                                                        <button class="accordion-button collapsed accordion-button--<?php echo $indexConteudo % 2 === 0 ? 'plan' : 'payment' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#info-<?php echo $indexInformativo ?>">
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
                                            </div>
                                        <?php
                                    endif;
                                ?>
                            </div>
                        <?php
                        $indexConteudo++;
                    endwhile;
                endif;
            ?>
        </div>
        <a href="<?php $url = get_permalink(); echo str_replace("/seguro", "/duvidas", $url); ?>" class="questions">
            <div class="questions__mobile"></div>
        </a>
    </div>
</div>

<?php endif; ?>
<?php get_footer(); ?>