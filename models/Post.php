<?php
class Post {

	static public function getAll(){
		$stmt = DB::connect()->prepare('SELECT * FROM post as p INNER JOIN category as c on p.post_category = c.id_category');
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt = null;
	}
}


?>