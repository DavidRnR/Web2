<?php
include_once (dirname(__DIR__). "/views/UsuariosView.php");
include_once(dirname(__DIR__). "/models/UsuariosModel.php");

class UsuariosController
{
  private $vista;
  private $modelo;

  function __construct()
  {
    $this->modelo = new UsuariosModel();
    $this->vista = new UsuariosView();
  }

  public function login(){
    if(!isset($_POST['usuario']) && !isset($_POST["password"]))
    $this->vista->mostrar([]);
    else {
      $user = $_POST['usuario'];
      $pass = $_POST['password'];
      $hash = $this->modelo->getUser($user)["password"];
      if(password_verify($pass, $hash))
      {
        session_start();
        $_SESSION['USER'] = $user;
        header("Location: index.php");
        die();
      }
      else
      {
        $error = "User pass error";
        echo($error);
      }

    }
  }

  public function checkRol ($rol) {
    session_start();
    if(!isset($_SESSION['USER']) || $rol != $this->modelo->getRol($_SESSION['USER'])){
      header("Location: index.php");
      die();
    }
  }

  public function checkLogin(){
    session_start();
    if(!isset($_SESSION['USER'])){
      return false;
    }
    return true;
  }

  public function getUser () {
    return $this->modelo->getUser($_SESSION['USER']);
  }

  public function getRol(){
    session_start();
    $rol=$this->modelo->getRol($_SESSION['USER']);
    return $rol;
  }

  public function logout(){
    session_start();
    session_destroy();
    header("Location: index.php");
    die();
  }

  public function mostrarRegistro () {
    $this->vista->mostrarRegistro();
  }

  public function nuevoUsuario () {
    if(isset($_POST['email'])) {
      if(!$this->modelo->getUser($_POST['email'])) {
        $nuevoUsuario = array();
        $nuevoUsuario['nombre'] = $_POST['nombreUsuario'];
        $nuevoUsuario['email'] = $_POST['email'];
        $nuevoUsuario['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $this->modelo->crearUsuario($nuevoUsuario);
        $this->vista->usuarioRegistrado($nuevoUsuario['nombre']);
      }
      else {
        echo "Usuario ya existe";
      }
    }
  }
}
?>
