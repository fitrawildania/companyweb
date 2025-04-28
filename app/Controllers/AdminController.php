<?php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AdminController extends Controller
{
    protected $userModel;
    public function users()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();
        return view('users', $data);
    }
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function create()
{
    $validation = \Config\Services::validation();

    $rules = [
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
        'role' => 'required|in_list[proyek,pembangkit,transmisi,admin]',
    ];

    if (!$this->validate($rules)) {
        $errors = $validation->getErrors();
        $errorString = implode('<br>', $errors);
        return redirect()->back()->withInput()->with('error', $errorString);
    }

    $userModel = new UserModel();

    $data = [
        'username' => $this->request->getPost('username'),
        'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        'role'     => $this->request->getPost('role'),
    ];

    if ($userModel->insert($data)) {
        return redirect()->back()->with('success', 'Akun pengguna berhasil dibuat.');
    } else {
        return redirect()->back()->with('error', 'Gagal membuat akun pengguna.');
    }
    }

    public function update($id)
    {
        $user = $this->userModel->find($id);

        if (!$user) {
            return redirect()->to('/users')->with('error', 'User not found.');
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'role'     => $this->request->getPost('role'),
        ];

        if ($this->userModel->update($id, $data)) {
            return redirect()->to('/users')->with('success', 'User updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update user.');
        }
    }

    public function delete($id)
    {
        $user = $this->userModel->find($id);

        if (!$user) {
            return redirect()->to('/users')->with('error', 'User not found.');
        }

        if ($this->userModel->delete($id)) {
            return redirect()->to('/users')->with('success', 'User deleted successfully.');
        } else {
            return redirect()->to('/users')->with('error', 'Failed to delete user.');
        }
    }
}