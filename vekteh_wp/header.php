<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="description" content="<?php bloginfo( 'description' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Компания ВекТех - поставка строительной техники и навесного оборудования для строительного, дорожно-строительного, складского и сельскохозяйственного комплекса</title>
  <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/img/favicon.ico">
  <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap&subset=cyrillic" rel="stylesheet"> -->
  <!-- <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet"> -->
  <!-- <link rel="stylesheet" href="css/style.css"> -->
  <?php wp_head(); ?>
</head>
<body>
  <header class="header container">
    <a href="javascript:void(0);" class="header-menu__hamburger"><span></span></a>
    <div class="header-container">
      <div class="header-logo">
        <a href="<?php get_template_directory_uri(); ?>/index"><img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="ВекТех"></a>
      </div>
      <?php wp_nav_menu(array(
          'theme_location'  => 'top',
          'container'       => 'nav',
          'menu_class'      => 'header-menu'
        ));
      ?>
      <!-- <nav>
        <ul class="header-menu">
          <li><a href="javascript:void(0);" class="header-menu__item header-menu__item_active">Главная</a></li>
          <li><a href="technique.html" class="header-menu__item">Погрузчики-экскаваторы</a></li>
          <li><a href="telehandler.html" class="header-menu__item">Телескопические погрузчики</a></li>
          <li><a href="hinged_equipment.html" class="header-menu__item">Навесное оборудование</a></li>
          <li><a href="about.html" class="header-menu__item">О&nbsp;нас</a></li>
          <li><a href="contacts.html" class="header-menu__item">Контакты</a></li>
        </ul>
      </nav> -->
      <div class="header-contacts">
        <a href="tel:+79180849428" class="header-contacts__item header-contacts__tel">8-918-084-94-28</a>
        <a href="mailto:mst-krd@mail.ru" class="header-contacts__item header-contacts__mail">mst-krd@mail.ru</a>
      </div>
      <div class="header-social">
        <div class="header-social__item">
          <a href="https://www.instagram.com/mstdiler/">
            <i class="fab fa-instagram"></i>
          </a>
        </div>
        <div class="header-social__item">
          <a href="https://vk.com">
            <i class="fab fa-vk"></i>
          </a>
        </div>
      </div>
    </div>
  </header>