<?php
class Category{

	static public function getAll(){
		$stmt = DB::connect()->prepare('SELECT * FROM category  ');
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
		$stmt = null;
	}
	static public function getUnique(){
		$stmt = DB::connect()->prepare('SELECT DISTINCT  id_category,name FROM category GROUP BY name');
		$stmt->execute();
		if($stmt->rowCount()==0){
			return 0;
		}else{
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		$stmt = null;
	}
	static public function insert($data){
		$var = DB::connect()->prepare("SELECT * FROM category WHERE name=?");
		$var->execute($data);
		if($var->rowCount()>0){
			return "this category already exists";
		}else{
			$stmt = DB::connect()->prepare("INSERT INTO category(name) VALUES(?)");
			if($stmt->execute($data)){
				return 'ok';
			}else{
				return 'error';
			}
			$stmt=null;
		}
		
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
		$stmt=DB::connect()->prepare('SELECT name FROM
		(
			SELECT name,count(*) count1 from post p inner join category c 
			on p.post_category=c.id_category group by name
		)tab
		inner join 
		(
		SELECT MAX(count1) max_count FROM (
			SELECT name,count(*) count1 from post p inner join category c 
			on p.post_category=c.id_category group by name
			)tab
		)tab2
		on tab2.max_count=tab.count1');
		$stmt->execute();

		if($stmt->rowCount()==0){
			return 0;
		}else{
			// die(var_dump($stmt->fetch(PDO::FETCH_ASSOC)));
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}
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