<?php
require_once 'bootstrap.php';

if(isset($_GET["action"])){
    $id = $_GET["id"];
    $role = $_GET["action"];
    $dbh->toggleUserStatus($id, $role);
    //Base Template
    $templateParams["titolo"] = "Biblioteca Macis - Contatti";
    $templateParams["nome"] = "contatti.php";
    //Home Template
    $templateParams["autori"] = $dbh->getAuthors();
    $templateParams["clienti"] = $dbh->getClient();
} else {
    //Base Template
    $templateParams["titolo"] = "Biblioteca Macis - Contatti";
    $templateParams["nome"] = "contatti.php";
    //Home Template
    $templateParams["autori"] = $dbh->getAuthors();
    $templateParams["clienti"] = $dbh->getClient();
}


require 'template/base.php';
?>