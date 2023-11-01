<?php
require_once('models/tablaRendimiento.php');
require_once('models/obtenerInfoLichess.php');
require_once('models/noticias.php');
require_once('models/usuarios.php');
require_once('models/trofeos.php');
require_once('models/fecha.php');

class administracionController{
    
    public function index(){
        if (isset($_SESSION["administrador"]) && $_SESSION["administrador"]==true){
            require_once 'views/administracion/inicio.php';
        }else{
            require_once 'views/inicio/inicio.php';
        }
    }
    
    public function insignias(){
        if (isset($_SESSION["administrador"]) && $_SESSION["administrador"]==true){
            require_once 'views/administracion/insignias.php'; 
        }else{
            require_once 'views/inicio/inicio.php';
        }
    }
    
    public function cambiarMesTR(){
        if (isset($_SESSION["administrador"]) && $_SESSION["administrador"]==true){
            if (isset($_POST['actualizarMes'])){
                $fecha = new Fecha();
                $fecha -> updateIntervalo($_POST["mesTR"]);
            }
            else{
                require_once 'views/administracion/actualizarMes.php'; 
            }
        }else{
            require_once 'views/inicio/inicio.php';
        }
        
    }
    public function trofeosCNCC(){
        if (isset($_SESSION["administrador"]) && $_SESSION["administrador"]==true){
            if (isset($_POST['OtorgarP'])){
                $usuario = new Usuario();
                $usuario -> setUsername($_POST['usernameTrofeo']);
                if($usuario -> existenciaJugador()[0] == "1"){
                    $trofeo = new TrofeosCNCC();
                    $trofeo -> setConcepto($_POST['conceptoTrofeo']);
                    $trofeo -> setPuntos($_POST['integerTrofeo']);
                    $trofeo -> setUsername($_POST['usernameTrofeo']);
                    $trofeo -> setFechaTorneo(date("Y-m-d"));
                    $trofeo -> agregarTrofeos();
                    echo "<h1>Se ha registrado exitosamente los trofeos</h1>";
                }else{
                    echo "<h1>No existe el usuario</h1>";  
                }
            }
            else{
                require_once 'views/administracion/trofeosCNCC.php';   
            }
        }else{
            require_once 'views/inicio/inicio.php';
        }
    }
    public function completarEdicion(){
        if (isset($_SESSION["administrador"]) && $_SESSION["administrador"]==true){
            if (isset($_POST['Cancelar'])) {
                require_once 'views/administracion/inicio.php';
            } elseif (isset($_POST['Continuar'])) {
                $noticia = new News();
                $noticia -> setIdBlog($_POST["idNoticiaE"]);
                $noticia -> setUsernameB($_SESSION["identidad"] -> username);
                $noticia -> setFechaB(date("Y-m-d"));
                $noticia -> setTituloB($_POST["tituloNoticiaE"]);
                $noticia -> setResumenB($_POST["resumenNoticiaE"]);
                $noticia -> setTextoB([$_POST["contenidoNoticiaE"]]);
                $noticia -> setVisible([$_POST["visibleE"]]); 
                $noticia -> editarNoticia();
                echo "<h1>Se ha editado con exito la noticia</h1>";
            }
        }
    }
    public function editarNoticia(){
        if (isset($_SESSION["administrador"]) && $_SESSION["administrador"]==true)
        {
            if(isset($_POST["idNoticia"]))
            {
                $noticia = $_POST["idNoticia"];
                $noticias = new News();
                $noticia = $noticias -> obtenerNoticia($noticia);
                if($informacionNoticia = mysqli_fetch_array($noticia[0]))
                {
                    require_once 'views/administracion/noticiaEditar.php';
                }
                else{
                    echo "<h1>No se encontro el ID solicitado</h1>";
                }
                
            }
            else
            {
                $noticias = new News();
                $noticias = $noticias -> obtenerNoticias();
                require_once 'views/administracion/editarNoticia.php';
            }
        }
        else
        {
            require_once 'views/inicio/inicio.php';
        }
    }
    public function crearNoticia(){
        if (isset($_SESSION["administrador"]) && $_SESSION["administrador"]==true){
            $noticia = new News();
            $noticia -> setUsernameB($_SESSION["identidad"] -> username);
            $noticia -> setFechaB(date("Y-m-d"));
            $noticia -> setTituloB($_POST["tituloNoticia"]);
            $noticia -> setResumenB($_POST["resumenNoticia"]);
            $noticia -> setTextoB([$_POST["contenidoNoticia"]]);
            $noticia -> crearNoticia();
            $noticia -> crearGaleria();
            if (isset($_FILES['imagen']) && !empty($_FILES['imagen']['name'][0])) {
                $imagenes = $_FILES['imagen'];
                foreach ($imagenes['name'] as $key => $nombre) {
                    $file = array(
                        'name' => $imagenes['name'][$key],
                        'type' => $imagenes['type'][$key],
                        'tmp_name' => $imagenes['tmp_name'][$key],
                        'error' => $imagenes['error'][$key],
                        'size' => $imagenes['size'][$key]
                    );
                    $mimetype = $file['type'];
                    $auxiliar = explode(".", $file["name"]);
                    $nombreFoto = $file['name'] . "." . end($auxiliar);
            
                    if ($mimetype == "image/jpg" || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif') {
                        if (!is_dir('uploads/images')) {
                            mkdir('uploads/images', 0777, true);
                        }
            
                        move_uploaded_file($file['tmp_name'], 'images/' . $nombreFoto);
                        $noticia -> agregarFotoGaleria($nombreFoto);
                    }
                }
                echo "<h2>Se ha creado con exito la noticia</h2>";
            }
        }else{
            require_once 'views/inicio/inicio.php';
        }
    }
    public function creandoNoticia(){
        require_once 'views/administracion/crearNoticia.php';
    }
    
