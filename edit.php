<?php
include 'config.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM mahasiswa WHERE id=$id");
$row = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];
    $conn->query("UPDATE mahasiswa SET nama='$nama', nim='$nim', jurusan='$jurusan' WHERE id=$id");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
</head>
<body>
    <h2>Edit Data Mahasiswa</h2>
    <form method="POST">
        Nama: <input type="text" name="nama" value="<?= $row['nama']; ?>"><br>
        NIM: <input type="text" name="nim" value="<?= $row['nim']; ?>"><br>
        Jurusan: <input type="text" name="jurusan" value="<?= $row['jurusan']; ?>"><br>
        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>
