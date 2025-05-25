<?php
include 'koneksi.php';

$nama = $_POST['nama'] ?? '';
$bulan = $_POST['bulan'] ?? '';
$tahun = $_POST['tahun'] ?? '';
$hariMasuk = $_POST['harimasuk'] ?? 0;
$hariLibur = $_POST['harilibur'] ?? 0;
$bonus = $_POST['bonus'] ?? 0;

$gaji_harian = 100000;
$gaji_pokok = $hariMasuk * $gaji_harian;
$total = $gaji_pokok + $bonus;

$sql = "INSERT INTO gaji (nama_karyawan, bulan, tahun, gaji_pokok, jumlah_hari_masuk, jumlah_hari_libur, Bonus, total)
        VALUES ('$nama', '$bulan', '$tahun', '$gaji_pokok', '$hariMasuk', '$hariLibur', '$bonus','$total')";

if (mysqli_query($conn, $sql)) {
    $id_gaji = mysqli_insert_id($conn);
    header("Location: slip-gaji.php?id_gaji=$id_gaji");
    exit();
} else {
    echo "Gagal menyimpan data gaji: " . mysqli_error($conn);
}