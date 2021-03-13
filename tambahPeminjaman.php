<?php 
    include_once('koneksi.php');
    include_once('functions.php');
    if(isset($_POST["submit"])){
        $id_ang = $_POST['id_anggota'];
        // $nama = $_POST['nama'];
        $buku = $_POST['buku'];
        $status = $_POST['status'];
        $waktu = $_POST['waktu_pinjam'];

        $queryCek = "SELECT * FROM anggota WHERE id=$id_ang";
        $resultCek = mysqli_query($koneksi,$queryCek);

        if(mysqli_num_rows($resultCek) < 1){
            echo "<script>
                    let konfirmasi = confirm('Id Anggota belum terdaftar! Daftar terlebih dahulu?');
                    if(konfirmasi === true){
                        document.location.href='admin.php?page=data_anggota';  
                    }
                </script>";
        }else{
            // $anggota = lihat($queryCek)[0]; 
            $anggota = mysqli_fetch_assoc($resultCek);
            $nama = $anggota['nama'];
            // echo $nama;
            $query = "INSERT INTO peminjaman VALUES('',$id_ang,'$nama','$buku','$waktu','$status')";
            mysqli_query($koneksi,$query);
        }
        

        if(mysqli_affected_rows($koneksi) > 0){
            // header("location:admin.php?page=data_anggota");
            echo "<script>
                    alert('berhasil menambahkan peminjaman');
                    document.location.href='admin.php?page=data_peminjaman';
                </script>";
        }else{
            echo "<script>
                    alert('gagal menambahkan peminjaman');
                    document.location.href='admin.php?page=data_peminjaman';
                </script>";
        }
    }
    $resultBuku = mysqli_query($koneksi,"SELECT * FROM buku");
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
    <h1>Tambah data Peminjaman</h1>
    <!-- enctype : berfungsi untuk mengelola file-->
    <form id="tambah-buku" action="" method="post" >
        <table>
            <tr>
                <td><label for="judul">Id anggota</label></td>
                <td> : </td>
                <td><input type="text" name="id_anggota" id="judul" required autocomplete="off"></td>
            </tr>
            <!-- <tr>
                <td><label for="judul">Nama anggota</label></td>
                <td>: <input type="text" name="nama" id="judul" required autocomplete="off"></td>
            </tr> -->
            <tr>
                <td><label for="Penerbit">judul buku</label></td>
                <!-- <td>: <input type="text" name="buku" id="Penerbit" required autocomplete="off"></td> -->
                <td> : </td>
                <td>
                    <select name="buku" id="">
                        <?php while($data = mysqli_fetch_assoc($resultBuku)) { ?>
                            <option value="<?= $data['judul'];?>"><?= $data['judul'];?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="Penerbit">Status Peminjaman</label></td>
                <td> : </td>
                <td><select name="status" id="">
                        <option value="Dipinjam">Dipinjam</option>
                        <option value="Dikembalikan">Dikembalikan</option>                       
                      </select> 
                </td>
            </tr>
            <tr>
                <td><label for="Tahun">Waktu Peminjaman</label></td>
                <td> : </td>
                <td><input type="date" name="waktu_pinjam" id="Tahun" required autocomplete="off"></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name="submit">Tambah Data</button></td>
            </tr>
        </table>
    </form>
</body>
</html>