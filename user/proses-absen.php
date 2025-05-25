<?php
session_start();
include 'koneksiuser.php'; // koneksi ke database

// Validasi sesi login
if (!isset($_SESSION['user'])) {
    echo "Akses ditolak. Silakan login terlebih dahulu.";
    exit;
}

// Ambil data dari form
$karyawan_id = $_POST['karyawan_id'] ?? null;
$status = $_POST['status'] ?? null;
$lokasi = $_POST['lokasi'] ?? null;
$waktu_absen = $_POST['waktu_absen'] ?? null;

// Format tanggal dan jam
$date_time_parts = explode(' ', $waktu_absen);
$tanggal_sql = date('Y-m-d');
$jam = date('H:i:s');

if (count($date_time_parts) >= 3) {
    $tanggal = $date_time_parts[1]; // format d-m-Y
    $jam = $date_time_parts[2];     // format H:i:s
    $tanggal_parts = explode('-', $tanggal);
    if (count($tanggal_parts) == 3) {
        $tanggal_sql = "{$tanggal_parts[2]}-{$tanggal_parts[1]}-{$tanggal_parts[0]}"; // Y-m-d
    }
}

// Ambil NIK dan nama karyawan
$query_nik = mysqli_query($conn, "SELECT nik, nama_lengkap FROM pengguna WHERE id_karyawan = $karyawan_id");
$data_karyawan = mysqli_fetch_assoc($query_nik);
if (!$data_karyawan) {
    echo "Karyawan tidak ditemukan.";
    exit;
}
$nik = $data_karyawan['nik'];
$nama_karyawan = $data_karyawan['nama_lengkap'];

// Simpan data ke tabel absensi, termasuk id_karyawan
$sql = "INSERT INTO absensi (id_karyawan, nik, tanggal_absensi, jam_masuk) 
        VALUES ('$karyawan_id', '$nik', '$tanggal_sql', '$jam')";

if (mysqli_query($conn, $sql)) {
    // Redirect ke halaman sukses
    header("Location: absen-masuk-berhasil.php?karyawan_id=$karyawan_id&waktu_absen=$waktu_absen&foto=" . urlencode($foto));
    exit;
} else {
    echo "Gagal menyimpan absen: " . mysqli_error($conn);
}
?>
