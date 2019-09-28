<?php
	include('koneksi.php');

	$id = $_GET['id'];
  $nama = $_GET['nama'];
  $id_work = $_GET['id_work'];
  $id_salary = $_GET['id_salary'];

  $query = mysql_query("UPDATE name SET id='$id' , nama='$nama' , id_work='$id_work' , id_salary='$id_salary' WHERE id='$id' ");
	if($query){
		header("location:input.php");
	}else{
		echo "ERROR, data tidak dapat di input ". mysql_error();
	}

?>
