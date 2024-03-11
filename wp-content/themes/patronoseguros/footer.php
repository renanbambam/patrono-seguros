<?php
/**
 * @package WordPress
 * @subpackage PatronoSeguros
 * @since PatronoSeguros 1.0
 */
?>
    <div class="footer">
      <div class="container">
        <div class="footer__content">
          <div class="footer__insurance">
            <h3 class="footer__title">Seguros</h3>
            <?php wp_nav_menu( array( 
                'theme_location' => 'RodapeMenu',
                'menu_class' => 'footer__list',
                'add_li_class'  => 'footer__list__item',
                'add_a_class' => 'footer__link',
            )); ?>
          </div>
          <div class="footer__about">
            <h3 class="footer__title">Sobre nós</h3>
            <ul class="footer__list">
              <li class="footer__list__item">
                <a href="<?php echo get_home_url();?>/#about" class="footer__link">Conheça um pouco sobre a<br> nossa História</a>
              </li>
            </ul>
            <ul class="footer__list footer__about__media">
              <li class="footer__list__item footer__about__media--item">
                <a href="https://www.facebook.com/patronoseguros" target="blank" class="footer__link"
                  ><img
                    src="<?php bloginfo('template_url'); ?>/assets/img/icones/svg/acoes/[icone]-facebook.svg"
                /></a>
              </li>
              <li class="footer__list__item footer__about__media--item">
                <a href="https://instagram.com/patronosegurosonline" class="footer__link" target="blank">
                  <img
                    src="<?php bloginfo('template_url'); ?>/assets/img/icones/svg/acoes/[icone]-instagram.svg"
                /></a>
              </li>
              <li class="footer__list__item footer__about__media--item">
                <a href="#" class="footer__link"
                  ><img
                    src="<?php bloginfo('template_url'); ?>/assets/img/icones/svg/acoes/[icone]-whatsapp.svg"
                /></a>
              </li>
            </ul>
          </div>
          <div class="footer__company">
            <h3 class="footer__title">Patrono Seguros</h3>
            <ul class="footer__list">
              <li class="footer__list__item footer__company--item">
                <?php 
                $contato_endereco = the_field('contato_endereco_1', 83);
                echo $contato_endereco;
                ?>
              </li>
              <li class="footer__list__item footer__company--item">
                <?php
                $contato_cnpj = the_field('contato_cnpj', 83);
                echo $contato_cnpj;
                ?>
              </li>
              <li class="footer__list__item footer__company--item">
                <?php
                  $contato_contato = the_field('contato_contato', 83);
                  echo $contato_contato;
                ?>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="copyright">
      Todos os direitos reservados a Patrono Seguros - Copyright © 2019 - 2022
    </div>

    <script src="<?php bloginfo('template_url'); ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?php bloginfo('template_url'); ?>/assets/owl-carousel/jquery-3.6.0.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/assets/owl-carousel/owl.carousel.min.js"></script>

    <script src="<?php bloginfo('template_url'); ?>/assets/custom.js"></script>
</body>
</html>