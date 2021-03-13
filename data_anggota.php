
<?php 
    $koneksi = mysqli_connect("localhost","root","","pwpb-perpus") or die("gagal konek");
    $query = mysqli_query($koneksi,"SELECT * FROM anggota");
    $no = 1;

    $acmember = isset($_GET['acmember']) ? $_GET['acmember'] : false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style-buku.css">
    <title>Data Anggota</title>
</head>
<body>

    <div class="wrap">
    <div class="action">
        <?php 
            $name = "$acmember.php";

            if(file_exists($name)){
                include_once($name);
            }else{
                include_once("tambahAnggota.php");
            }
        ?>
    </div>
    
    <div class="bungkus-table">
    <form action="" class="cari" method="post">
        Cari : 
        <input type="text" name="cari" autofocus size="30" placeholder="masukkan kata kunci..." id="keywordAnggota">
        <!-- <input type="submit" value="cari" id="tombol-cari"> -->
    </form>
    
    <div id="containerAnggota">
    <div class="isi_table" style="max-height:300px;overflow:scroll;">
    <table id="data-buku"cellpadding="10" >
        
        <tr>
            <th>No</th>
            <th>Id Anggota</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No Telepon</th>
            <th>Opsi</th>
        </tr>
        <?php while($data = mysqli_fetch_assoc($query)) { ?>
        <tr>
            <td><?= $no++; ?></td>
            <td align="center"><?= $data['id']; ?></td>
            <td><?= $data['nama']; ?></td>
            <td><?= $data['alamat']; ?></td>
            <td><?= $data['no_telpon']; ?></td>
            <td>
                <a id="ubah" href="admin.php?page=data_anggota&acmember=ubah-anggota&id=<?= $data["id"];?>">ubah</a> | 
                <a id="hapus" href="admin.php?page=data_anggota&acmember=hapus-anggota&id=<?= $data["id"];?>" onclick="return confirm('yakin?');">hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
    </div>
    </div>
    </div>
    </div>
<script src="js/scriptAnggota.js"></script>
</body>
</html>