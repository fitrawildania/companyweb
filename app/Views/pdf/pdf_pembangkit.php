<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Laporan Monitoring Pembangkit</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        /* A4 page size dimensions */
        @page {
            size: A4;
            margin: 10mm 10mm 10mm 10mm;
        }

        body {
            font-family: 'Poppins';
            font-size: 12px;
            line-height: 1.6;
        }

        h1 {
            font-size: 20px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .text-primary {
            color: #4e73df !important;
        }

        .font-weight-bold {
            font-weight: 700 !important;
        }

        .text-uppercase {
            text-transform: uppercase;
        }

        .text-right {
            text-align: right;
        }

        @media print {
            .text-primary {
                color: black !important;
            }
        }
    </style>
</head>
<body>
    <h1>Laporan Monitoring Pembangkit</h1>

    <!-- Tabel Data EAM Aset Properti -->
    <table>
        <tr>
            <th colspan="3" class="text-primary text-uppercase">EAM Aset Properti</th>
        </tr>
        <tr>
            <th>Parameter</th>
            <th>Detail</th>
            <th>Nilai</th>
        </tr>
        <tr>
            <td>LPP</td>
            <td colspan="2" class="text-right"><?= $asetData ?> Laporan</td>
        </tr>
        <tr>
            <td rowspan="3">Storage Average</td>
            <td>CPU</td>
            <td class="text-right"><?= $asetAvgUsage->avg_cpu ?> %</td>
        </tr>
        <tr>
            <td>RAM</td>
            <td class="text-right"><?= $asetAvgUsage->avg_ram ?> %</td>
        </tr>
        <tr>
            <td>HDD</td>
            <td class="text-right"><?= $asetAvgUsage->avg_hdd ?> %</td>
        </tr>
        <tr>
            <td rowspan="2">Tagihan</td>
            <td>Tagihan Sistem</td>
            <td class="text-right">Rp. <?= number_format($asetAvgUsage->avg_sistem, 0, ',', '.') ?></td>
        </tr>
        <tr>
            <td>Tagihan User</td>
            <td class="text-right">Rp. <?= number_format($asetAvgUsage->avg_user, 0, ',','.') ?></td>
        </tr>
        <tr>
            <td colspan="2" class="font-weight-bold">Total</td>
            <td class="text-right text-primary font-weight-bold">Rp. <?= number_format($asetTotal->total ?? 0, 0, ',', '.') ?></td>
        </tr>
    </table>

    <!-- Tabel Data SIIPP -->
    <table>
        <tr>
            <th colspan="3" class="text-primary text-uppercase">SIIPP</th>
        </tr>
        <tr>
            <th>Parameter</th>
            <th>Detail</th>
            <th>Nilai</th>
        </tr>
        <tr>
            <td>LPP</td>
            <td colspan="2" class="text-right font-weight-bold"><?= $siippData ?> Laporan</td>
        </tr>
        <tr>
            <td rowspan="3">Storage Average</td>
            <td>CPU</td>
            <td class="text-right"><?= $siippAvgUsage->avg_cpu ?> %</td>
        </tr>
        <tr>
            <td>RAM</td>
            <td class="text-right"><?= $siippAvgUsage->avg_ram ?> %</td>
        </tr>
        <tr>
            <td>HDD</td>
            <td class="text-right"><?= $siippAvgUsage->avg_hdd ?> %</td>
        </tr>
        <tr>
            <td rowspan="2">Tagihan</td>
            <td>Tagihan Sistem</td>
            <td class="text-right">Rp. <?= number_format($siippAvgUsage->avg_sistem, 0, ',', '.') ?></td>
        </tr>
        <tr>
            <td>Tagihan User</td>
            <td class="text-right">Rp. <?= number_format($siippAvgUsage->avg_user, 0, ',','.') ?></td>
        </tr>
        <tr>
            <td colspan="2" class="font-weight-bold">Total</td>
            <td class="text-right text-primary font-weight-bold">Rp. <?= number_format($siippTotal->total ?? 0, 0, ',', '.') ?></td>
        </tr>
    </table>

    <!-- Tabel Data GBMO GAS -->
    <h1></h1>
    <table>
        <tr>
            <th colspan="3" class="text-primary text-uppercase">GBMO GAS</th>
        </tr>
        <tr>
            <th>Parameter</th>
            <th>Detail</th>
            <th>Nilai</th>
        </tr>
        <tr>
            <td>LPP</td>
            <td colspan="2" class="text-right font-weight-bold"><?= $gasData ?> Laporan</td>
        </tr>
        <tr>
            <td rowspan="3">Storage Average</td>
            <td>CPU</td>
            <td class="text-right"><?= $gasAvgUsage->avg_cpu ?> %</td>
        </tr>
        <tr>
            <td>RAM</td>
            <td class="text-right"><?= $gasAvgUsage->avg_ram ?> %</td>
        </tr>
        <tr>
            <td>HDD</td>
            <td class="text-right"><?= $gasAvgUsage->avg_hdd ?> %</td>
        </tr>
        <tr>
            <td rowspan="2">Tagihan</td>
            <td>Tagihan Sistem</td>
            <td class="text-right">Rp. <?= number_format($gasAvgUsage->avg_sistem, 0, ',', '.') ?></td>
        </tr>
        <tr>
            <td>Tagihan User</td>
            <td class="text-right">Rp. <?= number_format($gasAvgUsage->avg_user, 0, ',','.') ?></td>
        </tr>
        <tr>
            <td colspan="2" class="font-weight-bold">Total</td>
            <td class="text-right text-primary font-weight-bold">Rp. <?= number_format($gasTotal->total?? 0, 0, ',', '.') ?></td>
        </tr>
    </table>

    <!-- Tabel Data GBMO BBM -->
    <table>
        <tr>
            <th colspan="3" class="text-primary text-uppercase">GBMO BBM</th>
        </tr>
        <tr>
            <th>Parameter</th>
            <th>Detail</th>
            <th>Nilai</th>
        </tr>
        <tr>
            <td>LPP</td>
            <td colspan="2" class="text-right font-weight-bold"><?= $bbmData ?> Laporan</td>
        </tr>
        <tr>
            <td rowspan="3">Storage Average</td>
            <td>CPU</td>
            <td class="text-right"><?= $bbmAvgUsage->avg_cpu ?> %</td>
        </tr>
        <tr>
            <td>RAM</td>
            <td class="text-right"><?= $bbmAvgUsage->avg_ram ?> %</td>
        </tr>
        <tr>
            <td>HDD</td>
            <td class="text-right"><?= $bbmAvgUsage->avg_hdd ?> %</td>
        </tr>
        <tr>
            <td rowspan="2">Tagihan</td>
            <td>Tagihan Sistem</td>
            <td class="text-right">Rp. <?= number_format($bbmAvgUsage->avg_sistem, 0, ',', '.') ?></td>
        </tr>
        <tr>
            <td>Tagihan User</td>
            <td class="text-right">Rp. <?= number_format($bbmAvgUsage->avg_user, 0, ',','.') ?></td>
        </tr>
        <tr>
            <td colspan="2" class="font-weight-bold">Total</td>
            <td class="text-right text-primary font-weight-bold">Rp. <?= number_format($bbmTotal->total?? 0, 0, ',', '.') ?></td>
        </tr>
    </table>

    <!-- Tabel Data BBO -->
    <table>
        <tr>
            <th colspan="3" class="text-primary text-uppercase">BBO</th>
        </tr>
        <tr>
            <th>Parameter</th>
            <th>Detail</th>
            <th>Nilai</th>
        </tr>
        <tr>
            <td>LPP</td>
            <td colspan="2" class="text-right font-weight-bold"><?= $bboData ?> Laporan</td>
        </tr>
        <tr>
            <td rowspan="3">Storage Average</td>
            <td>CPU</td>
            <td class="text-right"><?= $bboAvgUsage->avg_cpu ?> %</td>
        </tr>
        <tr>
            <td>RAM</td>
            <td class="text-right"><?= $bboAvgUsage->avg_ram ?> %</td>
        </tr>
        <tr>
            <td>HDD</td>
            <td class="text-right"><?= $bboAvgUsage->avg_hdd ?> %</td>
        </tr>
        <tr>
            <td rowspan="2">Tagihan</td>
            <td>Tagihan Sistem</td>
            <td class="text-right">Rp. <?= number_format($bboAvgUsage->avg_sistem, 0, ',', '.') ?></td>
        </tr>
        <tr>
            <td>Tagihan User</td>
            <td class="text-right">Rp. <?= number_format($bboAvgUsage->avg_user, 0, ',','.') ?></td>
        </tr>
        <tr>
            <td colspan="2" class="font-weight-bold">Total</td>
            <td class="text-right text-primary font-weight-bold">Rp. <?= number_format($bboTotal->total?? 0, 0, ',', '.') ?></td>
        </tr>
    </table>

    <!-- Tabel Data EAM-KIT -->
    <table>
        <tr>
            <th colspan="3" class="text-primary text-uppercase">EAM-KIT</th>
        </tr>
        <tr>
            <th>Parameter</th>
            <th>Detail</th>
            <th>Nilai</th>
        </tr>
        <tr>
            <td>LPP</td>
            <td colspan="2" class="text-right font-weight-bold"><?= $maximoData ?> Laporan</td>
        </tr>
        <tr>
            <td rowspan="3">Storage Average</td>
            <td>CPU</td>
            <td class="text-right"><?= $maximoAvgUsage->avg_cpu ?> %</td>
        </tr>
        <tr>
            <td>RAM</td>
            <td class="text-right"><?= $maximoAvgUsage->avg_ram ?> %</td>
        </tr>
        <tr>
            <td>HDD</td>
            <td class="text-right"><?= $maximoAvgUsage->avg_hdd ?> %</td>
        </tr>
        <tr>
            <td rowspan="2">Tagihan</td>
            <td>Tagihan Sistem</td>
            <td class="text-right">Rp. <?= number_format($maximoAvgUsage->avg_sistem, 0, ',', '.') ?></td>
        </tr>
        <tr>
            <td>Tagihan User</td>
            <td class="text-right">Rp. <?= number_format($maximoAvgUsage->avg_user, 0, ',','.') ?></td>
        </tr>
        <tr>
            <td colspan="2" class="font-weight-bold">Total</td>
            <td class="text-right text-primary font-weight-bold">Rp. <?= number_format($maximoTotal->total?? 0, 0, ',', '.') ?></td>
        </tr>
    </table>

    <!-- Tabel Data MAPP POWER -->
    <h1></h1> 
    <table>
        <tr>
            <th colspan="3" class="text-primary text-uppercase">MAPP POWER</th>
        </tr>
        <tr>
            <th>Parameter</th>
            <th>Detail</th>
            <th>Nilai</th>
        </tr>
        <tr>
            <td>LPP</td>
            <td colspan="2" class="text-right font-weight-bold"><?= $mappData ?> Laporan</td>
        </tr>
        <tr>
            <td rowspan="3">Storage Average</td>
            <td>CPU</td>
            <td class="text-right"><?= $mappAvgUsage->avg_cpu ?> %</td>
        </tr>
        <tr>
            <td>RAM</td>
            <td class="text-right"><?= $mappAvgUsage->avg_ram ?> %</td>
        </tr>
        <tr>
            <td>HDD</td>
            <td class="text-right"><?= $mappAvgUsage->avg_hdd ?> %</td>
        </tr>
        <tr>
            <td rowspan="2">Tagihan</td>
            <td>Tagihan Sistem</td>
            <td class="text-right">Rp. <?= number_format($mappAvgUsage->avg_sistem, 0, ',', '.') ?></td>
        </tr>
        <tr>
            <td>Tagihan User</td>
            <td class="text-right">Rp. <?= number_format($mappAvgUsage->avg_user, 0, ',','.') ?></td>
        </tr>
        <tr>
            <td colspan="2" class="font-weight-bold">Total</td>
            <td class="text-right text-primary font-weight-bold">Rp. <?= number_format($mappTotal->total?? 0, 0, ',', '.') ?></td>
        </tr>
    </table>
</body>
</html>