<?php
class Insignias{

    private $idInsignia;
    private $nombreInsignia;
    private $descripcion;
    private $nombreArchivo;
    private $tipo;
    private $precio;
    
    public function __construct(){
        $this -> db = Database::connect();
    }
    
    public function getIdInsignia(){return $this -> idInsignia;}
    public function getNombreInsignia(){return $this -> nombreInsignia;}
    public function getDescripcion(){return $this -> Descripcion;}
    public function getNombreArchivo(){return $this -> nombreArchivo;}
    public function getTipo(){return $this -> tipo;}
    public function getPrecio(){return $this -> precio;}
    
    public function setIdInsignia($idInsignia){$this -> iidInsignia = $this -> db -> real_escape_string($idInsignia);}
    public function setNombreInsignia($nombreInsignia){$this -> iidInsignia = $this -> db -> real_escape_string($nombreInsignia);}
    public function setDescripcion($descripcion){$this -> iidInsignia = $this -> db -> real_escape_string($descripcion);}
    public function setNombreArchivo($nombreArchivo){$this -> iidInsignia = $this -> db -> real_escape_string($nombreArchivo);}
    public function setTipo($tipo){$this -> iidInsignia = $this -> db -> real_escape_string($tipo);}
    public function setPrecio($precio){$this -> iidInsignia = $this -> db -> real_escape_string($precio);}
    
    public function crearInsignia(){
        $this -> db -> query('INSERT into catInsignia values(default, '.$this -> getNombreInsignia().', "'.$this -> getDescripcion.'", "'.$this -> getNombreArchivo().'", '.getTipo().', '.getPrecio().');
    ');
    }
    
}