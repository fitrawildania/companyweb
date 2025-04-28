<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Laporan Monitoring Proyek</title>
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
    <h1>Laporan Monitoring Proyek</h1>

    <!-- EIC -->
    <table>
    <tr>
        <th colspan="3" class="text-primary text-uppercase">EIC</th>
    </tr>
    <tr>
        <th>Parameter</th>
        <th>Detail</th>
        <th>Nilai</th>
    </tr>
    <tr>
        <td>LPP</td>
        <td colspan="2" class="text-right"><?= $eicData ?> Laporan</td>
    </tr>
    <tr>
        <td rowspan="3">Storage Average</td>
        <td>CPU</td>
        <td class="text-right"><?= $eicAvgUsage->avg_cpu ?> %</td>
    </tr>
    <tr>
        <td>RAM</td>
        <td class="text-right"><?= $eicAvgUsage->avg_ram ?> %</td>
    </tr>
    <tr>
        <td>HDD</td>
        <td class="text-right"><?= $eicAvgUsage->avg_hdd ?> %</td>
    </tr>
    <tr>
        <td rowspan="2">Tagihan</td>
        <td>Tagihan Sistem</td>
        <td class="text-right">Rp. <?= number_format($eicAvgUsage->avg_sistem, 0, ',', '.') ?></td>
    </tr>
    <tr>
        <td>Tagihan User</td>
        <td class="text-right">Rp. <?= number_format($eicAvgUsage->avg_user, 0, ',','.') ?></td>
    </tr>
    <tr>
        <td colspan="2" class="font-weight-bold">Total</td>
        <td class="text-right text-primary font-weight-bold">Rp. <?= number_format($eicTotal->total??0, 0, ',', '.') ?></td>
    </tr>
</table>

<!-- EC -->
<table>
    <tr>
        <th colspan="3" class="text-primary text-uppercase">EC</th>
    </tr>
    <tr>
        <th>Parameter</th>
        <th>Detail</th>
        <th>Nilai</th>
    </tr>
    <tr>
        <td>LPP</td>
        <td colspan="2" class="text-right"><?= $ecData?> Laporan</td>
    </tr>
    <tr>
        <td rowspan="3">Storage Average</td>
        <td>CPU</td>
        <td class="text-right"><?= $ecAvgUsage->avg_cpu ?> %</td>
    </tr>
    <tr>
        <td>RAM</td>
        <td class="text-right"><?= $ecAvgUsage->avg_ram ?> %</td>
    </tr>
    <tr>
        <td>HDD</td>
        <td class="text-right"><?= $ecAvgUsage->avg_hdd ?> %</td>
    </tr>
    <tr>
        <td rowspan="2">Tagihan</td>
        <td>Tagihan Sistem</td>
        <td class="text-right">Rp. <?= number_format($ecAvgUsage->avg_sistem, 0, ',', '.') ?></td>
    </tr>
    <tr>
        <td>Tagihan User</td>
        <td class="text-right">Rp. <?= number_format($ecAvgUsage->avg_user, 0, ',','.') ?></td>
    </tr>
    <tr>
        <td colspan="2" class="font-weight-bold">Total</td>
        <td class="text-right text-primary font-weight-bold">Rp. <?= number_format($ecTotal->total??0, 0, ',', '.') ?></td>
    </tr>
</table>

<!-- EIQC -->
 <h1></h1>
<table>
    <tr>
        <th colspan="3" class="text-primary text-uppercase">EIQC</th>
    </tr>
    <tr>
        <th>Parameter</th>
        <th>Detail</th>
        <th>Nilai</th>
    </tr>
    <tr>
        <td>LPP</td>
        <td colspan="2" class="text-right"><?= $eiqcData ?> Laporan</td>
    </tr>
    <tr>
        <td rowspan="3">Storage Average</td>
        <td>CPU</td>
        <td class="text-right"><?= $eiqcAvgUsage->avg_cpu ?> %</td>
    </tr>
    <tr>
        <td>RAM</td>
        <td class="text-right"><?= $eiqcAvgUsage->avg_ram ?> %</td>
    </tr>
    <tr>
        <td>HDD</td>
        <td class="text-right"><?= $eiqcAvgUsage->avg_hdd ?> %</td>
    </tr>
    <tr>
        <td rowspan="2">Tagihan</td>
        <td>Tagihan Sistem</td>
        <td class="text-right">Rp. <?= number_format($eiqcAvgUsage->avg_sistem, 0, ',', '.') ?></td>
    </tr>
    <tr>
        <td>Tagihan User</td>
        <td class="text-right">Rp. <?= number_format($eiqcAvgUsage->avg_user, 0, ',','.') ?></td>
    </tr>
    <tr>
        <td colspan="2" class="font-weight-bold">Total</td>
        <td class="text-right text-primary font-weight-bold">Rp. <?= number_format($eiqcTotal->total??0, 0, ',', '.') ?></td>
    </tr>
