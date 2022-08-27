<?php

  $connect = mysqli_connect("localhost","root","","bookstore");
  session_start();

  function isAuth(){
      if(!isset($_SESSION['admin'])){
          echo "<script>window.open('../login.php','_self')</script>";
      }
  }

  function insertData($table, $array){
    global $connect;
    $keys = implode(",",array_keys($array));
    $values = implode("','",array_values($array));
    $query =  "insert into $table ($keys) value ('$values')";
    mysqli_query($connect,$query);
    return true;
}
?>