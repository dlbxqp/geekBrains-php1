<?php //Базовый контроллер сайта.
require 'm/M_User.php';

abstract class C_Base extends C_Controller{
	protected $title;
	protected $content;
 protected $keyWords;

 protected function before(){
		$this->title = 'Сайт';
		$this->content = 'Content';
		$this->keyWords = "KeyWords";
	}
	
	public function render(){
  $user = new M_User();
  if(isset($_SESSION['currentUser'])){
   $account = $user->account($_SESSION['currentUser']);
  } else{
   $account['Name'] = false;
  }

		$page = $this->Template('v/main.inc',
   [
    'title' => $this->title,
    'content' => $this->content,
    'kw' => $this->keyWords,
    'userName' => $account['Name']
   ]
		);

		echo $page;
	}	
}
