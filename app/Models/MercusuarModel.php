<?php namespace App\Models;

use CodeIgniter\Model;

class MercusuarModel extends Model
{
    protected $table = 'mercusuar_table';
    protected $primaryKey = 'id';
    protected $allowedFields = ['date', 'periode', 'ip', 'average', 'max', 'cpu', 'ram', 'hdd', 'tagihan_sistem','tagihan_user', 'backup', 'file_path','user_id'];

    public function getMercusuarAvgUsage()
    {
        // Rata-rata CPU, RAM, HDD
        $avgData = $this->select('ROUND(AVG(cpu), 2) AS avg_cpu, 
                                  ROUND(AVG(ram), 2) AS avg_ram, 
                                  ROUND(AVG(hdd), 2) AS avg_hdd')
                        ->get()
                        ->getRowArray(); // Menggunakan getRowArray() untuk mendapatkan hasil sebagai array
    
        // Mengambil data tagihan dari baris terakhir
        $result = $this->db->query("SELECT COALESCE(ROUND(tagihan_sistem, 0), 0) AS avg_sistem,
                                           COALESCE(ROUND(tagihan_user, 0), 0) AS avg_user
                                    FROM mercusuar_table
                                    ORDER BY id DESC
                                    LIMIT 1")
                          ->getRowArray(); // Menggunakan getRowArray() untuk mendapatkan hasil sebagai array
    
        // Menetapkan nilai dengan penanganan error
        $avg_sistem = $result['avg_sistem'] ?? 0;     $avg_user = $result['avg_user'] ?? 0;     // Mengakses sebagai array
    
        $combinedData = (object) array_merge($avgData, [ // Menggunakan array_merge() untuk menggabungkan data
            'avg_sistem' => $avg_sistem,
            'avg_user'   => $avg_user
        ]);
    
        return $combinedData;
    }
    
    public function getMercusuarTotal() {
        $sql = "SELECT COALESCE(tagihan_user, 0) + COALESCE(tagihan_sistem, 0) AS total
                FROM mercusuar_table
                ORDER BY id DESC
                LIMIT 1";
    
        $query = $this->db->query($sql);
        $result = $query->getRow();
    
        
        return $result;
    }
    
}
