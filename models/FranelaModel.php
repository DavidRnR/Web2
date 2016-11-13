<?php

abstract class FranelaModel
{
  protected $db;

  function __construct()
  {
    $this->db = new PDO('mysql:host=localhost;dbname=franela;charset=utf8', 'root', '');
  }

  
}

 ?>
