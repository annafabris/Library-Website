<?php
class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname){
        $this->db = new mysqli($servername, $username, $password, $dbname);
        if ($this->db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }        
    }

    public function getPosts($n=-1){
        $query = "SELECT idevento, titoloevento, imgevento, anteprimaevento, dataevento, oraevento, postitotali, iscritti, autore, nome FROM evento, autore WHERE autore=idautore ORDER BY dataevento DESC";
        if($n > 0){
            $query .= " LIMIT ?";
        }
        $stmt = $this->db->prepare($query);
        if($n > 0){
            $stmt->bind_param('i',$n);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostById($id){
        $query = "SELECT idevento, titoloevento, imgevento, testoevento, dataevento, oraevento, prezzo, postitotali, iscritti, nome FROM evento, autore WHERE idevento=? AND autore=idautore";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function getPostByIdAndAuthor($id, $idauthor){
        $query = "SELECT idevento, anteprimaevento, titoloevento, imgevento, testoevento, dataevento, oraevento, prezzo, postitotali, iscritti FROM evento WHERE idevento=? AND autore=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii',$id, $idauthor);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostByAuthorId($id){
        $query = "SELECT idevento, titoloevento, imgevento FROM evento WHERE autore=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getFullEventsByAuthorId($id){
        $query = "SELECT idevento, titoloevento, imgevento FROM evento WHERE autore=? AND postitotali <= iscritti";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertArticle($titoloevento, $testoevento, $anteprimaevento, $dataevento, $oraevento, $imgevento, $autore, $prezzo, $postitotali){
        $query = "INSERT INTO evento (titoloevento, testoevento, anteprimaevento, dataevento, oraevento, imgevento, autore, prezzo, postitotali, iscritti) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 0)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssssiii',$titoloevento, $testoevento, $anteprimaevento, $dataevento, $oraevento, $imgevento, $autore, $prezzo, $postitotali);
        $stmt->execute();
        
        return $stmt->insert_id;
    }

    public function updateArticleOfAuthor($idevento, $titoloevento, $testoevento, $anteprimaevento, $dataevento, $oraevento, $imgevento, $autore, $prezzo, $postitotali){
        $query = "UPDATE evento SET titoloevento = ?, testoevento = ?, anteprimaevento = ?, dataevento = ?, oraevento = ?, imgevento = ?, prezzo = ?, postitotali = ? WHERE idevento = ? AND autore = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssssiiii',$titoloevento, $testoevento, $anteprimaevento, $dataevento, $oraevento, $imgevento, $prezzo, $postitotali, $idevento, $autore);
        
        return $stmt->execute();
    }

    public function deleteArticleOfAuthor($idevento, $autore){
        $query = "DELETE FROM evento WHERE idevento = ? AND autore = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii',$idevento, $autore);
        $stmt->execute();
        var_dump($stmt->error);
        return true;
    }

    public function getAuthors(){
        $query = "SELECT email, nome, idautore, attivo FROM autore";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getClient(){
        $query = "SELECT email, nome, idcliente, attivo FROM cliente";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function checkLoginUser($email, $password, $role){
        if($role == "cliente"){
            $query = "SELECT idcliente, email, nome FROM cliente WHERE attivo=1 AND email = ? AND password = ?";
        } else {
            $query = "SELECT idautore, email, nome FROM autore WHERE attivo=1 AND email = ? AND password = ?";
        }
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function registerNewUser($email, $password, $nome, $role){
        if($role == "cliente"){
            $query = "INSERT INTO cliente (email, password, nome, attivo) VALUES (?, ?, ?, 1)";
        } else {
            $query = "INSERT INTO autore (email, password, nome, attivo) VALUES (?, ?, ?, 1)";
        }
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sss', $email, $password, $nome);
        $stmt->execute();
        
        return $stmt->insert_id;
    }

    public function updateEventTicketSold($idevento, $quantita){
        $query = "SELECT iscritti FROM evento WHERE idevento = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idevento);
        $stmt->execute();
        $result = $stmt->get_result();
        $iscritti = $result->fetch_assoc();

        $query = "UPDATE evento SET iscritti = ? WHERE idevento = ?";
        $stmt = $this->db->prepare($query);
        $quantita = $quantita + intval($iscritti["iscritti"]);
        $stmt->bind_param('ii',$quantita, $idevento);
        
        return $stmt->execute();
    }

    public function toggleUserStatus($id, $role){
        if($role == "cliente"){
            $query = "SELECT attivo FROM cliente WHERE idcliente = ?";
        } else {
            $query = "SELECT attivo FROM autore WHERE idautore = ?";
        }
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id );
        $stmt->execute();
        $result = $stmt->get_result();
        $attivo = $result->fetch_assoc();
    
        if($role == "cliente"){
            $query = "UPDATE cliente SET attivo = ? WHERE idcliente = ?";
        } else {
            $query = "UPDATE autore SET attivo = ? WHERE idautore = ?";
        }
        $stmt = $this->db->prepare($query);
        if(intval($attivo["attivo"] == 0)){
            $a = 1;
        } else {
            $a = 0;
        }
        $stmt->bind_param('ii', $a, $id);        
        return $stmt->execute();
    }

    public function addNotification($titolo, $messaggio, $ruolo, $destinatario){
        $query = "INSERT INTO notifica (titolo, stato, messaggio, ruolodestinatario, destinatario) VALUES (?, 0, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssi', $titolo, $messaggio, $ruolo, $destinatario);
        $stmt->execute();

        return $stmt->insert_id;
    }

    public function getNotification($ruolo, $destinatario){
        $query = "SELECT * FROM notifica WHERE stato = 0 AND ruolodestinatario = ? AND destinatario = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si', $ruolo, $destinatario);
        $stmt->execute();
        $result = $stmt->get_result();

        $query = "UPDATE notifica SET stato = 1 WHERE stato = 0 AND ruolodestinatario = ? AND destinatario = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si', $ruolo, $destinatario);
        $stmt->execute();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /*public function setNotificationRead($ruolo, $destinatario){
        $query = "UPDATE notifica SET stato = 1 WHERE stato = 0 AND ruolodestinatario = ? AND destinatario = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
        return $stmt->execute();
    }*/
}
?>