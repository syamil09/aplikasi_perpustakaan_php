<?php 
    include_once('../functions.php');
    
    $keyword = $_GET['keyword'];
    $query = "SELECT * FROM buku WHERE 
                judul LIKE '%$keyword%' OR
                penerbit LIKE '%$keyword%' OR
                tahun LIKE '%$keyword%' OR
                stok LIKE '%$keyword%'";

    $buku = mysqli_query($koneksi,$query);
    $no=1;
?>
<link rel="stylesheet" href="../style-buku.css">
<table id="data-buku" cellpadding="10" >
        <tr>
            <th>No</th>
            <th>Judul Buku</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Stok Buku</th>
            <th>Opsi</th>
        </tr>

        <?php if(mysqli_num_rows($buku) >0) { ?>
        <?php while($data = mysqli_fetch_assoc($buku)) { ?>
           
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['judul']; ?></td>
            <td><?= $data['penerbit']; ?></td>
            <td><?= $data['tahun']; ?></td>
            <td><?= $data['stok']; ?></td>
            <td>
                <a id="ubah" href="admin.php?page=data_buku&acbook=ubah-buku&id=<?= $data["id"];?>">ubah</a> | 
                <a id="hapus" href="admin.php?page=data_buku&acbook=hapus&id=<?= $data["id"];?>" onclick="return confirm('yakin?');">hapus</a>
            </td>
                    
        </tr>
        <?php } ?>
        <?php }else{ ?>
            <tr>
                <td colspan="6" align="center">Data tidak ditemukan</td> 
            </tr>
        <?php } ?>
        
    </table>