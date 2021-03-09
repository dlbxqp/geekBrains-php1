<?php

require 'm/M_Page.php';

class C_Page extends C_Base{
	public function action_read(){
		$this->title .= ' > Чтение';
		$text = getText_();
		$this->content = $this->Template(
		 'v/page/read.inc',
   [
    'text' => $text
   ]
  );
	}

	public function action_edit(){
		$this->title .= ' > Редактирование';
		
		if($this->isPost()){
			setText_($_POST['text']);

			header('location: /');	exit();
		}
		
		$this->content = $this->Template(
		 'v/page/edit.inc',
   [
    'text' => getText_()
   ]
  );
	}
}