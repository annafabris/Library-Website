<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Biblioteca Macis - Home";
$templateParams["nome"] = "home.php";
$templateParams["notifica"] = "notifica.php";
//Home Template
$templateParams["eventi"] = $dbh->getPosts();

require 'template/base.php';
?>