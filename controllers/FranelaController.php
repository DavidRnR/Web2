<?php
require_once('views/FranelaView.php');

define ("INVITADO",0);

class FranelaController
{
  private $vista;
  private $rol;

  function __construct($usuariosController)
  {
    $this->vista = new FranelaView();
    $this->rol=INVITADO;    
    if($usuariosController->checkLogin()){
      $this->rol=$usuariosController->getRol();
    }
  }

  function iniciar () {
    $this->vista->mostrar($this->rol);
  }

}

?>
