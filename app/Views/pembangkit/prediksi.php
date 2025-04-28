<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prediksi Satu Bulan ke Depan</title>
</head>
<body>
    <h1>Prediksi Penggunaan Satu Bulan ke Depan</h1>

    <!-- Display error if no data is available -->
    <?php if (isset($error)): ?>
        <p><?= $error ?></p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Prediksi CPU (%)</th>
                    <th>Prediksi RAM (%)</th>
                    <th>Prediksi HDD (%)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $date ?></td>
                    <td><?= round($prediksi_cpu_terpakai, 2) ?>%</td>
                    <td><?= round($prediksi_ram_terpakai, 2) ?>%</td>
                    <td><?= round($prediksi_hdd_terpakai, 2) ?>%</td>
                </tr>
            </tbody>
        </table>
    <?php endif; ?>

    <footer>
        <p>&copy; <?= date('Y') ?> Your Company</p>
    </footer>
</body>
</html>
