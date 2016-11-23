<?php
require_once('views/TurnosView.php');
require_once('models/TurnosModel.php');

class TurnosController
{
  private $vista;
  private $modelo;

  function __construct()

  {
    $this->vista = new TurnosView();
    $this->modelo = new TurnosModel();
  }

  function getImagenesVerificadas($imagenes){

    $imagenesVerificadas = [];
    for ($i=0; $i < count($imagenes['size']); $i++) {
      if($imagenes['size'][$i]>0 && ($imagenes['type'][$i]=="image/jpeg" || $imagenes['type'][$i]=="image/png")){
        $imagen_aux = [];
        $imagen_aux['tmp_name']=$imagenes['tmp_name'][$i];
        $imagen_aux['name']=$imagenes['name'][$i];
        $imagenesVerificadas[]=$imagen_aux;
      }
    }
    return $imagenesVerificadas;
  }

  function guardarTurno(){

    if(isset($_POST['cliente'])&&($_POST['cliente'])!=""){
      $cliente = $_POST['cliente'];
      $turno = $_POST['turno'];
      $paquete =  $_POST['paquete'];

      if(isset($_FILES['imagenesturno'])){
        $imagenes = $this->getImagenesVerificadas($_FILES['imagenesturno']);

        $nuevoturno = array('cliente'=>$cliente,'turno'=>$turno,'paquete'=>$paquete);
        $this->modelo->guardarTurno($nuevoturno,$imagenes);
      }

      $this->vista->turnoGuardado();
    }
  }
}
?>
