<?php

class User{
    static public function createUser($data){
        $stmt = DB::connect()->prepare('INSERT INTO users(name,email,password,repassword) VALUES(?,?,?,?)');
        if($stmt->execute($data)){
            return 'ok';
        }else{
            return 'error';
        }
    }
    static public function loginUser($data){
        try{
        $stmt = DB::connect()->prepare('SELECT * FROM users WHERE email=?');
        $stmt->execute($data);
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        return $user;
        }catch(PDOException $e){
            echo 'Erruer'/$e->getMessage();
        }
    }
    static public function getAll(){
       $stmt=DB::connect()->prepare('SELECT * FROM users');
       $stmt->execute();
       $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
       return $result;
    }
}
?>