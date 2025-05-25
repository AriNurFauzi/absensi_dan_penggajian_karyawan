<?php
session_start();
if (!isset($_SESSION['user'])) {
  // jika user belum login
  header('Location: login.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dasboard - Roti Bakar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css?v=<?= time() ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<?php include 'koneksi.php'; ?>

<?php
$page = isset($_GET['page']) ? $_GET['page'] : '1'; // default 'dashboard'

switch ($page) {
    case '1':
        include "header.php";
        include 'beranda.php';
        break;

    case '2':
        include "header.php";
        include 'absensi.php';
        include "footer.php";
        break;

    case '3':
        include "header.php";
        include 'data-gaji.php';
        include "footer.php";
        break;

    case '4':
        include "header.php";
        include 'data-karyawan.php';
        include "footer.php";
        break;

    case '5':
        include 'tampilan-awal.php';
        break;

    case '6':
        include 'perhitungan-gaji.php';
        break;

    case 'logout':
        include 'logout.php';
        break;

    default:
        echo "<h2>404 - Halaman tidak ditemukan</h2>";
        break;
}
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>