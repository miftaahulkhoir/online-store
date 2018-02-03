<?php
    $barang_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;
    $nama_barang = "";
    $spesifikasi = "";
    $stok = "";
    $harga = "";
    $file_gambar = "";
    $button = "Add";
    // if ($kategori_id) {
    //     $query = mysqli_query($koneksi, "SELECT * FROM barang where barang_id = '$barang_id'");
    //     $row = mysqli_fetch_assoc($query);
    //     $nama_kategori = $row['nama_barang'];
    //     $status_kategori = $row['harga_barang'];
    //     $button = "Update";

    // }
?>

<form action="<?php echo BASE_URL."modules/barang/action.php?barang_id=$barang_id"?>" method="POST" enctype="multipart/form-data">
    <div class="element-form">
        <label>Kategori</label>
        <span>
            <select>
                <?php
                    $sql = mysqli_query($koneksi, "SELECT kategori_id, kategori FROM kategori WHERE status='on' group by kategori ASC");
                    while ($row = mysqli_fetch_assoc($sql)) {
                        echo "<option value='$row[kategori_id]'>$row[kategori]</option>";
                    }
                ?>
            </select>
        </span>
    </div>
    <div class="element-form">
        <label>Nama Barang</label>
        <span><input type='text' name='nama_barang' value="<?php echo $nama_barang; ?>"></span>
    </div>
    <div class="element-form">
        <label>Spesifikasi</label>
        <span><textarea name='spesifikasi'><?php echo $spesifikasi; ?></textarea></span>
    </div>
    <div class="element-form">
        <label>Stok</label>
        <span><input type='text' name='stok' value="<?php echo $stok; ?>"></span>
    </div>
    <div class="element-form">
        <label>Harga</label>
        <span><input type='text' name='harga' value="<?php echo $harga; ?>"></span>
    </div>
    <div class="element-form">
        <label>Gambar Produk</label>
        <span><input type='file' name='gambar' value="<?php echo $file_gambar; ?>"></span>
    </div>
    <div class="element-form">
        <span><input type="submit" name="button" value="<?php echo $button; ?>"></span>
    </div>
</form>