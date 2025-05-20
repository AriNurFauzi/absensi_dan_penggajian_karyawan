<?php $conn = mysqli_connect("localhost","root","","absensi_dan_penggajian_karyawan");
$id = $_GET['id_karyawan'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM pengguna WHERE id_karyawan=$id"));
?>
<!DOCTYPE html>
<html>
<head><title>Update Karyawan</title><link href="assets/bootstrap.min.css" rel="stylesheet"></head>
<body class="p-4">
<div class="container">
    <h3>Update Data</h3>
    <form method="POST" action="">
        <input type="text" name="nama_lengkap" class="form-control mb-2" value="<?= $data['nama_lengkap'] ?>">
        <input type="text" name="nik" class="form-control mb-2" value="<?= $data['nik'] ?>">
        <input type="text" name="tanggal_lahir" class="form-control mb-2" value="<?= $data['tanggal_lahir'] ?>">
        <input type="text" name="jenis_kelamin" class="form-control mb-2" value="<?= $data['jenis_kelamin'] ?>">
        <input type="text" name="no_telp" class="form-control mb-2" value="<?= $data['no_telp'] ?>">
        <button class="btn btn-success" name="update">Update</button>
    </form>
    <?php
    if (isset($_POST['update'])) {
        mysqli_query($conn, "UPDATE pengguna SET
            nama_lengkap='$_POST[nama_lengkap]',
            nik='$_POST[nik]',
            tanggal_lahir='$_POST[tanggal_lahir]',
            jenis_kelamin='$_POST[jenis_kelamin]',
            no_telp='$_POST[no_telp]'
            WHERE id_karyawan=$id
        ");
        echo "<script>alert('Data berhasil diupdate'); window.location=' /index.php?page=4';</script>";
    }
    ?>
</div>
</body>
</html>
