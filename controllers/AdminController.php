<?php

require_once ('views/AdminView.php');
require_once ('models/TurnosModel.php');
require_once ('models/PaquetesModel.php');


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
      $paquetes = new PaquetesModel();
      $this->vista->mostrar($paquetes->getPaquetes());
  }

  function eliminarPaquete () {
    if(isset($_POST['paquete'])){
      $id_paquete = $_POST['paquete'];
      $paquetes = new PaquetesModel();
      $paquetes->eliminarPaquete($id_paquete);
      $this->mostrar();
    }
  }
  function agregarPaquete () {
    if(isset($_POST['nombrePaquete'])&&($_POST['nombrePaquete']!="")){
      $paquete['paquete'] = $_POST['nombrePaquete'];
      $paquete['detalle'] = $_POST['detallePaquete'];
      $modeloPaquetes = new PaquetesModel();
      $modeloPaquetes->agregarPaquete($paquete);
      $this->mostrar();
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
    $id_turno = $_GET['id_turno'];
    $paquete = $this->modelo->getidPaquete($id_turno);
    $this->modelo->eliminarTurno($id_turno);
    $this->listarTurnos();
  }

  function finalizarTurno(){;
    $id_turno = $_GET['id_turno'];
    $this->modelo->toogleTurno($id_turno);
    $this->listarTurnos();
  }

}


?>
