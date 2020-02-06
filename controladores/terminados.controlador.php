<?php

class Controladorterminados{

	/*=============================================
	MOSTRAR PEDIDOS
	=============================================*/

	static public function ctrMostrarterminados($item, $valor, $orden){

		$tabla = "terminados";

		$respuesta = Modeloterminados::mdlMostrarterminados($tabla, $item, $valor, $orden);

		return $respuesta;

	}

	/*=============================================
	CREAR PEDIDO
	=============================================*/

	static public function ctrCrearterminados(){

		if(isset($_POST["descripcion_terminado"])){

			if(preg_match('/^[a-zA-Z-,-0-9ñÑáéíóúÁÉ+,-ÍÓÚ ]+$/', $_POST["descripcion_terminado"]) &&
			   preg_match('/^[0-9.]+$/', $_POST["precio_de_venta_terminado"])){

				$tabla = "terminados";

				$datos = array(
							   "aumento_cristal" => $_POST["medida_terminado"],
							   "tipo_cristal" => $_POST["tipo_terminado"],
							   "codigo" => $_POST["codigo_terminado"],
							   "descripcion" => $_POST["descripcion_terminado"],
							   "lugar" => $_POST["lu_terminado"],
							   "precio_venta" => $_POST["precio_de_venta_terminado"],);

				$respuesta = Modeloterminados::mdlIngresarterminados($tabla, $datos);

				if($respuesta == "ok"){
					echo'RECARGAR 
					<script>
					swal({
						type: "success",
						title: "¡El Pedido Ha Sido Terminado Correctamente!",
						text: "¡Seras Redireccionado Al Inicio Del Sistema!",
						showConfirmButton: true,
						confirmButtonText: "OK"
						}).then(function(result){
						  if (result.value) {

						  window.location = "inicio";

						  }
					  })

					
					
					
					</script>
					';
					
				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Pedido no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "local";

							}
						})

			  	</script>';
			}
		}

	}


	/*=============================================
	EDITAR PEDIDOS
	=============================================*/

	static public function ctrEditarterminados(){

		if(isset($_POST["editarDescripcion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripcion"]) &&
			   preg_match('/^[0-9.]+$/', $_POST["editarPrecioCompra"]) &&
			   preg_match('/^[0-9.]+$/', $_POST["editarPrecioVenta"])){

		   		

				$tabla = "terminados";

				$datos = array(
							   "codigo" => $_POST["editarCodigo"],
							   "descripcion" => $_POST["editarDescripcion"],
							   "precio_compra" => $_POST["editarPrecioCompra"],
							   "precio_venta" => $_POST["editarPrecioVenta"],
							   );

				$respuesta = Modeloterminados::mdlEditarterminados($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "El Pedido ha sido editado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "terminados";

										}
									})

						</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Pedido no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "terminados";

							}
						})

			  	</script>';
			}
		}

	}

	/*=============================================
	BORRAR PRODUCTO
	=============================================*/
	static public function ctrEliminarterminados(){

		if(isset($_GET["idterminados"])){

			$tabla ="terminados";
			$datos = $_GET["idterminados"];

			
			$respuesta = Modeloterminados::mdlEliminarterminados($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El Pedido ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "terminados";

								}
							})

				</script>';

			}		
		}


	}

	/*=============================================
	MOSTRAR SUMA VENTAS
	=============================================*/

	static public function ctrMostrarSumaVentasterminados(){

		$tabla = "terminados";

		$respuesta = Modeloterminados::mdlMostrarSumaVentasterminados($tabla);

		return $respuesta;

	}


}