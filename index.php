<?php
//Cargo los controladores
require_once "controladores/cristales.controlador.php";
require_once "controladores/local.controlador.php";
require_once "controladores/terminados.controlador.php";
require_once "controladores/lugar.controlador.php";
require_once "controladores/aumento.controlador.php";
require_once "controladores/tipo.controlador.php";
require_once "controladores/pedidos.controlador.php";
require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/ventas.controlador.php";


//Cargo Los Modelos
require_once "modelos/lugar.modelo.php";
require_once "modelos/terminados.modelo.php";
require_once "modelos/cristales.modelo.php";
require_once "modelos/local.modelo.php";
require_once "modelos/aumento.modelo.php";
require_once "modelos/tipo.modelo.php";
require_once "modelos/pedidos.modelo.php";
require_once "modelos/usuarios.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/ventas.modelo.php";
require_once "extensiones/vendor/autoload.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();