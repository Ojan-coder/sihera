<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Uang Keluar</title>
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
                <td>Laporan Data Uang Keluar</td>
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
                    <td><?= number_format($piatu1['totalkeluar']) ?></td>
                    <td><?= number_format($yatim1['totalkeluar'])?></td>
                    <td><?= number_format($panti1['totalkeluar'])?></td>
                    <td><?= number_format($dhuafa1['totalkeluar'])?></td>
                </tr>
                <tr style="height: 20px; text-align: center;">
                    <td>2</td>
                    <td>Februari</td>
                    <td><?= number_format($piatu2['totalkeluar']) ?></td>
                    <td><?= number_format($yatim2['totalkeluar'])?></td>
                    <td><?= number_format($panti2['totalkeluar'])?></td>
                    <td><?= number_format($dhuafa2['totalkeluar'])?></td>
                </tr>
                <tr style="height: 20px; text-align: center;">
                    <td>3</td>
                    <td>Maret</td>
                    <td><?= number_format($piatu3['totalkeluar']) ?></td>
                    <td><?= number_format($yatim3['totalkeluar'])?></td>
                    <td><?= number_format($panti3['totalkeluar'])?></td>
                    <td><?= number_format($dhuafa3['totalkeluar'])?></td>
                </tr>
                <tr style="height: 20px; text-align: center;">
                    <td>4</td>
                    <td>April</td>
                    <td><?= number_format($piatu4['totalkeluar']) ?></td>
                    <td><?= number_format($yatim4['totalkeluar'])?></td>
                    <td><?= number_format($panti4['totalkeluar'])?></td>
                    <td><?= number_format($dhuafa4['totalkeluar'])?></td>
                </tr>
                <tr style="height: 20px; text-align: center;">
                    <td>5</td>
                    <td>Mei</td>
                    <td><?= number_format($piatu5['totalkeluar']) ?></td>
                    <td><?= number_format($yatim5['totalkeluar'])?></td>
                    <td><?= number_format($panti5['totalkeluar'])?></td>
                    <td><?= number_format($dhuafa5['totalkeluar'])?></td>
                </tr>
                <tr style="height: 20px; text-align: center;">
                    <td>6</td>
                    <td>Juni</td>
                    <td><?= number_format($piatu6['totalkeluar']) ?></td>
                    <td><?= number_format($yatim6['totalkeluar'])?></td>
                    <td><?= number_format($panti6['totalkeluar'])?></td>
                    <td><?= number_format($dhuafa6['totalkeluar'])?></td>
                </tr>
                <tr style="height: 20px; text-align: center;">
                    <td>7</td>
                    <td>Juli</td>
                    <td><?= number_format($piatu7['totalkeluar']) ?></td>
                    <td><?= number_format($yatim7['totalkeluar'])?></td>
                    <td><?= number_format($panti7['totalkeluar'])?></td>
                    <td><?= number_format($dhuafa7['totalkeluar'])?></td>
                </tr>
                <tr style="height: 20px; text-align: center;">
                    <td>8</td>
                    <td>Agustus</td>
                    <td><?= number_format($piatu8['totalkeluar']) ?></td>
                    <td><?= number_format($yatim8['totalkeluar'])?></td>
                    <td><?= number_format($panti8['totalkeluar'])?></td>
                    <td><?= number_format($dhuafa8['totalkeluar'])?></td>
                </tr>
                <tr style="height: 20px; text-align: center;">
                    <td>9</td>
                    <td>September</td>
                    <td><?= number_format($piatu9['totalkeluar']) ?></td>
                    <td><?= number_format($yatim9['totalkeluar'])?></td>
                    <td><?= number_format($panti9['totalkeluar'])?></td>
                    <td><?= number_format($dhuafa9['totalkeluar'])?></td>
                </tr>
                <tr style="height: 20px; text-align: center;">
                    <td>10</td>
                    <td>Oktober</td>
                    <td><?= number_format($piatu10['totalkeluar']) ?></td>
                    <td><?= number_format($yatim10['totalkeluar'])?></td>
                    <td><?= number_format($panti10['totalkeluar'])?></td>
                    <td><?= number_format($dhuafa10['totalkeluar'])?></td>
                </tr>
                <tr style="height: 20px; text-align: center;">
                    <td>11</td>
                    <td>November</td>
                    <td><?= number_format($piatu11['totalkeluar']) ?></td>
                    <td><?= number_format($yatim11['totalkeluar'])?></td>
                    <td><?= number_format($panti11['totalkeluar'])?></td>
                    <td><?= number_format($dhuafa11['totalkeluar'])?></td>
                </tr>
                <tr style="height: 20px; text-align: center;">
                    <td>12</td>
                    <td>Desember</td>
                    <td><?= number_format($piatu12['totalkeluar']) ?></td>
                    <td><?= number_format($yatim12['totalkeluar'])?></td>
                    <td><?= number_format($panti12['totalkeluar'])?></td>
                    <td><?= number_format($dhuafa12['totalkeluar'])?></td>
                </tr>

                <tr style="height: 20px; text-align: center;">
                    <td colspan="2">Total Semua</td>
                    <td><?= number_format($totalpiatu['totalkeluar']) ?></td>
                    <td><?= number_format($totalyatim['totalkeluar'])?></td>
                    <td><?= number_format($totalpanti['totalkeluar'])?></td>
                    <td><?= number_format($totaldhuafa['totalkeluar'])?></td>
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