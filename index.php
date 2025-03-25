<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Bos dan Karyawan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            padding: 20px;
            background-color: #f4f4f4;
        }

        h2 {
            text-align: center;
            margin: 20px 0;
            color: #333;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .btn-add {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 15px;
            background-color: #007BFF;
            color: white;
            border-radius: 4px;
            text-decoration: none;
            font-size: 16px;
        }

        .btn-add:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <h2>Tabel Bos</h2>

    <a href="tambah_bos.php" class="btn-add">Tambah Bos</a>

    <table>
        <tr><th>Nama Bos</th><th>Aksi</th></tr>
        <?php
        $result = $conn->query("SELECT * FROM bos");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['nama_bos']}</td>
                    <td>
                        <a href='edit_bos.php?id={$row['id_bos']}'>Edit</a> | 
                        <a href='delete_bos.php?id={$row['id_bos']}'>Delete</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>

    <h2>Tabel Karyawan</h2>

    <a href="tambah_karyawan.php" class="btn-add">Tambah Karyawan</a>

    <table>
        <tr><th>Nama Karyawan</th><th>Nama Bos</th><th>Aksi</th></tr>
        <?php
        $result = $conn->query("SELECT karyawan.nama_karyawan, bos.nama_bos, karyawan.id_karyawan 
                                FROM karyawan 
                                LEFT JOIN bos ON karyawan.id_bos = bos.id_bos");
        while ($row = $result->fetch_assoc()) {
            $nama_bos = $row['nama_bos'] ? $row['nama_bos'] : '-';
            echo "<tr>
                    <td>{$row['nama_karyawan']}</td>
                    <td>{$nama_bos}</td>
                    <td>
                        <a href='edit_karyawan.php?id={$row['id_karyawan']}'>Edit</a> | 
                        <a href='delete_karyawan.php?id={$row['id_karyawan']}'>Delete</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>