    public function tablaRendimiento(){
        if (isset($_SESSION["administrador"]) && $_SESSION["administrador"]==true){
            require_once 'views/administracion/tablaRendimiento.php';
        }else{
            require_once 'views/inicio/inicio.php';
        }
    }
    public function solicitudes(){
        if (isset($_SESSION["administrador"]) && $_SESSION["administrador"]==true){
            $solicitudes = new Usuario();
            $solinc = $solicitudes -> obtenerSolicitudes();
            require_once 'views/administracion/solicitudesCuenta.php';
        }else{
            require_once 'views/inicio/inicio.php';
        } 
    }
    public function torneoRegistrado(){
        if (isset($_SESSION["administrador"]) && $_SESSION["administrador"]==true){
            if(isset($_POST["idTorneo"])){
                $lichess = new InformacionLichess();
                $idTorneo = $lichess -> validarLink($_POST["idTorneo"]);
                if($idTorneo != 0)
                {
                    $lichess -> infoTorneoEquipos($idTorneo);
                    if($lichess -> getIdTorneo($idTorneo) != null)
                    {
                        $lichess -> infoTorneoEquiposResultado($lichess -> getIdTorneo());
                        $torneoRegistro = new TablaRendimiento();
                        $torneoRegistro -> setIdTorneo($lichess -> getIdTorneo());
                        $torneoRegistro -> setNombreT($lichess -> getNombreTorneo());
                        $torneoRegistro -> setRitmoT($lichess -> getRitmoTorneo());
                        $torneoRegistro -> setFechaT($lichess -> getFechaTorneo());
                        $torneoRegistro -> setBonificacionT($_POST["tipoPuntos"]);
                        $torneoRegistro -> setIdLiga($_POST["ligaPertenencia"]);
                        $torneoRegistro -> setDistribuido(0);
                        $torneoRegistro -> setJugadores($lichess -> getRJugadores());
                        $torneoRegistro -> guardarTorneoBD();
                        echo '<script>alert("Se ha registrado correctamente el torneo");</script>';
                        require_once 'views/administracion/tablaRendimiento.php';
                    }
                    else{
                        echo '<script>alert("El Torneo no existe, verifica el Link ingresado");</script>';
                        require_once 'views/administracion/tablaRendimiento.php';
                    }
                }
                else{
                    echo '<script>alert("Se ha ingresado un Link invalido");</script>';
                    require_once 'views/administracion/tablaRendimiento.php';
                }
            }
            else{
                require_once 'views/administracion/tablaRendimiento.php';
            }
        }else{
            require_once 'views/inicio/inicio.php';
        } 
    }
}