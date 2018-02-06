<?php
    $barang_id = isset($_GET['barang_id']) ? $_GET['barang_id'] : false;
    $kategori_id = "";
    $nama_barang = "";
    $spesifikasi = "";
    $stok = "";
    $harga = "";
    $file_gambar = "";
    $button = "Add";
    $status_barang = "";

    if ($barang_id) {
        $query = mysqli_query($koneksi, "SELECT * FROM barang where barang_id = '$barang_id'");
        $row = mysqli_fetch_assoc($query);
        $nama_barang = $row['nama_barang'];
        $spesifikasi = $row['spesifikasi'];
        $stok =  $row['stok'];
        $harga = $row['harga'];
        $file_gambar = $row['gambar'];
        $status_barang = $row['status'];
        $kategori_id = $row['kategori_id'];
        $button = "Update";

        $gambar = "<img src='".BASE_URL."images/barang/$file_gambar' style='width:500px; vertical-align:middle;'/>";

    }
?>

<script src="<?php echo BASE_URL.'js/ckeditor/ckeditor.js' ?>"></script>

<form action="<?php echo BASE_URL."modules/barang/action.php?barang_id=$barang_id"?>" method="POST" enctype="multipart/form-data">
    <div class="element-form">
        <label>Kategori</label>
        <span>
            <select name="kategori_id">
                <?php
                    $sql = mysqli_query($koneksi, "SELECT kategori_id, kategori FROM kategori WHERE status='on' group by kategori ASC");
                    while ($row = mysqli_fetch_assoc($sql)) {
                        if ($kategori_id == $row['kategori_id']) {
                            echo "<option value='$row[kategori_id]' selected='true'>$row[kategori]</option>";
                        }
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
    <div>
        <label>Spesifikasi</label>
        <span><textarea name='spesifikasi' id='editor'><?php echo $spesifikasi; ?></textarea></span>
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
        <span>
            <input type='file' name='gambar' value="<?php echo $file_gambar; ?>"> <?php echo $gambar; ?>
        </span>
    </div>
    <div class="element-form">
        <label>Status</label>
        <span>
            <input type="radio" name="status" value="on" <?php if ($status_barang == 'on') {echo "checked='true'";} ?>>On
            <input type="radio" name="status" value="off" <?php if ($status_barang == 'off') {echo "checked='true'";} ?>>Off
        </span>
    </div>
    <div class="element-form">
        <span><input type="submit" name="button" value="<?php echo $button; ?>"></span>
    </div>
</form>

<script>
    CKEDITOR.replace('editor');
</script>