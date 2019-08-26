<?php /* Only for test */ require_once 'data.php'; ?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <meta name="robots" content="noindex, nofollow" />
  <meta name="description" content="Корпоративная информационная система компании F&S" />
  <title>Пользователь <?=$users[$_SESSION['user_id']]['name'];?> | КИС компании F&S</title>


  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="css/preloader.css" />
</head>
<body>
  <div class="preloader preloader_active">
    <div class="preloader__inner">
      Загрузка...
    </div>
  </div>

  <div class="panel">
    <div class="panel-left">
      <div class="panel-left__logo">
        <img src="images/logo.png" class="image logo_image" />
      </div>
    </div>
    <div class="panel-main">
      <div class="panel-main__right-menu">
        <div class="right-menu__blocks">
          <div class="icon">
            <div class="icon__element">
              <i class="fas fa-envelope icon_white"></i>
            </div>
          </div>
          <div class="icon">
            <div class="icon__element">
              <i class="fas fa-bell icon_white"></i>
            </div>
          </div>
          <div class="icon">
            <div class="icon__element">
              <i class="fas fa-th icon_white"></i>
            </div>
          </div>
          <div class="avatar">
            <div class="avatar__photo">
              <img src="images/avatar-1.jpg" class="image avatar_image" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="left-menu">
      <div class="left-menu__padding">
        <div class="left-menu__user">
          <div class="avatar left-panel__avatar">
            <div class="avatar__photo">
              <img src="images/avatar-1.jpg" class="image avatar_image" />
            </div>
          </div>
          <div class="left-menu__user-info">
            <p class="text user-info__name font-Rubik"><?=$users[$_SESSION['user_id']]['name'];?></p>
            <p class="text user-info__type font-PTSans"><?=$users[$_SESSION['user_id']]['position'];?></p>
          </div>
        </div>
        <div class="left-menu__menu">
          <ul>
            <li>Dashboard</li>
            <li>Задачи</li>
            <li>Сайты</li>
            <li>Заказы</li>
            <li>Инструкции</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="page" style="height:1000px;">

    </div>
  </div>

  <link rel="stylesheet" href="css/styles.css" />
  <link rel="stylesheet" href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome-font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/93b47f7ae9.js"></script>
  <script src="js/script.js"></script>
</body>
</html>