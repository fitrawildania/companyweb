<?php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function login()
    {
        helper(['form']);
        echo view('login');
    }
    
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }

    public function register()
    {
        helper(['form']);
        echo view('register');
    }

    public function store()
{
    helper(['form']);
    $rules = [
        'username' => 'required|max_length[15]',
        'nama' => 'required',
        'password' => [
            'rules' => 'required|min_length[8]|max_length[100]|regex_match[/^(?=.*[0-9])(?=.*[a-zA-Z])(?=.*[\W_]).+$/]',
            'errors' => [
                'required' => 'Password is required.',
                'min_length' => 'Password must be at least 8 characters long.',
                'max_length' => 'Password cannot exceed 100 characters.',
                'regex_match' => 'Password must contain at least one number, one letter, and one special character.',
            ],
        ],
        'foto'=>'uploaded[foto]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
        'role' => 'required|in_list[proyek,pembangkit,transmisi,admin]',
    ];

    if (!$this->validate($rules)) {
        log_message('error', 'Validation failed: ' . print_r($this->validator->getErrors(), true));
        $data['validation'] = $this->validator;
        echo view('register', $data);
    } else {
        $userModel = new UserModel();

        // Simpan file foto yang diunggah
        $file = $this->request->getFile('foto');
        $fileName = $file->getRandomName();
        $file->move(WRITEPATH . 'uploads', $fileName);

        // Directly save the password without hashing
        $data = [
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'), // Save the plain text password
            'nama' => $this->request->getPost('nama'),
            'foto' => $fileName,
            'role' => $this->request->getVar('role')
        ];
        $userModel->save($data);
        return redirect()->to('/login');
    }
}

public function loginAuth()
{
    $session = session();
    $userModel = new UserModel();
    $username = $this->request->getVar('username');
    $password = $this->request->getVar('password');

    // Find user by username
    $data = $userModel->where('username', $username)->first();

    if ($data) {
        $storedPassword = $data['password'];
        log_message('info', 'Password from database: ' . $storedPassword);
        log_message('info', 'Password entered: ' . $password);

        // Directly compare the plain text passwords
        if ($password === $storedPassword) {
            $ses_data = [
                'id'       => $data['id'],
                'username' => $data['username'],
                'role'     => $data['role'],
                'nama'     => $data['nama'],
                'foto'     => $data['foto'], // Assign 'foto' from $data
                'logged_in' => TRUE
            ];
            $session->set($ses_data);
            return redirect()->to('/dashboard');
        } else {
            $session->setFlashdata('msg', 'Wrong Password');
            return redirect()->to('/login');
        }
    } else {
        $session->setFlashdata('msg', 'Username not Found');
        return redirect()->to('/login');
    }
}
// Method untuk mendapatkan data pengguna
public function getUserData()
{
    $session = session();
    $data = [
        'nama' => $session->get('nama'),
        'foto' => $session->get('foto') ?? 'default.jpeg',
    ];
    return $this->response->setJSON($data);
}

}
