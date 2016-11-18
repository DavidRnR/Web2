<?php
require_once('libs/Smarty.class.php');


class PaquetesView
{
  private $smarty;

  function __construct(){

    $this->smarty = new Smarty();

  }

  function mostrarPaquetes ($paquetes) {
    $this->smarty->assign('paquetes',$paquetes);
    $this->smarty->display('paquetes.tpl');
  }

  function mostrarBoxComentario ($paquete) {
    $this->smarty->assign('paquete',$paquete);
    $this->smarty->display('comentario.tpl');
  }
}

?>
