<?php
include "includes/config.php";

// Ambil id dari query string
$id = $_GET['id'];

// Buat query untuk menghapus data
$query = "DELETE FROM tbl_minuman WHERE id_minuman = $id";
$sql = mysqli_query($conn, $query);

// Apakah query hapus berhasil?
if ($sql) {
    echo "<script>
            alert('Data berhasil dihapus!');
            window.location = '?page=minuman';
          </script>";
} else {
    echo "<script>
            alert('Data gagal dihapus!');
            window.location = '?page=minuman';
          </script>";
}
?>