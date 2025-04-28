<?php
namespace App\Controllers;

use App\Models\AsetModel;
use App\Models\BbmModel;
use Phpml\Regression\LeastSquares;
class PrediksiController extends BaseController
{
    public function prediksiSatuBulan()
    {
        $model = new AsetModel();
        $data = $model->getDataHistoris();
    
        $x = [];
        $y_cpu = [];
        $y_ram = [];
        $y_hdd = [];
    
        // Memisahkan data menjadi X (tanggal) dan Y (CPU, RAM, HDD terpakai)
        foreach ($data as $row) {
            $x[] = strtotime($row['date']);
            $y_cpu[] = (float) $row['cpu']; // CPU
            $y_ram[] = (float) $row['ram']; // RAM
            $y_hdd[] = (float) $row['hdd']; // HDD
        }
    
        // Ambil tanggal terakhir dari data historis
        $tanggal_terakhir = end($x);
    
        // Tambahkan satu bulan ke tanggal terakhir
        $tanggal_prediksi = strtotime("+1 month", $tanggal_terakhir);
    
        // Fungsi untuk menghitung regresi linear sederhana
        function hitungRegresiLinear($x, $y) {
            $n = count($x);
            $sum_x = array_sum($x);
            $sum_y = array_sum($y);
            $sum_xy = 0;
            $sum_x2 = 0;
    
            for ($i = 0; $i < $n; $i++) {
                $sum_xy += $x[$i] * $y[$i];
                $sum_x2 += $x[$i] * $x[$i];
            }
    
            $slope = ($n * $sum_xy - $sum_x * $sum_y) / ($n * $sum_x2 - $sum_x * $sum_x);
            $intercept = ($sum_y - $slope * $sum_x) / $n;
    
            return ['slope' => $slope, 'intercept' => $intercept];
        }
    
        // Menghitung regresi untuk masing-masing metrik (CPU, RAM, HDD)
        $regresi_cpu = hitungRegresiLinear($x, $y_cpu);
        $regresi_ram = hitungRegresiLinear($x, $y_ram);
        $regresi_hdd = hitungRegresiLinear($x, $y_hdd);
    
        // Prediksi untuk tanggal satu bulan ke depan
        $prediksi_cpu = $regresi_cpu['slope'] * $tanggal_prediksi + $regresi_cpu['intercept'];
        $prediksi_ram = $regresi_ram['slope'] * $tanggal_prediksi + $regresi_ram['intercept'];
        $prediksi_hdd = $regresi_hdd['slope'] * $tanggal_prediksi + $regresi_hdd['intercept'];
    
        // Menampilkan hasil prediksi
        return view('pembangkit/prediksi', [
            'date' => date('Y-m-d', $tanggal_prediksi),
            'prediksi_cpu_terpakai' => $prediksi_cpu,
            'prediksi_ram_terpakai' => $prediksi_ram,
            'prediksi_hdd_terpakai' => $prediksi_hdd
        ]);
    }
}