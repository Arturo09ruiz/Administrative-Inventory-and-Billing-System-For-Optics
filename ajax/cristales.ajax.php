<?php

require_once "../controladores/cristales.controlador.php";
require_once "../modelos/cristales.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxCristales{

  /*=============================================
  GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
  =============================================*/
  public $idCategoria;

  public function ajaxCrearCodigoCristal(){

  	$item = "id_categoria";
  	$valor = $this->idCategoria;
    $orden = "id";

  	$respuesta = ControladorCristales::ctrMostrarCristales($item, $valor, $orden);

  	echo json_encode($respuesta);

  }


  /*=============================================
  EDITAR PRODUCTO
  =============================================*/ 

  public $idCristal;
  public $traerCristales;
  public $nombreCristal;

  public function ajaxEditarCristal(){

    if($this->traerCristales == "ok"){

      $item = null;
      $valor = null;
      $orden = "id";

      $respuesta = ControladorCristales::ctrMostrarCristales($item, $valor,
        $orden);

      echo json_encode($respuesta);


    }else if($this->nombreCristal != ""){

      $item = "descripcion";
      $valor = $this->nombreCristal;
      $orden = "id";

      $respuesta = ControladorCristales::ctrMostrarCristales($item, $valor,
        $orden);

      echo json_encode($respuesta);

    }else{

      $item = "id";
      $valor = $this->idCristal;
      $orden = "id";

      $respuesta = ControladorCristales::ctrMostrarCristales($item, $valor,
        $orden);

      echo json_encode($respuesta);

    }

  }

}


/*=============================================
GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
=============================================*/	

if(isset($_POST["idCategoria"])){

	$codigoCristal = new AjaxCristales();
	$codigoCristal -> idCategoria = $_POST["idCategoria"];
	$codigoCristal -> ajaxCrearCodigoCristal();

}
/*=============================================
EDITAR PRODUCTO
=============================================*/ 

if(isset($_POST["idCristal"])){

  $editarCristal = new AjaxCristales();
  $editarCristal -> idCristal = $_POST["idCristal"];
  $editarCristal -> ajaxEditarCristal();

}

/*=============================================
TRAER PRODUCTO
=============================================*/ 

if(isset($_POST["traerCristales"])){

  $traerCristales = new AjaxCristales();
  $traerCristales -> traerCristales = $_POST["traerCristales"];
  $traerCristales -> ajaxEditarCristal();

}

/*=============================================
TRAER PRODUCTO
=============================================*/ 

if(isset($_POST["nombreCristal"])){

  $traerCristales = new AjaxCristales();
  $traerCristales -> nombreCristal = $_POST["nombreCristal"];
  $traerCristales -> ajaxEditarCristal();

}






