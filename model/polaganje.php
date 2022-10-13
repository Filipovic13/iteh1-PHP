<?php 

class Polaganje{

    public $id;
    public $nivo;
    public $datum;
    public $za_nivo;
    public $polozio;
    public $id_clana;

    public function __construct($id=null, $nivo=null, $datum=null, $za_nivo=null, $polozio=null, $id_clana){

        $this->id=$id;
        $this->nivo=$nivo;
        $this->datum=$datum;
        $this->za_nivo=$za_nivo;
        $this->polozio=$polozio;
        $this->id_clana=$id_clana;
    }

    public static function getAll(mysqli $conn){

        $query="SELECT p.id, p.nivo, p.datum, p.za_nivo, p.polozio, p.id_clana, c.ime, c.prezime 
                FROM polaganja p JOIN clanovi c ON p.id_clana=c.id
                ";
        return $conn->query($query);
    }

    public static function dodajPolaganje(Polaganje $novo_polaganje, mysqli $conn){

        $query = "INSERT INTO polaganja (nivo, datum, za_nivo, polozio, id_clana) VALUES ('$novo_polaganje->nivo', '$novo_polaganje->datum','$novo_polaganje->za_nivo', '$novo_polaganje->polozio', '$novo_polaganje->id_clana') ";
   
        return $conn->query($query);
    }

    
    public static function izmeniPolaganje($nivo, $datum, $za_nivo, $polozio, $id_clana, $edit_id_p, mysqli $conn){

        $query = "UPDATE polaganja 
                  SET nivo ='$nivo', datum='$datum', za_nivo='$za_nivo', polozio='$polozio', id_clana='$id_clana' 
                  WHERE id = '$edit_id_p' ";
        return $conn->query($query);
    }

  

}



?> 