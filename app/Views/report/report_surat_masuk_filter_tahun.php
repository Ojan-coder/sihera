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
                        <font size="2">Alamat : Lubuk Begalung Nan XX, Lubuk Begalung, Padang City, West Sumatra</font><br>
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
                <td width="130px">Tahun</td>
                <td><strong><?= $tglawal; ?></strong></td>
            </tr>
        </table>
        <table border="1" class="body" width="900">
            <thead>
                <tr style="height: 25px;">
                    <th>No</th>
                    <th>Bulan</th>
                    <th>Panti</th>
                    <th>Yatim</th>
                    <th>Panti</th>
                    <th>Dhuafa</th>
                </tr>
            </thead>
            <tbody>
                <tr style="height: 20px; text-align: center;">
                    <td>1</td>
                    <td>Januari</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="height: 20px; text-align: center;">
                    <td>2</td>
                    <td>Februari</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="height: 20px; text-align: center;">
                    <td>3</td>
                    <td>Maret</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="height: 20px; text-align: center;">
                    <td>4</td>
                    <td>April</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="height: 20px; text-align: center;">
                    <td>5</td>
                    <td>Mei</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="height: 20px; text-align: center;">
                    <td>6</td>
                    <td>Juni</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="height: 20px; text-align: center;">
                    <td>7</td>
                    <td>Juli</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="height: 20px; text-align: center;">
                    <td>8</td>
                    <td>Agustus</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="height: 20px; text-align: center;">
                    <td>9</td>
                    <td>September</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="height: 20px; text-align: center;">
                    <td>10</td>
                    <td>Oktober</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="height: 20px; text-align: center;">
                    <td>11</td>
                    <td>November</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="height: 20px; text-align: center;">
                    <td>12</td>
                    <td>Desember</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

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