<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Donatur</title>
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
            <tr>
                <td><img src="<?= base_url(); ?>/assets/images/auth/stmik.png" width="70" height="80"></td>
                <td>
                    <center>
                        <font size="4">STMIK - AMIK JAYANUSA</font><br>
                        <font size="5"><b>UKM FSI SHIDRATUL FIKRI</b></font><br>
                        <font size="2">Alamat : Jl. Olo Ladang No.1, Olo, Kec. Padang Barat, Kota Padang, Sumatera Barat</font><br>
                        <font size="2"><i>Email : fsishidratulfikrijayanusa@gmail.com Kode Pos : 25000 Telp./Fax (0823) 8688 6773</i></font>
                    </center>
                <td><img src="<?= base_url(); ?>/assets/images/auth/logopantiasuhanasyiyah.png" width="90" height="90"></td>
                <td></td>
                </td>

            </tr>
            </tr>

            </tr>
            <tr>
                <td colspan="3">
                    <hr>
                </td>
            </tr>
        </table>
        <table class="head" style="margin-bottom: 20px;">
            <tr>
                
            <h2 class="mb-4"><b>Laporan Donatur Status</b></h2>
                            
                            
            </tr>
        </table>

        <table width="900" style="margin-top: 30px;">
            <tr style="text-align: left !important;">
                <td>Tanggal Cetak: <?= date("d M Y"); ?></td>
            </tr>


            <table border="1" class="body" width="900">
                <thead>
                    <tr style="height: 25px;">
                        <th>No</th>
                        <th>Kode Anggota</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Jurusan</th>
                        <th>No Bp</th>
                        <th>No Hp</th>
                        <th>Status</th>

                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($anggota)) : ?>
                        <?php foreach ($anggota as $key => $a) : ?>
                            <tr style="height: 20px; text-align: center;">
                                <td><?= $key + 1; ?></td>
                                <td><?= esc($a['anggota_kode']); ?></td>
                                <td><?= esc($a['anggota_nama']); ?></td>
                                <td> <?= esc($a['anggota_tempat_lahir']); ?>, <?= esc($a['anggota_tgl_lahir']); ?></td>
                                <td> <?= esc($a['anggota_jenkel']); ?></td>
                                <td> <?= esc($a['anggota_alamat']); ?></td>
                                <td> <?= esc($a['anggota_jurusan']); ?></td>
                                <td> <?= esc($a['anggota_nobp']); ?></td>
                                <td> <?= esc($a['anggota_nohp']); ?></td>
                                <td><?= esc($a['anggota_status']); ?></td>

                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data</td>
                        </tr>
                    <?php endif; ?>
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