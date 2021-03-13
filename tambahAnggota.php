<?php 
    include_once('koneksi.php');
    if(isset($_POST["submit"])){
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $telpon = $_POST['no_telpon'];

        $query = "INSERT INTO anggota VALUES('','$nama','$alamat','$telpon')";

        mysqli_query($koneksi,$query);

        if(mysqli_affected_rows($koneksi) > 0){
            // header("location:admin.php?page=data_anggota");
            echo "<script>
                    alert('berhasil menambahkan data');
                    document.location.href='admin.php?page=data_anggota';
                </script>";
        }
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
    <h1>Tambah data Anggota</h1>
    <!-- enctype : berfungsi untuk mengelola file-->
    <form id="tambah-buku" action="" method="post" >
        <table>
            <tr>
                <td><label for="judul">Nama</label></td>
                <td> : </td>
                <td><input type="text" name="nama" id="judul" required autocomplete="off"></td>
            </tr>
            <tr>
                <td><label for="Penerbit">Alamat</label></td>
                <td> : </td>
                <td><input type="text" name="alamat" id="Penerbit" required autocomplete="off"></td>
            </tr>
            <tr>
                <td><label for="Tahun">Nomor Telepon</label></td>
                <td> : </td>
                <td><input type="text" name="no_telpon" id="Tahun" required autocomplete="off"></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name="submit">Tambah Data</button></td>
            </tr>
        </table>
    </form>
</body>
</html>