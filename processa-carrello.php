<?php
require_once 'bootstrap.php';

if(!isUserLoggedIn() || !isset($_GET["action"]) || ($_GET["action"]!="add" && $_GET["action"]!="remove" && $_GET["action"]!="empty" && $_GET["action"]!="buy")){
    header("location: carrello.php");
}

switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantita"])) {
            $msg = "ok";
            //$dbh->updateEventTicketSold($_GET["idProd"], $_POST["quantita"]);
            $evento = $dbh->getPostByid($_GET["idProd"]);
            $itemArray = array($_GET["idProd"]=>array('nomeProd'=>$evento[0]["titoloevento"], 
                                                                'idProd'=>$evento[0]["idevento"], 
                                                                'quantita'=>$_POST["quantita"], //NB
                                                                'prezzo'=>$evento[0]["prezzo"], 
                                                                'img'=>$evento[0]["imgevento"]));
            //se il carrello era vuoto
			if(empty($_SESSION["carrello"])){
                $_SESSION["carrello"] = $itemArray;
            } else {
                //se l'evento era già presente nel carrello aumento la quantità
                if(in_array($evento[0]["idevento"], array_keys($_SESSION["carrello"]))) { 
					foreach($_SESSION["carrello"] as $k => $v) {
						if($evento[0]["idevento"] == $k) {
							if(empty($_SESSION["carrello"][$k]["quantita"])) {
								$_SESSION["carrello"][$k]["quantita"] = 0;
							}
                            $_SESSION["carrello"][$k]["quantita"] += $_POST["quantita"];
						}
                    }
				} else {    //se l'evento non era già presente
                    $_SESSION["carrello"][$_GET["idProd"]]=$itemArray[$_GET["idProd"]];
                }
            }
        }
        header("location: carrello.php?formmsg=".$msg);
	break;
	case "remove":
		if(!empty($_SESSION["carrello"])) {
			foreach($_SESSION["carrello"] as $k => $v) {
					if($_GET["idProd"] == $k){
                        unset($_SESSION["carrello"][$k]);				
                    }
					if(empty($_SESSION["carrello"])){
                        unset($_SESSION["carrello"]);
                    }
			}
        }
        $msg = "remove!";
        header("location: carrello.php?formmsg=".$msg);
	break;
	case "empty":
        unset($_SESSION["carrello"]);
        $msg = "empty!";
        header("location: carrello.php?formmsg=".$msg);
    break;
    case "buy":
        $articoli = $dbh->getPosts();
        foreach($articoli as $evento){
            foreach($_SESSION["carrello"] as $k => $v){
                if($_SESSION["carrello"][$k]["idProd"] == $evento["idevento"]){
                    if($_SESSION["carrello"][$k]["quantita"] + $evento["iscritti"] == $evento["postitotali"]){
                        $dbh->addNotification("L'evento è sold-out", "I posti dell'evento \"". $evento["titoloevento"] ."\" sono finiti.", "o", $evento["autore"]);
                    }
                }
            }
        }
        foreach($_SESSION["carrello"] as $k => $v) {
            $result = $dbh->updateEventTicketSold($k, $_SESSION["carrello"][$k]["quantita"]);
            $msg = $msg."empty!".var_dump($result);
        }
        unset($_SESSION["carrello"]);
        header("location: carrello.php?formmsg=".$msg);
	break;		
}
?>
