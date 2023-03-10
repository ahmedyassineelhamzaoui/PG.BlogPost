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
    static public function checkUser($data){
        $stmt=DB::connect()->prepare('SELECT * FROM users WHERE email=?');
        $stmt->execute($data);
        return $stmt->rowCount();
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
       $stmt=null;
    }
    static public function delete($data){
        $stmt= DB::connect()->prepare('DELETE FROM users WHERE id=?');
        if($stmt->execute($data)){
            return 'ok';
        }else{
            return 'error';
        }

    }
    static public function getAllUsers(){
        $stmt=DB::connect()->prepare('SELECT * FROM users ');
        $stmt->execute();
        return $stmt->rowCount();
    }
    static public function GetSeachedUser($data){
        if(isset($_POST['user-search'])){
            $stmt=DB::connect()->prepare('SELECT * FROM users WHERE name like ? OR email like ?');
            $stmt->execute($data);
            if($stmt->rowCount()==0){
                return 0;
            }else{
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            
        }
    }
    static public function getConnectedUser($data){
          $stmt=DB::connect()->prepare('SELECT * FROM users WHERE id=?');
          $stmt->execute($data);
          return $stmt->fetch(PDO::FETCH_OBJ);
    }
    static public function ProfileUpdated($data){
          $stmt=DB::connect()->prepare('UPDATE users SET name=?, email=?, password=?,repassword=?  WHERE id=? ');
          $stmt->execute($data);
    }
}
?>