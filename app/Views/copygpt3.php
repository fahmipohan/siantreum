public function registrasi()
{
    // Mendefinisikan aturan validasi
    $validationRules = [
        'nama_lengkap' => 'required',
        'nim' => 'required|numeric',
        'email' => 'required|valid_email',
        'kontak' => 'required|numeric',
        'role' => 'required',
        'username' => 'required|is_unique[users.username]',
        'password' => 'required|min_length[6]',
        'agree' => 'required',
    ];

    // Melakukan validasi input
    if ($this->validate($validationRules)) {
        // Jika validasi berhasil, persiapkan data untuk disimpan
        $data = [
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'nim' => $this->request->getVar('nim'),
            'email' => $this->request->getVar('email'),
            'kontak' => $this->request->getVar('kontak'),
            'role' => $this->request->getVar('role'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ];

        // Menyimpan data ke database
        $this->daftarmahasiswaModel->insert($data);
        
        // Menyimpan pesan sukses di session
        session()->setFlashdata('success', 'Berhasil menambahkan data. Silakan login.');
        
        // Mengarahkan pengguna ke halaman login
        return redirect()->to('login');
    } else {
        // Jika validasi gagal, simpan pesan error di session
        session()->setFlashdata('errors', $this->validator->listErrors());
        
        // Mengembalikan ke halaman registrasi dengan data validasi
        $data = [
            'title' => 'Register',
            'validation' => $this->validator,
        ];
        
        return view('register', $data);
    }
}
