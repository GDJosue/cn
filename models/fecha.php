<?php 
    class Fecha
    {
        private $fecha; 
        public function __construct(){
            $this -> fecha = date('Y-m-d');
            $this -> db = Database::connect();
        }
        public function updateIntervalo($valor){
              $this -> db -> query("UPDATE `fechaTr` SET `mesdefecha`=".$valor.";");
        }
        
        public function getIntervalo(){
            #echo "Valor retornado: ".mysqli_fetch_array($this -> db -> query("select * from fechaTr"))[0]."<BR>";
            #echo "Fecha retornada: ".$this -> getIntervalo_R($this -> db -> query("select * from fechaTr"))."<BR>";
            return  $this -> getIntervalo_R(mysqli_fetch_array($this -> db -> query("select * from fechaTr"))[0]);
        }
        
        public function getIntervalo_R($dato){
            switch($dato){
                case 1:{
                    return date('Y')."-01-"."01' and '".date('Y')."-01-"."31";
                }break;
                case 2:{
                    return date('Y')."-02-"."01' and '".date('Y')."-02-"."28";
                }break;
                case 3:{
                    return date('Y')."-03-"."01' and '".date('Y')."-03-"."31";
                }break;
                case 4:{
                    return date('Y')."-04-"."01' and '".date('Y')."-04-"."30";
                }break;
                case 5:{
                    return date('Y')."-05-"."01' and '".date('Y')."-05-"."31";
                    #return date('Y')."-05-"."01' and '".date('Y')."-05-"."31";
                }break;
                case 6:{
                    return date('Y')."-06-"."01' and '".date('Y')."-06-"."30";
                }break;
                case 7:{
                    #return date('Y')."-05-"."01' and '".date('Y')."-05-"."31";
                    return date('Y')."-07-"."01' and '".date('Y')."-07-"."31";
                }break;
                case 8:{
                    return date('Y')."-08-"."01' and '".date('Y')."-08-"."31";
                    #return date('Y')."-07-"."01' and '".date('Y')."-07-"."31";
                }break;
                case 9:{
                    return date('Y')."-09-"."01' and '".date('Y')."-09-"."30";
                }break;
                case 10:{
                    return date('Y')."-10-"."01' and '".date('Y')."-10-"."31";
                }break;
                case 11:{
                    return date('Y')."-11-"."01' and '".date('Y')."-11-"."30";
                }break;
                case 12:{
                    return date('Y')."-12-"."01' and '".date('Y')."-12-"."31";
                }break;
            }
            return $this -> fecha;
        }
        
        public function getMes(){
            return  $this -> getMesVal_R(mysqli_fetch_array($this -> db -> query("select * from fechaTr"))[0]);
        }
        
        public function getMes_R($valor){
            switch(date("F")){
                case "Junuary": {return "Enero";}break;
                case "February": {return "Febrero";}break;
                case "March": {return "Marzo";}break;
                #Marzo
                case "April": {return "Abril";}break;
                #Abril
                #case "May": {return "Abril";}break;
                case "May": {return "Mayo";}break;
               #case "June": {return "Junio";}break;
                case "June": {return "Junio";}break;
                case "July": {return "Julio";}break;
                #case "August": {return "Julio";}break;
                 case "August": {return "Agosto";}break;
                case "September": {return "Septiembre";}break;
                case "Octuber": {return "Octubre";}break;
                case "November": {return "Noviembre";}break;
                case "December": {return "Diciembre";}break;
            }
        }
        public function getMesVal(){
            return  $this -> getMesVal_R($this -> db -> query("select * from fechaTr"));
        }
        
        public function getMesVal_R($valor){
            switch($valor){
                case "1": {return "Enero";}break;
                case "2": {return "Febrero";}break;
                case "3": {return "Marzo";}break;
                case "4": {return "Abril";}break;
                 #Abril
                case "5": {return "Mayo";}break;
                case "6": {return "Junio";}break;
                case "7": {return "Julio";}break;
                case "8": {return "Agosto";}break;
                case "9": {return "Septiembre";}break;
                case "10": {return "Octubre";}break;
                case "11": {return "Noviembre";}break;
                case "12": {return "Diciembre";}break;
            }
        }

    }