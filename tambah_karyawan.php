<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_karyawan = $_POST['nama_karyawan'];
    $id_bos = $_POST['id_bos'] ? $_POST['id_bos'] : "NULL";
    $sql = "INSERT INTO karyawan (nama_karyawan, id_bos) VALUES ('$nama_karyawan', $id_bos)";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php?status=success&message=Karyawan berhasil ditambahkan');
    } else {
        echo "Gagal menambahkan karyawan: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Karyawan</title>
</head>
<body>
    <h2>Tambah Karyawan</h2>
    <form action="" method="POST">
        <label for="nama_karyawan">Nama Karyawan:</label>
        <input type="text" id="nama_karyawan" name="nama_karyawan" required>

        <label for="id_bos">Pilih Bos:</label>
        <select id="id_bos" name="id_bos">
            <option value="">Tanpa Bos</option>
            <?php
            $result = $conn->query("SELECT * FROM bos");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['id_bos']}'>{$row['nama_bos']}</option>";
            }
            ?>
        </select>

        <button type="submit">Tambah Karyawan</button>
    </form>
</body>
</html>
