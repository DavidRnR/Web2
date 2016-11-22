<?php
include_once(dirname(__DIR__). "/libs/Smarty.class.php");

class UsuariosView
{
  private $smarty;

  function __construct()
  {
    $this->smarty = new Smarty();
  }

  function mostrar(){
    $this->smarty->display('login.tpl');
  }

  function mostrarRegistro () {
    $this->smarty->display('registro.tpl');
  }

  function usuarioRegistrado($usuario) {
    $this->smarty->assign('usuario',$usuario);
    $this->smarty->display('usuarioRegistrado.tpl');
  }

}



 ?>
