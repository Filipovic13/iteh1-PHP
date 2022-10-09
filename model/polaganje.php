<?php 

class Polaganje{

    public $nivo;
    public $datum;
    public $za_nivo;
    public $polozio;
    public $id_clana;

    public function __construct($nivo=null, $datum=null, $za_nivo=null, $polozio=null, $id_clana){

        $this->nivo=$nivo;
        $this->datum=$datum;
        $this->za_nivo=$za_nivo;
        $this->polozio=$polozio;
        $this->id_clana=$id_clana;
    }

    public static function getAll(mysqli $conn){

        $query="SELECT nivo, datum, za_nivo, polozio, id_clana, ime, prezime 
                FROM polaganja p JOIN clanovi c ON p.id_clana=c.id
                ";
        return $conn->query($query);
    }

  

}



?> 