
<?php 
    $koneksi = mysqli_connect("localhost","root","","pwpb-perpus") or die("gagal konek");
    $query = mysqli_query($koneksi,"SELECT * FROM peminjaman ORDER BY status ASC");
    $no = 1;

    $acpinjam = isset($_GET['acpinjam']) ? $_GET['acpinjam'] : false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style-buku.css">
    <title>Data peminjaman</title>
</head>
<body>

    <div class="wrap">
    <div class="action">
        <?php 
            $name = "$acpinjam.php";

            if(file_exists($name)){
                include_once($name);
            }else{
                include_once("tambahPeminjaman.php");
            }
        ?>
    </div>

    <div class="bungkus-table">
    <form action="" class="cari" method="post">
        Cari : 
        <input type="text" name="cari" autofocus size="30" placeholder="masukkan kata kunci..." id="keyword">
        <!-- <input type="submit" value="cari" id="tombol-cari"> -->
    </form>
    <div id="container">
    <div class="isi_table" style="max-height:300px;min-width:500px;overflow:scroll;">
    <table id="data-buku" cellpadding="10" >
        <tr>
            <th>No</th>
            <th>Id Anggota</th>
            <th>Nama Anggota</th>
            <th>Judul Buku</th>
            <th>waktu Peminjaman</th>
            <th>Status</th>
            <th>Opsi</th>
        </tr>
        <?php while($data = mysqli_fetch_assoc($query)) {

            if($data['status'] === "Dikembalikan"){
                $style = "background:rgb(44, 190, 39);";
            }else{
                $style = "background:rgb(224, 35, 51);";
            }
            
            ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['id_anggota']; ?></td>
            <td><?= $data['nama']; ?></td>
            <td><?= $data['buku']; ?></td>
            <td><?= $data['waktu_pinjam']; ?></td>
            <td><span style="<?= $style;?>" id="status"><?= $data['status']; ?></span></td>
            <td>
                <a id="ubah" href="admin.php?page=data_peminjaman&acpinjam=ubah-peminjaman&id=<?= $data["id_peminjaman"];?>">ubah</a>
                
            </td>
        </tr>
        <?php } ?>
    </table>
    </div>
    </div>
    </div>
    </div>
<script src="js/scriptPeminjaman.js"></script>
</body>
</html>