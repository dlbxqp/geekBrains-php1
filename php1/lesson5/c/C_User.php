<?php
class C_User extends C_Base{
 private $user;

 function __construct(){
  $this->user = new M_User();
 }

 function action_registration(){
  $this->title .= ' > Регистрация';

  if($this->isPost()){
   $result = $this->user->registration($_POST['name'], $_POST['login'], $_POST['password']);
   $this->content = $this->Template(
    'v/user/registration.inc',
     [
      'text' => (($result) ? 'Регистрация выполнена' : 'Ошибка при регистрации')
     ]
   );
  } else{
   $this->content = $this->Template('v/user/registration.inc');
  }
 }

 function action_authorisation(){
  $this->title .= ' > Авторизация';

		if($this->isPost()){
   $result = $this->user->authorisation($_POST['login'], $_POST['password']);
   $this->content = $this->Template(
    'v/user/authorisation.inc',
    [
     'text' => (($result) ? 'Авторизация выполнена' : 'Ошибка при авторизации')
    ]
   );
		}	else{
   $this->content = $this->Template('v/user/authorisation.inc');
		}
	}

 function action_account(){
  $userData = $this->user->account($_SESSION['currentUser']);
  $this->title .= ' > ' . $userData['Name'];
  $this->content = $this->Template(
   'v/user/account.inc',
   [
    'userName' => $userData['Name'],
    'login' => $userData['Login']
   ]
  );
 }

 function action_logout(){
  $this->user->logout();
 }
}