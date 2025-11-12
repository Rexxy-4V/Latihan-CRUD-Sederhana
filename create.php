<html>

<head>
    <title>Latihan CRUD Sederhana</title>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="asset/table.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#datepicker").datepicker({
                dateFormat: "yy-mm-dd"
            }).val();
        });
    </script>
</head>

<body>
    <h3>CRUD Sederhana</h3>

    <form method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" require></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" require></td>
            </tr>
            <tr>
                <td>Tempat</td>
                <td><input type="text" name="tempat" require></td>
            </tr>
            <tr>
                <td>Tnaggal Lahir</td>
                <td><input type="text" name="ttl" id="datepicker" require></td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>
                    <select name="agama" required>

                        <option>-- Pilih Agama --</option>
                        <option <?php if ($data['agama'] = 'ISLAM') ?> value="ISLAM">ISLAM</option>
                        <option <?php if ($data['agama'] = 'KRISTEN') ?> value="KRISTEN">KRISTEN</option>
                        <option <?php if ($data['agama'] = 'KATOLIK') ?> value="KATOLIK">KATOLIK</option>
                        <option <?php if ($data['agama'] = 'BUDDHA') ?> value="BUDDHA">BUDDHA</option>
                        <option <?php if ($data['agama'] = 'HINDU') ?> value="HINDU">HINDU</option>
                        <option <?php if ($data['agama'] = 'KHONGHUCHU') ?> value="KHONGHUCHU">KHONGHUCHU</option>

                    </select>
                </td>
            </tr>
            <tr>
                <td>No Hp</td>
                <td><input type="text" name="no_hp" require></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" require></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" require></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td><input type="file" name="foto" require></td>
            </tr>
            <tr>
                <td><input type="submit" value="Simpan" name="submit"></td>
                <td><input type="reset" value="Reset"></td>
            </tr>
        </table>
    </form>

    <?php
    include 'koneksi.php';

    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $tempat = $_POST['tempat'];
        $ttl = $_POST['ttl'];
        $agama = $_POST['agama'];
        $no_hp = $_POST['no_hp'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $foto = $_FILES['foto']['name'];

        $tmpFoto = $_FILES['foto']['tmp_name'];

        $namaFoto = $nama . '-' . $foto;

        $lokasiFoto = 'upload/';

        $prosesUpload = move_uploaded_file($tmpFoto, $lokasiFoto . $namaFoto);

        if ($prosesUpload) {
            $perintahSql = "INSERT INTO siswa (nama, alamat, tempat, ttl, agama, no_hp, email, password, foto) VALUES ('$nama', '$alamat', '$tempat', '$ttl', '$agama', '$no_hp', '$email', '$password', '$namaFoto')";

            $proses = mysqli_query($konek, $perintahSql);

            if ($proses) {
                header('location: index.php');
            } else {
                echo "<script>alret('Gagal Disimpan')</script>";
            }
        }
    }
    ?>
</body>

</html>