<?php
class M_User{
 private $dbh;

 function __construct(){
  $this->dbh = new PDO(
   'mysql:host=localhost;dbname=geekbrains_db',
   'root',
   ''
  );
 }


 function registration($name, $login, $password){
  $aUserData = $this->dbh->query("SELECT * FROM users WHERE Login = '{$login}'")->fetch();
  if(!$aUserData){
   $aResult = $this->dbh->prepare("INSERT INTO `users` (`id`, `name`, `login`, `password`) VALUES (?, ?, ?, ?)");
   $aResult->bindParam(1, $id);
   $aResult->bindParam(2, $name);
   $aResult->bindParam(3, $login);
   $aResult->bindParam(4, $password);

   $id = date('ymdHis');
   $password = md5($password);
   $aResult->execute();

   if($aResult){ //die('<pre>' . print_r($aResult) . '</pre>');
    return true;
   } else{
    die('> ' . "$id, $name, $login, $password");
   }
  }

  return false;
 }

 function authorisation($login, $password){
  $aUserData = $this->dbh->query("SELECT * FROM users WHERE Login = '{$login}'")->fetch();
  if(
   !$aUserData OR
   $aUserData['Password'] !== md5($password)
  ){
   return false;
  }

  $_SESSION['currentUser'] = $aUserData['Id'];
  return true;
 }

 function account($id){
  return $this->dbh->query("SELECT * FROM users WHERE Id = '{$id}'")->fetch();
 }

 function logout(){
  isset($_SESSION['currentUser']) && session_destroy();

  header('Location: ?c=page&action=read'); exit();
 }
}