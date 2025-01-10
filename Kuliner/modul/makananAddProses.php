<?php
// Cek apakah tombol simpan sudah diklik
if (isset($_POST['submit'])) {
    $input_nama_makanan = inputData($_POST['nama_makanan']);
    $input_daerah_makanan = inputData($_POST['daerah_makanan']);

    $nama_makanan = mysqli_real_escape_string($conn, $input_nama_makanan);
    $daerah_makanan = mysqli_real_escape_string($conn, $input_daerah_makanan);

    // Validasi field nama makanan
    if (empty($nama_makanan) || strlen($nama_makanan) == 0) {
        echo "<script>alert('Field is required');window.location='?page=makananAdd';</script>";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $nama_makanan)) {
        echo "<script>alert('Only letters and white space allowed');window.location='?page=makananAdd';</script>";
    } elseif (empty($daerah_makanan) || strlen($daerah_makanan) == 0) {
        echo "<script>alert('Field is required');window.location='?page=makananAdd';</script>";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $daerah_makanan)) {
        echo "<script>alert('Only letters and white space allowed');window.location='?page=makananAdd';</script>";
    } else {
        // Validasi duplikasi data
        $cek = mysqli_num_rows(mysqli_query($conn, "SELECT nama_makanan FROM tbl_makanan WHERE nama_makanan='$nama_makanan'"));
        if ($cek > 0) {
            echo "<script>alert('Data sudah tersedia');window.location='?page=makananAdd';</script>";
        } else {
            // Buat query
            $query = "INSERT INTO tbl_makanan (nama_makanan, daerah_makanan) VALUES ('$nama_makanan', '$daerah_makanan')";
            $sql = mysqli_query($conn, $query);

            // Apakah proses simpan berhasil?
            if ($sql) {
                echo "<script>alert('Data berhasil ditambah!');window.location='?page=makanan';</script>";
            } else {
                echo "<script>alert('Gagal menambah data!');window.location='?page=makanan';</script>";
            }
        }
    }
}
