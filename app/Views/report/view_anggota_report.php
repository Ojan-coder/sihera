<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Anggota</title>
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/auth/logopantiasuhanasyiyah.png">
    <style type="text/css">
        .head {
            border-style: double;
            border-width: 3px;
            border-color: white;
        }

        .body {
            border-collapse: collapse;
            border: 1px;
            border-color: black;
        }

        table tr .text2 {
            text-align: right;
            font-size: 13px;
        }

        table tr .text {
            text-align: center;
            font-size: 13px;
        }

        table tr td {
            font-size: 13px;
        }
    </style>
</head>

<body>
    <center>
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
        <table class="head" style="margin-bottom: 20px;">
            <tr>
                <td>Laporan Anggota - Status: <?= ucfirst($status); ?> </td>
            </tr>
        </table>

        <table width="900" style="margin-top: 30px;">
            <tr style="text-align: left !important;">
                <td>Tanggal Cetak: <?= date("d M Y"); ?></td>
            </tr>


            <table border="1" class="body" width="900">
                <thead>
                    <tr style="height: 25px;">
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>TTL</th>
                        <th>Alamat</th>
                        <th>Jurusan</th>
                        <th>Nobp</th>
                        <th>No. Hp</th>
                        <th>Divisi</th>
                        <th>Status</th>

                    </tr>
                </thead>
                <tbody>
                <?php if(!empty($anggota)): ?>
                    <?php foreach ($anggota as $row): ?>
                        <tr style="height: 20px; text-align: center;">
                            <td> <?= $row['anggota_kode']; ?></td>
                            <td> <?= $row['anggota_nama']; ?></td>
                            <td> <?= $row['anggota_tempat_lahir']; ?>, <?= $row['anggota_tgl_lahir']; ?></td>
                            <td> <?= $row['anggota_alamat']; ?></td>
                            <td> <?= $row['anggota_jurusan']; ?></td>
                            <td> <?= $row['anggota_nobp']; ?></td>
                            <td> <?= $row['anggota_nohp']; ?></td>
                            <td> <?= $row['anggota_divisi']; ?></td>
                            <td> <?= $row['anggota_status']; ?></td>

                        </tr>
                        <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                    <td colspan="10">Tidak ada anggota dengan status <?= $status; ?></td>
                </tr>
                <?php endif; ?>
                </tbody>
            </table>
            <table width="900" style="margin-top: 30px;">
                <tr style="text-align: right !important;">
                    <td>Padang, <?= date("d M Y"); ?></td>
                </tr>
                <tr style="text-align: right !important;">
                    <td>Ketua FSI Shidratul Fikri</td>
                </tr>
                <tr style="text-align: right !important; height: 120px;">
                    <td>(...............................)</td>
                </tr>
            </table>
    </center>
</body>

<script>
    window.print();
</script>

</html>