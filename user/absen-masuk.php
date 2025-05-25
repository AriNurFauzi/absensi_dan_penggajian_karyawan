<div class="absen-page">
  <div class="absen-container">
    <p class="judul">Absen Masuk Karyawan</p>
    <p class="nama"><i>👤 <?php echo $_SESSION['user']['nama_lengkap'] ?></i></p>

    <!-- Tampilkan waktu real-time -->
    <p class="waktu" id="waktu-sekarang" style="font-weight: bold; color: green;"></p>

    <form method="POST" action="proses-absen.php">
      <input type="hidden" name="karyawan_id" value="<?= $_SESSION['user']['id_karyawan']?>">
      <input type="hidden" name="status" value="masuk">
      <input type="hidden" name="lokasi" value="Outlet A">
      <input type="hidden" name="foto" id="foto">
      <input type="hidden" name="waktu_absen" id="waktu_absen"> <!-- untuk dikirim -->

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
<script src="scriptuser.js"></script>
<script>
// Format waktu real-time
function getFormattedDateTime() {
  const now = new Date();
  const days = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
  const dayName = days[now.getDay()];
  const day = String(now.getDate()).padStart(2, '0');
  const month = String(now.getMonth() + 1).padStart(2, '0');
  const year = now.getFullYear();
  const hours = String(now.getHours()).padStart(2, '0');
  const minutes = String(now.getMinutes()).padStart(2, '0');
  const seconds = String(now.getSeconds()).padStart(2, '0');
  return ${dayName}, ${day}-${month}-${year} ${hours}:${minutes}:${seconds};
}

// Tampilkan waktu setiap detik
function updateClock() {
  const waktuElement = document.getElementById('waktu-sekarang');
  const waktuAbsen = document.getElementById('waktu_absen');
  const currentTime = getFormattedDateTime();
  waktuElement.textContent = 🕒 Waktu Sekarang: ${currentTime};
  waktuAbsen.value = currentTime;
}
setInterval(updateClock, 1000); // Update tiap detik
updateClock(); // Inisialisasi langsung

// Proses capture
document.getElementById("capture").addEventListener("click", function () {
  const video = document.getElementById("video");
  const canvas = document.getElementById("canvas");
  const context = canvas.getContext("2d");
  context.drawImage(video, 0, 0, canvas.width, canvas.height);

  const fotoData = canvas.toDataURL("image/png");
  document.getElementById("foto").value = fotoData;

  document.getElementById("submit-btn").classList.remove("hidden");
});
</script>