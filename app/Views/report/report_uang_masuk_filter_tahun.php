<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Uang Masuk</title>
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
                <td>Laporan Data Uang Masuk</td>
            </tr>
        </table>
        <table style="margin-bottom: 20px; text-align: center;">
            <tr>
                <th width="50px">Tahun</th>
                <th><strong><?= $tglawal; ?></strong></th>
            </tr>
        </table>
        <table border="1" class="body" width="900">
            <thead>
                <tr style="height: 25px;">
                    <th>No</th>
                    <th>Bulan</th>
                    <th>Piatu</th>
                    <th>Yatim</th>
                    <th>Panti</th>
                    <th>Dhuafa</th>
                </tr>
            </thead>
            <tbody>
                <tr style="height: 20px; text-align: center;">
                    <td>1</td>
                    <td>Januari</td>
                    <td><?= number_format($piatu1['totalmasuk']) ?></td>
                    <td><?= number_format($yatim1['totalmasuk'])?></td>
                    <td><?= number_format($panti1['totalmasuk'])?></td>
                    <td><?= number_format($dhuafa1['totalmasuk'])?></td>
                </tr>
                <tr style="height: 20px; text-align: center;">
                    <td>2</td>
                    <td>Februari</td>
                    <td><?= number_format($piatu2['totalmasuk']) ?></td>
                    <td><?= number_format($yatim2['totalmasuk'])?></td>
                    <td><?= number_format($panti2['totalmasuk'])?></td>
                    <td><?= number_format($dhuafa2['totalmasuk'])?></td>
                </tr>
                <tr style="height: 20px; text-align: center;">
                    <td>3</td>
                    <td>Maret</td>
                    <td><?= number_format($piatu3['totalmasuk']) ?></td>
                    <td><?= number_format($yatim3['totalmasuk'])?></td>
                    <td><?= number_format($panti3['totalmasuk'])?></td>
                    <td><?= number_format($dhuafa3['totalmasuk'])?></td>
                </tr>
                <tr style="height: 20px; text-align: center;">
                    <td>4</td>
                    <td>April</td>
                    <td><?= number_format($piatu4['totalmasuk']) ?></td>
                    <td><?= number_format($yatim4['totalmasuk'])?></td>
                    <td><?= number_format($panti4['totalmasuk'])?></td>
                    <td><?= number_format($dhuafa4['totalmasuk'])?></td>
                </tr>
                <tr style="height: 20px; text-align: center;">
                    <td>5</td>
                    <td>Mei</td>
                    <td><?= number_format($piatu5['totalmasuk']) ?></td>
                    <td><?= number_format($yatim5['totalmasuk'])?></td>
                    <td><?= number_format($panti5['totalmasuk'])?></td>
                    <td><?= number_format($dhuafa5['totalmasuk'])?></td>
                </tr>
                <tr style="height: 20px; text-align: center;">
                    <td>6</td>
                    <td>Juni</td>
                    <td><?= number_format($piatu6['totalmasuk']) ?></td>
                    <td><?= number_format($yatim6['totalmasuk'])?></td>
                    <td><?= number_format($panti6['totalmasuk'])?></td>
                    <td><?= number_format($dhuafa6['totalmasuk'])?></td>
                </tr>
                <tr style="height: 20px; text-align: center;">
                    <td>7</td>
                    <td>Juli</td>
                    <td><?= number_format($piatu7['totalmasuk']) ?></td>
                    <td><?= number_format($yatim7['totalmasuk'])?></td>
                    <td><?= number_format($panti7['totalmasuk'])?></td>
                    <td><?= number_format($dhuafa7['totalmasuk'])?></td>
                </tr>
                <tr style="height: 20px; text-align: center;">
                    <td>8</td>
                    <td>Agustus</td>
                    <td><?= number_format($piatu8['totalmasuk']) ?></td>
                    <td><?= number_format($yatim8['totalmasuk'])?></td>
                    <td><?= number_format($panti8['totalmasuk'])?></td>
                    <td><?= number_format($dhuafa8['totalmasuk'])?></td>
                </tr>
                <tr style="height: 20px; text-align: center;">
                    <td>9</td>
                    <td>September</td>
                    <td><?= number_format($piatu9['totalmasuk']) ?></td>
                    <td><?= number_format($yatim9['totalmasuk'])?></td>
                    <td><?= number_format($panti9['totalmasuk'])?></td>
                    <td><?= number_format($dhuafa9['totalmasuk'])?></td>
                </tr>
                <tr style="height: 20px; text-align: center;">
                    <td>10</td>
                    <td>Oktober</td>
                    <td><?= number_format($piatu10['totalmasuk']) ?></td>
                    <td><?= number_format($yatim10['totalmasuk'])?></td>
                    <td><?= number_format($panti10['totalmasuk'])?></td>
                    <td><?= number_format($dhuafa10['totalmasuk'])?></td>
                </tr>
                <tr style="height: 20px; text-align: center;">
                    <td>11</td>
                    <td>November</td>
                    <td><?= number_format($piatu11['totalmasuk']) ?></td>
                    <td><?= number_format($yatim11['totalmasuk'])?></td>
                    <td><?= number_format($panti11['totalmasuk'])?></td>
                    <td><?= number_format($dhuafa11['totalmasuk'])?></td>
                </tr>
                <tr style="height: 20px; text-align: center;">
                    <td>12</td>
                    <td>Desember</td>
                    <td><?= number_format($piatu12['totalmasuk']) ?></td>
                    <td><?= number_format($yatim12['totalmasuk'])?></td>
                    <td><?= number_format($panti12['totalmasuk'])?></td>
                    <td><?= number_format($dhuafa12['totalmasuk'])?></td>
                </tr>

                <tr style="height: 20px; text-align: center;">
                    <td colspan="2">Total Semua</td>
                    <td><?= number_format($totalpiatu['totalmasuk']) ?></td>
                    <td><?= number_format($totalyatim['totalmasuk'])?></td>
                    <td><?= number_format($totalpanti['totalmasuk'])?></td>
                    <td><?= number_format($totaldhuafa['totalmasuk'])?></td>
                </tr>

            </tbody>
        </table>
        <table width="900" style="margin-top: 30px;">
            <tr style="text-align: right !important;">
                <td>Padang, <?= date("d M Y"); ?></td>
            </tr>
            <tr style="text-align: right !important;">
                <td>Ketua Panti Asuhan Aisyiyah Padang</td>
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