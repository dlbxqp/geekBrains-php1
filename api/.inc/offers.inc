<?php
http_response_code(200);

if($method === 'GET'){
 //<
 if(isset($index)){
  $offer = mysqli_query($connect, "SELECT * FROM `offers` WHERE `index` = '{$index}'");
  if(mysqli_num_rows($offer) > 0){
   $aResult = [
    'status' => true,
    'message' => mysqli_fetch_assoc($offer)
   ];
  } else{
   $aResult = [
    'status' => false,
    'message' => "Offer with index = '{$index}' not found"
   ];
  }
 } else{
  $offers = mysqli_query($connect, "SELECT * FROM `offers`");
  if(mysqli_num_rows($offers) > 0){
   while($row = mysqli_fetch_assoc($offers)){
    $aRows[] = $row;
   }
   $aResult = [
    'status' => true,
    'message' => $aRows
   ];
  } else{
   $aResult = [
    'status' => false,
    'message' => 'offers not added yet'
   ];
  }
 }
 //>
} elseif($method === 'POST'){

} elseif($method === 'PATCH'){

} elseif($method === 'DELETE'){

} else{
 //<
 $aResult = ['status' => false, 'message' => 'Unknown method'];
 http_response_code(404);
 //>
}