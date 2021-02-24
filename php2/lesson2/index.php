<?php
/*
1. Создать структуру классов ведения товарной номенклатуры.
а) Есть абстрактный товар.
б) Есть цифровой товар, штучный физический товар и товар на вес.
в) У каждого есть метод подсчета финальной стоимости.
г) У цифрового товара стоимость постоянная – дешевле штучного товара в два раза.
   У штучного товара обычная стоимость,
   у весового – в зависимости от продаваемого количества в килограммах.
   У всех формируется в конечном итоге доход с продаж.
д) Что можно вынести в абстрактный класс, наследование?
*/

abstract class Offer{
 static $title;
 static $price;
 static $quantityORWeight;
 static $totalCost;

 abstract function calculationOfTotalCost();

 public function __construct($title, $price, $quantityORWeight){
  self::$title = $title;
  self::$price = $price;
  self::$quantityORWeight = $quantityORWeight;
 }
}

class PieceOffer extends Offer{
 function calculationOfTotalCost(){
  parent::$totalCost = parent::$price * parent::$quantityORWeight;

  return "Итоговая стоимость " .
   parent::$quantityORWeight .
   " штук товара с наименованием '" .
   parent::$title .
   "' по цене " .
   parent::$price .
   " руб/шт, обойдётся Вам в " .
   parent::$totalCost .
   " рублей.<br>"
  ;
 }
}
$pieceOffer = new PieceOffer('шар', 123, 9);
echo $pieceOffer->calculationOfTotalCost();

class DigitalOffer extends Offer{
 function calculationOfTotalCost(){
  parent::$totalCost = (parent::$price * parent::$quantityORWeight) / 2;

  return "Итоговая стоимость " .
   parent::$quantityORWeight .
   " копий товара с наименованием '" .
   parent::$title .
   "' по цене " .
   parent::$price .
   " руб/копия, обойдётся Вам в " .
   parent::$totalCost .
   " рублей.<br>"
   ;
 }
}
$digitalOffer = new DigitalOffer('диск', 321, 18);
echo $digitalOffer->calculationOfTotalCost();

class WeightOffer extends Offer{
 function calculationOfTotalCost(){
  parent::$totalCost = parent::$price * parent::$quantityORWeight;

  return "Итоговая стоимость " .
   parent::$quantityORWeight .
   " кг товара с наименованием '" .
   parent::$title .
   "' по цене " .
   parent::$price .
   " руб/копия, обойдётся Вам в " .
   parent::$totalCost .
   " рублей.<br>"
   ;
 }
}
$weightOffer = new WeightOffer('картоха', 60, 10);
echo $weightOffer->calculationOfTotalCost();


/* 2. *Реализовать паттерн Singleton при помощи traits. */
trait SingletonTrait{
 private static $instances = [];

 public static function single(){
  (!isset(self::$instances[static::class])) && (self::$instances[static::class] = new static);

  return self::$instances[static::class];
 }
}