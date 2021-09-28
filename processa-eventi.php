<?php
require_once 'bootstrap.php';

if(!isUserLoggedIn() || !isset($_POST["action"])){
    header("location: login.php");
}
if($_POST["action"]==1){
    //Inserisco
    $titoloevento = $_POST["titoloevento"];
    $testoevento = $_POST["testoevento"];
    $anteprimaevento = $_POST["anteprimaevento"];
    $dataevento = $_POST["dataevento"];
    $oraevento = $_POST["oraevento"];
    $autore = $_SESSION["id"];
    $prezzo = $_POST["prezzo"];
    $postitotali = $_POST["postitotali"];


    list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["imgevento"]);
    if($result != 0){
        $imgevento = $msg;
        $id = $dbh->insertArticle($titoloevento, $testoevento, $anteprimaevento, $dataevento, $oraevento, $imgevento, $autore, $prezzo, $postitotali);
        if($id!=false){
            $msg = "Inserimento completato correttamente!";
            $dbh->addNotification("Nuovo evento inserito", " con id = \"". $autore ."\" ha inserito il seguente evento: ". $titoloevento, "a", 0);
        }
        else{
            $msg = "Errore in inserimento!";
        }
        
    }
    header("location: login.php?formmsg=".$msg);
}
if($_POST["action"]==2){
    //modifico
    $idevento = $_POST["idevento"];
    $titoloevento = $_POST["titoloevento"];
    $testoevento = $_POST["testoevento"];
    $anteprimaevento = $_POST["anteprimaevento"];
    $dataevento = $_POST["dataevento"];
    $oraevento = $_POST["oraevento"];
    $prezzo = $_POST["prezzo"];
    $postitotali = $_POST["postitotali"];
    $autore = $_SESSION["id"];

    if(isset($_FILES["imgevento"]) && strlen($_FILES["imgevento"]["name"])>0){
        list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["imgevento"]);
        if($result == 0){
            header("location: login.php?formmsg=".$msg);
        }
        $imgevento = $msg;

    }
    else{
        $imgevento = $_POST["oldimg"];
    }
    $dbh->updateArticleOfAuthor($idevento, $titoloevento, $testoevento, $anteprimaevento, $dataevento, $oraevento, $imgevento, $autore, $prezzo, $postitotali);
    $msg = "Modifica completata correttamente!";
    $dbh->addNotification("Modifica evento", "L'autore con id = \"". $autore ."\" ha modificato il seguente evento: ". $titoloevento, "a", 0);
    header("location: login.php?formmsg=".$msg);
}

if($_POST["action"]==3){
    //cancello
    echo "entro";
    $idevento = $_POST["idevento"];
    $autore =  $_SESSION["id"];
    $dbh->deleteArticleOfAuthor($idevento, $autore);
    
    $msg = "Cancellazione completata correttamente!";
    $dbh->addNotification("Cancellazione evento", "L'autore con id = \"". $autore ."\" ha cancellato il seguente evento: ". $titoloevento, "a", 0);
    header("location: login.php?formmsg=".$msg);
}

?>