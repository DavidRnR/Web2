<?php
require_once('views/UsuariosView.php');
require_once('models/UsuariosModel.php');

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
    if(!isset($_REQUEST['usuario']))
    $this->vista->mostrar([]);
    else {
      $user = $_REQUEST['usuario'];
      $pass = $_REQUEST['password'];
      $hash = $this->modelo->getUser($user)["password"];
      //TODO: falta controlar el caso de que el usuario no exista
      if(password_verify($pass, $hash))
      {
        session_start();
        $_SESSION['USER'] = $user;
        header("Location: index.php");
        die();
      }
      else
      {
        $this->vista->mostrar(["BAD"]);
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
      header("Location: index.php");
      die();
    }
  }

  public function logout(){
    session_start();
    session_destroy();
    header("Location: login");
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
