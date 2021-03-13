<?php 
    include_once('koneksi.php');
    include_once('functions.php');

    $id = $_GET['id'];

    $data = lihat("SELECT * FROM anggota WHERE id=$id")[0];

    if(isset($_POST["submit"])){

        if(ubahAnggota($_POST) > 0){
            // header("location:admin.php?page=data_anggota");
            echo "<script>
                    alert('berhasil mengubah data','succes');
                    document.location.href='admin.php?page=data_anggota';
                </script>";
        }else{
            echo "<script>
                    swal('gagal mengubah data','warning');
                    document.location.href='admin.php?page=data_anggota';
                </script>";
        }
    }
    if(isset($_POST['batal'])){
        header("location:admin.php?page=data_anggota");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style-buku.css">
    <title>Document</title>
</head>
<body>
    <h1>Ubah data Anggota</h1>
    <!-- enctype : berfungsi untuk mengelola file-->
    <form id="tambah-buku" action="" method="post" >
        
        <table>
            <tr>
            <td><input type="hidden" name="id" value="<?= $data['id'];?>"></td>
            </tr>
            <tr>
                <td><label for="judul">Nama</label></td>
                <td> : </td>
                <td><input type="text" name="nama" id="judul" required autocomplete="off" value="<?= $data['nama'];?>"></td>
            </tr>
            <tr>
                <td><label for="Penerbit">Alamat</label></td>
                <td> : </td>
                <td><input type="text" name="alamat" id="Penerbit" required autocomplete="off" value="<?= $data['alamat'];?>"></td>
            </tr>
            <tr>
                <td><label for="Tahun">Nomor Telepon</label></td>
                <td> : </td>
                <td><input type="text" name="no_telpon" id="Tahun" required autocomplete="off" value="<?= $data['no_telpon'];?>"></td>
            </tr>
            <tr>
                <td><button type="submit" name="batal">Batal</button></td>
                <td><button type="submit" name="submit">Ubah Data</button></td>
            </tr>
        </table>
       
    </form>

    <script src="package\dist\sweetalert2.all.min.js"></script>
</body>
</html>