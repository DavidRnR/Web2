<?php
require_once('FranelaModel.php');
require_once('UserModel.php');

class ComentariosModel extends FranelaModel {

  function getComentarios () {
    $sentencia = $this->db->prepare( "select * from comentario");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function getComentariosPaquete ($id_paquete) {
    $sentencia = $this->db->prepare( "select * from comentario where fk_paquete=?");
    $sentencia->execute(array($id_paquete));
    $comentarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    $usuarioModel =new UserModel();
    foreach ($comentarios as $key => $comentario) {
      $comentarios[$key]['usuario'] = $usuarioModel->getUserPorComentario($comentario['fk_usuario'])['email'];
    }
    return $comentarios;
  }

  function getComentario($id_comentario){
    $sentencia = $this->db->prepare( "select * from comentario where id_comentario=?");
    $sentencia->execute(array($id_comentario));
    return $sentencia->fetch(PDO::FETCH_ASSOC);
  }
  function agregarComentario ($comentario) {
    $sentencia = $this->db->prepare("INSERT INTO comentario(mensaje) VALUES(:mensaje)");
    $sentencia->execute($comentario);
  }

  function eliminarComentario ($id_comentario) {
    $sentencia = $this->db->prepare("delete from comentario where id_comentario=?");
    $sentencia->execute(array($id_comentario));
  }
}
?>
