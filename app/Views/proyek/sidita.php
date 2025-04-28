<?= $this->extend('proyek/layout');?>

<?= $this->section('content');?>

                <div class="container-fluid">
                    <h1 class="h3 mt-4">SIDITA</h1>
                    <a href="sidita/add" class="btn btn-primary mb-3">
                    <i class="fas fa-solid fa-plus"></i> Add Data</a>
                    <button id="downloadPdf" class="btn btn-primary mb-3">
                        <i class="fas fa-download fa-sm"></i> PDF
                    </button>
                    
                    <a href="/csv17" class="btn btn-primary mb-3">
                        <i class="fas fa-solid fa-file-csv"></i> CSV</a>

                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    <?php endif; ?>

                    <div id="filteredTable">
                    <table class="table table-bordered" id="siditaTable">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Periode</th>
                                <th>IP Address</th>
                                <th>Average</th>
                                <th>Max</th>
                                <th>CPU</th>
                                <th>RAM</th>
                                <th>HDD</th>
                                <th>Tagihan Sistem</th>
                                <th>Tagihan User</th>
                                <th>Backup</th>
                                <th>File</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(isset($sidita_table) && is_iterable($sidita_table)):?>
                            <?php foreach ($sidita_table as $row): ?>
                                <tr>
                                    <td><?= $row['date'] ?></td>
                                    <td><?= $row['periode'] ?></td>
                                    <td><?= $row['ip'] ?></td>
                                    <td><?= $row['average'] ?> %</td>
                                    <td><?= $row['max'] ?> %</td>
                                    <td><?= $row['cpu'] ?> %</td>
                                    <td><?= $row['ram'] ?> %</td>
                                    <td><?= $row['hdd'] ?> %</td>
                                    <td><?= $row['tagihan_sistem'] ?></td>
                                    <td><?= $row['tagihan_user'] ?></td>
                                    <td><?= $row['backup'] ?> GB</td>
                                    <td>
                                        <a href="<?= site_url('sidita/view/' . basename($row['file_path'])) ?>"class="btn btn-warning btn-sm">
                                            <i class="fas fa-file"></i></a>
                                        <a href="<?= site_url('sidita/download/' . basename($row['file_path'])) ?>"class="btn btn-primary btn-sm">
                                            <i class="fas fa-download"></i></a>
                                    </td>
                                    <td>
                                        <a href="<?= site_url('sidita/edit/' . $row['id']) ?>" class="btn btn-success btn-sm">Edit</a>
                                        <a href="<?= site_url('sidita/delete/' . $row['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="2">No data available</td>
                                    </tr>
                        <?php endif;?>
                        </tbody>
                    </table>
                    </div>
                    
                    <div id="chartContainer">
                    <!-- content -->
                    <div class="row row-cols-auto">
                    <!-- Kontainer untuk Grafik Server -->
                    <div class="col">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Grafik Server</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="serversidita"></canvas>
                        </div>
                    </div>
                    </div>

                    <!-- Kontainer untuk Grafik Utilisasi -->
                    <div class="col">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Grafik Utilisasi</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="utilisasisidita"></canvas>
                        </div>
                    </div>
                    </div>
                    </div>

                    <!-- content -->
                    <div class="row row-cols-auto">
                    <!-- Kontainer untuk Grafik tagihan -->
                    <div class="col">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Grafik Tagihan</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="tagihansidita"></canvas>
                        </div>
                    </div>
                    </div>

                    <!-- Kontainer untuk Grafik Backup -->
                    <div class="col">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Grafik Backup Data</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="backupsidita"></canvas>
                        </div>
                    </div>
                    </div>
                    </div>              
                </div>
            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; PLN Divisi STI 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

    <!-- jQuery (required for DataTables) -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#siditaTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true
        });
    });
