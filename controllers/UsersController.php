<?php
class UsersController
{
    public function register()
    {
        if (isset($_POST['signup'])) {
            $options = [
                'cost' => 12
            ];
            $password = password_hash($_POST['password-singup'], PASSWORD_BCRYPT, $options);
            $repassword = password_hash($_POST['password-singup-repeat'], PASSWORD_BCRYPT, $options);
            $data = array($_POST['name'], $_POST['email-signup'], $password, $repassword);
            $result = User::createUser($data);
            if ($result == 'ok') {
                Session::set('success', 'Compte has ben created succesufully');
                header('location:login');
            } else {
            }
        }
    }
    public function login()
    {
        if (isset($_POST["login"])) {
            $data = array($_POST["email-login"]);
            $result = User::loginUser($data);
            if (isset($_POST['remembre'])) {
                if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
                    if ($result->email === $_POST['email-login'] && ($result->password === $_POST['password-login'])) {
                        $_SESSION['logged'] = true;
                        $_SESSION['name'] = $result->name;
                        header('location:users');
                    } else {
                        Session::set('Error', 'email or password are not correct');
                        header('location:login');
                    }
                } else {
                    if ($result->email === $_POST['email-login'] && password_verify($_POST['password-login'], $result->password)) {
                        $_SESSION['logged'] = true;
                        $_SESSION['name'] = $result->name;
                        setcookie('email', $result->email, time() + 60 * 60 * 7);
                        setcookie('password', $result->password, time() + 60 * 60 * 7);
                        header('location:users');
                    } else {
                        Session::set('Error', 'email or password are not correct');
                        header('location:login');
                    }
                }
            } else {
                if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
                    if ($result->email === $_POST['email-login'] && ($result->password === $_POST['password-login'])) {
                        $_SESSION['logged'] = true;
                        $_SESSION['name'] = $result->name;
                        header('location:users');
                    } else {
                        Session::set('Error', 'email or password are not correct');
                        header('location:login');
                    }
                } else {
                    if ($result->email === $_POST['email-login'] && password_verify($_POST['password-login'], $result->password)) {
                        $_SESSION['logged'] = true;
                        $_SESSION['name'] = $result->name;
                        header('location:users');
                    } else {
                        Session::set('Error', 'email or password are not correct');
                        header('location:login');
                    }
                }
            }

            if ($result == 'ok') {
                header('location:users');
            } else {
                echo 'error';
            }
        }
    }
    public function getAllUsers()
    {
        $users = User::getAll();
        return $users;
    }
    public function deleteUser()
    {
        if (isset($_POST['delete-user'])) {
            $data = array($_POST['user-id']);
            $result = User::delete($data);
            if ($result == 'ok') {
                Session::set('success', 'User has ben deleted successufly');
                header('location:users');
            } else {
                Session::set('info', 'something went wrong');
                header('location:users');
            }
        }
    }
    public function AllUsers(){
        $result=User::getAllUsers();
        return $result;
    }
    public function
}
