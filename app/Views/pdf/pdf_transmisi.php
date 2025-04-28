<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Laporan Monitoring Transmisi</title>
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
    <h1>Laporan Monitoring Transmisi</h1>

<!-- EAM Transmisi -->
<table>
    <tr>
        <th colspan="3" class="text-primary text-uppercase">EAM Transmisi</th>
    </tr>
    <tr>
        <th>Parameter</th>
        <th>Detail</th>
        <th>Nilai</th>
    </tr>
    <tr>
        <td>LPP</td>
        <td colspan="2" class="text-right"><?= $eamtData ?> Laporan</td>
    </tr>
    <tr>
        <td rowspan="3">Storage Average</td>
        <td>CPU</td>
        <td class="text-right"><?= $eamtAvgUsage->avg_cpu ?> %</td>
    </tr>
    <tr>
        <td>RAM</td>
        <td class="text-right"><?= $eamtAvgUsage->avg_ram ?> %</td>
    </tr>
    <tr>
        <td>HDD</td>
        <td class="text-right"><?= $eamtAvgUsage->avg_hdd ?> %</td>
    </tr>
    <tr>
        <td rowspan="2">Tagihan</td>
        <td>Tagihan Sistem</td>
        <td class="text-right">Rp. <?= number_format($eamtAvgUsage->avg_sistem, 0, ',', '.') ?></td>
    </tr>
    <tr>
        <td>Tagihan User</td>
        <td class="text-right">Rp. <?= number_format($eamtAvgUsage->avg_user, 0, ',','.') ?></td>
    </tr>
    <tr>
        <td colspan="2" class="font-weight-bold">Total</td>
        <td class="text-right text-primary font-weight-bold">Rp. <?= number_format($eamtTotal->total??0, 0, ',', '.') ?></td>
    </tr>
</table>

<!-- Power Inspect -->
<table>
    <tr>
        <th colspan="3" class="text-primary text-uppercase">Power Inspect</th>
    </tr>
    <tr>
        <th>Parameter</th>
        <th>Detail</th>
        <th>Nilai</th>
    </tr>
    <tr>
        <td>LPP</td>
        <td colspan="2" class="text-right"><?= $piData ?> Laporan</td>
    </tr>
    <tr>
        <td rowspan="3">Storage Average</td>
        <td>CPU</td>
        <td class="text-right"><?= $piAvgUsage->avg_cpu ?> %</td>
    </tr>
    <tr>
        <td>RAM</td>
        <td class="text-right"><?= $piAvgUsage->avg_ram ?> %</td>
    </tr>
    <tr>
        <td>HDD</td>
        <td class="text-right"><?= $piAvgUsage->avg_hdd ?> %</td>
    </tr>
    <tr>
        <td rowspan="2">Tagihan</td>
        <td>Tagihan Sistem</td>
        <td class="text-right">Rp. <?= number_format($piAvgUsage->avg_sistem, 0, ',', '.') ?></td>
    </tr>
    <tr>
        <td>Tagihan User</td>
        <td class="text-right">Rp. <?= number_format($piAvgUsage->avg_user, 0, ',','.') ?></td>
    </tr>
    <tr>
        <td colspan="2" class="font-weight-bold">Total</td>
        <td class="text-right text-primary font-weight-bold">Rp. <?= number_format($piTotal->total??0, 0, ',', '.') ?></td>
    </tr>
</table>

<h1></h1>
<!-- Neon -->
<table>
    <tr>
        <th colspan="3" class="text-primary text-uppercase">Neon</th>
    </tr>
    <tr>
        <th>Parameter</th>
        <th>Detail</th>
        <th>Nilai</th>
    </tr>
    <tr>
        <td>LPP</td>
        <td colspan="2" class="text-right"><?= $neonData ?> Laporan</td>
    </tr>
    <tr>
        <td rowspan="3">Storage Average</td>
        <td>CPU</td>
        <td class="text-right"><?= $neonAvgUsage->avg_cpu ?> %</td>
    </tr>
    <tr>
        <td>RAM</td>
        <td class="text-right"><?= $neonAvgUsage->avg_ram ?> %</td>
    </tr>
    <tr>
        <td>HDD</td>
        <td class="text-right"><?= $neonAvgUsage->avg_hdd ?> %</td>
    </tr>
    <tr>
        <td rowspan="2">Tagihan</td>
        <td>Tagihan Sistem</td>
        <td class="text-right">Rp. <?= number_format($neonAvgUsage->avg_sistem, 0, ',', '.') ?></td>
    </tr>
    <tr>
        <td>Tagihan User</td>
        <td class="text-right">Rp. <?= number_format($neonAvgUsage->avg_user, 0, ',','.') ?></td>
    </tr>
    <tr>
        <td colspan="2" class="font-weight-bold">Total</td>
        <td class="text-right text-primary font-weight-bold">Rp. <?= number_format($neonTotal->total??0, 0, ',', '.') ?></td>
    </tr>
</table>

<!-- MM-NE -->
<table>
    <tr>
        <th colspan="3" class="text-primary text-uppercase">MM-NE</th>
    </tr>
    <tr>
        <th>Parameter</th>
        <th>Detail</th>
        <th>Nilai</th>
    </tr>
    <tr>
        <td>LPP</td>
        <td colspan="2" class="text-right"><?= $mmData ?> Laporan</td>
    </tr>
    <tr>
        <td rowspan="3">Storage Average</td>
        <td>CPU</td>
        <td class="text-right"><?= $mmAvgUsage->avg_cpu ?> %</td>
    </tr>
    <tr>
        <td>RAM</td>
        <td class="text-right"><?= $mmAvgUsage->avg_ram ?> %</td>
    </tr>
    <tr>
        <td>HDD</td>
        <td class="text-right"><?= $mmAvgUsage->avg_hdd ?> %</td>
    </tr>
    <tr>
        <td rowspan="2">Tagihan</td>
        <td>Tagihan Sistem</td>
        <td class="text-right">Rp. <?= number_format($mmAvgUsage->avg_sistem, 0, ',', '.') ?></td>
    </tr>
    <tr>
        <td>Tagihan User</td>
        <td class="text-right">Rp. <?= number_format($mmAvgUsage->avg_user, 0, ',','.') ?></td>
    </tr>
    <tr>
        <td colspan="2" class="font-weight-bold">Total</td>
        <td class="text-right text-primary font-weight-bold">Rp. <?= number_format($mmTotal->total??0, 0, ',', '.') ?></td>
    </tr>
</table>
</body>
</html>