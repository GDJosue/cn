<?php
ini_set('display_errors', 1);
date_default_timezone_set('UTC');
session_start();
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parametros.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';
 
if(isset($_GET['controller'])){
    $nombre_controlador = $_GET['controller'].'Controller';
}
elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
    $nombre_controlador = controller_default;
}
else{
    echo "<h2 align='center'>La pagina que buscas no existe</h2>";
    require_once 'views/layout/footer.php';
    exit();
}

if(class_exists($nombre_controlador)){
    $controlador = new $nombre_controlador();
    if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
        $action = $_GET['action'];
        $controlador -> $action();
    }elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
		$action_default = action_default;
		$controlador->$action_default();
	}
    else{
        echo "<h2>La pagina que buscas no existe</h2>";
    }
}
else{
    echo "<h2>La pagina que buscas no existe</h2>";
}

require_once 'views/layout/footer.php';