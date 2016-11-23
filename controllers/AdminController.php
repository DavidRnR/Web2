<?php

require_once ('views/AdminView.php');
require_once ('models/TurnosModel.php');
require_once ('models/PaquetesModel.php');
require_once ('models/UsuariosModel.php');


class AdminController
{
  private $vista;
  private $modelo;
  private $modeloUsuarios;
  private $adminActivo;

  function __construct($usuariosController)
  {
    $this->vista = new AdminView();
    $this->modelo = new TurnosModel();
    $this->modeloUsuarios = new UsuariosModel();
    $usuariosController->checkRol(1);
    $this->adminActivo = $usuariosController->getUser();
  }

  function mostrar () {
    if(isset($_GET['seccion'])) {
      switch ($_GET['seccion']) {
        case 'paquetes':
        $this->mostrarPaquetes();
        break;
        case 'usuarios':
        $this->mostrarUsuarios();
        break;
        default:
        $this->vista->mostrar();
        break;
      }
    }else $this->vista->mostrar();
  }

  function mostrarUsuarios () {
    $this->vista->mostrarUsuarios($this->modeloUsuarios->getUsuarios(),$this->adminActivo);
  }

  function mostrarPaquetes () {
    $paquetes = new PaquetesModel();
    $this->vista->mostrarPaquetes($paquetes->getPaquetes());
  }

  function eliminarPaquete () {
    if(isset($_POST['paquete'])){
      $id_paquete = $_POST['paquete'];
      $paquetes = new PaquetesModel();
      $paquetes->eliminarPaquete($id_paquete);
      $this->mostrarPaquetes();
    }
  }
  function agregarPaquete () {
    if(isset($_POST['nombrePaquete'])&&($_POST['nombrePaquete']!="")){
      $paquete['paquete'] = $_POST['nombrePaquete'];
      $paquete['detalle'] = $_POST['detallePaquete'];
      $modeloPaquetes = new PaquetesModel();
      $modeloPaquetes->agregarPaquete($paquete);
      $this->mostrarPaquetes();
    }
  }

  function listarTurnos(){
    if(isset($_POST['paquete'])) {
      $paquete =  $_POST['paquete'];
    }
    else {
      $paquete = $_POST['paqueteSel'];
    }
    $turnos= $this->modelo->getTurnos($paquete);
    $this->vista->listarTurnos($turnos);
  }

  function eliminarTurno(){
    if(isset($_POST['id_turno'])) {
      $id_turno = $_POST['id_turno'];
      $paquete = $this->modelo->getidPaquete($id_turno);
      $this->modelo->eliminarTurno($id_turno);
      $this->listarTurnos();
    }
  }

  function eliminarImagen() {
    if(isset($_POST['imgpath'])) {
      $this->modelo->eliminarImagen($_POST['imgpath']);
      $this->listarTurnos();
    }
  }

  function finalizarTurno(){;
    if(isset($_POST['id_turno'])) {
      $id_turno = $_POST['id_turno'];
      $this->modelo->toogleTurno($id_turno);
      $this->listarTurnos();
    }
  }

  function cambiarRol () {
    if(isset($_POST['id_usuario'])) {
      $this->modeloUsuarios->cambiarRol($_POST['id_usuario']);
      $this->mostrarUsuarios();
    }
  }

  function eliminarUsuario() {
    if(isset($_POST['id_usuario'])) {
      $this->modeloUsuarios->eliminarUsuario($_POST['id_usuario']);
      $this->mostrarUsuarios();
    }
  }
}
?>
