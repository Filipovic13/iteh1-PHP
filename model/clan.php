<?php 

class Clan {

    public $id;
    public $ime;
    public $prezime;
    public $telefon;
    public $email;
    public $adresa;
    public $nivo;

    public function __construct($id=null, $ime=null, $prezime=null, $telefon=null, $email=null, $adresa=null, $nivo=null){
        $this->id=$id;
        $this->ime=$ime;
        $this->prezime=$prezime;
        $this->telefon=$prezime;
        $this->email=$email;
        $this->adresa=$adresa;
        $this->nivo=$nivo;
    }

    public static function getAll(mysqli $conn){

        $query = "SELECT * 
                  FROM clanovi";
        return $conn->query($query);

        
        

    }
}


?>