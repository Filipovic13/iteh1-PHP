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

        $query="SELECT * FROM polaganja";
        return $conn->query($query);
    }

  

}



?> 