<?php
session_start();
include 'koneksiuser.php'; // koneksi database

// Ambil ID karyawan dari URL
$karyawan_id = $_GET['karyawan_id'] ?? null;
$foto = 'default.jpg'; // default jika tidak ditemukan di DB

// Inisialisasi nilai default
$nama_karyawan = 'Nama Tidak Diketahui';
$jabatan = 'Karyawan Toko Roti Bakar Bahagia';
$tanggal_format = '';
$jam = '';

if ($karyawan_id) {
    // Ambil data karyawan
    $query_user = mysqli_query($conn, "SELECT nama_lengkap FROM pengguna WHERE id_karyawan = '$karyawan_id'");
    if ($data_user = mysqli_fetch_assoc($query_user)) {
        $nama_karyawan = $data_user['nama_lengkap'];
    }

    // Ambil waktu absen terakhir dari tabel absensi
    $query_absen = mysqli_query($conn, "SELECT jam_keluar FROM absensi WHERE id_karyawan = '$karyawan_id' ORDER BY Jam_keluar DESC LIMIT 1");
    if ($data_absen = mysqli_fetch_assoc($query_absen)) {
        date_default_timezone_set('Asia/Jakarta');
        $timestamp = strtotime($data_absen['jam_keluar']);
        $tanggal_format = date('l, j F Y', $timestamp);
        $jam = date('H:i', $timestamp);
    }
}

// Jika tidak ditemukan, fallback ke sekarang
if (empty($tanggal_format)) {
    date_default_timezone_set('Asia/Jakarta');
    $tanggal_format = date('l, j F Y');
    $jam = date('H:i');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Absen Berhasil</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Inter', sans-serif;
      background-color: #d9bea6;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .card {
      background-color: #fff;
      width: 360px;
      border-radius: 16px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
      text-align: center;
      overflow: hidden;
    }
    .card-header {
      background-color: #3498DB;
      color: white;
      padding: 24px 16px 16px;
    }
    .card-header h2 {
      margin: 8px 0 4px;
      font-size: 20px;
    }
    .card-body {
      padding: 20px;
    }
    .foto-karyawan {
      width: 64px;
      height: 64px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid #ccc;
      margin-bottom: 8px;
    }
    .nama-karyawan {
      font-weight: bold;
      font-size: 16px;
      margin: 4px 0;
    }
    .jabatan {
      font-size: 13px;
      color: #666;
      margin-bottom: 16px;
    }
    .info {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      font-size: 14px;
      margin: 6px 0;
    }
    .icon {
      color: #3498DB;
    }
    .success-box {
      background-color: #dcfce7;
      color: #3498DB;
      padding: 10px;
      border-radius: 8px;
      margin: 16px 0;
      font-size: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
    }
    .btn {
      background-color: #3498DB;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 8px;
      cursor: pointer;
      font-weight: bold;
      margin: 12px 0;
    }
    .footer {
      font-size: 12px;
      color: #888;
      margin-bottom: 12px;
    }
  </style>
</head>
<body>

<div class="card">
  <div class="card-header">
    <div style="font-size: 32px;">✅</div>
    <h2>Absen Berhasil!</h2>
    <p style="font-size: 13px;">Terima kasih telah melakukan absensi</p>
  </div>
  <div class="card-body">
    <img src="<?= htmlspecialchars($foto) ?>" alt="Foto Karyawan" class="foto-karyawan">
    <p class="nama-karyawan"><?= htmlspecialchars($nama_karyawan) ?></p>
    <p class="jabatan"><?= htmlspecialchars($jabatan) ?></p>

    <div class="info">
      📅 <span><?= $tanggal_format ?></span>
    </div>
    <div class="info">
      ⏰ <span><?= $jam ?></span>
    </div>

    <div class="success-box">
      ✅ Absen Pulang Berhasil — Data absensi telah dicatat dalam sistem
    </div>

    <p style="font-size: 13px;">Terimakasih Semoga Berkah</p>

    <form action="index.php" method="post">
      <button class="btn">Kembali</button>
    </form>
  </div>
  <div class="footer">
    Toko Roti Bakar Bahagia<br>
    ZA Pagar Alam, Kedaton, Bandar Lampung
  </div>
</div>

</body>
</html>