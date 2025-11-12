<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/index.css">
</head>

<body>

    <div class="table-container">

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Tempat</th>
                    <th>Tanggal Lahir</th>
                    <th>Agama</th>
                    <th>No HP</th>
                    <th>Email</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php
            include 'koneksi.php';

            $perintahSql = "SELECT * FROM siswa";

            $hasil = mysqli_query($konek, $perintahSql);

            $no = 0;

            while ($data = mysqli_fetch_array($hasil)) {
                $no++;
            ?>

                <body>
                    <tr>
                        <td>
                            <?php echo $no; ?>
                        </td>
                        <td><?php echo $data['nama'] ?></td>
                        <td><?php echo $data['alamat'] ?></td>
                        <td><?php echo $data['tempat'] ?></td>
                        <td><?php echo $data['ttl'] ?></td>
                        <td><?php echo $data['agama'] ?></td>
                        <td><?php echo $data['no_hp'] ?></td>
                        <td><?php echo $data['email'] ?></td>
                        <td><img height="50px" src="<?php echo 'upload/' . $data['foto']; ?>"> </td>
                        <td>
                            <a href="update.php?id=<?php echo $data['id']; ?>"> Update </a>
                            <a href="delete.php?id=<?php echo $data['id']; ?>"> Delete </a>

                        </td>
                    </tr>
                </body>
            <?php
            }
            ?>
        </table>
        <div class="btn">
            <h4><a href="create.php">Tambah Data</h4>
        </div>
        <div class="btn2">
            <a href="login.php">Logout</a>
        </div>
    </div>

</body>

</html>