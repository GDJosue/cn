<?php 
class TrofeosCNCC{
    private $idTrofeo;
    private $concepto;
    private $puntos;
    private $username;
    private $fechaTorneo;
    
    public function __construct()
    {
        $this -> db = Database::connect();
    }
    
    function getIdTrofeo(){return $this -> idTrofeo;}
    function getConcepto(){return $this -> concepto;}
    function getPuntos(){return $this -> puntos;}
    function getUsername(){return $this -> username;}
    function getFechaTorneo(){return $this -> fechaTorneo;}
    
    function setIdTrofeo($idTrofeo){$this -> idTrofeo = $this -> db -> real_escape_string($idTrofeo);}
    function setConcepto($concepto){$this -> concepto = $this -> db -> real_escape_string($concepto);}
    function setPuntos($puntos){$this -> puntos = $this -> db -> real_escape_string($puntos);}
    function setUsername($username){$this -> username = $this -> db -> real_escape_string($username);}
    function setFechaTorneo($fechaTorneo){$this -> fechaTorneo = $this -> db -> real_escape_string($fechaTorneo);}
    
    function agregarTrofeos()
    {
        $this -> db -> query("insert into tbCahuayosInfo VALUES(DEFAULT, '".$this -> concepto."', ".$this -> puntos.", '".$this -> username."','".$this -> fechaTorneo."')");
    }
}

?>