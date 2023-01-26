<?php
class Post {

	static public function getAll(){
		$stmt = DB::connect()->prepare("SELECT * FROM post as p LEFT JOIN category as c on p.post_category = c.id_category  or p.post_category is null");
		$stmt->execute();
		if($stmt->rowCount()==0){
			return 0;
		}else{
			// die(var_dump($stmt->fetchAll()));
			return $stmt->fetchAll();

		}
		$stmt = null;
	}
	static public function insert($data){
		$stmt= DB::connect()->prepare('INSERT INTO post(title,content,picture,post_category) VALUES(?,?,?,?)');
		if($stmt->execute($data)){
			return 'ok';
		}else{
            return 'error';
		}
		$stmt=null;
	}
	static public function delete($data){
		$stmt = DB::connect()->prepare('DELETE FROM post WHERE id=?');
        if($stmt->execute($data)){
			return 'ok';
		}else{
			return 'error';
		}
		$stmt=null;
	}
	static public function update($data,$param){
		if($param==1){
			$stmt = DB::connect()->prepare('UPDATE post SET title=?,content=?,picture=?,post_category=? WHERE id=?');
		}else{
			$stmt = DB::connect()->prepare('UPDATE post SET title=?,content=?,post_category=? WHERE id=?');
		}
		if($stmt->execute($data)){
          return 'ok';
		}else{
			return 'error';
		}
		$stmt=null;
	}
	static public function GetNumberRow(){
		$stmt=DB::connect()->prepare('SELECT * FROM post');
		$stmt->execute();
		return $stmt->rowCount();
		$stmt=null;
	}
	static public function GetSearchPost($data){
		$stmt=DB::connect()->prepare("SELECT * FROM post p INNER JOIN category c on p.post_category=c.id_category WHERE title like ? OR content like ? or name like ? ");
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