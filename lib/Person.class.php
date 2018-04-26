


<?php
  class Person{

    private $pdo = null;
    private static $baseSQL = "SELECT * FROM person";
    private static $constraint = ' order by LName';

    public function __construct(){
      $this->pdo = $connection;
    }




  }


?>
