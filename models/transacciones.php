<?php
class Transacciones{

    private $idInsP;
    private $username;
    private $idInsignia ;
    private $fObtenida;
    private $fechaO;
    
    
    

    public function __construct(){
        $this -> db = Database::connect();
    }

}