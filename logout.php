<?php
require_once 'bootstrap.php';

session_unset();

//Base Template
$templateParams["titolo"] = "Biblioteca Macis - Home";
$templateParams["nome"] = "home.php";
//Home Template
$templateParams["logoutsuccess"] = "Logout ha avuto successo";
$templateParams["eventi"] = $dbh->getPosts();

require 'template/base.php';
?>s