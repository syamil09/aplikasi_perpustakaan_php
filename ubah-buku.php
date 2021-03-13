<?php 
    include_once('koneksi.php');
    include_once('functions.php');

    $id = $_GET['id'];

    $data = lihat("SELECT * FROM buku WHERE id=$id")[0];

    if(isset($_POST["submit"])){

        if(ubah($_POST) > 0){
            // header("location:admin.php?page=data_buku");
            echo "<script>
                    alert('berhasil mengubah data');
                    document.location.href='admin.php?page=data_buku';
                </script>";
        }else{
            echo "<script>
                    alert('gagal mengubah data');
                    document.location.href='admin.php?page=data_buku';
                </script>";
        }
        // if(mysqli_affected_rows($koneksi)){
        //     header("location:admin.php?page=data_buku");
        // }else{
        //     echo "<script>alert('Gagal login');
        //         document.location.href='location:admin.php?page=data_buku';
        //       </script>";
        // }
    }
    if(isset($_POST['batal'])){
        header("location:admin.php?page=data_buku");
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
    <h1>Ubah data Buku</h1>
    <!-- enctype : berfungsi untuk mengelola file-->
    <form id="tambah-buku" action="" method="post" >
        
        <table>
            <tr>
            <td><input type="hidden" name="id" value="<?= $data['id'];?>"></td>
            </tr>
            <tr>
                <td><label for="judul">Judul</label></td>
                <td> : </td>
                <td><input type="text" name="judul" id="judul" required autocomplete="off" value="<?= $data['judul'];?>"></td>
            </tr>
            <tr>
                <td><label for="Penerbit">Penerbit</label></td>
                <td> : </td>
                <td><input type="text" name="penerbit" id="Penerbit" required autocomplete="off" value="<?= $data['penerbit'];?>"></td>
            </tr>
            <tr>
                <td><label for="Tahun">Tahun terbit</label></td>
                <td> : </td>
                <td><input type="text" name="tahun" id="Tahun" required autocomplete="off" value="<?= $data['tahun'];?>"></td>
            </tr>
            <tr>
                <td><label for="Tahun">Stok Buku</label></td>
                <td> : </td>
                <td><input type="text" name="stok" id="Tahun" required autocomplete="off" value="<?= $data['stok']; ?>"></td>
            </tr>
            <tr>
                <td><button type="submit" name="batal">Batal</button></td>
                <td><button type="submit" name="submit">Ubah Data</button></td>
            </tr>
        </table>
       
    </form>
</body>
</html>