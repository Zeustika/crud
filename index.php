<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Kerud</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Tambah Mahasiswa</h2>
        <div class="form-section">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" id="nama" name="nama" required>
                </div>
                <div class="form-group">
                    <label for="nim">NIM:</label>
                    <input type="text" id="nim" name="nim" required>
                </div>
                <div class="form-group">
                    <label for="jurusan">Jurusan:</label>
                    <input type="text" id="jurusan" name="jurusan" required>
                </div>
                <button type="submit" name="tambah" class="btn">Tambah Mahasiswa</button>
            </form>
        </div>

        <?php
        if (isset($_POST['tambah'])) {
            $nama = $_POST['nama'];
            $nim = $_POST['nim'];
            $jurusan = $_POST['jurusan'];
            $conn->query("INSERT INTO mahasiswa (nama, nim, jurusan) VALUES ('$nama','$nim','$jurusan')");
            header("Location: index.php");
        }
        ?>

        <div class="table-section">
            <h2>Daftar Mahasiswa</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Jurusan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = $conn->query("SELECT * FROM mahasiswa");
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['nama']}</td>
                                <td>{$row['nim']}</td>
                                <td>{$row['jurusan']}</td>
                                <td class='action-links'>
                                    <a href='edit.php?id={$row['id']}' class='edit-link'>Edit</a>
                                    <a href='delete.php?id={$row['id']}' class='delete-link' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Delete</a>
                                </td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='no-data'>Belum ada data mahasiswa</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

