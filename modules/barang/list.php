<div id="frame-tambah">
    <a href="<?php echo BASE_URL."index.php?page=my_profile&module=barang&action=form";?>" class="tombol-action">+ Tambah Kategori</a>
</div>
<?php
    $query_barang = mysqli_query($koneksi,"SELECT * FROM barang");

    if (mysqli_num_rows($query_barang) == 0) {
        echo "<h3>Saat ini belum ada nama kategori di dalam table kategori</h3>";
    }
    else {
        echo "<table class='table-list'>
            <tr class='baris-title'>
                <th class='kolom-nomor'>No</th>
                <th class='kiri'>Kategori</th>
                <th class='tengah'>Status</th>
                <th class='tengah'>Action</th>
            </tr>";

        $no = 1;
        while ($row = mysqli_fetch_assoc($query_barang)) {
            echo "<tr>
                    <td class='kolom-nomor'>$no</td>
                    <td class='kiri'>$row[nama_barang]</td>
                    <td class='tengah'>$row[harga]</td>
                    <td class='tengah'><a href='".BASE_URL."index.php?page=my_profile&module=barang&action=form&kategori_id=$row[barang_id]'>Edit</a> </td>
</tr>";
        $no++;
        }

echo "</table>";

    }
?>
