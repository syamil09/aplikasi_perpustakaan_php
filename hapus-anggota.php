<?php 
    include_once("functions.php");

    $id = $_GET["id"];
    if(hapusAnggota($id) > 0){
        echo "<script>
                    alert('data berhasil dihapus');
                    document.location.href = 'admin.php?page=data_anggota';
                </script>";
    }else{
        echo "<script>
                    alert('data gagal dihapus');
                    document.location.href = 'admin.php?page=data_anggota';
                </script>";
    }
?>