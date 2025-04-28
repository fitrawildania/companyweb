<?php

namespace App\Controllers;

use App\Models\SiditaModel;
use CodeIgniter\Controller;

class Sidita extends Controller
{
    public function index($page = 'sidita')
{
    $data = [
        'title' => 'SIDITA',
        'sidita_table' => (new SiditaModel())->findAll(),
        'activePage' => $page
    ];
    
    return view('proyek/sidita', $data);
}

    public function add()
    {
        //ubah
        return view('form_add/sidita_add', ['action' => site_url('sidita/store'), 'sidita' => null]);
    }

    public function store()
    {
        $request = \Config\Services::request();

        $file = $request->getFile('file');
        if ($file->isValid() && !$file->hasMoved()) {
            $uploadPath = WRITEPATH . 'uploads/';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $file->move($uploadPath);
            $filePath = 'uploads/' . $file->getName();
        } else {
            return redirect()->back()->with('error', 'File upload failed');
        }

        $session = session();
        $userId = session()->get('id');
        $sidita_table = [
            'date' => date('Y-m-d'),
            'periode' => $request->getPost('periode'),
            'ip' => $request->getPost('ip'),
            'average' => $request->getPost('average'),
            'max' => $request->getPost('max'),
            'cpu' => $request->getPost('cpu'),
            'ram' => $request->getPost('ram'),
            'hdd' => $request->getPost('hdd'),
            'tagihan_sistem' => $request->getPost('tagihan_sistem'),
            'tagihan_user' => $request->getPost('tagihan_user'),
            'backup' => $request->getPost('backup'),
            'file_path' => $filePath,
            'user_id'=> $userId
        ];

        $siditaModel = new SiditaModel();
        $siditaModel->insert($sidita_table);

        return redirect()->to(site_url('sidita'))->with('success', 'Data added successfully');
    }

    public function delete($id)
    {
        $model = new SiditaModel();
        $model->delete($id);

        // Set flash data and redirect
        session()->setFlashdata('success', 'Data deleted successfully.');
        return redirect()->to('/sidita');
    }

    public function edit($id)
    {
        $siditaModel = new SiditaModel();
        $sidita = $siditaModel->find($id);

        if (!$siditaModel) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Asset with ID $id not found");
        }
        //ubah
        return view('form_add/sidita_add', ['action' => site_url('sidita/update/'.$id), 'sidita' => $sidita]);
    }

    public function update($id)
    {
        $request = \Config\Services::request();
        $userId = session()->get('user_id');
        $file = $request->getFile('file');
        $filePath = null;
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $uploadPath = WRITEPATH . 'uploads/';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $file->move($uploadPath);
            $filePath = 'uploads/' . $file->getName();
        }

        $sidita_table = [
            'periode' => $request->getPost('periode'),
            'ip' => $request->getPost('ip'),
            'average' => $request->getPost('average'),
            'max' => $request->getPost('max'),
            'cpu' => $request->getPost('cpu'),
            'ram' => $request->getPost('ram'),
            'hdd' => $request->getPost('hdd'),
            'tagihan_sistem' => $request->getPost('tagihan_sistem'),
            'tagihan_user' => $request->getPost('tagihan_user'),
            'backup' => $request->getPost('backup'),
            'user_id'=> $userId
        ];

        if ($filePath) {
            $sidita_table['file_path'] = $filePath;
        }

        $siditaModel = new SiditaModel();
        $siditaModel->update($id, $sidita_table);

        return redirect()->to(site_url('sidita'))->with('success', 'Data updated successfully');
    }

    public function view($filename)
    {
        $path = WRITEPATH . 'uploads/' . $filename;

        if (!is_file($path)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException($filename);
        }

        $fileInfo = new \finfo(FILEINFO_MIME_TYPE);
        $mimeType = $fileInfo->file($path);

        return $this->response
            ->setHeader('Content-Type', $mimeType)
            ->setBody(file_get_contents($path));
    }

    public function download($filename)
    {
        $path = WRITEPATH . 'uploads/' . $filename;

        if (!is_file($path)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException($filename);
        }

        return $this->response
            ->download($path, null)
            ->setFileName($filename);
    }

    public function downloadCSV()
    {
        // Inisialisasi model
        $siditaModel = new SiditaModel();
        
        // Mengambil data dari tabel aset_table
        $dataSidita = $siditaModel->findAll();

        // Nama file CSV
        $filename = 'sidita_export_' . date('Ymd') . '.csv';

        // Atur header agar browser tahu ini file CSV untuk didownload
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '";');

        // Buka output buffer untuk menulis file CSV
        $file = fopen('php://output', 'w');

        // Menulis header kolom ke dalam CSV
        fputcsv($file, ['Date','Periode','IP','Average','Maximum', 'CPU', 'RAM', 'HDD','TagihanSistem','TagihanUser','Backup']);

        // Menulis data dari tabel aset_table ke dalam CSV
        foreach ($dataSidita as $row) {
            fputcsv($file, [$row['date'],$row['periode'],$row['ip'],$row['average'], $row['max'],$row['cpu'], $row['ram'], $row['hdd'], $row['tagihan_sistem'], $row['tagihan_user'], $row['backup']]);
        }

        // Tutup file output
        fclose($file);

        // Hentikan eksekusi setelah file CSV dihasilkan
        exit();
    }
}
