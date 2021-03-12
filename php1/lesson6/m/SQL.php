<?php
class SQL{
	private static $instance;
	private $db;
		
	public static function Instance(){
		if(self::$instance == null){
			self::$instance = new SQL();
		}

		return self::$instance;
	}
		
	public function __construct(){
		setlocale(LC_ALL,'ru_RU.UTF8');
		$this->db = new PDO(
		 'mysql:host=localhost;dbname=geekbrains_db',
   'root',
   ''
  );
		$this->db->exec('SET NAMES UTF8');
		$this->db->setAttribute(
		 PDO::ATTR_DEFAULT_FETCH_MODE,
   PDO::FETCH_ASSOC
  );
	}

	public function SimpleSelect(
	 $table,
  $where_key = false,
  $where_value = false,
  $fetchAll = false
 ){
		if($where_key AND $where_value){
			$query = "SELECT * FROM " . $table . " WHERE " . $where_key . " = '" . $where_value . "'";
		} else{
			$query = "SELECT * FROM " . $table;
		}

		$q = $this->db->prepare($query);
		$q->execute();
			
		if($q->errorCode() != PDO::ERR_NONE){
			$info = $q->errorInfo();
			die($info[2]);
		}

		if($fetchAll){
			return $q->fetchAll();
		} else if($where_key AND $where_value){
			return $q->fetch();
		} else{
			return $q->fetchAll();
		}
	}
	//"SELECT order_id, product_id, count, title, price FROM basket AS T1 INNER JOIN products AS T2 ON T1.product_id = T2.id WHERE T1.user_id = " . $_SESSION["user_id"]
 //+
 public function Select($query){
  $q = $this->db->prepare($query);
  $q->execute();

  if($q->errorCode() != PDO::ERR_NONE){
   $info = $q->errorInfo();
   die($info[2]);
  }

  return $q->fetchAll();
 }
        
 //'Insert into table(f1,f2) value(1,2)'
 //['id=>1,title=>'Товар 1]
 //insert("goods",['title'=>'Товар 1','price'=>100])
 public function Insert($table, $object){
	 $columns = array();
			
	 foreach($object as $key => $value){
  	$columns[] = $key;
	 	$masks[] = ":$key";
				
		 if($value === null){
		 	$object[$key] = 'NULL';
		 }
	 }
			
	 $columns_s = implode(',', $columns); //"'title','price'"
	 $masks_s = implode(',', $masks); //"'title','price'"
			
	 $query = "INSERT INTO $table ($columns_s) VALUES ($masks_s)";
			
	 $q = $this->db->prepare($query);
	 $q->execute($object);
			
	 if($q->errorCode() != PDO::ERR_NONE){
	 	$info = $q->errorInfo();
	 	die($info[2]);
	 }
			
	 return $this->db->lastInsertId();
 }
		
 //UPDATE table set count=10,price=1000 where id = 2
 //['count' => 10,'price'=>1000]
 public function Update($table, $object, $where){
 	$sets = array();
			 
	 foreach($object as $key => $value){
  	$sets[] = "$key=:$key";
				
		 if($value === NULL){
		 	$object[$key]='NULL';
		 }
  }
			 
	 $sets_s = implode(',',$sets);
	 $query = "UPDATE $table SET $sets_s WHERE $where";

	 $q = $this->db->prepare($query);
	 $q->execute($object);

	 if($q->errorCode() != PDO::ERR_NONE){
	 	$info = $q->errorInfo();
	 	die($info[2]);
	 }
			
	 return $q->rowCount();
 }
		
		
 public function Delete($table, $where){
		$query = "DELETE FROM $table WHERE $where";
		$q = $this->db->prepare($query);
		$q->execute();
			
		if($q->errorCode() != PDO::ERR_NONE){
			$info = $q->errorInfo();
			die($info[2]);
		}
			
		return $q->rowCount();
	}
}