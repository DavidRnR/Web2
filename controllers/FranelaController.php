<?php
require_once('views/FranelaView.php');

define ("INVITADO",0);

class FranelaController
{
  private $vista;
  private $usuario;

  function __construct($usuariosController)
  {
    $this->vista = new FranelaView();
    $this->usuario['fk_rol']=INVITADO;
    if($usuariosController->checkLogin()){
      $this->usuario=$usuariosController->getUser();
    }
  }

  function iniciar () {
      $this->vista->mostrar($this->usuario);
  }

}

?>
