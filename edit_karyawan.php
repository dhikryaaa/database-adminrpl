<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id_karyawan = $_GET['id'];
    $result = $conn->query("SELECT * FROM karyawan WHERE id_karyawan = $id_karyawan");
    $karyawan = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nama_karyawan'])) {
    $id_karyawan = $_POST['id_karyawan'];
    $nama_karyawan = $_POST['nama_karyawan'];
    $id_bos = !empty($_POST['id_bos']) ? $_POST['id_bos'] : 'NULL';

    $conn->query("UPDATE karyawan SET nama_karyawan = '$nama_karyawan', id_bos = $id_bos WHERE id_karyawan = $id_karyawan");
    header('Location: index.php');
}
?>

<form method="POST" action="edit_karyawan.php">
    <input type="hidden" name="id_karyawan" value="<?php echo $karyawan['id_karyawan']; ?>">
    <input type="text" name="nama_karyawan" value="<?php echo $karyawan['nama_karyawan']; ?>" required>
    
    <select name="id_bos">
        <option value="">Tanpa Bos</option>
        <?php
        $bos_result = $conn->query("SELECT * FROM bos");
        while ($bos = $bos_result->fetch_assoc()) {
            $selected = $karyawan['id_bos'] == $bos['id_bos'] ? 'selected' : '';
            echo "<option value='{$bos['id_bos']}' $selected>{$bos['nama_bos']}</option>";
        }
        ?>
    </select>

    <button type="submit">Update Karyawan</button>
</form>
