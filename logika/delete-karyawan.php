<?php
$conn = mysqli_connect("localhost","root","","absensi_dan_penggajian_karyawan");

$id = $_GET['id_karyawan'];
mysqli_query($conn, "DELETE FROM pengguna WHERE id_karyawan=$id");
header("location: /index.php?page=4");
?>
