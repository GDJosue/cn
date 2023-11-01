<?php 
    class DecodificadorNDJson
    {
        public function regresarObjeto($textoNDJson){
            $resultado = [];
            foreach(preg_split("/((\r?\n)|(\r\n?))/", $textoNDJson) as $linea)
			{
				if($linea != NULL)
				{
					$resultado[] = json_decode($linea);
				}
			}
            return $resultado; 
        }
    }
