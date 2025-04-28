<?php

namespace App\Controllers;

use App\Models\NeonModel;
use CodeIgniter\Controller;

class Neon extends Controller
{
    public function index($page = 'neon')
    {
        $data = [
            'title' => 'Neon',
            'neon_table' => (new NeonModel())->findAll(),
            'activePage' => $page
        ];

        return view('transmisi/neon', $data);
    }

    public function add()
    {
        return view('form_add/neon_add', ['action' => site_url('neon/store'), 'neon' => null]);
    }

    public function store()
    {
        $request = \Config\Services::request();

        $file = $request->getFile('file');
        if ($file->isValid() && !$file->hasMoved()) {
            // Set upload path
            $uploadPath = WRITEPATH . 'uploads/';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            // Move the file to the upload directory
            $file->move($uploadPath);

            // Get the relative file path
            $filePath = 'uploads/' . $file->getName();
        } else {
            return redirect()->back()->with('error', 'File upload failed');
        }

        $session = session();
        $userId = session()->get('id');

        $neon_table = [
            'date' => date('Y-m-d'), // Set the current date
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

        $neonModel = new NeonModel();
        $neonModel->insert($neon_table);

        return redirect()->to(site_url('neon'))->with('success', 'Data added successfully');
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

    public function delete($id)
    {
        $model = new NeonModel();
        $model->delete($id);

        // Set flash data and redirect
        session()->setFlashdata('success', 'Data deleted successfully.');
        return redirect()->to('/neon');
    }

    public function edit($id)
    {
        $neonModel = new NeonModel();
        $neon = $neonModel->find($id);

        if (!$neon) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Asset with ID $id not found");
        }
        //ubah
        return view('form_add/neon_add', ['action' => site_url('neon/update/'.$id), 'neon' => $neon]);
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

        $neon_table = [
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
            $neon_table['file_path'] = $filePath;
        }

        $neonModel = new NeonModel();
        $neonModel->update($id, $neon_table);

        return redirect()->to(site_url('neon'))->with('success', 'Data updated successfully');
    }

    public function downloadCSV()
    {
        // Inisialisasi model
        $neonModel = new NeonModel();
        
        // Mengambil data dari tabel aset_table
        $dataNeon = $neonModel->findAll();

        // Nama file CSV
        $filename = 'neon_export_' . date('Ymd') . '.csv';

        // Atur header agar browser tahu ini file CSV untuk didownload
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '";');

        // Buka output buffer untuk menulis file CSV
        $file = fopen('php://output', 'w');

        // Menulis header kolom ke dalam CSV
        fputcsv($file, ['Date','Periode','IP','Average','Maximum', 'CPU', 'RAM', 'HDD','TagihanSistem','TagihanUser','Backup']);

        // Menulis data dari tabel aset_table ke dalam CSV
        foreach ($dataNeon as $row) {
            fputcsv($file, [$row['date'],$row['periode'],$row['ip'],$row['average'], $row['max'],$row['cpu'], $row['ram'], $row['hdd'], $row['tagihan_sistem'], $row['tagihan_user'], $row['backup']]);
        }

        // Tutup file output
        fclose($file);

        // Hentikan eksekusi setelah file CSV dihasilkan
        exit();
    }
}
