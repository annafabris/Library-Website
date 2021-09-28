<?php
require_once 'bootstrap.php';

if(isUserOrganizer()){
    $templateParams["titolo"] = "Biblioteca Macis - Admin";
    $templateParams["nome"] = "login-home.php";
    $templateParams["notifica"] = "notifica.php";
    $templateParams["eventi"] = $dbh->getPostByAuthorId($_SESSION["id"]);
    if(isset($_GET["formmsg"])){
        $templateParams["formmsg"] = $_GET["formmsg"];
    }
} else {
    //Base Template
    $templateParams["titolo"] = "Biblioteca Macis - Archivio";
    $templateParams["nome"] = "home.php";
    //Home Template
    $templateParams["eventi"] = $dbh->getPosts();
}
require 'template/base.php';
?>