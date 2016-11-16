<?php
require_once('models/FranelaModel.php');

class UserModel extends FranelaModel
{

  function getUser($user){
    $sentencia = $this->db->prepare( "select * from usuario where email = ?");
    $sentencia->execute(array($user));
    return $sentencia->fetch(PDO::FETCH_ASSOC);
  }
}

?>
