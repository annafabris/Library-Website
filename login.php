<?php
require_once 'bootstrap.php';

//registration
if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["nome"])){
    $id = true;
    if(isset($_POST["nome"])){
        $id = $dbh->registerNewUser($_POST["email"], $_POST["password"], $_POST["nome"], $_POST["ruolo"]);
    }
    if($id!=false){
        $login_result = $dbh->checkLoginUser($_POST["email"], $_POST["password"], $_POST["ruolo"]);
        if(count($login_result)==0){
            $templateParams["errorelogin"] = "Errore! Controllare email o password!";    //Login fallito
        } else {
            registerLoggedUser($login_result[0], $_POST["ruolo"]);
        }
    }else{
        $templateParams["errorelogin"] = "Errore in inserimento!";
    }
} 

//login
if(isset($_POST["email"]) && isset($_POST["password"])){
    if($_POST["email"] == "admin@blogtw.com" && $_POST["password"] == "admin") {
        registerLoggedUser(null, "admin");
    } else {
        $login_result = $dbh->checkLoginUser($_POST["email"], $_POST["password"], $_POST["ruolo"]);
        if(count($login_result)==0){
            $templateParams["errorelogin"] = "Errore! Controllare email o password!";    //Login fallito
        } else {
            registerLoggedUser($login_result[0], $_POST["ruolo"]);
        }
    }
}

if(isUserLoggedIn() && getUserRole()=="organizzatore"){                      //organizer is logged in
    $templateParams["titolo"] = "Biblioteca Macis - Admin";
    $templateParams["nome"] = "login-home.php";
    $templateParams["eventi"] = $dbh->getPostByAuthorId($_SESSION["id"]);
    if(isset($_GET["formmsg"])){
        $templateParams["formmsg"] = $_GET["formmsg"];
    }
} else if (isUserLoggedIn() && getUserRole()=="cliente"){                //client is logged in
    $templateParams["titolo"] = "Biblioteca Macis - Home";
    $templateParams["nome"] = "home.php";
    $templateParams["eventi"] = $dbh->getPosts();
} else if (isUserLoggedIn() && getUserRole()=="admin"){                 //admin is logged in
    $templateParams["titolo"] = "Biblioteca Macis - Admin";
    $templateParams["nome"] = "login-home.php";
    $templateParams["eventi"] = $dbh->getPosts();
} else if (isset($_GET["action"]) && $_GET["action"]=1){ 
    $templateParams["titolo"] = "Biblioteca Macis - Login";
    $templateParams["nome"] = "registration-form.php";
} else {
    $templateParams["titolo"] = "Biblioteca Macis - Login";
    $templateParams["nome"] = "login-form.php";
}

require 'template/base.php';
?>