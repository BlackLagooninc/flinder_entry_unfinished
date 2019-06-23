<?php


session_start();

require('assets/html/login.html');
require('assets/php/database.php');


if(!empty($_POST)){
    $username = ($_POST['username']);
    $password = ($_POST['password']);
    $usertype = 'admin';

    $stmt = $conn->prepare("SELECT `username`, `password`, `usertype`  FROM `user` WHERE `username` = :username AND `password` = :password AND `usertype` = :usertype");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':usertype', $usertype);
    $stmt->execute();

    $usersFound = $stmt->rowCount();

    echo "<pre>";
    echo "<pre>";

    if($usersFound == 1 ){
       $_SESSION['loggedIn'] = 'TRUE';
        header("Location: admin.php");
       die;
    }elseif ($usersFound == 0){
        $usertype = 'user';

    $stmt = $conn->prepare("SELECT `username`, `password`, `usertype`  FROM `user` WHERE `username` = :username AND `password` = :password AND `usertype` = :usertype");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':usertype', $usertype);
    $stmt->execute();

    $foundUser = $stmt->rowCount();
    }if($foundUser == 1 ){
       $_SESSION['loggedIn'] = 'TRUE';
        header("Location: user.php");
       die;
    }else{
        echo "<h1>deze gebruiker is niet gevonden</h1>";
    }
    //&& $usersFound['usertype'] == admin
}
