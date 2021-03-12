<?php
require 'SQL.php';

class M_Market extends SQL{
 function getOffers(){
  return parent::SimpleSelect(
   'offers',
   null,
   null,
   true
  );
 }

 function getOffer($offerId){
  return parent::SimpleSelect(
   'offers',
   'id',
   $offerId,
   false
  );
 }

 function getBasket($userId){
/*
  return parent::SimpleSelect(
   'basket',
   'id_of_user',
   $userId,
   true
  );
*/

  return parent::Select("
SELECT
offers.name,
offers.price

FROM basket
LEFT JOIN offers ON offers.id = basket.id_of_offer

WHERE basket.id_of_user = '{$userId}'

ORDER BY basket.id_of_offer
  ");
 }

 function setBasket($userId, $offerId){
  $id = date('ymdHis');
  parent::Insert(
   'basket',
   [
    'id' => $id,
    'id_of_user' => $userId,
    'id_of_offer' => $offerId
   ]
  );
 }
}