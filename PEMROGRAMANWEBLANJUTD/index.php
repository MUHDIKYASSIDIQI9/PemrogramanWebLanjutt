<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <title>CRUD Mahasiswa</title>

    <link rel="stylesheet" href="jquery.dataTables.min.css">
    <script src="jquery-3.7.0.min.js"></script>
    <script src="jquery.dataTables.min.js"></script>
</head>

<body>

    <h2 style="text-align:center;">Tambah Data Mahasiswa</h2>
    <?php
    $edit = false;
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $dataEdit = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id=$id");
        $rowEdit = mysqli_fetch_assoc($dataEdit);
        $edit = true;
    }
    ?>
    <center>
        <form method="POST" action="proses.php">
            <input type="hidden" name="id" value="<?= $edit ? $rowEdit['id'] : '' ?>">

            Nama : <input type="text" name="nama" value="<?= $edit ? $rowEdit['nama'] : '' ?>" required><br><br>
            NIM : <input type="text" name="nim" value="<?= $edit ? $rowEdit['nim'] : '' ?>" required><br><br>
            Kelas: <input type="text" name="kelas" value="<?= $edit ? $rowEdit['kelas'] : '' ?>" required><br><br>

            <?php if ($edit): ?>
                <button type="submit" name="update">Update</button>
            <?php else: ?>
                <button type="submit" name="simpan">Simpan</button>
            <?php endif; ?>
        </form>
    </center>
    <hr>

    <h2>Data Mahasiswa</h2>

    <table border="1" id="table1" cellpadding="10">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $no = 1;
            $data = mysqli_query($conn, "SELECT * FROM mahasiswa");
            while ($d = mysqli_fetch_assoc($data)) {
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['nama']; ?></td>
                    <td><?= $d['nim']; ?></td>
                    <td><?= $d['kelas']; ?></td>
                    <td>
                        <a href="?edit=<?= $d['id']; ?>">Edit</a> |
                        <a href="proses.php?hapus=<?= $d['id']; ?>" onclick="return confirm('Yakin?')">Delete</a>
                    </td>
                </tr>
            <?php } ?>

        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $('#table1').DataTable();
        });
    </script>

</body>

</html>