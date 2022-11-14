<?php 
  include 'inc/headers.inc.php';
  require 'inc/cookie.inc.php';
// Имя файла журнала
const PATH_LOG = 'path.log';
include 'inc/log.inc.php';
$dir = scandir(".");
?>

<!DOCTYPE html>
<html>

<head>
  <title>
      <?= $title ?>
  </title>
  <meta charset="utf-8" />
  <link rel="stylesheet" type="text/css" href="inc/style.css" />
</head>

<body>

  <div id="header">
    <!-- Верхняя часть страницы -->
    <img src="Rabbit.png" width="187" height="29" alt="Наш логотип" class="logo" />
    <span class="slogan">Acta non verba</span>
    <!-- Верхняя часть страницы -->
  </div>

  <div id="content">
    <!-- Заголовок -->
    <h1><?= $header?></h1>
      <blockquote style="font-size: 20px;">
          <?php
          if ($visitCounter == 0 || !$visitCounter){
              echo "Thanks for visiting us!";
              echo "<br/>";
          } elseif($visitCounter > 1){
              echo "You have visited us {$_COOKIE["visitCounter"]} times";
              echo "<br/>";
              echo "Your last visit was {$_COOKIE["lastVisit"]}";
          } else {
              echo "Thanks for visiting us!";
              echo "<br/>";
          }
          ?>
          <br/>
      </blockquote>
    <!-- Заголовок -->
    <!-- Область основного контента -->
    <?php 
      include 'inc/routing.inc.php'; 
    ?>
      <?php
      var_dump($dir);
      if (is_file($dir[5])){
        echo "true";
      };
      ?>
    <!-- Область основного контента -->
  </div>
  <div id="nav">
    <!-- Навигация -->
    <h2>Навигация по сайту</h2>
    <ul>
      <li><a href='index.php'>Home</a>
      </li>
      <li><a href='index.php?id=contact'>Contacts</a>
      </li>
      <li><a href='index.php?id=about'>About us</a>
      </li>
      <li><a href='index.php?id=info'>Info</a>
      </li>
      <li><a href='test/index.php'>Online test</a>
      </li>
      <li><a href='index.php?id=gbook'>Guest book</a>
      </li>
      <li><a href='eshop/catalog.php'>Shopping</a>
      </li>
      <li><a href='index.php?id=log'>Журнал посещений</a>
      </li>
    </ul>
    <!-- Навигация -->
  </div>
  <div id="footer">
    <!-- Нижняя часть страницы -->
    &copy; Rabbit Master, 2022 &ndash; <?= date('Y')?>
      <!-- Нижняя часть страницы -->
  </div>
</body>
</html>