</table>

<!-- MERCUSUAR -->
<table>
    <tr>
        <th colspan="3" class="text-primary text-uppercase">Mercusuar</th>
    </tr>
    <tr>
        <th>Parameter</th>
        <th>Detail</th>
        <th>Nilai</th>
    </tr>
    <tr>
        <td>LPP</td>
        <td colspan="2" class="text-right"><?= $mercusuarData ?> Laporan</td>
    </tr>
    <tr>
        <td rowspan="3">Storage Average</td>
        <td>CPU</td>
        <td class="text-right"><?= $mercusuarAvgUsage->avg_cpu ?> %</td>
    </tr>
    <tr>
        <td>RAM</td>
        <td class="text-right"><?= $mercusuarAvgUsage->avg_ram ?> %</td>
    </tr>
    <tr>
        <td>HDD</td>
        <td class="text-right"><?= $mercusuarAvgUsage->avg_hdd ?> %</td>
    </tr>
    <tr>
        <td rowspan="2">Tagihan</td>
        <td>Tagihan Sistem</td>
        <td class="text-right">Rp. <?= number_format($mercusuarAvgUsage->avg_sistem, 0, ',', '.') ?></td>
    </tr>
    <tr>
        <td>Tagihan User</td>
        <td class="text-right">Rp. <?= number_format($mercusuarAvgUsage->avg_user, 0, ',','.') ?></td>
    </tr>
    <tr>
        <td colspan="2" class="font-weight-bold">Total</td>
        <td class="text-right text-primary font-weight-bold">Rp. <?= number_format($mercusuarTotal->total??0, 0, ',', '.') ?></td>
    </tr>
</table>

<h1></h1>
<!-- PMO -->
<table>
    <tr>
        <th colspan="3" class="text-primary text-uppercase">PMO</th>
    </tr>
    <tr>
        <th>Parameter</th>
        <th>Detail</th>
        <th>Nilai</th>
    </tr>
    <tr>
        <td>LPP</td>
        <td colspan="2" class="text-right"><?= $pmoData ?> Laporan</td>
    </tr>
    <tr>
        <td rowspan="3">Storage Average</td>
        <td>CPU</td>
        <td class="text-right"><?= $pmoAvgUsage->avg_cpu ?> %</td>
    </tr>
    <tr>
        <td>RAM</td>
        <td class="text-right"><?= $pmoAvgUsage->avg_ram ?> %</td>
    </tr>
    <tr>
        <td>HDD</td>
        <td class="text-right"><?= $pmoAvgUsage->avg_hdd ?> %</td>
    </tr>
    <tr>
        <td rowspan="2">Tagihan</td>
        <td>Tagihan Sistem</td>
        <td class="text-right">Rp. <?= number_format($pmoAvgUsage->avg_sistem, 0, ',', '.') ?></td>
    </tr>
    <tr>
        <td>Tagihan User</td>
        <td class="text-right">Rp. <?= number_format($pmoAvgUsage->avg_user, 0, ',','.') ?></td>
    </tr>
    <tr>
        <td colspan="2" class="font-weight-bold">Total</td>
        <td class="text-right text-primary font-weight-bold">Rp. <?= number_format($pmoTotal->total??0, 0, ',', '.') ?></td>
    </tr>
</table>

<!-- SIDITA -->
<table>
    <tr>
        <th colspan="3" class="text-primary text-uppercase">SIDITA</th>
    </tr>
    <tr>
        <th>Parameter</th>
        <th>Detail</th>
        <th>Nilai</th>
    </tr>
    <tr>
        <td>LPP</td>
        <td colspan="2" class="text-right"><?= $siditaData ?> Laporan</td>
    </tr>
    <tr>
        <td rowspan="3">Storage Average</td>
        <td>CPU</td>
        <td class="text-right"><?= $siditaAvgUsage->avg_cpu ?> %</td>
    </tr>
    <tr>
        <td>RAM</td>
        <td class="text-right"><?= $siditaAvgUsage->avg_ram ?> %</td>
    </tr>
    <tr>
        <td>HDD</td>
        <td class="text-right"><?= $siditaAvgUsage->avg_hdd ?> %</td>
    </tr>
    <tr>
        <td rowspan="2">Tagihan</td>
        <td>Tagihan Sistem</td>
        <td class="text-right">Rp. <?= number_format($siditaAvgUsage->avg_sistem, 0, ',', '.') ?></td>
    </tr>
    <tr>
        <td>Tagihan User</td>
        <td class="text-right">Rp. <?= number_format($siditaAvgUsage->avg_user, 0, ',','.') ?></td>
    </tr>
    <tr>
        <td colspan="2" class="font-weight-bold">Total</td>
        <td class="text-right text-primary font-weight-bold">Rp. <?= number_format($siditaTotal->total??0, 0, ',', '.') ?></td>
    </tr>
</table>

