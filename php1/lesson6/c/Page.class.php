<?php
require 'm/Page.php';


class Page extends Base{
	public function action_read(){
		$this->title .= ' > Чтение';

		$this->content = $this->Template(
		 'v/page/read.tmpl',
   [
    'text' => getText_()
   ]
  );
	}

	public function action_edit(){
		$this->title .= ' > Редактирование';
		
		if($this->isPost()){
			setText_($_POST['text']);

			header('location: ?c=page&action=read');	exit();
		}
		
		$this->content = $this->Template(
		 'v/page/edit.tmpl',
   [
    'text' => getText_()
   ]
  );
	}
}