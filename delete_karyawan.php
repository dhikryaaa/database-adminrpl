<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id_karyawan = $_GET['id'];
    $conn->query("DELETE FROM karyawan WHERE id_karyawan = $id_karyawan");
    header('Location: index.php');
}
?>