<h1></h1>
<!-- PLN CERDAS -->
<table>
    <tr>
        <th colspan="3" class="text-primary text-uppercase">PLN CERDAS</th>
    </tr>
    <tr>
        <th>Parameter</th>
        <th>Detail</th>
        <th>Nilai</th>
    </tr>
    <tr>
        <td>LPP</td>
        <td colspan="2" class="text-right"><?= $plncerdasData ?> Laporan</td>
    </tr>
    <tr>
        <td rowspan="3">Storage Average</td>
        <td>CPU</td>
        <td class="text-right"><?= $plncerdasAvgUsage->avg_cpu ?> %</td>
    </tr>
    <tr>
        <td>RAM</td>
        <td class="text-right"><?= $plncerdasAvgUsage->avg_ram ?> %</td>
    </tr>
    <tr>
        <td>HDD</td>
        <td class="text-right"><?= $plncerdasAvgUsage->avg_hdd ?> %</td>
    </tr>
    <tr>
        <td rowspan="2">Tagihan</td>
        <td>Tagihan Sistem</td>
        <td class="text-right">Rp. <?= number_format($plncerdasAvgUsage->avg_sistem, 0, ',', '.') ?></td>
    </tr>
    <tr>
        <td>Tagihan User</td>
        <td class="text-right">Rp. <?= number_format($plncerdasAvgUsage->avg_user, 0, ',','.') ?></td>
    </tr>
    <tr>
        <td colspan="2" class="font-weight-bold">Total</td>
        <td class="text-right text-primary font-weight-bold">Rp. <?= number_format($plncerdasTotal->total??0, 0, ',', '.') ?></td>
    </tr>
</table>

<!-- ETKDN -->
<table>
    <tr>
        <th colspan="3" class="text-primary text-uppercase">ETKDN</th>
    </tr>
    <tr>
        <th>Parameter</th>
        <th>Detail</th>
        <th>Nilai</th>
    </tr>
    <tr>
        <td>LPP</td>
        <td colspan="2" class="text-right"><?= $etkdnData ?> Laporan</td>
    </tr>
    <tr>
        <td rowspan="3">Storage Average</td>
        <td>CPU</td>
        <td class="text-right"><?= $etkdnAvgUsage->avg_cpu ?> %</td>
    </tr>
    <tr>
        <td>RAM</td>
        <td class="text-right"><?= $etkdnAvgUsage->avg_ram ?> %</td>
    </tr>
    <tr>
        <td>HDD</td>
        <td class="text-right"><?= $etkdnAvgUsage->avg_hdd ?> %</td>
    </tr>
    <tr>
        <td rowspan="2">Tagihan</td>
        <td>Tagihan Sistem</td>
        <td class="text-right">Rp. <?= number_format($etkdnAvgUsage->avg_sistem, 0, ',', '.') ?></td>
    </tr>
    <tr>
        <td>Tagihan User</td>
        <td class="text-right">Rp. <?= number_format($etkdnAvgUsage->avg_user, 0, ',','.') ?></td>
    </tr>
    <tr>
        <td colspan="2" class="font-weight-bold">Total</td>
        <td class="text-right text-primary font-weight-bold">Rp. <?= number_format($etkdnTotal->total??0, 0, ',', '.') ?></td>
    </tr>
</table>

<h1></h1>
<!-- LISDES -->
<table>
    <tr>
        <th colspan="3" class="text-primary text-uppercase">LISDES</th>
    </tr>
    <tr>
        <th>Parameter</th>
        <th>Detail</th>
        <th>Nilai</th>
    </tr>
    <tr>
        <td>LPP</td>
        <td colspan="2" class="text-right"><?= $lisdesData ?> Laporan</td>
    </tr>
    <tr>
        <td rowspan="3">Storage Average</td>
        <td>CPU</td>
        <td class="text-right"><?= $lisdesAvgUsage->avg_cpu ?> %</td>
    </tr>
    <tr>
        <td>RAM</td>
        <td class="text-right"><?= $lisdesAvgUsage->avg_ram ?> %</td>
    </tr>
    <tr>
        <td>HDD</td>
        <td class="text-right"><?= $lisdesAvgUsage->avg_hdd ?> %</td>
    </tr>
    <tr>
        <td rowspan="2">Tagihan</td>
        <td>Tagihan Sistem</td>
        <td class="text-right">Rp. <?= number_format($lisdesAvgUsage->avg_sistem, 0, ',', '.') ?></td>
    </tr>
    <tr>
        <td>Tagihan User</td>
        <td class="text-right">Rp. <?= number_format($lisdesAvgUsage->avg_user, 0, ',','.') ?></td>
    </tr>
    <tr>
        <td colspan="2" class="font-weight-bold">Total</td>
        <td class="text-right text-primary font-weight-bold">Rp. <?= number_format($lisdesTotal->total??0, 0, ',', '.') ?></td>
    </tr>
</table>

</body>
</html>