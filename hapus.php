<?php 
    include_once("functions.php");

    $id = $_GET["id"];
    if(hapus($id) > 0){
        echo "<script>
                    alert('data berhasil dihapus');
                    window.location = 'admin.php?page=data_buku';
                </script>";
    }else{
        echo "<script>
                    alert('data gagal dihapus');
                    document.location.href = 'admin.php?page=data_buku';
                </script>";
    }
?>