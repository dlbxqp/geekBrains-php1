<!DOCTYPE html>
<html lang='ru'>
 <head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='ie=edge'>
  <meta name='viewport' content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
  <meta name='author' content='dlbxqp@gmail.com'>
  <meta name='theme-color' content='#404040'>
  <meta name='publisher-URL' content='/'>

  <base href="/php1/lesson5/">

	 <title><?= $title?></title>

  <link rel='shortcut icon' href='/images/favicon.ico' type='image/x-icon'>

  <link rel='stylesheet' href='/styles/normalize.css'>
  <link rel='stylesheet' href='/styles/main.css'>
  <link rel='stylesheet' href='/styles/project.css'>

<!--[if IE]>
  <script>
document.createElement('figcaption')
document.createElement('article')
document.createElement('section')
document.createElement('header')
document.createElement('figure')
document.createElement('footer')
document.createElement('aside')
document.createElement('main')
document.createElement('menu')
document.createElement('nav')
  </script>
<![endif]-->
 </head>
 <body>
  <header>
   <menu id="main">
    <a href="?c=page&action=read">Читать текст</a>
    <a href="?c=page&action=edit">Править текст</a>
<?php
if(isset($_SESSION['currentUser'])){
 echo <<<HD
<a href="?c=user&action=account">Личный кабинет</a>
<a href="?c=user&action=logout">Выйти</a>

HD;
} else{
 echo <<<HD
<a href="?c=user&action=registration">Зарегестрироватьcя</a>
<a href="?c=user&action=authorisation">Войти</a>

HD;
}
?>
   </menu>

   <h1><?= $title?></h1>
  </header>

  <main>
<?= $content?>
  </main>

  <footer>&copy;Все права защищены!</footer>
 </body>
</html>