<?php 

require_once('models/noticias.php');
require_once('models/fecha.php');
require_once('models/Parsedown.php');

class noticiasController{
    public function inicio(){
        $noticias = new News();
        $noticias = $noticias -> obtenerNoticias();
        require_once 'views/noticias/inicio.php';
    }
    public function verNoticia(){
        if(isset($_GET["noticia"]) ){
            $noticia = $_GET["noticia"];
            $noticias = new News();
            $noticia = $noticias -> obtenerNoticia($noticia);
            if($informacionNoticia = mysqli_fetch_array($noticia[0])){
                #$informacionNoticia = mysqli_fetch_array($noticia[0]);
                $fotosNoticia = mysqli_fetch_all($noticia[1], MYSQLI_ASSOC);
                require_once 'views/noticias/verNoticia.php';
            }
        }
    }
}