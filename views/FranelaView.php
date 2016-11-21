<?php
require_once('libs/Smarty.class.php');

class FranelaView
{
  private $smarty;
  function __construct()
  {
    $this->smarty = new Smarty();
  }

  function mostrar ($rol) {
    $this->smarty->assign('usuarioRol',$rol);
    $this->smarty->display('index.tpl');
  }
}

 ?>
