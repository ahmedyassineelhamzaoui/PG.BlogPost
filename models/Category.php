<?php
class Category{

	static public function getAll(){
		$stmt = DB::connect()->prepare('SELECT * FROM category');
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
	static public function getAllCategory(){
		$stmt= DB::connect()->prepare('SELECT * FROM category');
		$stmt->execute();
		return $stmt->rowCount();
	}
    static public function BestCategory(){
		$stmt=DB::connect()->prepare('SELECT name
		FROM (SELECT name, COUNT(*) as co FROM category GROUP BY name) sub
		JOIN (SELECT MAX(co) as max_co FROM (SELECT name,COUNT(*) as co FROM category GROUP BY name) as sub) max_table
		ON sub.co = max_table.max_co;
		');
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	static public function GetSearchCategory($data){
      $stmt=DB::connect()->prepare('SELECT * FROM category WHERE name like ? OR id_category like ?');
	  $stmt->execute($data);
	  if($stmt->rowCount()==0){
		return 0;
	  }else{
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	  }
	  $stmt=null;
	}
}


?>