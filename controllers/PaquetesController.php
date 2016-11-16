<?php
require_once('views/PaquetesView.php');
require_once('models/PaquetesModel.php');
require_once('models/ComentariosModel.php');

class PaquetesController
{
  private $vista;
  private $modelo;

  function __construct()

  {
    $this->vista = new PaquetesView();
    $this->modelo = new PaquetesModel();
  }

  function mostrarPaquetes () {
    $paquetes = $this->modelo->getPaquetes();
    $this->vista->mostrarPaquetes($paquetes);
  }

  function mostrarComentario () {
    if (isset($_GET['id_paquete'])) {
      $id_paquete = $_GET['id_paquete'];
      $paquete= $this->modelo->getPaquete($id_paquete);
      $comentarioModel = new ComentariosModel();
      $comentarios= $comentarioModel->getComentariosPaquete($id_paquete);
      $this->vista->mostrarComentario($paquete,$comentarios);
    }
  }

}
?>
