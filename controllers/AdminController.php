<?php

require_once ('views/AdminView.php');
require_once ('models/TurnosModel.php');
require_once ('models/PaquetesModel.php');


class AdminController
{
  private $vista;
  private $modelo;

  function __construct()
  {
    $this->vista = new AdminView();
    $this->modelo = new TurnosModel();
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

function listarTodosTurnos(){
  $paquete=0;
  $turnos= $this->modelo->getTurnos($paquete);
  $this->vista->listarTurnos($turnos);
}
  function listarTurnos(){
    if(isset($_POST['paquete'])) {
      $paquete =  $_POST['paquete'];
    }
    else {
      $key = $_GET['id_turno'];
      $paquete = $this->modelo->getidPaquete($key);
    }
    $turnos= $this->modelo->getTurnos($paquete);
    $this->vista->listarTurnos($turnos);
  }

  function listarTurnosdespuesEliminar($paquete){
    $turnos= $this->modelo->getTurnos($paquete);
    $this->vista->listarTurnos($turnos);
  }

  function eliminarTurno(){
    $key = $_GET['id_turno'];
    $paquete = $this->modelo->getidPaquete($key);
    $this->modelo->eliminarTurno($key);
    $this->listarTurnosdespuesEliminar($paquete);
  }

  function finalizarTurno(){
    $key = $_GET['id_turno'];
    $this->modelo->toogleTurno($key);
    $this->listarTurnos();
  }

}


 ?>
