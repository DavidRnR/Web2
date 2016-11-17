<?php
require_once('FranelaModel.php');

class UsuariosModel extends FranelaModel
{

  function getUser($user){
    $sentencia = $this->db->prepare( "select * from usuario where email=?");
    $sentencia->execute(array($user));
    return $sentencia->fetch(PDO::FETCH_ASSOC);
  }

  function crearUsuario ($nuevoUsuario) {
    $sentencia = $this->db->prepare("INSERT INTO usuario(nombre,email,password) VALUES(:nombre,:email,:password)");
    $sentencia->execute($nuevoUsuario);
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
