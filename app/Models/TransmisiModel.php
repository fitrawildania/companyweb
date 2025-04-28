<?php

namespace App\Models;

use CodeIgniter\Model;

class TransmisiModel extends Model
{
    protected $table = 'transmisi_usage'; // Nama view
    protected $allowedFields = ['aplikasi', 'periode', 'cpu', 'ram', 'hdd'];

    public function getUsage()
    {
        return $this->select('AVG(cpu) AS avg_cpu, AVG(ram) AS avg_ram, AVG(hdd) AS avg_hdd')
                    ->get()
                    ->getRow();
    }
}
