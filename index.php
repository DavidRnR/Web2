<?php
require('controllers/FranelaController.php');
require('controllers/PresupuestoController.php');
require('controllers/ContactoController.php');
require('controllers/TurnosController.php');
require('controllers/AdminController.php');
require('controllers/UsuariosController.php');
require('controllers/PaquetesController.php');
require('config/ConfigApp.php');


$presupuestoController = new PresupuestoController();
$contactoController = new ContactoController();
$turnosController = new TurnosController();
$usuariosController = new UsuariosController();



if (!array_key_exists(ConfigApp::$ACTION,$_REQUEST)){
  $franelaController = new FranelaController($usuariosController);
  $franelaController->iniciar();
  die();
}

switch ($_REQUEST[ConfigApp::$ACTION]) {
  case ConfigApp::$ACTION_MOSTRAR_PAQUETES:
  $paquetesController = new PaquetesController($usuariosController);
  $paquetesController->mostrarPaquetes();
  break;
  case ConfigApp::$ACTION_MOSTRAR_PRESUPUESTO:
  $presupuestoController->mostrar();
  break;
  case ConfigApp::$ACTION_MOSTRAR_CONTACTO:
  $contactoController->mostrar();
  break;
  case ConfigApp::$ACTION_LOGIN:
  $usuariosController->login();
  break;
  case ConfigApp::$ACTION_MOSTRAR_REGISTRO:
  $usuariosController->mostrarRegistro();
  break;
  case ConfigApp::$ACTION_NUEVO_USUARIO:
  $usuariosController->nuevoUsuario();
  break;
  case ConfigApp::$ACTION_LOGOUT:
  $usuariosController->logout();
  break;
  case ConfigApp::$ACTION_MOSTRAR_ADMIN:
  $adminController = new AdminController($usuariosController);
  $adminController->mostrar();
  break;
  case ConfigApp::$ACTION_CAMBIAR_ROL:
  $adminController = new AdminController($usuariosController);
  $adminController->cambiarRol();
  break;
  case ConfigApp::$ACTION_ELIMINAR_USUARIO:
  $adminController = new AdminController($usuariosController);
  $adminController->eliminarUsuario();
  break;
  case ConfigApp::$ACTION_LISTAR_TURNOS:
  $adminController = new AdminController($usuariosController);
  $adminController->listarTurnos();
  break;
  case ConfigApp::$ACTION_GUARDAR_TURNO:
  $turnosController->guardarTurno();
  break;
  case ConfigApp::$ACTION_PAQUETE_COMENTARIO:
  $paquetesController = new PaquetesController($usuariosController);
  $paquetesController->mostrarBoxComentario();
  break;
  case ConfigApp::$ACTION_AGREGAR_PAQUETE:
  $adminController = new AdminController($usuariosController);
  $adminController->agregarPaquete();
  break;
  case ConfigApp::$ACTION_ELIMINAR_PAQUETE:
  $adminController = new AdminController($usuariosController);
  $adminController->eliminarPaquete();
  break;
  case ConfigApp::$ACTION_ELIMINAR_TURNO:
  $adminController = new AdminController($usuariosController);
  $adminController->eliminarTurno();
  break;
  case ConfigApp::$ACTION_ELIMINAR_IMAGEN:
  $adminController = new AdminController($usuariosController);
  $adminController->eliminarImagen();
  break;
  case ConfigApp::$ACTION_FINALIZAR_TURNO:
  $adminController = new AdminController($usuariosController);
  $adminController->finalizarTurno();
  break;
  default:
  $franelaController = new FranelaController($usuariosController);
  $franelaController->iniciar();
  break;
}
?>
