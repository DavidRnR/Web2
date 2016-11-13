<?php
require_once('libs/Smarty.class.php');


class PaquetesView
{
  private $smarty;

  function __construct(){

    $this->smarty = new Smarty();

  }
  
  function mostrarPaquetes () {
    $this->smarty->display('paquetes.tpl');
  }
}

?>
