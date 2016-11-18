<?php
require_once('FranelaModel.php');
require_once('UsuariosModel.php');
require_once('PaquetesModel.php');

class ComentariosModel extends FranelaModel {

  private $modeloUsuario;
  private $modeloPaquetes;

  function __construct()
  {
    parent::__construct();
    $this->modeloUsuario = new UsuariosModel();
    $this->modeloPaquetes = new PaquetesModel();
  }


  function getComentarios () {
    $sentencia = $this->db->prepare( "select * from comentario");
    $sentencia->execute();
    $comentarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

    foreach ($comentarios as $key => $comentario) {
      $usuario = $this->modeloUsuario->getUserPorComentario($comentario['fk_usuario']);
      $paquete = $this->modeloPaquetes->getPaquete($comentario['fk_paquete']);
      $comentarios[$key]['nombreUsuario'] = $usuario['nombre'];
      $comentarios[$key]['email'] = $usuario['email'];
      $comentarios[$key]['paquete'] = $paquete['paquete'];
    }
    return $comentarios;
  }

  function getComentariosPaquete ($id_paquete) {
    $sentencia = $this->db->prepare( "select * from comentario where fk_paquete=?");
    $sentencia->execute(array($id_paquete));
    $comentarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    foreach ($comentarios as $key => $comentario) {
      $usuario = $this->modeloUsuario->getUserPorComentario($comentario['fk_usuario']);
      $comentarios[$key]['nombreUsuario'] = $usuario['nombre'];
      $comentarios[$key]['email'] = $usuario['email'];
    }
    return $comentarios;
  }

  function getComentario($id_comentario){
    $sentencia = $this->db->prepare( "select * from comentario where id_comentario=?");
    $sentencia->execute(array($id_comentario));
    $comentario = $sentencia->fetch(PDO::FETCH_ASSOC);

    $usuario = $this->modeloUsuario->getUserPorComentario($comentario['fk_usuario']);

    $comentario['email'] = $usuario['email'];
    $comentario['nombreUsuario'] = $usuario['nombre'];

    return $comentario;
  }

  function crearComentario($id_paquete,$usuario,$comentario) {
    $id_usuario = $this->modeloUsuario->getUser($usuario)['id_usuario'];
    $sentencia = $this->db->prepare("INSERT INTO comentario(mensaje,fk_paquete,fk_usuario) VALUES(?,?,?)");
    $sentencia->execute(array($comentario,$id_paquete,$id_usuario));
    $id_comentario = $this->db->lastInsertId();
    return $id_comentario;
  }

  function eliminarComentario ($id_comentario) {
    $sentencia = $this->db->prepare("delete from comentario where id_comentario=?");
    $sentencia->execute(array($id_comentario));
  }
}
?>
