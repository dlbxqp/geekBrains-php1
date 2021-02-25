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
 static $quantityORWeight;
 static $totalCost;
 const PRICE = 123;
 const PROFIT = 50;

 abstract function calculationOfTotalCost();
 abstract function calculationOfProfit($totalCost);

 public function __construct($title, $quantityORWeight){
  self::$title = $title;
  self::$quantityORWeight = $quantityORWeight;
 }
}

class PieceOffer extends Offer{
 function calculationOfProfit($totalCost){
  return "Итоговый доход с продажи: " .
   ($totalCost / 100 * parent::PROFIT) .
   " руб.<hr>";
 }

 function calculationOfTotalCost(){
  parent::$totalCost = parent::PRICE * parent::$quantityORWeight;

  return "Итоговая стоимость " .
   parent::$quantityORWeight .
   " штук товара с наименованием '" .
   parent::$title .
   "' по цене " .
   parent::PRICE .
   " руб/шт, обойдётся Вам в " .
   parent::$totalCost .
   " рублей.<br>" .
   self::calculationOfProfit(parent::$totalCost);
 }
}
$pieceOffer = new PieceOffer('шар', 9);
echo $pieceOffer->calculationOfTotalCost();

class DigitalOffer extends Offer{
 function calculationOfProfit($totalCost){
  return "Итоговый доход с продажи: " .
   ($totalCost / 100 * parent::PROFIT) .
   " руб.<hr>";
 }

 function calculationOfTotalCost(){
  parent::$totalCost = (parent::PRICE * parent::$quantityORWeight) / 2;

  return "Итоговая стоимость " .
   parent::$quantityORWeight .
   " копий товара с наименованием '" .
   parent::$title .
   "' по цене " .
   parent::PRICE .
   " руб/копия, обойдётся Вам в " .
   parent::$totalCost .
   " рублей.<br>" .
   self::calculationOfProfit(parent::$totalCost)
  ;
 }
}
$digitalOffer = new DigitalOffer('диск', 18);
echo $digitalOffer->calculationOfTotalCost();

class WeightOffer extends Offer{
 function calculationOfProfit($totalCost){
  return "Итоговый доход с продажи: " .
   ($totalCost / 100 * parent::PROFIT) .
   " руб.<hr>";
 }

 function calculationOfTotalCost(){
  parent::$totalCost = parent::PRICE * parent::$quantityORWeight;

  return "Итоговая стоимость " .
   parent::$quantityORWeight .
   " кг товара с наименованием '" .
   parent::$title .
   "' по цене " .
   parent::PRICE .
   " руб/кг, обойдётся Вам в " .
   parent::$totalCost .
   " рублей.<br>" .
   self::calculationOfProfit(parent::$totalCost)
  ;
 }
}
$weightOffer = new WeightOffer('картоха', 10);
echo $weightOffer->calculationOfTotalCost();


/* 2. *Реализовать паттерн Singleton при помощи traits. */
trait SingletonTrait{
 private static $instances = [];

 public static function single(){
  (!isset(self::$instances[static::class])) && (self::$instances[static::class] = new static);

  return self::$instances[static::class];
 }
}