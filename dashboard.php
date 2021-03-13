<?php 
    include_once('koneksi.php');
    include_once('functions.php');
    $anggota = "SELECT * FROM anggota";
    $buku = "SELECT * FROM buku";
    $pinjam = "SELECT * FROM peminjaman WHERE status='Dipinjam'";
    

    $queryAnggota = mysqli_query($koneksi,$anggota);
    $queryBuku = mysqli_query($koneksi,$buku);
    $queryPinjam = mysqli_query($koneksi,$pinjam);

    $nanggota = mysqli_num_rows($queryAnggota);
    $nbuku = mysqli_num_rows($queryBuku);
    $npinjam = mysqli_num_rows($queryPinjam);

    // $data= lihat($buku);
    $sum = 0;
    while ($row = mysqli_fetch_assoc($queryBuku)){
        $sum += $row['stok'];
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style-admin.css">
    <link rel="stylesheet" href="fontawesome-free-5.11.2-web/css/all.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="wrap">
    <h1>Hallo Admin!</h1>
    <div class="content-dashboard">
        <div class="thumbnail">
            <img src="img/anggota.png" alt="">
            <h3>Jumlah anggota </h3>
            <p><?= $nanggota; ?></p>
        </div>
        <div class="thumbnail">
            <img src="img/buku.png" alt="">
            <h3>Jenis Buku </h3>
            <p><?= $nbuku; ?></p>
        </div>
        <div class="thumbnail">
            <img src="img/buku.png" alt="">
            <h3>Buku yang dipinjam</h3>
            <p><?= $npinjam; ?></p>
        </div>
        <div class="thumbnail">
            <img src="img/buku.png" alt="">
            <h3>Jumlah buku</h3>
            <p><?= $sum; ?></p>
        </div>
    </div>
    </div>
</body>
</html>