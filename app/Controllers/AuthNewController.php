<?php


Class AuthNewController extends Controller {
    public function regist (){
        $data = array (
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'nim' => $this->request->getVar('nim'),
            'email' => $this->request->getVar('email'),
            'role' => $this->request->getVar('role'),
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
        );
        $model = new DaftarMahasiswaModel;
        $model -> insert ($data);
        return redirect()->to('');
    }

}