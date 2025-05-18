const video = document.getElementById('video');
const canvas = document.getElementById('canvas');
const captureBtn = document.getElementById('capture');

// Aktifkan kamera
navigator.mediaDevices.getUserMedia({ video: true })
  .then(stream => {
    video.srcObject = stream;
  })
  .catch(error => {
    alert("Kamera tidak dapat diakses. Pastikan sudah memberikan izin.");
    console.error(error);
  });

// Ambil foto saat tombol diklik
captureBtn.addEventListener('click', () => {
  const context = canvas.getContext('2d');
  canvas.width = video.videoWidth;
  canvas.height = video.videoHeight;
  context.drawImage(video, 0, 0, canvas.width, canvas.height);

  // Simpan sebagai data URL (bisa dikirim ke server nanti)
  const imageData = canvas.toDataURL('image/png');
  console.log("Foto diambil:", imageData);

  alert("Absen Masuk Berhasil! (Simulasi penyimpanan foto)");
});
