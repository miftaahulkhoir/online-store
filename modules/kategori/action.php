<?php
    include_once ("../../function/koneksi.php");
    include_once ("../../function/helper.php");


    $nama_kategori = $_POST['kategori'];
    $status_kategori = $_POST['status'];
    $button = $_POST['button'];
    if ($button == 'Add') {
        mysqli_query($koneksi, "INSERT INTO kategori (kategori, status) VALUES ('$nama_kategori', '$status_kategori')");
    }
    else if ($button == 'Update') {
        $kategori_id = $_GET['kategori_id'];
        mysqli_query($koneksi, "UPDATE kategori SET kategori = '$nama_kategori', status = '$status_kategori' WHERE kategori_id = '$kategori_id'");
    }

    header("Location:".BASE_URL."index.php?page=my_profile&module=kategori&action=list");

    ?>