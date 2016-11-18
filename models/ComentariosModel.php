<?php
require_once('FranelaModel.php');
require_once('UsuariosModel.php');

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
    $usuarioModel =new UsuariosModel();
    foreach ($comentarios as $key => $comentario) {
      $usuario = $usuarioModel->getUserPorComentario($comentario['fk_usuario']);
      $comentarios[$key]['nombreUsuario'] = $usuario['nombre'];
      $comentarios[$key]['email'] = $usuario['email'];
    }
    return $comentarios;
  }

  function getComentario($id_comentario){
    $sentencia = $this->db->prepare( "select * from comentario where id_comentario=?");
    $sentencia->execute(array($id_comentario));
    return $sentencia->fetch(PDO::FETCH_ASSOC);
  }
  function crearComentario($id_paquete,$id_usuario,$comentario) {
    $sentencia = $this->db->prepare("INSERT INTO comentario(mensaje,fk_paquete,fk_usuario) VALUES(:mensaje,:fk_paquete,:fk_usuario)");
    $sentencia->execute($comentario,$id_paquete,$id_usuario);
    $id_comentario = $this->db->lastInsertId();
    return $id_comentario;
  }

  function eliminarComentario ($id_comentario) {
    $sentencia = $this->db->prepare("delete from comentario where id_comentario=?");
    $sentencia->execute(array($id_comentario));
  }
}
?>
