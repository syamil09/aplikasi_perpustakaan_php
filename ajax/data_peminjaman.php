<?php 
    include_once('../functions.php');
    
    $keyword = $_GET['keyword'];
    $query = "SELECT * FROM peminjaman WHERE 
                id_anggota LIKE '%$keyword%' OR
                nama LIKE '%$keyword%' OR
                buku LIKE '%$keyword%' OR
                waktu_pinjam LIKE '%$keyword%' OR
                status LIKE '%$keyword%'";

    $peminjaman = mysqli_query($koneksi,$query);
    $no=1;
?>
    
    <link rel="stylesheet" href="../style-buku.css">
    <table id="data-buku" cellpadding="10" style="height:230px;overflow:scroll;">
        <tr>
            <th>No</th>
            <th>Id Anggota</th>
            <th>Nama Anggota</th>
            <th>Judul Buku</th>
            <th>waktu Peminjaman</th>
            <th>Status</th>
            <th>Opsi</th>
        </tr>
        <?php if(mysqli_num_rows($peminjaman) >0) { ?>
        <?php while($data = mysqli_fetch_assoc($peminjaman)) { 
            
            if($data['status'] === "Sudah dikembalikan"){
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
        <?php }}else { ?>
        <tr>
            <td colspan="6" align="center">Data tidak ditemukan</td> 
        </tr>
        <?php } ?>
    </table>