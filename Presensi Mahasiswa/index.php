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
	$nim_mhs=$_POST['nim_mhs'];
	$nama=$_POST['nama'];
	$jurusan=$_POST['jurusan'];
	$register_query = "INSERT INTO `data_mahasiswa`(`nim_mhs`, `nama`, `jurusan`) VALUES ('$nim_mhs','$nama','$jurusan')";
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
<a href="presensi.php">Presensi</a><br><br>
<a href="display.php">Melihat Daftar Hadir</a>

<form action="index.php" method="post">
	<table align="center">
		<tr>
			<td>NIM</td>
			<td><input type="text" name="nim_mhs" placeholder="Masukkan NIM"></td>
		</tr>
    <tr>
			<td>Nama Mahasiswa</td>
			<td><input type="text" name="nama"placeholder="Masukkan Nama Mahasiswa"></td>
		</tr>
		<tr>
			<td>Jurusan</td>
			<td><input type="text" name="jurusan" placeholder="Masukkan Jurusan"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Submit"></td>
		</tr>
	</table>
</form>

</body>
</html>
