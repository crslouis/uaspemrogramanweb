<?php
// Cek apakah tombol simpan sudah diklik
if (isset($_POST['submit'])) {
    // Ambil data dari formulir
    $nama_minuman = $_POST['nama_minuman'];
    $daerah_minuman = $_POST['daerah_minuman'];

    // Buat query untuk menyimpan data
    $query = "INSERT INTO tbl_minuman (nama_minuman, daerah_minuman) VALUES ('$nama_minuman', '$daerah_minuman')";
    $sql = mysqli_query($conn, $query);

    // Apakah proses simpan berhasil?
    if ($sql) {
        echo "<script>
                window.alert('Data berhasil ditambah!');
                window.location='?page=minuman';
              </script>";
    } else {
        echo "<script>
                window.alert('Gagal menambah data!');
                window.location='?page=minuman';
              </script>";
    }
}
?>
<div class="p-4">
    <div class="d-flex justify-content-center">
        <div class="row-12 w-75">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="m-0">Tambah Data Daftar Minuman</h5>
                </div>
                <div class="card-body">
                    <form method="post" action="">
                        <div class="row">
                            <div class="mb-3">
                                <label for="nama_minuman" class="form-label">Nama Minuman</label>
                                <input type="text" class="form-control" name="nama_minuman" required>
                            </div>
                            <div class="mb-3">
                                <label for="daerah_minuman" class="form-label">Daerah Minuman</label>
                                <input type="text" class="form-control" name="daerah_minuman" required>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" name="submit" class="btn btn-success waves-effect waves-light mx-0" style="width: 6em; height: 2.4em;">Submit</button>
                            <input class="btn btn-warning mx-2" type="reset" value="Reset" style="width: 6em; height: 2.4em;">
                            <a class="btn btn-primary" href="?page=minuman" role="button" style="width: 6em; height: 2.4em;">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>