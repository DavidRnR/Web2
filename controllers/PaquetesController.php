<?php
require_once('views/PaquetesView.php');
require_once('models/PaquetesModel.php');
require_once('models/ComentariosModel.php');

class PaquetesController
{
  private $vista;
  private $modelo;
  private $usuario;

  function __construct($usuariosController)

  {
    $this->vista = new PaquetesView();
    $this->modelo = new PaquetesModel();
    if($usuariosController->checkLogin()){
      $this->usuario=$usuariosController->getUser();
    }
  }

  function mostrarPaquetes () {
    $paquetes = $this->modelo->getPaquetes();
    $this->vista->mostrarPaquetes($paquetes,$this->usuario);
  }

  function mostrarBoxComentario () {
    if (isset($_GET['id_paquete'])) {
      $id_paquete = $_GET['id_paquete'];
      $paquete= $this->modelo->getPaquete($id_paquete);
      $this->vista->mostrarBoxComentario($paquete,$this->usuario);
    }
  }
}
?>
