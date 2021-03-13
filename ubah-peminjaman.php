<?php 
    include_once('koneksi.php');
    include_once('functions.php');

    $id = $_GET['id'];

    $data = lihat("SELECT * FROM peminjaman WHERE id_peminjaman=$id")[0];

    if(isset($_POST["submit"])){

        if(ubahPeminjaman($_POST) > 0){
            // header("location:admin.php?page=data_anggota");
            echo "<script>
                    alert('berhasil mengubah data','succes');
                    document.location.href='admin.php?page=data_peminjaman';
                </script>";
        }else{
            echo "<script>
                    alert('gagal mengubah data','warning');
                    document.location.href='admin.php?page=data_anggota';
                </script>";
        }
    }
    if(isset($_POST['batal'])){
        header("location:admin.php?page=data_peminjaman");
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
    <h1>Ubah data peminjaman</h1>

    <form id="tambah-buku" action="" method="post" >
        
        <table>
            <tr>
            <td><input type="hidden" name="id" value="<?= $data['id_peminjaman'];?>"></td>
            </tr>
            <tr>
                <td><label for="judul">id_anggota</label></td>
                <td>:</td>
                <td><input type="text" name="id_anggota" id="judul" required autocomplete="off" value="<?= $data['id_anggota'];?>"></td>
            </tr>
            <tr>
                <td><label for="judul">Nama</label></td>
                <td>:</td>
                <td><input type="text" name="nama" id="judul" required autocomplete="off" value="<?= $data['nama'];?>"></td>
            </tr>
            <tr>
                <td><label for="Penerbit">Judul Buku</label></td>
                <td>:</td>
                <td><input type="text" name="buku" id="Penerbit" required autocomplete="off" value="<?= $data['buku'];?>"></td>
            </tr>
            <tr>
                <td><label for="Penerbit">Status Peminjaman</label></td>
                <td>:</td>
                <td><select name="status" id="">
                        <option value="Dipinjam">Dipinjam</option>
                        <option value="Dikembalikan">Dikembalikan</option>
                      </select>
                </td>
            </tr>
            <tr>
                <td><label for="Tahun">waktu_peminjaman</label></td>
                <td>:</td>
                <td><input type="date" name="waktu_pinjam" id="Tahun" required autocomplete="off" value="<?= $data['waktu_pinjam'];?>"></td>
            </tr>
            <tr>
                <td><button type="submit" name="batal">Batal</button></td>
                <td colspan="2"><button type="submit" name="submit">Ubah Data</button></td>
            </tr>
        </table>
       
    </form>

    <script src="package\dist\sweetalert2.all.min.js"></script>
</body>
</html>