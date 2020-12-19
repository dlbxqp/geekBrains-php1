<link rel="stylesheet" href="/public/s.css">
<?php
require './.inc/inMultiarray.inc';

$a = [
 0 => ['main', 'Главная'],
 1 => ['calc', 'Калькулятор'],
 2 => ['reports', 'Отзывы'],
 3 => ['offers', 'Товары']
];
(!isset($_GET['q']) || inMultiarray($_GET['q'], $a) === FALSE) && $_GET['q'] = $a[0][0]; //default
ksort($a);
foreach($a AS list($dir, $name)){
 $item = $name;
 if($dir !== $_GET['q']){
  $item = '<a href="/?q=' . $dir . '">' . $item . '</a>';
 } else{
  if($_GET['q'] == 'offers' && isset($_GET['sq'])){
   $dir .= '/offer';
  }
  $_main = file_get_contents("./public/{$dir}/i.inc"); //output
 }
 $_menu .= '<li>' . $item . '</li>';
}
$_menu = "<menu>{$_menu}</menu>";