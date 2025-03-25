<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id_bos = $_GET['id'];
    $result = $conn->query("SELECT * FROM bos WHERE id_bos = $id_bos");
    $bos = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nama_bos'])) {
    $id_bos = $_POST['id_bos'];
    $nama_bos = $_POST['nama_bos'];
    $conn->query("UPDATE bos SET nama_bos = '$nama_bos' WHERE id_bos = $id_bos");
    header('Location: index.php');
}

?>
<form method="POST" action="edit_bos.php">
    <input type="hidden" name="id_bos" value="<?php echo $bos['id_bos']; ?>">
    <input type="text" name="nama_bos" value="<?php echo $bos['nama_bos']; ?>" required>
    <button type="submit">Update Bos</button>
</form>
