<?php namespace App\Models;

use CodeIgniter\Model;

class AsetModel extends Model
{
    protected $table = 'aset_table';
    protected $primaryKey = 'id';
    protected $allowedFields = ['date', 'periode', 'ip', 'average', 'max', 'cpu', 'ram', 'hdd', 'tagihan_sistem','tagihan_user', 'backup', 'file_path','user_id'];

    public function getDataHistoris()
    {
        return $this->orderBy('periode','ASC')-> findAll();
    }

    public function getAsetAvgUsage()
    {
        $avgData = $this->select('ROUND(AVG(cpu), 2) AS avg_cpu, 
                                  ROUND(AVG(ram), 2) AS avg_ram, 
                                  ROUND(AVG(hdd), 2) AS avg_hdd')
                        ->get()
                        ->getRowArray(); 
    
        // Mengambil data dari baris terakhir
        $result = $this->db->query("SELECT COALESCE(ROUND(tagihan_sistem, 0), 0) AS avg_sistem,
                                           COALESCE(ROUND(tagihan_user, 0), 0) AS avg_user
                                    FROM aset_table
                                    ORDER BY id DESC
                                    LIMIT 1")
                          ->getRowArray(); // hasil sebagai array
    
        $avg_sistem = $result['avg_sistem'] ?? 0; // array
        $avg_user = $result['avg_user'] ?? 0;     // array
    
        // Gabungkan data
        $combinedData = (object) array_merge($avgData, [ // array_merge() menggabungkan data
            'avg_sistem' => $avg_sistem,
            'avg_user'   => $avg_user
        ]);
    
        return $combinedData;
    }
    
    public function getAsetTotal() {
        $sql = "SELECT COALESCE(tagihan_user, 0) + COALESCE(tagihan_sistem, 0) AS total
                FROM aset_table
                ORDER BY id DESC
                LIMIT 1";
    
        $query = $this->db->query($sql);
        $result = $query->getRow(); // hasil objek

        return $result; 
    }
    
}
