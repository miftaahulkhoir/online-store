<?php
    $barang_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;
    $nama_kategori = "";
    $status_kategori = "";
    $button = "Add";
    // if ($kategori_id) {
    //     $query = mysqli_query($koneksi, "SELECT * FROM barang where barang_id = '$barang_id'");
    //     $row = mysqli_fetch_assoc($query);
    //     $nama_kategori = $row['nama_barang'];
    //     $status_kategori = $row['harga_barang'];
    //     $button = "Update";

    // }
?>

<form action="<?php echo BASE_URL."modules/barang/action.php?barang_id=$barang_id"?>" method="POST">
    <div class="element-form">
        <label>Kategori</label>
        <span>
            <select>
                <?php
                    $sql = mysqli_query($koneksi, "SELECT * FROM kategori WHERE status='on'");
                    while ($row = mysqli_fetch_assoc($sql)) {
                        echo "<option value='$row[kategori_id]'>$row[kategori]</option>";
                    }
                ?>
            </select>
        </span>
    </div>
    <div class="element-form">
        <label>Status</label>
        <span>
            <input type="radio" name="status" value="on" <?php if ($status_kategori == 'on') {echo "checked='true'";} ?>>On
            <input type="radio" name="status" value="off" <?php if ($status_kategori == 'off') {echo "checked='true'";} ?>>Off
        </span>
    </div>
    <div class="element-form">
        <span><input type="submit" name="button" value="<?php echo $button; ?>"></span>
    </div>
</form>