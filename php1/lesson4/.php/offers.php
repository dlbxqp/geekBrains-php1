<?php
header('Content-type: json/application');
$_POST = json_decode(file_get_contents('php://input'), TRUE);

try{
 $dbh = new PDO(
  'mysql:host=localhost;dbname=geekbrains_db',
  'root',
  ''/*,
   array(
    PDO::ATTR_PERSISTENT => true
   )
*/
 );
 $start = (int)$_POST['start'];
 $count = (int)$_POST['count'];
 $allOffers = $dbh->query("SELECT * FROM offers ORDER BY 'Index' DESC LIMIT {$start}, {$count}");
 $aResult = [
  'status' => true,
  'message' => $allOffers->fetchAll()
 ];
 $dbh = null;
} catch(PDOException $e){
 http_response_code(404);
 $aResult = [
  'status' => false,
  'message' => 'Error: ' . $e->getMessage()
 ];
}

die( json_encode( $aResult ) );
