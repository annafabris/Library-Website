<?php
require_once 'bootstrap.php';

if(isUserLoggedIn()){
    $ruolo = getUserRole();
    if($ruolo == "cliente"){
        print "0";
    } else {
        if($ruolo == "admin"){
            $result = $dbh->getNotification("a", 0);
        } elseif ($ruolo == "organizzatore"){
            $result = $dbh->getNotification("o", getUserID());
        }
        $response='';
        foreach($result as $row) {        
            $response = $response.$row["titolo"]."<br>".$row["messaggio"]."<br><br>";
        }
        if(!empty($response)) {
            print $response;
        } else {
            print "0";
        }
    }
} else {    
    print "0";
}
?>