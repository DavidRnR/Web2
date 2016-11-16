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

  function mostrarComentario ($paquete,$comentarios) {
    $this->smarty->assign('paquete',$paquete);
    $this->smarty->assign('comentarios',$comentarios);
    $this->smarty->display('comentario.tpl');
  }
}

?>
