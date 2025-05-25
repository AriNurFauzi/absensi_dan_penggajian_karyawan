<?php
session_start();
if (!isset($_SESSION['user'])) {
  // jika user belum login
  header('Location: login.php');
  exit();
}

include 'header.php';
?>
<div class="absen">
    <img src="gambar/logo_fix.png" alt="Logo Roti Bakar Bahagia" class="rounded-5">

    <p class="instruction">Silahkan Mengisi Absen Terlebih Dahulu!!</p>

    <div class="button-group1">
      <a href="?page=2" class="button1">
        <img src="https://img.icons8.com/ios-filled/50/000000/camera--v1.png" alt="Camera Icon">
        <p class="masuk">Absen Masuk</p>
      </a>
      <a href="?page=3" class="button1">
        <img src="https://img.icons8.com/ios-filled/50/000000/camera--v1.png" alt="Camera Icon">
        <p class="pulang">Absen Pulang</p>
      </a>
    </div>
  </div>

<?php
include 'header.php';

  ?>