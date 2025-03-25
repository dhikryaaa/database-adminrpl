<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_bos = $_POST['nama_bos'];
    $sql = "INSERT INTO bos (nama_bos) VALUES ('$nama_bos')";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php?status=success&message=Bos berhasil ditambahkan');
    } else {
        echo "Gagal menambahkan bos: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Bos</title>
</head>
<body>
    <h2>Tambah Bos</h2>
    <form action="" method="POST">
        <label for="nama_bos">Nama Bos:</label>
        <input type="text" id="nama_bos" name="nama_bos" required>
        <button type="submit">Tambah Bos</button>
    </form>
</body>
</html>
