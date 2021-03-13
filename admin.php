<?php 
    session_start();
    $page = isset($_GET['page']) ? $_GET['page'] : false;
    if($_SESSION['login'] == false){
        header("location:index.php");
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
    <title>Admin</title>
</head>
<body>
    <div class="menu">
    <p><a <?php if($page == "dashboard"){echo "class='active'";}?>href="admin.php?page=dashboard"><i class="fas fa-chart-line"></i>Dashboard</a> </p>
        <p><a <?php if($page == "data_buku"){echo "class='active'";}?>href="admin.php?page=data_buku"><i class="fas fa-book"></i>Data buku</a> </p>
        <p><a <?php if($page == "data_anggota"){echo "class='active'";}?> href="admin.php?page=data_anggota"><i class="fas fa-users"></i>Data anggota</a></p>
        <p><a <?php if($page == "data_peminjaman"){echo "class='active'";}?> href="admin.php?page=data_peminjaman"><i class="far fa-handshake"></i>Peminjaman</a></p>
    </div>
    <div class="nav">
        <a href="logout.php" class="logout"><i class="fas fa-sign-out-alt"></i> LOGOUT</a>
    </div>
    <div class="content" style="">
    
        <?php 
            $filename = "$page.php";

            if(file_exists($filename)){
                include_once($filename);
            }else{
                echo "Halaman tidak ditemukan";
            }
         ?>
    </div>

    
</body>
</html>