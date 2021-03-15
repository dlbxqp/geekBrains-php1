<?php
require 'm/Market.php';


class Market extends Base{
 private $market;

 function __construct(){
  $this->market = new M_Market();
 }


 public function action_getOffers(){
  $this->title .= ' > Все товары';

  $this->content = $this->Template(
   'v/market/offers.tmpl',
   [
    'aOffers' => $this->market->getOffers()
   ]
  );
 }

 public function action_getOffer(){
  $this->title .= ' > Товар';

  $this->content = $this->Template(
   'v/market/offer.tmpl',
   [
    'aOffer' => $this->market->getOffer($_GET['id'])
   ]
  );
 }

 public function action_setBasket(){
  $_POST = json_decode(file_get_contents('php://input'), TRUE);

  $this->market->setBasket($_POST['userId'], $_POST['offerId']);
 }

 public function action_getBasket(){
  $this->title .= ' > Корзина';

  $_POST = json_decode(file_get_contents('php://input'), TRUE);
  $this->content = $this->Template(
   'v/market/basket.tmpl',
   [
    'aBasket' => $this->market->getBasket($_COOKIE['userId'])
   ]
  );
 }
}