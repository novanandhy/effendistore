<?php
include "config.php";

session_start();
if(empty($_SESSION['username'])){
	$username = $_POST['username'];
	$pass     = $_POST['password'];

	$login = mysqli_query($connect, "SELECT * FROM admin WHERE admin = '$username' AND password='$pass'");
	$row=mysqli_fetch_array($login);
	if ($row['admin'] == $username AND $row['password'] == $pass)
	{
	  $_SESSION['username'] = $row['admin'];
	  $_SESSION['password'] = $row['password'];
	  header('location:../admin/dashboard.php');
	}
	else
	{
	  echo "<center><br><br><br><br><br><br><b>LOGIN GAGAL! </b><br>
	        Username atau Password Anda tidak benar.<br>";
	    echo "<br>";
	  echo "<input class='btn btn-blue' type=button value='ULANGI LAGI' onclick=location.href='../admin/login.php'></a></center>";

	}
 
}else{
	 header('location:../admin/dashboard.php');
}
?>