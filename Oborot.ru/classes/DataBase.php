<?php
class DataBase
{
   public function getConnection($sql){
      $conn = new mysqli("localhost", "root", "root", "oborot_bd");

      if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
      }

      $result = $conn->query($sql);
      return $result;
   }
}
?>