<!DOCTYPE html>
<html>

<head>
    <title>Laporan Uang Kas</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>

<body>
    <table class="head" width="700">
        <tr>
            <td><img src="<?= base_url(); ?>/assets/images/auth/logopantiasuhanasyiyah.png" width="70" height="80"></td>
            <td>
                <center>
                    <font size="4">PANTI ASUHAN AISYIYAH PADANG</font><br>
                    <font size="2">Alamat :  Lubuk Begalung Nan XX, Lubuk Begalung, Padang City, West Sumatra</font><br>
                </center>
            <td><img src="<?= base_url(); ?>/assets/images/auth/logopantiasuhanasyiyah.png" width="90" height="90"></td>
            <td></td>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <hr>
            </td>
        </tr>
    </table>
    <h1>Laporan Uang Kas</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Saldo</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kas as $row) : ?>
                <tr>
                    <td><?= $row['id']; ?></td> <!-- Pastikan kunci 'id' tersedia dalam data kas -->
                    <td><?= $row['saldo']; ?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td><strong>Total:</strong></td>
                <td><strong><?= $total['saldo']; ?></strong></td>
            </tr>
        </tbody>
    </table>
</body>

</html>