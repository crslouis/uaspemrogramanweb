<?php
// Skrip Proses Update

// Cek apakah tombol update sudah diklik
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $input_nama_makanan = inputData($_POST['nama_makanan']);
    $input_daerah_makanan = inputData($_POST['daerah_makanan']);

    $nama_makanan = mysqli_real_escape_string($conn, $input_nama_makanan);
    $daerah_makanan = mysqli_real_escape_string($conn, $input_daerah_makanan);

    // Validasi field nama makanan
    if (empty($nama_makanan) || strlen($nama_makanan) == 0) {
        echo "<script>alert('Field is required');window.location='?page=makanan';</script>";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $nama_makanan)) {
        echo "<script>alert('Only letters and white space allowed');window.location='?page=makanan';</script>";
    } elseif (empty($daerah_makanan) || strlen($daerah_makanan) == 0) {
        echo "<script>alert('Field is required');window.location='?page=makanan';</script>";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $daerah_makanan)) {
        echo "<script>alert('Only letters and white space allowed');window.location='?page=makanan';</script>";
    } else {
        // Update data
        $query = "UPDATE tbl_makanan SET nama_makanan='$nama_makanan', daerah_makanan='$daerah_makanan' WHERE id_makanan='$id'";
        $sql = mysqli_query($conn, $query);

        // Apakah proses update berhasil?
        if ($sql) {
            echo "<script>alert('Data berhasil diupdate!');window.location='?page=makanan';</script>";
        } else {
            echo "<script>alert('Gagal update data!');window.location='?page=makanan';</script>";
        }
    }
}
