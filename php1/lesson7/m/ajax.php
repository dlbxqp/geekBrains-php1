<?php
require 'SQL.php';

$_POST = json_decode(file_get_contents('php://input'), TRUE);


class M_Ajax extends SQL{
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

 function getBasketCount($userId){
  return parent::Select("SELECT COUNT(offers.id) AS count

FROM basket
LEFT JOIN offers ON offers.id = basket.id_of_offer

WHERE basket.id_of_user = '{$userId}'

ORDER BY basket.id_of_offer");
 }

 function decBasket($userId, $offerId){
  return parent::Delete('basket', "id_of_user = '{$userId}' AND id_of_offer = '{$offerId}' LIMIT 1");
 }

 function deleteBasket($userId, $offerId){
  return parent::Delete('basket', "id_of_user = '{$userId}' AND id_of_offer = '{$offerId}'");
 }
}

$ajax = new M_Ajax();
if(
 (
  $_POST['action'] == 'setBasket' OR
  $_POST['action'] == 'incBasket'
 ) AND
 isset($_POST['userId']) AND
 isset($_POST['offerId'])
){
 $ajax->setBasket($_POST['userId'], $_POST['offerId']);
} elseif(
 $_POST['action'] == 'decBasket' AND
 isset($_POST['userId']) AND
 isset($_POST['offerId'])
){
 $ajax->decBasket($_POST['userId'], $_POST['offerId']);
} elseif(
 $_POST['action'] == 'deleteBasket' AND
 isset($_POST['userId']) AND
 isset($_POST['offerId'])
){
 $ajax->deleteBasket($_POST['userId'], $_POST['offerId']);
} elseif(
 $_POST['action'] == 'getBasketCount' AND
 isset($_POST['userId'])
){
 $aA = $ajax->getBasketCount($_POST['userId']);

 echo $aA[0]['count'];
} else{
 echo 'Что-то пошло не так';
}