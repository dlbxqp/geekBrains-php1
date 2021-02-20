<?php

class Offer{
 static $title;
 static $price;

 static function getTitle(){
  echo 'Наименование: ' . self::$title;
 }
 static function getPrice(){
  echo 'Стоимость: ' . self::$price;
 }

 public function __construct($title, $price){
  self::$title = $title;
  self::$price = $price;

  echo "<br>";
  self::getTitle();
  echo " - ";
  self::getPrice();
  echo "$";
 }
}
class Package extends Offer{
 private $width;
 private $height;
 private $depth;
 private $weight;

 private function getSize(){
  echo 'Размер и вес упаковки: ' . $this->width . 'x' . $this->height . 'x' . $this->depth . '(' . $this->weight . ')';
 }

 public function __construct($title, $price, $width, $height, $depth, $weight){
  parent::$title = $title;
  parent::$price = $price;
  $this->width = $width;
  $this->height = $height;
  $this->depth = $depth;
  $this->weight = $weight;


  echo "<br>";
  parent::getTitle();
  echo " - ";
  parent::getPrice();
  echo "$ > ";
  $this->getSize();
 }
}

$o1 = new Offer('Пылесос', 10000);
$o1 = new Package('Холодильник', 100000, 201, 202, 303, 4);
$o1 = new Package('Табурет', 1000, 301, 102, 103, 3);

echo "<hr>";

class A{
 public function foo() {
  static $x = 0;
  echo ++$x;
 }
}
$a1 = new A();
$a2 = new A();
$a1->foo(); //1
$a2->foo(); //2
$a1->foo(); //3
$a2->foo(); //4
//У свойства $x область видимости static - оно принадлежит самому классу, то и любые вызовы метода foo() откуда-либо повлекут изменение данного свойства класса.

echo "<hr>";

class B extends A{}
$a1 = new A();
$b1 = new B();
$a1->foo(); //1
$b1->foo(); //1
$a1->foo(); //2
$b1->foo(); //2
//Аналогично предыдущей задаче, разве что был создан новый класс-наследник у которого есть собственное свойство $x

echo "<hr>";

$a1 = new A;
$b1 = new B;
$a1->foo(); //1
$b1->foo(); //1
$a1->foo(); //2
$b1->foo(); //2
//Хоть на этот раз были созданы объекты, свойство $x попрежнему осталось статичным - относится к своему классу соответственно (у А своё, у В своё).