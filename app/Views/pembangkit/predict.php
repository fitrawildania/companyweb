<?= $this->extend('pembangkit/layout'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <h1 class="h3 mt-4">Hasil Prediksi</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Hasil Prediksi Penggunaan CPU, RAM, dan HDD</h6>
        </div>
        <div class="card-body">
            <p>Periode: <?= $periode ?></p>
            <p>Prediksi CPU: <?= $cpu_prediction ?>%</p>
            <p>Prediksi RAM: <?= $ram_prediction ?>%</p>
            <p>Prediksi HDD: <?= $hdd_prediction ?>%</p>
            <a href="<?= site_url('aset') ?>" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>