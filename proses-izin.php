
<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_karyawan   = $_POST['employee']; // ambil dari select
    $jenis_izin    = $_POST['ket_izin'];
    $tanggal_mulai = $_POST['tanggal_izin'];
    $keterangan    = $_POST['keterangan'];

    $sql = "INSERT INTO izin (id_karyawan, ket_izin, tanggal_izin, keterangan)
            VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("isss", $id_karyawan, $jenis_izin, $tanggal_mulai, $keterangan);
        if ($stmt->execute()) {
            echo "<script>alert('Data izin berhasil disimpan.'); window.location.href='admin.php?page=2';</script>";
        } else {
            echo "Gagal menyimpan data: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Gagal mempersiapkan statement: " . $conn->error;
    }

    $conn->close();
}

?>
