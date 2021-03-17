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
  $aUserData = $this->dbh->prepare("SELECT * FROM users WHERE login = ?");
  $aUserData->execute([
   0 => $login
  ]);
  $result = $aUserData->fetch();
  if(isset($result)){
   $aResult = $this->dbh->prepare("INSERT INTO `users` (`id`, `name`, `login`, `password`) VALUES (?, ?, ?, ?)");
   $aResult->execute([
    0 => date('ymdHis'),
    1 => $name,
    2 => $login,
    3 => md5($password)
   ]);

   if($aResult){ //die('<pre>' . print_r($aResult) . '</pre>');
    header('location: ?c=user&action=authorisation'); exit();

    //return true;
   } else{
    die('> ' . "$name, $login");
   }
  }

  return false;
 }

 function authorisation($login, $password){
  $aUserData = $this->dbh->prepare("SELECT * FROM users WHERE login = ?");
  $aUserData->execute([
   0 => $login
  ]);
  $result = $aUserData->fetch();
  if(
   !isset($result) OR
   $result['password'] !== md5($password)
  ){
   return false;
  }

  $_SESSION['currentUser'] = $result['id'];
  header('location: ?c=user&action=account');	exit();
 }

 function account($id){
  $aUserData = $this->dbh->prepare("SELECT * FROM users WHERE id = ?");
  $aUserData->execute([
   0 => $id
  ]);

  return $aUserData->fetch();
 }

 function logout(){
  isset($_SESSION['currentUser']) && session_destroy();

  header('Location: ?c=page&action=read'); exit();
 }
}