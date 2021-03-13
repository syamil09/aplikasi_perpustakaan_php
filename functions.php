<?php 
    include_once("koneksi.php");

    function lihat($query){
        global $koneksi;

        $select = mysqli_query($koneksi,$query);
        $rows = [];
        while($row = mysqli_fetch_assoc($select)){
            $rows[] = $row;
        }
        return $rows;
    }

    function ubah($query){
        global $koneksi;

        $id = $query['id'];
        $judul = $query['judul'];
        $penerbit = $query['penerbit'];
        $tahun = $query['tahun'];
        $stok = $query['stok']; 

        $insert = "UPDATE buku SET judul='$judul',penerbit='$penerbit',tahun=$tahun,stok=$stok WHERE id=$id";
        mysqli_query($koneksi,$insert);

        return mysqli_affected_rows($koneksi);
    }
    function ubahAnggota($query){
        global $koneksi;

        $id = $query['id'];
        $nama = $query['nama'];
        $alamat = $query['alamat'];
        $telpon = $query['no_telpon'];

        $insert = "UPDATE anggota SET nama='$nama',alamat='$alamat',no_telpon='$telpon' WHERE id=$id";
        mysqli_query($koneksi,$insert);

        return mysqli_affected_rows($koneksi);
    }
    function ubahPeminjaman($query){
        global $koneksi;

        $id = $query['id'];
        $id_anggota = $query['id_anggota'];
        $nama = $query['nama'];
        $waktu = $query['waktu_pinjam'];
        $status = $query['status'];
        $buku = $query['buku'];

        $update = "UPDATE peminjaman SET id_anggota='$id_anggota',nama='$nama',buku='$buku',status='$status',waktu_pinjam='$waktu' WHERE id_peminjaman=$id";
        mysqli_query($koneksi,$update);

        return mysqli_affected_rows($koneksi);
    }

    function hapus($id){
        global $koneksi;

        mysqli_query($koneksi,"DELETE FROM buku WHERE id=$id");
        return mysqli_affected_rows($koneksi);
    }
    function hapusAnggota($id){
        global $koneksi;

        mysqli_query($koneksi,"DELETE FROM anggota WHERE id=$id");
        return mysqli_affected_rows($koneksi);
    }
    function hapusPeminjaman($id){
        global $koneksi;

        mysqli_query($koneksi,"DELETE FROM peminjaman WHERE id_peminjaman=$id");
        return mysqli_affected_rows($koneksi);
    }
?>