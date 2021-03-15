<?php //Базовый класс контроллера.
abstract class Controller{
	protected abstract function render(); //Генерация внешнего шаблона
	
	protected abstract function before(); //Функция отрабатывающая до основного метода
	
	public function Request($action){
		$this->before(); //Метод вызывается до формирования данных для шаблон
		$this->$action(); //$this->action_read
		$this->render();
	}

	protected function isGet(){ //Запрос произведен методом GET?
		return ($_SERVER['REQUEST_METHOD'] == 'GET');
	}

		protected function isPost(){ //Запрос произведен методом POST?
		return ($_SERVER['REQUEST_METHOD'] == 'POST');
	}

	//
	// Генерация HTML шаблона в строку.
	//
	protected function Template($fileName, $vars = []){
		//Установка переменных для шаблона.
		foreach ($vars as $k => $v){
			$$k = $v;
		}

		//Генерация HTML в строку.
		ob_start();
		include "$fileName";
		return ob_get_clean();	
	}	
	
	//Если вызвали метод, которого нет - завершаем работу
	public function __call($name, $params){
	 die('URL некорректен [' . $name . ', ' . $params . ']');
	}
}
