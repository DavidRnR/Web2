<?php
require_once('libs/Smarty.class.php');


class TurnosView
{
  private $smarty;

  function __construct(){

    $this->smarty = new Smarty();

  }

  function turnoGuardado(){
    $this->smarty->display('turnoGuardado.tpl');
  }
}
?>
