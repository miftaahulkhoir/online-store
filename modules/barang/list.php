<div id="frame-tambah">
    <a href="<?php echo BASE_URL."index.php?page=my_profile&module=barang&action=form";?>" class="tombol-action">+ Tambah Kategori</a>
</div>
<?php
    $query_barang = mysqli_query($koneksi,"SELECT barang.*, kategori.kategori FROM barang INNER JOIN kategori on barang.kategori_id = kategori.kategori_id");

    if (mysqli_num_rows($query_barang) == 0) {
        echo "<h3>Saat ini belum ada nama kategori di dalam table kategori</h3>";
    }
    else {
        echo "<table class='table-list'>
            <tr class='baris-title'>
                <th class='kolom-nomor'>No</th>
                <th class='kiri'>Barang</th>
                <th class='kiri'>Kategori</th>
                <th class='kiri'>Harga</th>
                <th class='tengah'>Status</th>
                <th class='tengah'>Action</th>
            </tr>";

        $no = 1;
        while ($row = mysqli_fetch_assoc($query_barang)) {
            echo "<tr class='baris-isi'>
                    <td class='kolom-nomor'>$no</td>
                    <td class='kiri'>$row[nama_barang]</td>
                    <td class='kiri'>$row[kategori]</td>
                    <td class='kiri'>".rupiah($row['harga'])."</td>
                    <td class='status'>$row[status]
                    <td class='tengah'><a class='tombol-action' href='".BASE_URL."index.php?page=my_profile&module=barang&action=form&barang_id=$row[barang_id]'>Edit</a> </td>
</tr>";
        $no++;
        }

echo "</table>";

    }
?>
