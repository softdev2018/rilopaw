<!DOCTYPE HTML>

<?php
$servername = "localhost";
$username="root";
$password="paw";
$dbname="kehadiran";
try{
	$conn = mysqli_connect($servername, $username,$password,$dbname);
	echo("successful in connection");
}catch(MySQLi_Sql_Exception $ex){
	echo("error in connection");
}
include_once("config.php");

if(isset($_POST['submit'])){
	$nim=$_POST['nim'];
	$waktu_hadir=$_POST['waktu_hadir'];
	$register_query = "INSERT INTO `waktu_datang`(`nim`, `waktu_hadir`) VALUES ('$nim','$waktu_hadir')";
	try{
		$register_result = mysqli_query($conn, $register_query);
		if($register_result){
			if(mysqli_affected_rows($conn)>0){
				echo("registration successful");
			}else{
				echo("error in registration");
			}

		}
	}catch(Exception $ex){
		echo("error".$ex->getMessage());
	}
}


?>
<html>
<head>
<meta charset="utf-8">
<title>Presensi Mahasiswa</title>
</head>

<body>
<h1>Presensi Mahasiswa</h1>

<form action="presensi.php" method="post">
	<table align="center">
		<tr>
			<td>NIM</td>
			<td><input type="text" name="nim" placeholder="Masukkan NIM"></td>
		</tr>
    <tr>
			<td>Waktu Hadir</td>
			<td><input type="datetime-local" name="waktu_hadir"placeholder=""></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Submit"></td>
		</tr>
	</table>
</form>

</body>
</html>
