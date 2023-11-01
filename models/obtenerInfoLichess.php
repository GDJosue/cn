<?php
    require_once('models/decodificadorNDJSON.php');
    class InformacionLichess
    {
    public  $arrContextOptions = array("ssl"=>array("verify_peer"=>false,"verify_peer_name"=>false,),); 
    private $idTorneo;
    private $nombreTorneo;
    private $fechaTorneo;
    private $rJugadores;
    private $ritmoTorneo;
    private $decoNDJSON;
        
        public function __construct(){
            $this -> db = Database::connect();
            $this -> decoNDJSON = new DecodificadorNDJson();
        }
        public function validarLink($url)
        {
            if(stripos($url, "https://Lichess.org/tournament/") !== false) {
                $idTorneo = explode("/", $url)[4];
                return $idTorneo;
            }
            else{
                return 0;
            }
        }
        public function getIdTorneo()
        {
            return $this -> idTorneo;
        }
        public function getRitmoTorneo()
        {
            return $this -> ritmoTorneo;
        }
        public function getNombreTorneo()
        {
            return $this -> nombreTorneo;
        }
        public function getFechaTorneo()
        {
            return $this -> fechaTorneo;
        }
        public function getRJugadores()
        {
            return $this -> rJugadores;
        }
        public function setIdTorneo($idTorneo)
        {
            $this -> idTorneo = $this -> db -> real_escape_string($idTorneo);
        }
        public function setNombreTorneo($nombreTorneo)
        {
            $this -> idTorneo = $this -> db -> real_escape_string($nombreTorneo);
        }
        public function setFechaTorneo($fechaTorneo)
        {
            $this -> idTorneo = $this -> db -> real_escape_string($fechaTorneo);
        }
        public function setRitmoTorneo($ritmoTorneo)
        {
            $this -> ritmoTorneo = $this -> db -> real_escape_string($ritmoTorneo);
        }
        public function infoTorneoEquipos($idTorneo)
        {
            $infoTorneo = file_get_contents("https://lichess.org/api/tournament/".$idTorneo, false, stream_context_create($this -> arrContextOptions));
            if($infoTorneo){
                $datos = [];
                $datos = $this -> decoNDJSON -> regresarObjeto($infoTorneo);
                foreach ($datos as $objetos)
			    {
                    if($objetos -> {'fullName'} || $objetos -> {'startsAt'} || $objetos -> {'perf'})
                    {
                        if($objetos -> {'fullName'})
                        {
                            $nombreTorneo = str_replace("'","_",$objetos -> {'fullName'});
                            $nombreTorneo = str_replace(".","_",$objetos -> {'fullName'});
                        }
                        if($objetos -> {'startsAt'})
                        {
                            $fechaTorneo = substr($objetos -> {'startsAt'}, 0, 10);
                        }
                        if($objetos -> {'perf'})
                        {
                            $ritmoTorneo = $objetos -> {'perf'} -> {'key'};
                        }
                    }
			    }
                $this -> idTorneo = $idTorneo;
                $this -> nombreTorneo = $nombreTorneo;
                $this -> fechaTorneo = $fechaTorneo;
                $this -> ritmoTorneo = $ritmoTorneo;
            } 
        }

        public function infoTorneoEquiposResultado($idTorneo)
        {
            $infoTorneo = file_get_contents("https://lichess.org/api/tournament/".$idTorneo."/results", false, stream_context_create($this -> arrContextOptions));
            $datos = [];
            $datos = $this -> decoNDJSON -> regresarObjeto($infoTorneo);
            foreach ($datos as $objetos)
            {
                if(isset($objetos -> {'team'}))
                {
                    if($objetos -> {'team'} == "caballo-negro-chess-club" || $objetos -> {'team'} == "caballo-negro-chess-club-cncc")
                    {
                        $this -> rJugadores[] = $objetos; 
                    }
                }
                else{
                    $this -> rJugadores[] = $objetos; 
                }
            }
        }
    }