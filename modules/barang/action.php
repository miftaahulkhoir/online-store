<?php
    include_once ("../../function/koneksi.php");
    include_once ("../../function/helper.php");

    $kategori_id = $_POST['kategori_id'];
    $nama_barang = $_POST['nama_barang'];
    $spesifikasi = $_POST['spesifikasi'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];
    $file_gambar = $_FILES['gambar']['name'];
    $button = $_POST['button'];
    $status_barang = $_POST['status'];

    move_uploaded_file($_FILES["gambar"]["tmp_name"], "../../images/barang/".$file_gambar);

    if ($button == 'Add') {
        mysqli_query($koneksi, "INSERT INTO barang (kategori_id, nama_barang, spesifikasi, gambar, harga, stok, status) VALUES ('$kategori_id','$nama_barang', '$spesifikasi', '$file_gambar', '$harga', '$stok', '$status_barang')");
    }

        // mysqli_query($koneksi, "INSERT INTO barang values ('1','1','asal','fdsafsdajhfsa','dsfhaisfd','312312','13','on')");
    // else if ($button == 'Update') {
    //     $kategori_id = $_GET['kategori_id'];
    //     mysqli_query($koneksi, "UPDATE kategori SET kategori = '$nama_kategori', status = '$status_kategori' WHERE kategori_id = '$kategori_id'");
    // }

    header("Location:".BASE_URL."index.php?page=my_profile&module=barang&action=list");

    ?>