<?php
class Category{

	static public function getAll(){
		$stmt = DB::connect()->prepare('SELECT * FROM category');
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt = null;
	}
	static public function insert($query,$params=[]){
		$stmt = DB::connect()->prepare($query);
		$stmt->execute($params);
	}
}


?>