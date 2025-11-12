<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $ambilFoto = mysqli_query($konek, "SELECT foto FROM siswa WHERE id = $id");

    $datafoto = mysqli_fetch_array($ambilFoto);

    unlink('upload/' . $datafoto['foto']);

    $perintahSql = "DELETE FROM siswa WHERE id = $id";

    $proses = mysqli_query($konek, $perintahSql);

    if ($proses) {
        header("location:index.php");
    } else {
        echo "Data Gagal Dihapus";
    }
}
?>