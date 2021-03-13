
<?php 
    include_once('koneksi.php');
    $query = mysqli_query($koneksi,"SELECT * FROM buku ORDER BY id DESC");
    $no = 1;

    $acbook = isset($_GET['acbook']) ? $_GET['acbook'] : false;
    $styleRow = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style-buku.css">
    <title>Data buku</title>
</head>
<body>

    <div class="wrap">
    <div class="action">
        <?php 
            $name = "$acbook.php";

            if(file_exists($name)){
                include_once($name);
            }else{
                include_once("tambahBuku.php");
            }
        ?>
    </div>
    
    <div class="bungkus-table">
    <form action="" class="cari" method="post">
        Cari : 
        <input type="text" name="cari" autofocus size="30" placeholder="masukkan kata kunci..." id="keyword">
        <!-- <input type="submit" value="cari" id="tombol-cari"> -->
    </form>

    <div id="container" class="container" style="max-height:300px;overflow:scroll;">
        
    <div class="isi_table">
    <table id="data-buku" cellpadding="10" >
        <tr>
            
        </tr>
        <tr>
            <th width="2%">No</th>
            <th width="20%">Judul Buku</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Stok Buku</th>
            <th>Opsi</th>
        </tr>
        
        <?php while($data = mysqli_fetch_assoc($query)) { ?>
            <?php if($no%2==0){
                $styleRow = "background:#eee";
            }else{
                $styleRow = "";
            } ?>
        <tr style="<?= $styleRow; ?>">
            <td><?= $no++; ?></td>
            <td align="center"><?= $data['judul']; ?></td>
            <td align="center"><?= $data['penerbit']; ?></td>
            <td><?= $data['tahun']; ?></td>
            <td><?= $data['stok']; ?></td>
            <td>
                <a id="ubah" href="admin.php?page=data_buku&acbook=ubah-buku&id=<?= $data["id"];?>">ubah</a> | 
                <a id="hapus" href="admin.php?page=data_buku&acbook=hapus&id=<?= $data["id"];?>" onclick="return confirm('yakin?');">hapus</a>
            </td>
        </tr>
        <?php } ?>
        
    </table>
    </div>
    </div>
    </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>