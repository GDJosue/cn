<?php 
require_once('models/usuarios.php');
require_once('models/fecha.php');
require_once('models/tablaRendimiento.php');

class usuarioController{
    
    public function modificar(){
        if(isset($_SESSION["identidad"])){
            $usuario = new Usuario();
            $usuario -> setUsername(filter_var($_POST["username"],FILTER_SANITIZE_STRING));
            $usuario -> setApodo(filter_var($_POST["apodo"],FILTER_SANITIZE_STRING));
            if($_POST["nacionalidad"]!="Nacionalidad"){
                $usuario -> setNacionalidad(filter_var($_POST["nacionalidad"],FILTER_SANITIZE_STRING));
            }
            else{
                $usuario -> setNacionalidad("1");
            }
            $usuario -> setDesCorta(filter_var($_POST["descripcionCorta"],FILTER_SANITIZE_STRING));
            $usuario -> setDesLarga(filter_var($_POST["descripcionLarga"],FILTER_SANITIZE_STRING));
            if($_POST["Año"] != "Año" && $_POST["Mes"] && $_POST["Dia"] !="Día"){
                $usuario -> setFechaNac($_POST["Año"]."-".$_POST["Mes"]."-".$_POST["Dia"]);
            }
            else{
                $usuario -> setFechaNac(null);
            }
            $usuario -> setIdFIDE($_POST["FIDE"]);
            if($_FILES!=null && $_FILES['imagen']['name']!=''){
                $file = $_FILES['imagen'];
                $mimetype = $file['type'];
                $auxiliar = explode(".", $_FILES["imagen"]["name"]);
                $nombreFoto = $usuario -> getUsername().".".end($auxiliar);
                if($mimetype == "image/jpg" || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif'){
                    if(!is_dir('uploads/images')){
                        mkdir('uploads/images', 0777, true);
                    }
                    $usuario -> fotoPerfil($nombreFoto);
                    move_uploaded_file($file['tmp_name'], 'uploads/images/'.$nombreFoto);
                }
            }
            $usuario -> actualizarInfo();
            if(isset($_SESSION["identidad"])){
                unset($_SESSION["identidad"]);
            }
            if(isset($_SESSION["administrador"])){
                unset($_SESSION["administrador"]);
            }
            require_once 'views/users/login.php';
        }        
    }
    public function configuracion(){
        if(isset($_SESSION["identidad"])){
            $usuario = new Usuario();
            $mes = new Fecha();
            $paises = $usuario -> obtenerPaises();
            require_once 'views/users/personalizacion.php';
        }
    }
    public function index(){
        if (isset($_SESSION["identidad"])){
            
            $logros = new Usuario();
            $fecha = new Fecha();
            $logros = $logros -> logros($_SESSION["identidad"] -> username);
            $torneos = new tablaRendimiento();
            $tRendimiento = $torneos -> obtenerRendimientoDetallado($_SESSION["identidad"] -> username ,$fecha -> getIntervalo()); 
            require_once 'views/users/perfilUsuario.php';
        }
        else{
            echo "No has iniciado sesión";
        }
    }
    public function ingresar(){
        require_once 'views/users/registroUsuario.php';
    }
    public function buscar(){
        if(isset($_POST['username']))
        {
            $usuario = new Usuario();
            $usuario -> setUsername($_POST['username']);
            if($usuario -> existenciaJugador()[0]  == "1"){
                $username = $usuario -> getUsername();
                $resultado = $usuario -> existenciaJugador()[0];
                if($resultado)
                {
                    $usuario -> registrarSolicitud();
                }
                require_once 'views/users/resultadoBuscar.php';
            }
        }
    }
    public function login()
    {
        if(isset($_POST['username']) && isset($_POST['password']) && isset($_SESSION["identidad"]) == null){
            $usuario = new Usuario();
            $usuario -> setUsername($_POST['username']);
            $usuario -> setPassword($_POST['password']);
            $identidad = $usuario -> iniciarSesion();
            if($identidad && is_object($identidad)){
                $_SESSION["identidad"] = $identidad;
                if($identidad -> idTipoUsuario == "1"){
                    $_SESSION["administrador"]= true;
                }
                require_once 'views/inicio/inicio.php';
                echo "<script>window.location.href = '".$_SERVER['PHP_SELF']."';</script>";
            }
            else if($identidad == "PrimeraVez"){
                $_SESSION["identidad"] = $_POST['username'];
                require_once 'views/users/cambiarPw.php';
            }
            else{
                $_SESSION["error_login"] = "Identificación fallida";
                require_once 'views/users/login.php';
                
            }
        }
        elseif(isset($_SESSION["identidad"])){
            require_once 'views/inicio/inicio.php';

        }
        else{
            require_once 'views/users/login.php';
        }
    }
    public function inicio()
    {
        if(isset($_POST)){
            require_once 'views/users/inicio.php';
        }
        else{

        }
    }
    public function cambiarPassword()
    {
        if(isset($_POST['password2']) && isset($_POST['password1']) && isset($_SESSION["identidad"])){
            if($_POST['password1'] == $_POST['password2']){
                $usuario = new Usuario();
                $usuario -> setUsername($_SESSION["identidad"]);
                $usuario -> setPassword($_POST['password1']);
                $usuario -> cambiarContraseña();
                unset($_SESSION["identidad"]);
                unset($_SESSION["administrador"]);
                require_once 'views/users/login.php';
                echo "<script>window.location.href = '".$_SERVER['PHP_SELF']."';</script>";

            }
            else{
                echo "<p>La contraseñas ingresadas no coinciden ingresarlas de nuevo.</p>";
                require_once 'views/users/cambiarPw.php';
            }
        }
    }
    public function cerrarSesion(){
        if(isset($_SESSION["identidad"])){
            unset($_SESSION["identidad"]);
        }
        if(isset($_SESSION["administrador"])){
            unset($_SESSION["administrador"]);
        }
        require_once 'views/users/login.php';
        echo "<script>window.location.href = '".$_SERVER['PHP_SELF']."';</script>";

    }

    public function ver(){
        if(isset($_GET["username"]) ){
            $username = $_GET["username"];
            $usuario = new Usuario();
            $usuario -> setUsername($username);
            if($usuario -> existenciaJugador()[0] == "1"){
                $logros = $usuario -> logros($username);
                $usuario = $usuario -> obtenerDatos();    
                require_once 'views/users/ver.php';
            }
            else{
                require_once 'views/users/noExisteJugador.php';
            }
        }
    }
}