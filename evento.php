<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Biblioteca Macis - evento";
$templateParams["nome"] = "singolo-evento.php";
$templateParams["notifica"] = "notifica.php";
//Home Template
$idevento = -1;
if(isset($_GET["id"])){
    $idevento = $_GET["id"];
}
$templateParams["evento"] = $dbh->getPostById($idevento);

require 'template/base.php';
?>