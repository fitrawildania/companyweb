<?php

namespace App\Models;

use CodeIgniter\Model;

class ProyekModel extends Model
{
    protected $table = 'proyek_usage'; // Nama view
    protected $allowedFields = ['aplikasi', 'periode', 'cpu', 'ram', 'hdd'];

    public function getProyekUsage()
    {
        return $this->select('AVG(cpu) AS avg_cpu, AVG(ram) AS avg_ram, AVG(hdd) AS avg_hdd')
                    ->get()
                    ->getRow();
    }
}
