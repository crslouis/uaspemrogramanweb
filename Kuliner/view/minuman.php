<h2>Data Minuman</h2>
<table width="600">
<tr>
<td colspan="4"><a href="?page=minumanAdd" style="text-decoration:
none;">[+] Tambah Data Baru</a></td>
</tr>
</table>
<table border="1" width="600">
<thead>
<tr>
<th>No</th>
<th>Nama Minuman</th>
<th>Daerah Minuman</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php
include "includes/config.php";
$query = "SELECT * FROM tbl_minuman ORDER BY id_minuman ASC";
$sql = mysqli_query($conn, $query);
$nomor = 1;
if (mysqli_num_rows($sql) == 0) { ?>
<tr>
<td colspan="4" style="text-align: center;"><i>No

data</i></td>
</tr>
<?php
} else {
while ($data = mysqli_fetch_array($sql)) {
?>
<tr>
<td style="text-align: center;"><?= $nomor++; ?></td>
<td><?= $data["nama_minuman"] ?></td>
<td><?= $data["daerah_minuman"] ?></td>
<td style="text-align: center;">
<a href="?page=minumanUpdate&id=<?=
$data['id_minuman']; ?>" style="text-decoration: none;"> Edit</a> |
<a href="?page=minumanDelete&id=<?=

$data['id_minuman']; ?>"

onclick="return confirm('Yakin ingin menghapus

data ini ?');" style="text-decoration: none;">

Hapus</a>
</td>
</tr>
<?php
}
}
?>
</tbody>
</table>
<table width="600">
<tr>
<td colspan="4"><p>Total: <?= mysqli_num_rows($sql) ?></p></td>
</tr>
</table>