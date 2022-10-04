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

        $query = "SELECT id, ime, prezime, telefon, email, adresa, nivo
                  FROM (
                        SELECT c.id, c.ime, c.prezime, c.telefon, c.email, c.adresa, p.nivo,
                        rank() OVER (PARTITION BY c.id ORDER BY p.datum DESC) as rn
                         FROM clanovi c JOIN polaganja p ON c.id = p.id_clana
                         ) t
                     WHERE rn = 1;
                  ";
        // $query = "SELECT * FROM clanovi";
        return $conn->query($query);
    }


    public static function dodajClana(Clan $novi_clan, mysqli $conn){

        $query1 = "INSERT INTO clanovi (ime, prezime, telefon, email, adresa) VALUES ('$novi_clan->ime', '$novi_clan->prezime', '$novi_clan->telefon', '$novi_clan->email','$novi_clan->adresa')";
       
        $query2=null;
        if($conn->query($query1)){
            $query2="INSERT INTO polaganja (nivo, id_clana) VALUES ('P0', LAST_INSERT_ID() )";
        }

        return $conn->multi_query($query2);

    }



}


?>