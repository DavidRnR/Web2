<?php

require_once ('views/AdminView.php');
require_once ('models/TurnosModel.php');
require_once ('models/PaquetesModel.php');
require_once ('models/UsuariosModel.php');


class AdminController
{
  private $vista;
  private $modelo;

  function __construct($usuariosController)
  {
    $this->vista = new AdminView();
    $this->modelo = new TurnosModel();
    $usuariosController->checkRol(1);
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
    $usuariosModel = new UsuariosModel();
    $this->vista->mostrarUsuarios($usuariosModel->getUsuarios());
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
      $paquete = $_GET['paqueteSel'];
    }
    $turnos= $this->modelo->getTurnos($paquete);
    $this->vista->listarTurnos($turnos);
  }

  function eliminarTurno(){
    if(isset($_GET['id_turno'])) {
      $id_turno = $_GET['id_turno'];
      $paquete = $this->modelo->getidPaquete($id_turno);
      $this->modelo->eliminarTurno($id_turno);
      $this->listarTurnos();
    }

  }

  function finalizarTurno(){;
    if(isset($_GET['id_turno'])) {
      $id_turno = $_GET['id_turno'];
      $this->modelo->toogleTurno($id_turno);
      $this->listarTurnos();
    }
  }

  function cambiarRol () {
      if(isset($_GET['id_usuario'])) {
        $usuariosModel = new UsuariosModel();
        $usuario = $usuariosModel->cambiarRol($_GET['id_usuario']);
        $this->mostrarUsuarios();   
      }
  }
}


?>
