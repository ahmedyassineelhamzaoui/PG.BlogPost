<?php
   class UsersController{
   public function register(){
    if(isset($_POST['signup'])){
        $options=[
            'cost' => 12
        ];
        $password =password_hash($_POST['password-singup'],PASSWORD_BCRYPT,$options);
        $repassword=password_hash($_POST['password-singup-repeat'],PASSWORD_BCRYPT,$options);
        $data=array($_POST['name'],$_POST['email-signup'],$password,$repassword);
        $result=User::createUser($data);
        if($result=='ok'){
            Session::set('Success','Compte has ben created succesufully');
            header('location:login');
        }else{

        }
    }
   }
   public function login(){
    if(isset($_POST["login"])){
        $data=array($_POST["email-login"]);
        $result=User::loginUser($data);
        if($result->email === $_POST['email-login'] && password_verify($_POST['password-login'],$result->password)){
            $_SESSION['logged'] = true;
            $_SESSION['name']=$result->name;
            header('location:users');
        }else{
            Session::set('Error','email or password are not correct');
            header('location:login');
        }
        if($result=='ok'){
            header('location:users');
        }else{
            echo 'error';
        }
    }
   }
   }

?>