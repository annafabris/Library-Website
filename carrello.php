<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Biblioteca Macis - Carrello";
$templateParams["nome"] = "carrello.php";
//Home Template
$templateParams["articoli"] = $dbh->getPosts();
require 'template/base.php';
?>