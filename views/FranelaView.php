<?php
require_once('libs/Smarty.class.php');

class FranelaView
{
  private $smarty;
  function __construct()
  {
    $this->smarty = new Smarty();
  }

  function mostrar () {
    $this->smarty->display('index.tpl');
  }
}

 ?>
