  <footer class="footer container">
    <div class="footer-container">
      <!-- <?php wp_nav_menu(array(
          'theme_location'  => 'bottom',
          'container'       => 'nav',
          'menu_class'      => 'footer-menu'
        ));
      ?> -->
      <nav>
        <ul class="footer-menu">
          <li><a href="<?php get_template_directory_uri(); ?>/index" class="footer-menu__item">Главная</a></li>
          <li><a href="<?php get_template_directory_uri(); ?>/technique" class="footer-menu__item">Погрузчики-экскаваторы</a></li>
          <li><a href="<?php get_template_directory_uri(); ?>/telehandler" class="footer-menu__item">Телескопические погрузчики</a></li>
          <li><a href="<?php get_template_directory_uri(); ?>/hinged-equipment" class="footer-menu__item">Навесное оборудование</a></li>
          <li><a href="<?php get_template_directory_uri(); ?>/about" class="footer-menu__item">О&nbsp;нас</a></li>
          <li><a href="<?php get_template_directory_uri(); ?>/contacts" class="footer-menu__item">Контакты</a></li>
        </ul>
      </nav>
      <div class="footer-logo">
        <a href="<?php get_template_directory_uri(); ?>/index">
          <img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="ВекТех">
        </a>
      </div>
      <div class="footer-info">
        <div class="footer-info__item footer-info__organization">© ООО "ВекТех", ОГРН 1182375096694</div>
        <div class="footer-info__item footer-info__address">350000, г. Краснодар, ул. Российская, д. 347/1</div>
        <div class="footer-info__item footer-info__tel">Телефон: <a href="tel:+79180849428">8 (918) 0849428</a></div>
        <div class="footer-info__item footer-info__email">E-mail: <a href="mailto:mst-krd@mail.ru">mst-krd@mail.ru</a></div>
      </div>
      <div class="copyright"><a href="https://fsmalcompany.ru/">Разработка сайта: Веб-студия F&S</a></div>
    </div>
  </footer>

  <div class="note"></div>

  <div class="modal">
    <div class="overlay">
      <div class="modal-form">
        <div class="modal-close" id="modal-close"><img src="<?php bloginfo('template_url'); ?>/img/close.png" alt=""></div>
        <form method="post" class="ajax-contact-form">
          <input type="text" name="name" class="modal-form__input" placeholder="Ваше имя" required>
          <input type="tel" name="tel" class="modal-form__input" placeholder="Ваш телефон" required>
          <input type="submit" class="modal-form__submit" value="Получить предложение">
        </form>
        <small>Нажимая на кнопку, вы даете согласие на обработку персональных данных и соглашаетесь c <a href="#">политикой конфиденциальности</a></small>
      </div>
    </div>
  </div>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="js/bg-slider.js"></script>
  <script src="js/script.js"></script> -->

  <?php wp_footer() ?>

</body>
</html>