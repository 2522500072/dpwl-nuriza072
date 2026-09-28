<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>
    <style>
        body {
            margin: 10px;
            font-family: "Times New Roman", Times, serif;
        }
    h2 {
        margin: 0 0 10px 0;
        font-size: 18px;
    }

    table {
        border-collapse: collapse;
        font-size: 14px;
    }

    th, td {
        border: 1px solid #999;
        padding: 3px 6px;
    }

    th {
        font-weight: bold;
        text-align: left;
    }
</style>
<body>
    <h2>Daftar Mahasiswa</h2>
<table>
    <tr>
        <th>NO.</th>
        <th>NIM</th>
        <th>NAMA MAHASISWA</th>
        <th>ALAMAT</th>
        <th>NO.TELP</th>
    </tr>

    <?php
    $i = 1;

    foreach ($datamhs as $mhs) {
    ?>
        <tr>
            <td><?= $i++; ?>.</td>
            <td><?= $mhs['nim']; ?></td>
            <td><?= $mhs['nama']; ?></td>
            <td><?= $mhs['alamat']; ?></td>
            <td><?= $mhs['no_hp']; ?></td>
        </tr>
    <?php
    }
    ?>
</table>

</body>
</html>
