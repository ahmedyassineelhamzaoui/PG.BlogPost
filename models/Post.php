<?php
class Post {

	static public function getAll(){
		$stmt = DB::connect()->prepare('SELECT * FROM post as p INNER JOIN category as c on p.post_category = c.id_category');
		$stmt->execute();
		return $stmt->fetchAll();
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
	static public function update($data){
		$stmt = DB::connect()->prepare('UPDATE post SET title=?,content=?,picture=?,post_category=? WHERE id=?');
		if($stmt->execute($data)){
          return 'ok';
		}else{
			return 'error';
		}
		$stmt=null;
	}
}


?>