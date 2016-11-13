<?php
require_once('models/FranelaModel.php');



class PaquetesModel extends FranelaModel
{

  function getPaquetes () {
    $sentencia = $this->db->prepare( "select * from paquete");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function getPaquete($id_paquete){
    $sentencia = $this->db->prepare( "select * from paquete where id_paquete=?");
    $sentencia->execute(array($id_paquete));
    return $sentencia->fetch(PDO::FETCH_ASSOC);
  }
  function agregarPaquete ($paquete) {
    $sentencia = $this->db->prepare("INSERT INTO paquete(paquete,detalle_pack) VALUES(:paquete,:detalle)");
    $sentencia->execute($paquete);
  }

  function eliminarPaquete ($id_paquete) {
    $sentencia = $this->db->prepare("delete from paquete where id_paquete=?");
    $sentencia->execute(array($id_paquete));
  }
}
?>
