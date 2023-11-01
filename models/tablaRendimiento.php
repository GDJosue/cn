<?php
class TablaRendimiento{
    private $idTorneo;
    private $nombreT;
    private $fechaT;
    private $bonificacionT;
    private $distribuido;
    private $ritmoT; 
    private $idLiga;
    private $jugadores;

    public function __construct(){
        $this -> db = Database::connect();
    }
    public function getIdTorneo(){
        return $this -> idTorneo;
    }
    public function getNombreT(){
        return $this -> nombreT;
    }
    public function getFechaT(){
        return $this -> fechaT;
    }
    public function getBonificacionT(){
        return $this -> bonificacionT;
    }
    public function getDistribuido(){
        return $this -> distribuido;
    }
    public function getRitmoT(){
        return $this -> ritmoT;
    }
    public function getIdLiga(){
        return $this -> idLiga;
    }
    public function getJugadores(){
        return $this -> jugadores;
    }
   
    public function setIdTorneo($idTorneo){
        $this -> idTorneo = $this -> db -> real_escape_string($idTorneo);
    }
    public function setNombreT($nombreT){
        $this -> nombreT = $this -> db -> real_escape_string($nombreT);
    }
    public function setFechaT($fechaT){
        $this -> fechaT = $this -> db -> real_escape_string($fechaT);
    }
    public function setBonificacionT($bonificacionT){
        $this -> bonificacionT = $this -> db -> real_escape_string($bonificacionT);
    }
    public function setDistribuido($distribuido){
        $this -> distribuido = $this -> db -> real_escape_string($distribuido);
    }
    public function setRitmoT($ritmoT){
        $this -> ritmoT = $this -> db -> real_escape_string($ritmoT);
    }
    public function setIdLiga($idLiga){
        $this -> idLiga = $this -> db -> real_escape_string($idLiga);
    }
    public function setJugadores($jugadores){
        $this -> jugadores = $jugadores;
    }

    public function guardarTorneoBD(){
        $multiplicador = 1;
        switch($this -> getRitmoT())
        {
            case "bullet":{
                $multiplicador = 1;
            }break;
            case "blitz":{
                $multiplicador = 3;
            }break;
            case "rapid":{
                $multiplicador = 5;
            }break;
            case "classical":{
                $multiplicador = 7;
            }break;
            default: {
                $multiplicador = 1 ; 
            }
            break;
        }
        foreach($this -> jugadores as $registros)
        {
            $this -> db -> query("Call registrarTorneo('".$registros -> {'username'}."','".$this -> getIdTorneo()."','".$this -> getNombreT()."',".strval(intval($this -> getBonificacionT()) * $multiplicador * intval($registros -> {'score'})).",'".$this -> getFechaT()."',".$this -> getBonificacionT().",".$multiplicador.");");
        }
    }
    public function obtenerTablaRendimientoGeneral($intervalo){
        $query = $this->db->query("SELECT SUM(p.actuacion) AS PuntosTotales FROM tbperformance AS p
        INNER JOIN tbtorneo AS t ON p.idTorneo = t.idTorneo 
        WHERE fechaT BETWEEN '".$intervalo."';");

        $row = $query->fetch_assoc(); // Obtiene la fila como un arreglo asociativo
        
        $puntosTotales = (int) $row['PuntosTotales']; // Accede al valor de la columna 'PuntosTotales' y lo convierte a entero
        
        return $puntosTotales; // Retorna el valor como entero

    }
    
    public function obtenerTablaRendimiento2023(){
        return $this -> db -> query("select fotoNormal,p.username,u.desCorta, SUM(p.actuacion) as PuntosTotales,ci.nombrearchivo AS insignia from tbperformance as p
        INNER JOIN tbtorneo as t on p.idTorneo = t.idTorneo 
        INNER JOIN tbusuarios as u on p.username = u.username 
        INNER JOIN tbfotoperfil as f on f.idFotoPerfil = u.idFotoP 
        LEFT JOIN tbInsignias i ON u.idInsignia = i.idInsP
        LEFT JOIN catInsignia ci ON i.IdInsignia = ci.IdInsignia
        group by p.username order by PuntosTotales desc;");
    }
    
    public function obtenerTablaRendimientoMes($intervalo){
        return $this -> db -> query("select fotoNormal,p.username,u.desCorta, SUM(p.actuacion) as PuntosTotales,ci.nombrearchivo AS insignia from tbperformance as p
        INNER JOIN tbtorneo as t on p.idTorneo = t.idTorneo 
        INNER JOIN tbusuarios as u on p.username = u.username 
        INNER JOIN tbfotoperfil as f on f.idFotoPerfil = u.idFotoP 
        LEFT JOIN tbInsignias i ON u.idInsignia = i.idInsP
        LEFT JOIN catInsignia ci ON i.IdInsignia = ci.IdInsignia
        where fechaT BETWEEN '".$intervalo."'  group by p.username order by PuntosTotales desc;");
    }
    public function obtenerTorneosJugadosMes($intervalo){
        return $this -> db -> query("select * from tbtorneo where fechaT BETWEEN '".$intervalo."' order by fechaT desc;");
    }
    function obtenerRendimientoDetallado($username, $intervalo){
        return $this -> db -> query("select actuacion as puntos, t.idTorneo,nombreT, bonificacionT, t.fechaT  
        from tbperformance p 
        LEFT OUTER JOIN tbtorneo t on t.idTorneo = p.idTorneo 
        where username='".$username."' and t.fechaT BETWEEN '".$intervalo."' order by t.fechaT desc;");
    }
}