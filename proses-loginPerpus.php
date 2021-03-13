<?php 

    session_start();
    include_once('koneksi.php');
    $username = $_POST['username'];
    $password = $_POST['password'];

    $_SESSION['login'] = false;
    $query = mysqli_query($koneksi,"SELECT * FROM admin WHERE username='$username'");

    if(mysqli_num_rows($query) === 1){

        $data = mysqli_fetch_assoc($query);
        $nama = $data['username'];
        $pass = $data['password'];

        if(password_verify($password,$pass)){
            $_SESSION['login'] = true;
            echo "<script>alert('berhasil login');
                    document.location.href='admin.php?page=dashboard';
                  </script>";
        }else{
            $_SESSION['login'] = false;
            echo "<script>alert('Gagal login');
                    document.location.href='index.php';
                </script>";
        }

    }else{
            $_SESSION['login'] = false;
            echo "<script>alert('Gagal login');
                    document.location.href='index.php';
                </script>";

    }

    

    

?>