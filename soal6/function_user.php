<?php
include 'koneksi.php';

  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $id_work = $_POST['id_work'];
  $id_salary = $_POST['id_salary'];

  $query = mysql_query("INSERT INTO name VALUES ('$id','$nama','$id_work','$id_salary')");
  if($query){
    header("location:input.php");
  }else{
    echo "ERROR, data tidak dapat di input ". mysql_error();
  }




?>
