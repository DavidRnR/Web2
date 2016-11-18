<?php
require_once 'api.php';
require_once ('../models/ComentariosModel.php');

class ComentariosApi extends Api {
  private $modelo;

  public function __construct($request)
  {
    parent::__construct($request);
    $this->modelo = new ComentariosModel();
  }

  protected function comentario($argumentos){
    switch ($this->method) {
      case 'GET':
        if(count($argumentos)>0){
            $comentario = $this->modelo->getComentariosPaquete($argumentos[0]);
            $error['Error'] = "Ese contacto no existe";
            return ($comentario) ? $comentario : $error;
          }else{
            return $this->modelo->getComentarios();
          }
      break;
       case 'DELETE':
      if(count($argumentos)>0){
        $error['Error'] = "El comentario no existe";
        $success['Success'] = "El comentario se ha borrado";
        $filasAfectadas = $this->modelo->eliminarComentario($argumentos[0]);
        return ($filasAfectadas == 1) ? $success : $error;
      }
      break;
      case 'POST':
      if(count($argumentos)==0){
        $id_paquete = $_POST['id_paquete'];
        $usuario = $_POST['email'];
        $comentario = $_POST['comentario'];
        $error['Error'] = "El comentario no se creo";
        $id_comentario = $this->modelo->crearComentario($id_paquete,$usuario,$comentario);
        return ($id_comentario > 0) ? $this->modelo->getComentario($id_comentario) : $error;
      }
      break;
      default:
      return "Only accepts GET";
      break;
    }
  }




}


?>
