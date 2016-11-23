<?php
require_once('views/PresupuestoView.php');

class  PresupuestoController
{
  private $vista;

  function __construct()
  {
    $this->vista = new PresupuestoView();
  }
  
  function mostrar(){
    $this->vista->mostrar();
  }
}
?>
