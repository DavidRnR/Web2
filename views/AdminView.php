<?php
require_once('libs/Smarty.class.php');


class AdminView
{
private $smarty;

  function __construct(){

  $this->smarty = new Smarty();

  }

  function listarTurnos($turnos){
    $this->smarty->assign('turnos',$turnos);
    $this->smarty->display('listadoturnos.tpl');
  }

  function mostrarLogin(){
    $this->smarty->display('login.tpl');
  }

  function mostrar($paquetes){
    $this->smarty->assign('paquetes',$paquetes);
    $this->smarty->display('administracion.tpl');
  }


}


 ?>
