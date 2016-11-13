<?php
require_once('models/FranelaModel.php');
require_once('models/PaquetesModel.php');

define ("packFULL",0);

class TurnosModel extends FranelaModel
{

  function getTurnos($paquete){
    if($paquete==packFULL){
      $sentencia = $this->db->prepare( "select * from turno");
      $sentencia->execute();
    }
    else{
      $sentencia = $this->db->prepare( "select * from turno where fk_paquete=?");
      $sentencia->execute(array($paquete));
    }
    $turnos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

    $paquete = new PaquetesModel();
    foreach ($turnos as $key => $turno) {
      $turnos[$key]['imagenesturno']=$this->getImagenes($turno['id_turno']);
      $turnos[$key]['paqueteturno']=$paquete->getPaquete($turno['fk_paquete']);
    }
    return $turnos;
  }

  function getImagenes($id_turno){
    $sentencia = $this->db->prepare( "select * from imagen where fk_id_turno=?");
    $sentencia->execute(array($id_turno));
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function guardarTurno($nuevoturno,$imagenes){

    $sentencia = $this->db->prepare("INSERT INTO turno(cliente,turno,fk_paquete) VALUES(:cliente,:turno,:paquete)");
    $sentencia->execute($nuevoturno);
    $id_turno = $this->db->lastInsertId();

    foreach ($imagenes as $key => $imagen) {
      $path="images/".uniqid()."_".$imagen["name"];
      move_uploaded_file($imagen["tmp_name"], $path);
      $insertImagen = $this->db->prepare("INSERT INTO imagen(path,fk_id_turno) VALUES(?,?)");
      $insertImagen->execute(array($path,$id_turno));
    }
  }

  function eliminarTurno($id_turno){
    $sentencia = $this->db->prepare("delete from turno where id_turno=?");
    $sentencia->execute(array($id_turno));
  }

  function toogleTurno($id_turno){
    $turno = $this->getTurno($id_turno);
    $sentencia = $this->db->prepare("update turno set finalizado=? where id_turno=?");
    $sentencia->execute(array(!$turno['finalizado'],$id_turno));
  }

  function getTurno($id_turno){
    $sentencia = $this->db->prepare( "select * from turno where id_turno=?");
    $sentencia->execute(array($id_turno));
    return $sentencia->fetch(PDO::FETCH_ASSOC);
  }


  function getidPaquete ($id_turno) {
    $turno = $this->getTurno($id_turno);
    return $turno['fk_paquete'];
  }
}
?>
