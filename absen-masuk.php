<?php
session_start();

$nama_karyawan = "Ahmad Radin Intan Saputra"; 
$karyawan_id = 1; 

<div class="absen-page">
  <div class="absen-container">
    <p class="judul">Absen Masuk Karyawan</p>
    <p class="nama"><i>👤 <?= $nama_karyawan ?></i></p>

    <form method="POST" action="proses_absen.php">
      <input type="hidden" name="karyawan_id" value="<?= $karyawan_id ?>">
      <input type="hidden" name="status" value="masuk">
      <input type="hidden" name="lokasi" value="Outlet A"> <!-- Ganti jika pakai lokasi dinamis -->
      <input type="hidden" name="foto" id="foto">

      <video id="video" autoplay muted playsinline class="video-frame"></video>
      <canvas id="canvas" width="320" height="240" class="hidden"></canvas>

      <button type="button" id="capture" class="btn-green">
        <img src="https://img.icons8.com/ios-filled/24/000000/camera--v1.png"/>
        Absen Masuk
      </button>
      <button type="submit" id="submit-btn" class="btn-green hidden">Kirim Absen</button>
    </form>
  </div>
</div>

<script src="script.js"></script>
