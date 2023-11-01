<?php 

require_once('models/fecha.php');
require_once('models/tablaRendimiento.php');
require_once('models/usuarios.php');


class torneoController{
    public function tablaRendimiento(){
        $fecha = new Fecha();
        $tabla = new TablaRendimiento();
        $tRendimiento = $tabla -> obtenerTablaRendimientoMes($fecha -> getIntervalo());
        $meta = $tabla -> obtenerTablaRendimientoGeneral($fecha -> getIntervalo());
        require_once 'views/users/tablaRendimiento.php';
    }
    
    public function tcCNCCLXVIII(){
        require_once 'views/users/torneoCNCCLXVIII.php';
    }
    
    public function torneosRegistrados(){
        $fecha = new Fecha();
        $torneos = new tablaRendimiento();
        $tTorneos = $torneos -> obtenerTorneosJugadosMes($fecha -> getIntervalo());
        require_once 'views/users/torneosRegistrados.php';
    }
    public function rendimientoDetallado(){
        if(isset($_GET["username"]) ){
            $username = $_GET["username"];
            $fecha = new Fecha();
            $torneos = new tablaRendimiento();
            $usuario = new Usuario();
            $usuario -> setUsername($username);
            if($usuario -> existenciaJugador()[0] == "1"){
                $tRendimiento = $torneos -> obtenerRendimientoDetallado($username ,$fecha -> getIntervalo()); 
                $logros = $usuario -> logros($username);
                $usuario = $usuario -> obtenerDatos();   
                require_once 'views/users/ver.php';
            }
            else{
                require_once 'views/users/noExisteJugador.php';
            }
        }
    }
    public function rendimiento2023(){
        $torneos = new tablaRendimiento();
        $tRendimiento = $torneos -> obtenerTablaRendimiento2023();
        require_once 'views/users/rendimientoGeneral2023.php';    
    }
     public function inscritosAniversario(){
        #echo "<h1>Proximamente...</h1>";
        require_once 'views/users/inscritos3erA.php';    
    }
    
}