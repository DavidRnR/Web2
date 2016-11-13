<?php
require_once('views/PaquetesView.php');
require_once('models/PaquetesModel.php');

class PaquetesController
{
  private $vista;
  private $modelo;

  function __construct()

  {
    $this->vista = new PaquetesView();
    $this->modelo = new PaquetesModel();
  }

  function mostrarPaquetes () {
    $paquetes = $this->modelo->getPaquetes();
    $this->vista->mostrarPaquetes($paquetes);
  }

}
?>
