<?php
require_once 'api.php';
require_once ('../models/ComentariosModel.php');
include_once(dirname(__DIR__)."/controllers/UsuariosController.php");


class ComentariosApi extends Api {
  private $modelo;
  private $usuariosController;

  public function __construct($request)
  {
    parent::__construct($request);
    $this->modelo = new ComentariosModel();
    $this->usuariosController = new UsuariosController();
  }

  protected function comentario($argumentos){
    switch ($this->method) {
      case 'GET':
      if(count($argumentos)>0){
        $comentario = $this->modelo->getComentariosPaquete($argumentos[0]);
        $error['Error'] = "No exiten comentarios";
        return ($comentario) ? $comentario : $error;
      }else{
        return $this->modelo->getComentarios();
      }
      break;
      case 'DELETE':
      if ($this->usuariosController->getRol()==1) {
        if(count($argumentos)>0){
          $error['Error'] = "El comentario no existe";
          $success['Success'] = "El comentario se ha borrado";
          $filasAfectadas = $this->modelo->eliminarComentario($argumentos[0]);
          return ($filasAfectadas == 1) ? $success : $error;
        }
      }
      $error['Error'] = "Se ha denegado el acceso";
      return $error;
      break;
      case 'POST':
      if ($this->usuariosController->checkLogin()) {
        if(count($argumentos)==0){
          if(isset($_POST['id_paquete']) && isset($_POST['email']) && isset($_POST['comentario'])) {
            $id_paquete = $_POST['id_paquete'];
            $usuario = $_POST['email'];
            $comentario = $_POST['comentario'];
            if(isset($_POST['rating'])) {
              $rating = $_POST['rating'];
            }
            else $rating = 0;
            $error['Error'] = "El comentario no se creo";
            $id_comentario = $this->modelo->crearComentario($id_paquete,$usuario,$comentario,$rating);
            return ($id_comentario > 0) ? $this->modelo->getComentario($id_comentario) : $error;
          }
        }
      }
      $error['Error'] = "Se ha denegado el acceso";
      return $error;
      break;
      default:
      return "Only accepts GET";
      break;
    }
  }
}
?>
