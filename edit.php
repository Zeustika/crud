<?php
include 'config.php';

// Validasi ID
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM mahasiswa WHERE id=$id");

// Cek apakah data ditemukan
if ($result->num_rows == 0) {
    header("Location: index.php");
    exit();
}

$row = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];
    $conn->query("UPDATE mahasiswa SET nama='$nama', nim='$nim', jurusan='$jurusan' WHERE id=$id");
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Data Mahasiswa</h2>
        <div class="form-section">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($row['nama']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="nim">NIM:</label>
                    <input type="text" id="nim" name="nim" value="<?= htmlspecialchars($row['nim']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="jurusan">Jurusan:</label>
                    <input type="text" id="jurusan" name="jurusan" value="<?= htmlspecialchars($row['jurusan']); ?>" required>
                </div>
                <button type="submit" name="update" class="btn">Update Data</button>
                <a href="index.php" class="btn btn-secondary" style="text-decoration: none; display: inline-block; margin-left: 10px;">Batal</a>
            </form>
        </div>
    </div>
</body>
</html>
