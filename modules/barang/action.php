<?php
    include_once ("../../function/koneksi.php");
    include_once ("../../function/helper.php");

    // $barang_id = $_POST['barang_id'];
    $nama_barang = $_POST['nama_barang'];
    $spesifikasi = $_POST['spesifikasi'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];
    $button = $_POST['button'];
    $status_barang = $_POST['status'];
    $kategori_id = $_POST['kategori_id'];
    $upload_gambar ="";


    if(!empty($_FILES['gambar']['name'])) {
        $file_gambar = $_FILES['gambar']['name'];
        move_uploaded_file($_FILES["gambar"]["tmp_name"], "../../images/barang/".$file_gambar);
        $upload_gambar = ",gambar ='$file_gambar'";
    }


    if ($button == 'Add') {
        mysqli_query($koneksi, "INSERT INTO barang (kategori_id, nama_barang, spesifikasi, gambar, harga, stok, status) VALUES ('$kategori_id','$nama_barang', '$spesifikasi', '$file_gambar', '$harga', '$stok', '$status_barang')");
    }

    else if ($button == 'Update') {
        $barang_id = $_GET['barang_id'];
        mysqli_query($koneksi, "UPDATE barang SET kategori_id='$kategori_id',
        nama_barang='$nama_barang',
        spesifikasi='$spesifikasi',
        harga='$harga',
        stok='$stok',
        status='$status_barang'
        $upload_gambar WHERE barang_id='$barang_id'");
    }
    header("Location:".BASE_URL."index.php?page=my_profile&module=barang&action=list");

    ?>