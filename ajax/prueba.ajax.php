<?php

require_once "../controladores/prueba.controlador.php";
require_once "../modelos/prueba.modelo.php";



class Ajaxprueba{
  public $idlocal;

  public function ajaxEditarprueba(){

   

      $respuesta = "Hola MUNDO SOY EL AJAX FUNCIONANDO";
      echo json_encode($respuesta);


  
    }

  }





if(isset($_POST["idlocal"])){

  $editarprueba = new Ajaxprueba();
  $editarprueba -> idlocal = $_POST["idlocal"];
  $editarprueba -> ajaxEditarprueba();





}