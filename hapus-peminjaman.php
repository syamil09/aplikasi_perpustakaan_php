<?php 
    include_once("functions.php");

    $id = $_GET["id"];
    if(hapusPeminjaman($id) > 0){
        echo "<script>
                    alert('buku sudah dikembalikan');
                    document.location.href = 'admin.php?page=data_anggota';
                </script>";
    }else{
        echo "<script>
                    alert('buku gagal dikembalikan');
                    document.location.href = 'admin.php?page=data_anggota';
                </script>";
    }
?>