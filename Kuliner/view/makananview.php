<h2>Data Makanan</h2>
<table width="600">
    <tr>
        <td colspan="4">
            <a href="?page=makananAdd" style="text-decoration: none;">[+] Tambah Data Baru</a>
        </td>
    </tr>
</table>

<table border="1" width="600">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Makanan</th>
            <th>Daerah Makanan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "includes/config.php";
        $query = "SELECT * FROM tbl_makanan ORDER BY id_makanan ASC";
        $sql = mysqli_query($conn, $query);
        $nomor = 1;
        while ($data = mysqli_fetch_array($sql)) { ?>
            <tr>
                <td style="text-align: center;"><?= $nomor++; ?></td>
                <td><?= $data["nama_makanan"] ?></td>
                <td><?= $data["daerah_makanan"] ?></td>
                <td style="text-align: center;">
                    <a href="?page=makananUpdate&id=<?= $data['id_makanan']; ?>" style="text-decoration: none;">Edit</a> |
                    <a href="?page=makananDelete&id=<?= $data['id_makanan']; ?>"
                       onclick="return confirm('Yakin ingin menghapus data ini?');"
                       style="text-decoration: none;">
                        Hapus
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<table width="600">
    <tr>
        <td colspan="4">
            <p>Total: <?= mysqli_num_rows($sql) ?></p>
        </td>
    </tr>
</table>
