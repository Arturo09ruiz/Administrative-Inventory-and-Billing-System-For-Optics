<?php

require_once "../controladores/pedidos.controlador.php";
require_once "../modelos/pedidos.modelo.php";

require_once "../controladores/tipo.controlador.php";
require_once "../modelos/tipo.modelo.php";

require_once "../controladores/aumento.controlador.php";
require_once "../modelos/aumento.modelo.php";

require_once "../controladores/lugar.controlador.php";
require_once "../modelos/lugar.modelo.php";


class Tablapedidos{

 	/*=============================================
 	 MOSTRAR LA TABLA DE PEDIDOS
  	=============================================*/ 

	public function mostrarTablapedidos(){

		$item = null;
    	$valor = null;
    	$orden = "id";

  		$pedidos = Controladorpedidos::ctrMostrarpedidos($item, $valor, $orden);	

  		if(count($pedidos) == 0){

  			echo '{"data": []}';

		  	return;
  		}
		
  		$datosJson = '{
		  "data": [';

		  for($i = 0; $i < count($pedidos); $i++){

			
		  	/*=============================================
 	 		TRAEMOS LA CATEGORÍA
  			=============================================*/ 

		  	$item = "id";
		  	$valor = $pedidos[$i]["tipo_cristal"];

		  	$tipo = ControladorTipo::ctrMostrarTipo($item, $valor);

			/*=============================================
 	 		TRAEMOS LA MEDIDA DEL CRISTAL
  			=============================================*/ 

		  	$item = "id";
		  	$valor = $pedidos[$i]["aumento_cristal"];

		  	$medida = ControladorAumento::ctrMostrarAumento($item, $valor);


		  	/*=============================================
 	 		STOCK
  			=============================================*/ 
			  $item = "id";
		  	$valor = $pedidos[$i]["lugar"];

		  	$lu = ControladorLugar::ctrMostrarLugar($item, $valor);

	

		

		  	/*=============================================
 	 		TRAEMOS LAS ACCIONES
  			=============================================*/ 

  			if(isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Especial"){

  				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditapedidos' idpedidos='".$pedidos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarpedidos'><i class='fa fa-pencil'></i></button></div>"; 

  			}else{

  				 $botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarpedidos' idpedidos='".$pedidos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarpedidos'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarpedidos' idpedidos='".$pedidos[$i]["id"]."' codigo='".$pedidos[$i]["codigo"]."' imagen='".$pedidos[$i]["imagen"]."'><i class='fa fa-times'></i></button></div>"; 

			  }
			  

			  
			  
		  	$datosJson .='[
				  "'.($i+1).'",
				  "'.$pedidos[$i]["codigo"].'",
				  "'.$tipo["nombre"].'",
				  "'.$medida["nombre"].'",
				  "'.$pedidos[$i]["descripcion"].'",
				  "'.$lu["nombre"].'",
			      "'.$pedidos[$i]["precio_venta"].'",
				  "'.$pedidos[$i]["fecha"].'",
				  "'.$botones.'"

				  
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
$activarpedidos = new Tablapedidos();
$activarpedidos -> mostrarTablapedidos();

