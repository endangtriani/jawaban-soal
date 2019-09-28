<?php
	include('koneksi.php');
	$id=$_GET['id'];
	mysql_query("delete from name where id='$id'");
	header('location:input.php');

?>
