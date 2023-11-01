<?php 
    class News
    {
        private $idBlog;
        private $usernameB;
        private $fechaB;
        private $tituloB;
        private $resumenB;
        private $textoB;
        private $destacado;
        private $idCategoria;
        private $visible; 
        private $db;
        public function __construct()
        {
            $this -> db = Database::connect();
        }
        public function getIdblog(){return $this -> idBlog;}
        public function getUsernameB(){return $this -> usernameB;}
        public function getFechaB(){return $this -> fechaB;}
        public function getTituloB(){return $this -> tituloB;}
        public function getResumenB(){return $this -> resumenB;}
        public function getTextoB(){return $this -> textoB;}
        public function getDestacado(){return $this -> destacado;}
        public function getIdcategoria(){return $this -> idCategoria;}
        public function getVisible(){return $this -> visible;}

        public function setIdblog($idBlog){$this -> idBlog = $this -> db -> real_escape_string($idBlog);}
        public function setUsernameB($usernameB){$this -> usernameB = $this -> db -> real_escape_string($usernameB);}
        public function setFechaB($fechaB){$this -> fechaB = $this -> db -> real_escape_string($fechaB);}
        public function setTituloB($tituloB){$this -> tituloB = $this -> db -> real_escape_string($tituloB);}
        public function setResumenB($resumenB){$this -> resumenB = $this -> db -> real_escape_string($resumenB);}
        public function setTextoB($textoB){
            if (is_string($textoB[0])) {
                $this -> textoB = $this -> db -> real_escape_string($textoB[0]);
            } else {
                var_dump($textoB);
                var_dump($textoB[0]);
                echo "Chingo su madre";
            }
        }
        public function setDestacado($destacado){$this -> destacado = $this -> db -> $destacado;}
        public function setIdcategoria($idCategoria){$this -> idCategoria = $this -> db -> $idCategoria;}
        public function setVisible($visible) {
            $this -> visible = $this -> db -> real_escape_string($visible[0]);
        }

        public function obtenerNoticias(){
            return $this -> db -> query("SELECT b.idblogs, visible,usernameB, resumenB,fechaB, tituloB, destacado, idcategoria, COALESCE(f.nombreFoto, '') AS nombreFoto 
            FROM tbblogs b
            LEFT OUTER JOIN tbgaleria g ON b.idblogs = g.idblog 
            LEFT OUTER JOIN (
               SELECT idgaleria, MIN(nombreFoto) AS nombreFoto
               FROM tbfotos
               GROUP BY idgaleria
            ) f ON f.idgaleria = g.idgaleria
            ORDER BY fechaB DESC;");
        }
        
        public function editarNoticia(){
            #echo "UPDATE `tbblogs` SET `idBlogs`=".$this -> idBlog.",`usernameB`='".$this -> usernameB."',`tituloB`='".$this -> tituloB."',`resumenB`='".$this -> resumenB."',`textoB`='".$this -> textoB."',`visible`=".$this -> visible." WHERE idBlogs=".$this -> idBlog.";";
            $this -> db -> query("
            UPDATE `tbblogs` SET `idBlogs`=".$this -> idBlog.",`usernameB`='".$this -> usernameB."',`tituloB`='".$this -> tituloB."',`resumenB`='".$this -> resumenB."',`textoB`='".$this -> textoB."',`visible`=".$this -> visible." WHERE idBlogs=".$this -> idBlog);
        }

        public function obtenerNoticia($idBlog){
            return array($this -> db -> query("select * from tbblogs where idblogs = ".$idBlog.";"), $this -> db -> query("select f.idFoto, f.idGaleria, f.nombreFoto from tbblogs b 
            LEFT OUTER JOIN tbgaleria g on b.idblogs = g.idblog 
            LEFT OUTER JOIN tbfotos f on f.idgaleria = g.idgaleria 
            where b.idblogs = ".$idBlog.";"));
        }

        public function crearNoticia(){
            $this -> db -> query("insert into tbblogs values (default, '". $this -> usernameB."','".$this -> fechaB."','".$this -> tituloB."','".$this -> resumenB."','".$this -> textoB."',1,1,1)");
        }
        public function crearGaleria(){
            $this -> db -> query("insert into tbgaleria values (default, '".$this -> usernameB."', ".$this -> getLastElementNoticias().", '".$this -> tituloB."', '".$this -> tituloB."');");
        }
        public function getLastElementNoticias(){
            $resultado = $this -> db -> query("SELECT MAX(idBlogs) FROM tbblogs;");
            $row = $resultado->fetch_row();
            return $row[0];
        }
        
        public function getLastElementGaleria(){
            $resultado = $this -> db -> query("SELECT MAX(idGaleria) FROM tbgaleria;");
            $row = $resultado->fetch_row();
            return $row[0];
        }
        
        public function agregarFotoGaleria($nombreFoto){
            $this -> db -> query ("insert into tbfotos values (default, ".$this -> getLastElementGaleria().", '".$nombreFoto."');");
        }
        
        public function setFotosBlogs(){}
        public function ocultarNoticia(){}
        public function publicarNoticia(){}
    }