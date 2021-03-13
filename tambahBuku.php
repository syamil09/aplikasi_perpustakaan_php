<?php 
    include_once('koneksi.php');
    if(isset($_POST["submit"])){
        $judul = $_POST['judul'];
        $penerbit = $_POST['Penerbit'];
        $tahun = $_POST['Tahun'];
        $stok = $_POST['stok'];

        $query = "INSERT INTO buku VALUES('','$judul','$penerbit','$tahun',$stok)";

        mysqli_query($koneksi,$query);

        if(mysqli_affected_rows($koneksi) > 0){
            // header("location:admin.php?page=data_buku");
            echo "<script>
                    alert('berhasil menambahkan data');
                    document.location.href='admin.php?page=data_buku';
                </script>";
        }else{
            echo "<script>
                    alert('gagal menambahkan data!');
                    document.location.href='admin.php?page=data_buku';
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
    <h1>Tambah data Buku</h1>
    <!-- enctype : berfungsi untuk mengelola file-->
    <form id="tambah-buku" action="" method="post" >
        <table>
            <tr>
                <td><label for="judul">Judul</label></td>
                <td> : </td>
                <td><input type="text" name="judul" id="judul" required autocomplete="off"></td>
            </tr>
            <tr>
                <td><label for="Penerbit">Penerbit</label></td>
                <td> : </td>
                <td><input type="text" name="Penerbit" id="Penerbit" required autocomplete="off"></td>
            </tr>
            <tr>
                <td><label for="Tahun">Tahun terbit</label></td>
                <td> : </td>
                <td><input type="text" name="Tahun" id="Tahun" required autocomplete="off"></td>
            </tr>
            <tr>
                <td><label for="Tahun">Stok Buku</label></td>
                <td> : </td>
                <td><input type="text" name="stok" id="Tahun" required autocomplete="off"></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name="submit">Tambah Data</button></td>
            </tr>
        </table>
    </form>
</body>
</html>