</script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
    $(document).ready(function() {
    const labels = [];
    const dataAverage = [];
    const dataMax = [];
    const dataCPU = [];
    const dataRAM = [];
    const dataHDD = [];
    const dataSistem = [];
    const dataUser = [];
    const dataBackup = [];

    const rows = document.querySelectorAll('#siditaTable tbody tr');

    rows.forEach(row => {
        labels.push(row.cells[1].textContent.trim());
        dataAverage.push(parseFloat(row.cells[3].textContent));
        dataMax.push(parseFloat(row.cells[4].textContent));
        dataCPU.push(parseFloat(row.cells[5].textContent));
        dataRAM.push(parseFloat(row.cells[6].textContent));
        dataHDD.push(parseFloat(row.cells[7].textContent));
        dataSistem.push(parseFloat(row.cells[8].textContent));
        dataUser.push(parseFloat(row.cells[9].textContent));
        dataBackup.push(parseFloat(row.cells[10].textContent));
        });

        <?php 
            $tagihanUser = [];
            if (is_iterable($sidita_table)) {
                foreach ($sidita_table as $row) {
                $tagihanUser[] = $row['tagihan_user'];
                }
            } ?>

            <?php 
            $tagihanSistem = [];
            if (is_iterable(value: $sidita_table)){
                foreach ($sidita_table as $row) {
                    $tagihanSistem[] = $row['tagihan_sistem'];
                }
            }?>

            updateChart('serversidita', labels, dataAverage, dataMax, null, null, null,null,null,null);
            updateChart('utilisasisidita', labels, null, null, dataCPU, dataRAM, dataHDD, null, null, null);
            updateChart('tagihansidita',labels,null, null,null,null,null, dataSistem, dataUser, null);
            updateChart('backupsidita', labels, null, null,null,null,null, null, null, dataBackup);
        });

        function updateChart(chartId, labels, dataAverage, dataMax, dataCPU, dataRAM, dataHDD, dataSistem, dataUser, dataBackup) {
        var tagihanSistem = <?= json_encode($tagihanSistem) ?>;
        var tagihanUser = <?= json_encode($tagihanUser) ?>;

        const ctx = document.getElementById(chartId).getContext('2d');
        if (window[chartId] instanceof Chart) {
            window[chartId].destroy();
        }
        window[chartId] = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    dataAverage ? {
                        label: 'Average',
                        data: dataAverage,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                        fill: false,
                        tension: 0.4
                    } : null,
                    dataMax ? {
                        label: 'Max',
                        data: dataMax,
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1,
                        fill: false,
                        tension: 0.4
                    } : null,
                    dataCPU ? {
                        label: 'CPU',
                        data: dataCPU,
                        borderColor: 'rgba(0, 0, 179, 1)',
                        borderWidth: 1,
                        fill: false,
                        tension: 0.4
                    } : null,
                    dataRAM ? {
                        label: 'RAM',
                        data: dataRAM,
                        borderColor: 'rgba(17, 102, 0, 1)',
                        borderWidth: 1,
                        fill: false,
                        tension: 0.4
                    } : null,
                    dataHDD ? {
                        label: 'HDD',
                        data: dataHDD,
                        borderColor: 'rgba(230, 153, 0, 1)',
                        borderWidth: 1,
                        fill: false,
                        tension: 0.4
                    } : null,
                    dataSistem?{
                        label: "Tagihan Sistem",
                        data: tagihanSistem,
                        borderColor: 'rgba(230, 153, 0, 1)',
                        borderWidth:1,
                        fill:false,
                        tension: 0.4
                    } : null,
                    dataUser ? {
    label: "Tagihan User",
    data: tagihanUser,
    borderColor: 'rgba(153, 0, 153, 1)',
    borderWidth: 1,
    fill: false,
    tension: 0.4
} : null,
dataBackup ? {
    label: 'Backup',
    data: dataBackup,
    borderColor: 'rgba(102, 102, 153, 1)',
    borderWidth: 1,
    fill: false,
    tension: 0.4
} : null
].filter(dataset => dataset !== null)
},
options: {
    responsive: true,
    scales: {
        y: {
            beginAtZero: true
        }
    }
}
});
}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
    document.getElementById('downloadPdf').addEventListener('click', function () {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF('landscape', 'px', 'a4');

    const tableElement = document.getElementById('filteredTable');
    const chartElement = document.getElementById('chartContainer');

    // Convert tabel ke gambar menggunakan html2canvas
    html2canvas(tableElement).then(function (tableCanvas) {
        const tableImgData = tableCanvas.toDataURL('image/png');
        doc.addImage(tableImgData, 'PNG', 10, 10, doc.internal.pageSize.getWidth() - 20, 0);
        
        // Convert grafik ke gambar menggunakan html2canvas
        html2canvas(chartElement).then(function (chartCanvas) {
            const chartImgData = chartCanvas.toDataURL('image/png');
            doc.addPage();
            doc.addImage(chartImgData, 'PNG', 10, 10, doc.internal.pageSize.getWidth() - 20, 0);
            
            // Download PDF
            doc.save('report.pdf');
        });
    });
});
</script>

<?= $this->endSection('content');?>