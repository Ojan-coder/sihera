<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Surat Masuk</title>
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
                <td>Laporan Data Surat Masuk</td>
            </tr>
        </table>
        <table class="head" style="margin-bottom: 20px; text-align: center;">
            <tr>
                <td width="130px">Tanggal Awal</td>
                <td><strong><?= $tglawal; ?></strong></td>
                <td width="130px">Tanggal Akhir</td>
                <td><strong><?= $tglakhir; ?></strong></td>
            </tr>
        </table>
        <table border="1" class="body" width="900">
            <thead>
                <tr style="height: 25px;">
                    <th>No</th>
                    <th>Tanggal Surat</th>
                    <th>Tanggal Masuk</th>
                    <th>Nomor Surat</th>
                    <th>Perihal</th>
                    <th>Lampiran</th>
                    <th>Pengirim</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0;
                foreach ($suratmasuk as $row) : $no++ ?>
                    <tr style="height: 20px; text-align: center;">
                        <td> <?= $row['id_surat']; ?></td>
                        <td> <?= $row['tgl_surat']; ?></td>
                        <td> <?= $row['no_surat']; ?></td>
                        <td> <?= $row['tgl_masuk']; ?></td>
                        <td> <?= $row['perihal']; ?></td>
                        <td> <?= $row['lampiran']; ?></td>
                        <td> <?= $row['pengirim']; ?></td>
                    </tr>
                <?php endforeach; ?>

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