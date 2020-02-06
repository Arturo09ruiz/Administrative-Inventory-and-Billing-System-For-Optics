<?php

class ControladorEstado{

	

	/*=============================================
	MOSTRAR ESTADO DEL PEDIDO
	=============================================*/

	static public function ctrMostrarEstado($item, $valor){

		$tabla = "estado";

		$respuesta = ModeloEstado::mdlMostrarEstado($tabla, $item, $valor);

		return $respuesta;
	
	}

	
}
