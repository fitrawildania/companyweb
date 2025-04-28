<?php namespace App\Controllers;

use App\Models\SiippModel;
use CodeIgniter\Controller;

class Siipp extends Controller
{
    public function index($page = 'siipp')
    {
        $data = [
            'title' => 'SIIPP',
            'siipp_table' => (new SiippModel())->findAll(),
            'activePage' => $page
        ];
        
        return view('pembangkit/siipp', $data);
    }

    public function add()
    {
        return view('form_add/siipp_add', ['action' => site_url('siipp/store'), 'siipp' => null]);
    }

    public function store()
    {
        $request = \Config\Services::request();
$session = session();
$userId = session()->get('id');
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

        $siipp_table = [
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
            'user_id' => $userId
        ];

        $siippModel = new SiippModel();
        $siippModel->insert($siipp_table);

        return redirect()->to(site_url('siipp'))->with('success', 'Data added successfully');
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
        $model = new SiippModel();
        $model->delete($id);

        // Set flash data and redirect
        session()->setFlashdata('success', 'Data deleted successfully.');
        return redirect()->to('/siipp');
    }

    public function edit($id)
    {
        $siippModel = new SiippModel();
        $siipp = $siippModel->find($id);

        if (!$siipp) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Asset with ID $id not found");
        }
        //ubah
        return view('form_add/siipp_add', ['action' => site_url('siipp/update/'.$id), 'siipp' => $siipp]);
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

        $siipp_table = [
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
            'user_id'=>$userId
        ];

        if ($filePath) {
            $siipp_table['file_path'] = $filePath;
        }

        $siippModel = new SiippModel();
        $siippModel->update($id, $siipp_table);

        return redirect()->to(site_url('siipp'))->with('success', 'Data updated successfully');
    }

    public function downloadCSV()
    {
        // Inisialisasi model
        $siippModel = new SiippModel();
        
        // Mengambil data dari tabel aset_table
        $dataSiipp = $siippModel->findAll();

        // Nama file CSV
        $filename = 'siipp_export_' . date('Ymd') . '.csv';

        // Atur header agar browser tahu ini file CSV untuk didownload
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '";');

        // Buka output buffer untuk menulis file CSV
        $file = fopen('php://output', 'w');

        // Menulis header kolom ke dalam CSV
        fputcsv($file, ['Date','Periode','IP','Average','Maximum', 'CPU', 'RAM', 'HDD','TagihanSistem','TagihanUser','Backup']);

        // Menulis data dari tabel aset_table ke dalam CSV
        foreach ($dataSiipp as $row) {
            fputcsv($file, [$row['date'],$row['periode'],$row['ip'],$row['average'], $row['max'],$row['cpu'], $row['ram'], $row['hdd'], $row['tagihan_sistem'], $row['tagihan_user'], $row['backup']]);
        }

        // Tutup file output
        fclose($file);

        // Hentikan eksekusi setelah file CSV dihasilkan
        exit();
    }
}
