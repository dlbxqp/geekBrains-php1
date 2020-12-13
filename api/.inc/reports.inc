<?php
http_response_code(200);

if($method === 'GET'){
 //<
 if(isset($index)){
  $report = mysqli_query($connect, "SELECT * FROM `reports` WHERE 'index' = '{$index}'");
  if(mysqli_num_rows($report) > 0){
   $aResult = [
    'status' => true,
    'message' => mysqli_fetch_assoc($report)
   ];
  } else{
   $aResult = [
    'status' => false,
    'message' => "Report with index = '{$index}' not found"
   ];
  }
 } else{
  $reports = mysqli_query($connect, "SELECT * FROM `reports`");
  if(mysqli_num_rows($reports) > 0){
   while($row = mysqli_fetch_assoc($reports)){
    $aRows[] = $row;
   }
   $aResult = [
    'status' => true,
    'message' => $aRows
   ];
  } else{
   $aResult = [
    'status' => false,
    'message' => 'reports not added yet'
   ];
  }
 }
 //>
} elseif($method === 'POST'){
 //>
 $_POST = json_decode(file_get_contents('php://input'), TRUE);

 $index = date('ymdHis');
 $author = "{$_POST['author']}";
 $report = "{$_POST['report']}";
 if(mysqli_query($connect, "INSERT INTO `reports` (`index`, `author`, `report`) VALUES ('{$index}', '{$author}', '{$report}')")) {
  $aResult = [
   'status' => true,
   'message' => "Report with index = '{$index}' added"
  ]; //mysqli_insert_id($connect)]; - только для auto_increment
 } else{
  $aResult = [
   'status' => false,
   'message' => "Report not added: " . mysqli_error($connect)
  ];
 }
 //>
} elseif($method === 'PATCH'){
 //<
 if(isset($index)){
  $aData = json_decode(file_get_contents('php://input'), TRUE);
  $report = mysqli_query($connect, "UPDATE `reports` SET `index` = '{$index}', `author` = '{$aData['author']}', `report` = '{$aData['report']}'");
  $aResult = [
   'status' => true,
   'message' => "Report with index = '{$index}' is updated"
  ];
 }
 //>
} elseif($method === 'DELETE'){
 //<
 if(isset($index)){
  mysqli_query($connect, "DELETE FROM `reports` WHERE `index` = '{$index}'");
  $aResult = [
   'status' => true,
   'message' => "Report with index = '{$index}' is deleted"
  ];
 }
 //>
} else{
 //<
 $aResult = ['status' => false, 'message' => 'Unknown method'];
 http_response_code(404);
 //>
}