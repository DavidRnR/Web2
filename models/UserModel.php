<?php
require_once('models/FranelaModel.php');

class UserModel extends FranelaModel
{

  function getUser($user){
    $sentencia = $this->db->prepare( "select * from usuario where email = ?");
    $sentencia->execute(array($user));
    return $sentencia->fetch(PDO::FETCH_ASSOC);
  }

  function crearUsuario ($nuevoUsuario) {
    $sentencia = $this->db->prepare("INSERT INTO usuario(nombre,email,password) VALUES(:nombre,:email,:password)");
    $sentencia->execute($nuevoUsuario);
  }

  function getRol ($user) {
    $sentencia = $this->db->prepare( "select * from usuario where fk_rol = ?");
    $sentencia->execute(array($user));
    return $sentencia->fetch(PDO::FETCH_ASSOC);
  }
  function getUserPorComentario($id){
    $sentencia = $this->db->prepare("select * from usuario where id_usuario=?");
    $sentencia->execute(array($id));
    return $sentencia->fetch(PDO::FETCH_ASSOC);
  }
}
?>
