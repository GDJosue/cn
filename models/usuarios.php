<?php 
class Usuario{
    private $username;
    private $apodo;
    private $eloBullet; 
    private $eloBlitz; 
    private $eloRapid; 
    private $desCorta; 
    private $desLarga; 
    private $fechaNac;
    private $nacionalidad;
    private $password;
    private $foto;
    private $idFIDE;
    private $codigoCreacion;
    private $insignia; 
    private $db;

    public function __construct()
    {
        $this -> db = Database::connect();
    }
    function getNacionalidad()
    {
        return $this -> nacionalidad; 
    }
    function getFoto()
    {
        return $this -> foto; 
    }
    function getUsername()
    {
        return $this -> username; 
    }
    function getApodo()
    {
        return $this -> apodo; 
    }
    function getEloBullet()
    {
        return $this -> eloBullet; 
    }
    function getEloBLitz()
    {
        return $this -> eloBlitz; 
    }
    function getEloRapid()
    {
        return $this -> eloRapid; 
    }
    function getDesCorta()
    {
        return $this -> desCorta; 
    }
    function getDesLarga()
    {
        return $this -> desLarga; 
    }
    function getFechaNac()
    {
        return $this -> fechaNac; 
    }
    function getIdFIDE()
    {
        return $this -> idFIDE; 
    }
    function getCodigoCreacion()
    {
        return $this -> codigoCreacion; 
    }
    function getPassword()
    { 
        return password_hash($this -> db -> real_escape_string($this -> password), PASSWORD_BCRYPT, ['cost' => 4]);  
    }
    function getInsignia()
    {
        return $this -> insignia;   
    }
    function setFoto($foto)
    {
        $this -> foto = $this -> db -> real_escape_string($foto);
    }
    function setUsername($username)
    {
        $this -> username = $this -> db -> real_escape_string($username);
    }
    function setNacionalidad($nacionalidad)
    {
        $this -> nacionalidad = $this -> db -> real_escape_string($nacionalidad);
    }
    function setApodo($apodo)
    {
        $this -> apodo = $this -> db -> real_escape_string($apodo);
    }
    function setEloBullet($eloBullet)
    {
        $this -> eloBullet = $eloBullet;
    }
    function setEloBLitz($eloBlitz)
    {
        $this -> eloBlitz = $eloBlitz; 
    }
    function setEloRapid($eloRapid)
    {
        $this -> eloRapid = $eloRapid;
    }
    function setDesCorta($desCorta)
    {
        $this -> desCorta = $this -> db -> real_escape_string($desCorta);
    }
    function setDesLarga($desLarga)
    {
        $this -> desLarga = $this -> db -> real_escape_string($desLarga);
    }
    function setFechaNac($fechaNac)
    {
        $this -> fechaNac = $this -> db -> real_escape_string($fechaNac); 
    }
    function setIdFIDE($idFIDE)
    {
        $this -> idFIDE = $this -> db -> real_escape_string($idFIDE);
    }
    function setPassword($password)
    {
        $this -> password = $password;
    }
    function setInsignia($insignia)
    {
        $this -> insignia = $insignia;
    }
    function existenciaJugador(){
        $existencia = $this -> db -> query("select existeJugador('".$this -> getUsername()."');");
        $resultado = mysqli_fetch_row($existencia);
        return $resultado;
    }
    function registrarSolicitud(){
        $this -> db -> query("call registrarSolicitud('".$this -> getUsername()."');");
    }
    function cambiarStatusSolicitud(){
        $this -> db -> query("update tbsolicitud set estado = 1 where username = '".$this -> getUsername()."';");
    }
    function obtenerSolicitudes(){
        return $this -> db -> query("select idTbSolicitud, u.username, codigoCreacion,estado from tbsolicitud as s 
        inner join tbusuarios as u on s.username = u.username where estado = 0;");
    }
    function iniciarSesion(){
        $resultado = false;  
        $password = $this -> password;
        $login = $this -> existenciaJugador();
        if($login[0]  == "1"){
            $usuario =  mysqli_fetch_object($this -> db -> query("select u.username, contraseña,apodo, fotoNormal, eloBullet, eloBlitz, codigoCreacion,eloRapid, idTipoUsuario, idNacionalidad, desCorta, desLarga, fechaNac, idFIDE,SUM(puntos) as trofeos, ci.nombrearchivo AS insignia from tbusuarios as u INNER JOIN tbfotoperfil as f on f.idFotoPerfil = u.idFotoP LEFT JOIN tbCahuayosInfo as c ON c.username = u.username LEFT JOIN tbInsignias i ON u.idInsignia = i.idInsP  LEFT JOIN catInsignia ci ON i.IdInsignia = ci.IdInsignia where u.username = '".$this -> getUsername()."';"));
            if( $usuario -> contraseña == null){
                if($usuario -> codigoCreacion == $this -> password){
                    $this -> db -> query("update tbsolicitud set estado = 1 where username = '".$this -> getUsername()."';");
                    return "PrimeraVez";
                    
                } 
            }
            else{
                $verificar = password_verify( $password,$usuario -> contraseña);
                if($verificar){
                    $resultado = $usuario;
                }
            } 
        }
        return $resultado;
    }
    function cambiarContraseña(){
        $this -> db -> query("update tbusuarios set contraseña = '".$this -> getPassword()."' where username = '".$this -> getUsername()."';");
    }
    function obtenerDatos(){
        return mysqli_fetch_object($this -> db -> query("select u.username, apodo, fotoNormal, eloBullet, eloBlitz, eloRapid, idTipoUsuario, idNacionalidad, desCorta, desLarga, fechaNac, idFIDE,SUM(puntos) as trofeos, ci.nombrearchivo AS insignia from tbusuarios as u INNER JOIN tbfotoperfil as f on f.idFotoPerfil = u.idFotoP LEFT JOIN tbCahuayosInfo as c ON c.username = u.username LEFT JOIN tbInsignias i ON u.idInsignia = i.idInsP  LEFT JOIN catInsignia ci ON i.IdInsignia = ci.IdInsignia where u.username = '".$this -> getUsername()."';"));
    }
    function obtenerPaises(){
        return $this -> db -> query("select * from catnacionalidad; ");
    }
    function guardarFoto(){
        $this -> db -> query("insert into tbfotoperfil values (default,".$this -> getFoto().", null); ");
    }
    function actualizarInfo(){
        if($this -> getFechaNac()==null){
            $this -> db -> query("update tbusuarios set apodo='".$this -> getApodo()."', idNacionalidad = ".$this -> getNacionalidad()." ,descorta = '".$this -> getDesCorta()."' , desLarga = '".$this -> getDesLarga()."', idFIDE = '".$this -> getIdFIDE()."' where username = '".$this -> getUsername()."';");
        }
        else{
            $this -> db -> query("update tbusuarios set apodo='".$this -> getApodo()."', idNacionalidad = ".$this -> getNacionalidad()." ,descorta = '".$this -> getDesCorta()."' , desLarga = '".$this -> getDesLarga()."', fechaNac = '".$this -> getFechaNac()."', idFIDE = '".$this -> getIdFIDE()."' where username = '".$this -> getUsername()."';");
        }
    }
    function crearFoto($filename){
        $this -> db -> query("insert into tbfotoperfil values (default, '".$filename."');");
        $this -> db -> query("update tbusuarios
        set idFotoP = ".mysqli_fetch_array($this -> db -> query("select idFotoPerfil from tbfotoperfil where fotoNormal like '%".$this -> getUsername()."%';"))[0]."
        where username = '".$this -> getUsername()."';");
    }
    function actualizarFoto($idFoto,$filename){
        $this -> db -> query("update tbfotoperfil set fotoNormal = '".$filename."' where idFotoPerfil = ".$idFoto);
    }
    function fotoPerfil($filename){
        $nFoto = mysqli_fetch_array($this -> db -> query("select idFotoPerfil from tbfotoperfil where fotoNormal like '%".$this -> getUsername()."%';"));
        if($nFoto == null){
            $this -> crearFoto($filename);
        }
        else{
            $nFoto = $nFoto[0];
            $this -> actualizarFoto($nFoto, $filename);
        }
    }
    function logros($username){
        return $this -> db -> query("select * from tblogros where username='".$username."';");
    }
    function obtenerFisicos(){
        return $this -> db -> query("select * from tbpersonasfisicas;");
    }
}