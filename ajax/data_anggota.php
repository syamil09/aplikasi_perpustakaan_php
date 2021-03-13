<?php 
    include_once('../functions.php');
    
    $keyword = $_GET['keyword'];
    $query = "SELECT * FROM anggota WHERE 
                nama LIKE '%$keyword%' OR
                alamat LIKE '%$keyword%' OR
                no_telpon LIKE '%$keyword%'";

    $anggota = mysqli_query($koneksi,$query);
    $no=1;
?>
    
    <link rel="stylesheet" href="../style-buku.css">
    <table id="data-buku" cellpadding="10" >
        
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No Telepon Terbit</th>
            <th>Opsi</th>
        </tr>
        <?php if(mysqli_num_rows($anggota) >0) { ?>
        <?php while($data = mysqli_fetch_assoc($anggota)) { ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['nama']; ?></td>
            <td><?= $data['alamat']; ?></td>
            <td><?= $data['no_telpon']; ?></td>
            <td>
                <a id="ubah" href="admin.php?page=data_anggota&acmember=ubah-anggota&id=<?= $data["id"];?>">ubah</a> | 
                <a id="hapus" href="admin.php?page=data_anggota&acmember=hapus-anggota&id=<?= $data["id"];?>" onclick="return confirm('yakin?');">hapus</a>
            </td>
        </tr>
        <?php }}else { ?>
        <tr>
            <td colspan="6" align="center">Data tidak ditemukan</td> 
        </tr>
        <?php } ?>
    </table>