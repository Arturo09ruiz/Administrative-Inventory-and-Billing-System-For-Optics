<?php

class ControladorLugar{

	

	/*=============================================
	MOSTRAR TIPO DE CRISTAL
	=============================================*/

	static public function ctrMostrarLugar($item, $valor){

		$tabla = "lugar";

		$respuesta = ModeloLugar::mdlMostrarLugar($tabla, $item, $valor);

		return $respuesta;
	
	}

	
}
