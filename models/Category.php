<?php
class Category{

	static public function getAll(){
		$stmt = DB::connect()->prepare('SELECT *  FROM category');
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt = null;
	}
	static public function getUnique(){
		$stmt = DB::connect()->prepare('SELECT DISTINCT  id_category,name FROM category GROUP BY name');
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt = null;
	}
	static public function insert($data){
		$stmt = DB::connect()->prepare("INSERT INTO category(name) VALUES(?)");
		if($stmt->execute($data)){
			return 'ok';
		}else{
            return 'error';
		}
		$stmt=null;
	}
	static public function delete($data){
		$stmt = DB::connect()->prepare("DELETE FROM category WHERE 	id_category=? ");
		if($stmt->execute($data)){
			return "ok";
		}else{
			return "error";
		}
	}
	static public function update($data){
		$stmt = DB::connect()->prepare("UPDATE category SET name=? WHERE id_category=? ");
		if($stmt->execute($data)){
			return "ok";
		}else{
			return "error";
		}

	}
}


?>