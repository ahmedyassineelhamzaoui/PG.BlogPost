<?php
class Post{
    static public function getAll(){
        $stmt= DB::connect()->prepare("SELECT * FROM post");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }
}


?>