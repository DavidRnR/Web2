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
      //  case 'DELETE':
      // if(count($argumentos)>0){
      //   $error['Error'] = "La tarea no existe";
      //   $success['Success'] = "La tarea se borro";
      //   $filasAfectadas = $this->modelo->eliminarTarea($argumentos[0]);
      //   return ($filasAfectadas == 1) ? $success : $error;
      // }
      // break;
      // case 'POST':
      // if(count($argumentos)==0){
      //   $error['Error'] = "La tarea no se creo";
      //   $id_tarea = $this->modelo->crearTarea($_POST['tarea'],[]);
      //   return ($id_tarea > 0) ? $this->modelo->getTarea($id_tarea) : $error;
      // }
      // break;
      default:
      return "Only accepts GET";
      break;
    }
  }




}


?>
