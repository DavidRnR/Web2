<?php
  require 'ComentarioApi.php';

  try {
    $api_handler = new ComentarioApi($_REQUEST['request']);
    echo $api_handler->processAPI();
  } catch (Exception $e) {
      echo json_encode(Array('error' => $e->getMessage()));
  }


 ?>
