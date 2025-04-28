<?php

namespace App\Models;

use CodeIgniter\Model;

class CombinedUsageModel extends Model
{
    protected $table = 'combined_usage'; // Nama view
    protected $allowedFields = ['aplikasi', 'periode', 'cpu', 'ram', 'hdd'];

    public function getOverallAverageUsage()
    {
        return $this->select('AVG(cpu) AS avg_cpu, AVG(ram) AS avg_ram, AVG(hdd) AS avg_hdd')
                    ->get()
                    ->getRow();
    }

    public function getAverageUsageByApplication()
    {
        return $this->select('aplikasi, AVG(cpu) AS avg_cpu, AVG(ram) AS avg_ram, AVG(hdd) AS avg_hdd')
                    ->groupBy('aplikasi')
                    ->orderBy('aplikasi')
                    ->findAll();
    }

    public function getAverageUsageByPeriod()
    {
        return $this->select('periode, AVG(cpu) AS avg_cpu, AVG(ram) AS avg_ram, AVG(hdd) AS avg_hdd')
                    ->groupBy('periode')
                    ->orderBy('periode')
                    ->findAll();
    }
}
