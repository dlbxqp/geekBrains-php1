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

2. *Реализовать паттерн Singleton при помощи traits.
*/

abstract class Offer{
 static $title;
 static $price;
 static $quantityOfOffersSold;

 abstract function calculationOfTotalCost();

 function __construct($title, $price, $quantityOfOffersSold){
  self::$title = $title;
  self::$price = $price;
  self::$quantityOfOffersSold = $quantityOfOffersSold;
 }
}

class PieceOffer extends Offer{
 public $totalCost;

 public function __construct($title, $price, $quantityOfOffersSold){
  parent::$title = $title;
  parent::$price = $price;
  parent::$quantityOfOffersSold = $quantityOfOffersSold;
 }

 function calculationOfTotalCost(){
  $this->$totalCost = parent::$price * parent::$quantityOfOffersSold;

  return "Итоговая стоимость " .
   parent::$quantityOfOffersSold .
   " штук товара с наименованием '" .
   parent::$title .
   "' по цене " .
   parent::$price .
   " руб/шт, обойдётся Вам в " .
   $this->$totalCost .
   " рублей."
  ;
 }
}
$pieceOffer = new PieceOffer('шар', 123, 9);
echo $pieceOffer->calculationOfTotalCost();

/*
class DigitalOffer extends Offer{
 function calculationOfFinalCost(){
  return 0;
 }
}

class WightOffer extends Offer{
 function calculationOfFinalCost(){
  return 0;
 }
}
*/