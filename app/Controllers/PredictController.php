<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class PredictController extends Controller
{
    public function predict()
    {
        // Ambil input dari form
        $periode = $this->request->getPost('periode');

        // Jalankan script Python
        $command = escapeshellcmd('python3 app/Models/MachineLearning/predict.py ' . $periode);
        $output = shell_exec($command);

        // Decode hasil JSON dari Python
        $predictions = json_decode($output, true);

        // Tampilkan hasil prediksi
        return view('prediction_result', [
            'periode' => $periode,
            'cpu_prediction' => $predictions['cpu_prediction'],
            'ram_prediction' => $predictions['ram_prediction'],
            'hdd_prediction' => $predictions['hdd_prediction']
        ]);
    }
}