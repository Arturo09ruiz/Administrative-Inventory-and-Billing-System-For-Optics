<?php

require_once "../controladores/terminados.controlador.php";
require_once "../modelos/terminados.modelo.php";

require_once "../controladores/tipo.controlador.php";
require_once "../modelos/tipo.modelo.php";

require_once "../controladores/aumento.controlador.php";
require_once "../modelos/aumento.modelo.php";

require_once "../controladores/lugar.controlador.php";
require_once "../modelos/lugar.modelo.php";


class Tablaterminados{

 	/*=============================================
 	 MOSTRAR LA TABLA DE PEDIDOS
  	=============================================*/ 

	public function mostrarTablaterminados(){

		$item = null;
    	$valor = null;
    	$orden = "id";

  		$terminados = Controladorterminados::ctrMostrarterminados($item, $valor, $orden);	

  		if(count($terminados) == 0){

  			echo '{"data": []}';

		  	return;
  		}
		
  		$datosJson = '{
		  "data": [';

		  for($i = 0; $i < count($terminados); $i++){

			
		  

	
 
		

		  	/*=============================================
 	 		TRAEMOS LAS ACCIONES

  			if(isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Especial"){

  				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditaterminados' idterminados='".$terminados[$i]["id"]."' data-toggle='modal' data-target='#modalEditarterminados'><i class='fa fa-pencil'></i></button></div>"; 

  			}else{

  				 $botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarterminados' idterminados='".$terminados[$i]["id"]."' data-toggle='modal' data-target='#modalEditarterminados'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarterminados' idterminados='".$terminados[$i]["id"]."' codigo='".$terminados[$i]["codigo"]."' imagen='".$terminados[$i]["imagen"]."'><i class='fa fa-times'></i></button></div>"; 

			  }
  			=============================================*/ 
			  

			  
			  
		  	$datosJson .='[
				  "'.($i+1).'",
				  "'.$terminados[$i]["codigo"].'",
				  "'.$terminados[$i]["tipo_cristal"].'",
				  "'.$terminados[$i]["aumento_cristal"].'",
				  "'.$terminados[$i]["descripcion"].'",
			      "'.$terminados[$i]["precio_venta"].'",
				  "'.$terminados[$i]["fecha"].'",
				  "'.$terminados[$i]["fecha_de_terminado"].'"


				  
			    ],';

		  }

		  $datosJson = substr($datosJson, 0, -1);

		 $datosJson .=   '] 

		 }';
		
		echo $datosJson;


	}



}

/*=============================================
ACTIVAR TABLA DE PRODUCTOS
=============================================*/ 
$activarterminados = new Tablaterminados();
$activarterminados -> mostrarTablaterminados();

