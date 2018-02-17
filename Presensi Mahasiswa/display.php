<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT nim,nama,jurusan,waktu_hadir from data_mahasiswa inner join waktu_datang on nim=nim_mhs where nama is not null");
?>

<html>
<head>
    <title>Display</title>
</head>

<body>
<a href="index.php">Presensi</a><br/><br/>

<h1>Display Presensi</h1>
    <table width='80%' border=1>

    <tr>
        <th>NIM</th> <th>Nama Mahasiswa</th> <th>Jurusan</th> <th>Waktu Hadir</th>
    </tr>

    <?php
    while($user_data = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>".$user_data['nim']."</td>";
        echo "<td>".$user_data['nama']."</td>";
        echo "<td>".$user_data['jurusan']."</td>";
        echo "<td>".$user_data['waktu_hadir']."</td>";
    }
    ?>
    </table>
</body>
</html>
