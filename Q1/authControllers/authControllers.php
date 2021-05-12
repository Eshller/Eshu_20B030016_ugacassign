<?php
session_start();
//for security purposes we dont give database info directly in php file instead we make a new php file and include it and call whenever needed.
require 'config/db.php';

$errors=array();
$username="";
$email="";

//when button is pressed
if(isset($_POST['signup-btn'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $passwordConf=$_POST['passwordConf'];
//validation check
    if(empty($username)){
        $errors['username']="You need Username Right?";
    }
    if(empty($email)){
        $errors['email']="E-mail required";
    }
    //such that user enters valid email and not any random text
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors['email']="Email address is not valid";
    }
    if(empty($password)){
        $errors['password']="Password required";
    }
    if($password!== $passwordConf){
        $errors['password']="Passwords do not match";
    }

    $emailQuery = "SELECT * FROM users WHERE email=? LIMIT 1";
    $stmt= $conn->prepare($emailQuery);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result= $stmt->get_result();
    $userCount= $result->num_rows;
         $stmt->close();
    if($userCount>0){
        $errors['email']="Email Already Exists";
    }
    if(count($errors)==0){

        $password = password_hash($password,PASSWORD_DEFAULT);
        $sql= "INSERT INTO users (username,email,password) VALUES (?,?,?)";
        $stmt= $conn->prepare($sql);
        $stmt->bind_param('sss',$username,$email,$password);
        if($stmt->execute()){
            //login user    
            $user_id= $conn->insert_id;
            $_SESSION['id']=$user_id;
            $_SESSION['username']= $username;
            $_SESSION['email']= $email;
            //alert message
            $_SESSION['message']="You are now logged in!";
            $_SESSION['alert-class']="alert-success";
            header('location:index.php');
            exit();
        }else{
            $errors['db_error']= "Error: failed to register, Try Again!";
        }
    }
}


//login button
if(isset($_POST['login-btn'])){
    $username=$_POST['username'];
    
    $password=$_POST['password'];
    

    if(empty($username)){
        $errors['username']="Oopsie, We need a Username!";
    }
    if(empty($password)){
        $errors['password']="Password cannot be empty";
    }

    if(count($errors)==0){
        $sql= "SELECT * FROM users WHERE email=? OR username=? LIMIT 1";
    $stmt= $conn->prepare($sql);
    $stmt->bind_param('ss',$username,$username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    if(password_verify($password,$user['password'])){
        //login successfull
        $_SESSION['id']=$user['id'];
        $_SESSION['username']= $user['username'];
        $_SESSION['email']= $user['email'];
        $_SESSION['message']="You did it, you are now logged in!";
        $_SESSION['alert-class']="alert-success";
        header('location:index.php');
        exit();
    }else{
        $errors['login-fail']="Wrong Password or Username";
    }
    }
}
    //logout
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        header('location: login.php');
        exit();
    }
