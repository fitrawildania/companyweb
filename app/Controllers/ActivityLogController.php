<?php
namespace App\Controllers;
use App\Models\ActivityLogModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class ActivityLogController extends Controller
{

public function create()
{
    $validation = \Config\Services::validation();
    $activityLogModel = new ActivityLogModel();

    // Validasi input
    $validation->setRules([
        'username' => 'required|max_length[20]|is_unique[users.username]',
        'password' => [
            'rules' => 'required|min_length[8]|max_length[10]|regex_match[/^(?=.*[0-9])(?=.*[a-zA-Z])(?=.*[\W_]).+$/]',
            'errors' => [
                'required' => 'Password is required.',
                'min_length' => 'Password must be at least 8 characters long.',
                'max_length' => 'Password cannot exceed 10 characters.',
                'regex_match' => 'Password must contain at least one number, one letter, and one special character.',
            ],
        ],
        'role'     => 'required|in_list[proyek,pembangkit,transmisi,admin]',
    ]);

    if ($validation->withRequest($this->request)->run()) {
        // Buat pengguna baru
        $userModel = new UserModel();
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => $this->request->getPost('role'),
        ];

        if ($userModel->insert($data)) {
            // Catat aktivitas
            $activityLogModel->insert([
                'user_id' => session()->get('user_id'),  // Asumsikan user_id disimpan di session
                'action' => 'Created User',
                'details' => 'Created a new user: ' . $data['username'],
            ]);

            return redirect()->back()->with('success', 'Akun pengguna berhasil dibuat.');
        }
    }

    return redirect()->back()->with('error', 'Gagal membuat akun pengguna.');
}
}