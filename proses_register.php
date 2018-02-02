<?php
    include_once ("function/koneksi.php");
    include_once ("function/helper.php");

    $level = "customer";
    $status= "on";
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];

    unset($_POST['password']);
    unset($_POST['re_password']);
    $dataForm = http_build_query($_POST);

//    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email'");
    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email'");
    if (empty($nama_lengkap) or empty($email) or empty($alamat) or empty($phone) or empty($password) or empty($re_password)) {
        header("Location:".BASE_URL."index.php?page=register&notif=require&$dataForm");
    }
    elseif ($password !== $re_password) {
        header("Location:".BASE_URL."index.php?page=register&notif=password&$dataForm");
    }
    elseif (mysqli_num_rows($query) == 1) {
        header("Location:".BASE_URL."index.php?page=register&notif=email&$dataForm");
    }
    else {
        $password = md5($password);
        mysqli_query($koneksi, "INSERT INTO user (level, nama, email, alamat, phone, password, status)
                            VALUES ('$level', '$nama_lengkap', '$email', '$alamat', '$phone', '$password', '$status')");
        header("Location:".BASE_URL."index.php?page=login");
    }


?>