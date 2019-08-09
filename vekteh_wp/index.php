<?php get_header() ?>
  <main class="main container">
    <section class="main-bg main-bg-slide1">
      <h1 class="main-bg__title">Супер цена!<br>Экскаватор-погрузчик от 4,9 млн рублей</h1>
<!--      <h2 class="main-bg__subtitle">Гарантийное и постгарантийное обслуживание</h2>-->
      <div class="main-bg__cta to_offer"><a href="javascript:void(0);">Получить предложение</a></div>
    </section>
    <section class="main-adventures">
      <div class="main-adventures__block">
        <div class="main-adventures__block_img"><img src="<?php bloginfo('template_url'); ?>/img/advantage1.png" alt="Гарантия качества"></div>
        <div class="main-adventures__block_title">Гарантия&nbsp;качества</div>
        <div class="main-adventures__block_descr">Гарантия на технику 5 лет</div>
      </div>
      <div class="main-adventures__block">
        <div class="main-adventures__block_img"><img src="<?php bloginfo('template_url'); ?>/img/advantage2.jpg" alt="Надежность"></div>
        <div class="main-adventures__block_title">Надежность</div>
        <div class="main-adventures__block_descr">Комплектующие ведущих мировых производителей</div>
      </div>
      <div class="main-adventures__block">
        <div class="main-adventures__block_img"><img src="<?php bloginfo('template_url'); ?>/img/advantage3.jpg" alt="Ремонтопригодность"></div>
        <div class="main-adventures__block_title">Ремонтопригодность</div>
        <div class="main-adventures__block_descr">Всегда в наличии на складах расходные материалы и запасные части</div>
      </div>
      <div class="main-adventures__block">
        <div class="main-adventures__block_img"><img src="<?php bloginfo('template_url'); ?>/img/advantage4.png" alt="Быстрый сервис"></div>
        <div class="main-adventures__block_title">Быстрый сервис</div>
        <div class="main-adventures__block_descr">За счет широкой сети сервисных центров на территории России</div>
      </div>
    </section>
    <section class="main-product" id="main-product">
      <a href="<?php get_template_directory_uri(); ?>/technique" class="main-product__block">
        <div class="main-product__block_img main-product__block_img1">
<!--          <img src="img/main-product1.png" alt="Строительная техника">-->
          <h2 class="main-product__block_title">Строительная техника</h2>
          <div class="main-product__block_btn">Каталог</div>
        </div>
      </a>
      <a href="<?php get_template_directory_uri(); ?>/hinged-equipment" class="main-product__block">
        <div class="main-product__block_img main-product__block_img2">
<!--          <img src="img/main-product2.jpg" alt="Навесное оборудование">-->
          <h2 class="main-product__block_title">Навесное оборудование</h2>
          <div class="main-product__block_btn">Каталог</div>
        </div>
      </a>
      <div class="new-string"></div>
      <a href="<?php get_template_directory_uri(); ?>/telehandler" class="main-product__block">
        <div class="main-product__block_img main-product__block_img3">
<!--          <img src="img/main-product3.png" alt="Телескопические погрузчики">-->
          <h2 class="main-product__block_title">Телескопические погрузчики</h2>
          <div class="main-product__block_btn">Каталог</div>
        </div>
      </a>
    </section>
  </main>
<?php get_footer() ?>