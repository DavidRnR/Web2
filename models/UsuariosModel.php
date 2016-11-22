<?php
require_once('FranelaModel.php');

class UsuariosModel extends FranelaModel
{
  function getUsuarios () {
    $sentencia = $this->db->prepare( "select * from usuario");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function getUser($userEmail){
    $sentencia = $this->db->prepare( "select * from usuario where email=?");
    $sentencia->execute(array($userEmail));
    return $sentencia->fetch(PDO::FETCH_ASSOC);
  }

  function getUserId($id_usuario){
    $sentencia = $this->db->prepare( "select * from usuario where id_usuario=?");
    $sentencia->execute(array($id_usuario));
    return $sentencia->fetch(PDO::FETCH_ASSOC);
  }

  function crearUsuario ($nuevoUsuario) {
    $sentencia = $this->db->prepare("INSERT INTO usuario(nombre,email,password) VALUES(:nombre,:email,:password)");
    $sentencia->execute($nuevoUsuario);
  }

  function cambiarRol ($id_usuario) {
    $usuario = $this->getUserId($id_usuario);
    $sentencia = $this->db->prepare("update usuario set fk_rol=? where id_usuario=?");
    if ($usuario['fk_rol']==1) {
      $sentencia->execute(array(2,$id_usuario));
    }
    else {
      $sentencia->execute(array(1,$id_usuario));
    }

  }
  function getRol ($user) {
    $usuario = $this->getUser($user);
    return $usuario['fk_rol'];
  }
  function getUserPorComentario($id){
    $sentencia = $this->db->prepare("select * from usuario where id_usuario=?");
    $sentencia->execute(array($id));
    return $sentencia->fetch(PDO::FETCH_ASSOC);
  }
}
?>
