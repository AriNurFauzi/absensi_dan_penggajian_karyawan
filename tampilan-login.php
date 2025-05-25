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
<div class="container-fluid d-flex flex-column justify-content-center align-items-center vh-100 beranda">
    <div class="logo rounded-5">
        <img class="rounded-5" src="gambar/upscalemedia-transformed (1).jpeg" alt="" srcset="">
    </div>
    <div class="text-center mt-5">
        <h3>Selamat Datang</h3>
        <p>Silahkan Masukan Username & Password</p>
    </div>
    <form action="proses_login.php" method="POST">
        <div class="mt-4">
            <div class="login">
                <div class="input-group mb-3">
                    <input type="text" class="form-control w-100" id="username" name="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control w-100" id="password" name="password" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <button type="submit" class="btn btn-dark w-100"> Masuk</button>
            </div>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>