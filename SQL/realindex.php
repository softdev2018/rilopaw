<!doctype html>

<?php
$servername = "localhost";
$username="paw";
$password="paw";
$dbname="formsurat";
try{
	$conn = mysqli_connect($servername, $username,$password,$dbname);
	echo("successful in connection");
}catch(MySQLi_Sql_Exception $ex){
	echo("error in connection");
}
include_once("config.php");

if(isset($_POST['submit'])){
	$nomor=$_POST['nomor'];
	$tanggal=$_POST['tanggal'];
	$penerima=$_POST['penerima'];
	$perihal=$_POST['perihal'];
	$alamat=$_POST['alamat'];
	$isi= $_POST['isi'];
	$tembusan=$_POST['tembusan'];
	$register_query = "INSERT INTO `surat`(`nomor`, `tanggal`, `penerima`, `perihal`, `alamat`, `isi`, `tembusan`) VALUES ('$nomor','$tanggal','$penerima','$perihal','$alamat','$isi','$tembusan')";
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
<title>Form Surat Menyurat</title>
</head>

<body>
<h1>FORM KONSULTASI</h1>
<a href="#">Display Surat</a><br/><br/>
<form action="realindex.php" method="post">
	<table align="center">
		<tr>
			<td>Nomor Surat</td>
			<td><input type="text" name="nomor" placeholder="Masukkan Nomor Surat"></td>
		</tr>
    <tr>
			<td>Tanggal Konsultasi</td>
			<td><input type="date" name="tanggal" min="2017-01-01" placeholder="Masukkan Tanggal Surat"></td>
		</tr>
		<tr>
			<td>Kepada Yth</td>
			<td><input type="text" name="penerima" placeholder="Masukkan Nama Penerima"></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td><br>
			<td><input type="radio" name="gender" value="0">Laki - laki
      <input type="radio" name="gender" value="0">Perempuan</td>
		</tr>
    <tr>
			<td>Perihal</td>
			<td><input type="text" name="perihal"></td>
		</tr>
		<tr>
			<td>Alamat Surat</td>
			<td><input type="text" name="alamat" placeholder="Masukkan Alamat Surat"></td>
		</tr>
		<tr>
			<td>Isi Surat</td>
			<td><textarea cols="70" rows="4" name="isi"></textarea></td>
		</tr>
		<tr>
			<td>Tembusan</td>
			<td><input type="text" name="tembusan" placeholder="jika ada"></td>
		</tr>

		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Submit"></td>
		</tr>
	</table>
</form>

</body>
</html>
