<?php

namespace App\Controllers;

use App\Models\EiqcModel;
use CodeIgniter\Controller;

class Eiqc extends Controller
{
    public function index($page = 'eiqc')
    {
        $data = [
            'title' => 'EIQC',
            'eiqc_table' => (new EiqcModel())-> findAll(),
            'activePage' => $page
        ];
         
        return view('proyek/eiqc', $data);
    }

    public function add()
    {
        //ubah
        return view('form_add/eiqc_add', ['action' => site_url('eiqc/store'), 'eiqc' => null]);
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
        $session = session(); // Mengambil session
    $userId = $session->get('id'); // Ambil user_id dari session

        $eiqc_table = [
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

        $eiqcModel = new EiqcModel();
        $eiqcModel->insert($eiqc_table);

        return redirect()->to(site_url('eiqc'))->with('success', 'Data added successfully');
    }

    public function delete($id)
    {
        $model = new EiqcModel();
        $model->delete($id);

        // Set flash data and redirect
        session()->setFlashdata('success', 'Data deleted successfully.');
        return redirect()->to('/eiqc');
    }

    public function edit($id)
    {
        $eiqcModel = new EiqcModel();
        $eiqc = $eiqcModel->find($id);

        if (!$eiqc) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Asset with ID $id not found");
        }
        //ubah
        return view('form_add/eiqc_add', ['action' => site_url('eiqc/update/'.$id), 'eiqc' => $eiqc]);
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

        $eiqc_table = [
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
            $eiqc_table['file_path'] = $filePath;
        }

        $eiqcModel = new EiqcModel();
        $eiqcModel->update($id, $eiqc_table);

        return redirect()->to(site_url('eiqc'))->with('success', 'Data updated successfully');
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
        $eiqcModel = new EiqcModel();
        
        // Mengambil data dari tabel aset_table
        $dataEiqc = $eiqcModel->findAll();

        // Nama file CSV
        $filename = 'eiqc_export_' . date('Ymd') . '.csv';

        // Atur header agar browser tahu ini file CSV untuk didownload
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '";');

        // Buka output buffer untuk menulis file CSV
        $file = fopen('php://output', 'w');

        // Menulis header kolom ke dalam CSV
        fputcsv($file, ['Date','Periode','IP','Average','Maximum', 'CPU', 'RAM', 'HDD','TagihanSistem','TagihanUser','Backup']);

        // Menulis data dari tabel aset_table ke dalam CSV
        foreach ($dataEiqc as $row) {
            fputcsv($file, [$row['date'],$row['periode'],$row['ip'],$row['average'], $row['max'],$row['cpu'], $row['ram'], $row['hdd'], $row['tagihan_sistem'], $row['tagihan_user'], $row['backup']]);
        }

        // Tutup file output
        fclose($file);

        // Hentikan eksekusi setelah file CSV dihasilkan
        exit();
    }
}
