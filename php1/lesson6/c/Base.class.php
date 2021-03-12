<?php //Базовый контроллер сайта.
require 'm/User.php';


abstract class Base extends Controller{
	protected $title;
	protected $content;
 protected $keyWords;

 protected function before(){
		$this->title = 'GTV.Market';
		$this->content = 'Content';
		$this->keyWords = "KeyWords";
	}
	
	public function render(){
  $user = new M_User();
  if(isset($_SESSION['currentUser'])){
   $account = $user->account($_SESSION['currentUser']);
  } else{
   $account['name'] = false;
  }

		$page = $this->Template('v/main.inc',
   [
    'title' => $this->title,
    'content' => $this->content,
    'kw' => $this->keyWords,
    'userName' => $account['name']
   ]
		);

		echo $page;
	}	
}
