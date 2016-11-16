<?php
require('controllers/FranelaController.php');
require('controllers/PresupuestoController.php');
require('controllers/ContactoController.php');
require('controllers/TurnosController.php');
require('controllers/AdminController.php');
require('controllers/LoginController.php');
require('controllers/PaquetesController.php');
require('config/ConfigApp.php');

$franelaController = new FranelaController();
$presupuestoController = new PresupuestoController();
$contactoController = new ContactoController();
$turnosController = new TurnosController();
$paquetesController = new PaquetesController();
$adminController = new AdminController();
$loginController = new LoginController();


if (!array_key_exists(ConfigApp::$ACTION,$_REQUEST)){
  $franelaController->iniciar();
  die();
}

switch ($_REQUEST[ConfigApp::$ACTION]) {
  case ConfigApp::$ACTION_MOSTRAR_PAQUETES:
  $paquetesController->mostrarPaquetes();
  break;
  case ConfigApp::$ACTION_MOSTRAR_PRESUPUESTO:
  $presupuestoController->mostrar();
  break;
  case ConfigApp::$ACTION_MOSTRAR_CONTACTO:
  $contactoController->mostrar();
  break;
  case ConfigApp::$ACTION_LOGIN_ADMIN:
  $loginController->login();
  break;
  case ConfigApp::$ACTION_MOSTRAR_ADMIN:
  $adminController->mostrar($loginController);
  break;
  case ConfigApp::$ACTION_LISTAR_TURNOS:
  $adminController->listarTurnos();
  break;
  case ConfigApp::$ACTION_GUARDAR_TURNO:
  $turnosController->guardarTurno();
  break;
  case ConfigApp::$ACTION_MOSTRAR_PAQUETE:
  $paquetesController->mostrarPaquetes();
  break;
  case ConfigApp::$ACTION_AGREGAR_PAQUETE:
  $adminController->agregarPaquete();
  break;
  case ConfigApp::$ACTION_ELIMINAR_PAQUETE:
  $adminController->eliminarPaquete();
  break;
  case ConfigApp::$ACTION_ELIMINAR_TURNO:
  $adminController->eliminarTurno();
  break;
  case ConfigApp::$ACTION_FINALIZAR_TURNO:
  $adminController->finalizarTurno();
  break;
  default:
  $franelaController->iniciar();
  break;
}
?>
