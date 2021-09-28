<?php
require_once 'bootstrap.php';

if(!isUserLoggedIn() || !isset($_GET["action"]) || ($_GET["action"]!=1 && $_GET["action"]!=2 && $_GET["action"]!=3) || ($_GET["action"]!=1 && !isset($_GET["id"]))){
    header("location: login.php");
}

if($_GET["action"]!=1){
    $risultato = $dbh->getPostByIdAndAuthor($_GET["id"], $_SESSION["id"]);
    if(count($risultato)==0){
        $templateParams["evento"] = null;
    }
    else{
        $templateParams["evento"] = $risultato[0];
    }
}
else{
    $templateParams["evento"] = getEmptyArticle();
}




$templateParams["titolo"] = "Biblioteca Macis - Gestisci Eventi";
$templateParams["nome"] = "admin-form.php";

$templateParams["azione"] = $_GET["action"];

require 'template/base.php';
?>