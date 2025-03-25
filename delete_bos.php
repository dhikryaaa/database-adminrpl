<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id_bos = $_GET['id'];
    $conn->query("DELETE FROM bos WHERE id_bos = $id_bos");
    header('Location: index.php');
}
?>