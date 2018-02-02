<?php
    $kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;
    $nama_kategori = "";
    $status_kategori = "";
    $button = "Add";
    if ($kategori_id) {
        $query = mysqli_query($koneksi, "SELECT * FROM kategori where kategori_id = '$kategori_id'");
        $row = mysqli_fetch_assoc($query);
        $nama_kategori = $row['kategori'];
        $status_kategori = $row['status'];
        $button = "Update";

    }
?>

<form action="<?php echo BASE_URL."modules/kategori/action.php?kategori_id=$kategori_id"?>" method="POST">
    <div class="element-form">
        <label>Kategori</label>
        <span><input type="text" name="kategori" value="<?php echo $nama_kategori;?>"></span>
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