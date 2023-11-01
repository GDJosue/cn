<?php 

require_once('models/usuarios.php');

class inicioController{
    public function inicio(){
        require_once 'views/inicio/inicio.php';
    }
    public function salonFama(){
        $usuario = new Usuario();
        $usuario = $usuario -> obtenerFisicos();
        require_once 'views/salonFama/inicio.php';
    }
}