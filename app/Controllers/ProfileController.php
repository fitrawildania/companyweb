<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class ProfileController extends Controller
{
    protected $userModel;
    public function __construct() {
        $this->userModel = new \App\Models\UserModel();
    }
    public function index()
    {
        $session = session();
        $userModel = new UserModel();
        $userId = $session->get('id');

        $user = $userModel->find($userId);

        if (!$user) {
            throw new \RuntimeException('User not found.');
        }

        $data['user'] = $user;

        return view('profile/show', $data);
    }

    public function edit()
    {
        $userModel = new UserModel();
        $user = $userModel->find(session()->get('id'));

        return view('profile/edit', ['user' => $user]);
    }

    public function update()
{
    $userModel = new UserModel();
    $validation = \Config\Services::validation();
    
    // Ambil ID pengguna dari session
    $userId = session()->get('id');
    
    // Validasi data input
    $rules = [
        'nama' => 'required',
        'username' => "required|is_unique[users.username,id,{$userId}]",
        'foto' => 'max_size[foto,2048]|is_image[foto]'
    ];
    
    // Tambahkan aturan password jika ada input password
    if ($this->request->getPost('password')) {
        $rules['password'] = [
            'rules' => 'required|min_length[8]|max_length[100]|regex_match[/^(?=.*[0-9])(?=.*[a-zA-Z])(?=.*[\W_]).+$/]',
            'errors' => [
                'required' => 'Password is required.',
                'min_length' => 'Password must be at least 8 characters long.',
                'max_length' => 'Password cannot exceed 100 characters.',
                'regex_match' => 'Password must contain at least one number, one letter, and one special character.',
            ],
        ];
    }

    // Validasi data input
    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('error', $validation->listErrors());
    }

    // Ambil data dari form
    $data = [
        'nama' => $this->request->getPost('nama'),
        'username' => $this->request->getPost('username')
    ];
    
    // Proses upload foto jika ada
    $foto = $this->request->getFile('foto');
    if ($foto && $foto->isValid()) {
        $fileName = $foto->getRandomName();
        if ($foto->move('uploads', $fileName)) {
            log_message('info', 'Foto berhasil di-upload: ' . $fileName);
            $data['foto'] = $fileName;  // Update data foto jika ada file yang diupload
        } else {
            log_message('error', 'Gagal memindahkan file foto.');
        }
    } else {
        log_message('error', 'Foto tidak valid atau tidak ada.');
    }

    // Update password jika ada input password
    if ($this->request->getPost('password')) {
        $data['password'] = $this->request->getPost('password'); // Simpan password dalam plaintext
    }

    // Update data pengguna di database
    $userModel->update($userId, $data);  // Pastikan ID benar digunakan untuk update

    // Perbarui session dengan data terbaru
    $session = session();
    $session->set('nama', $data['nama']);
    if (isset($data['foto'])) {
        $session->set('foto', $data['foto']); // Perbarui foto di session jika ada
    }

    return redirect()->to('/profile/show')->with('success', 'Profil berhasil diperbarui!');
}


}
