<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftarMahasiswaModel extends Model
{
    protected $table            = 'daftar_mahasiswa';
    protected $primaryKey       = 'id_daftar_mahasiswa';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_lengkap', 'nim', 'email', 'username', 'password', 'id_role'];

    protected bool $allowEmptyInserts = false;

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    public function getMahasiswaByRole($role)
    {
        return $this->where('id_role', $role)->paginate(5);
    }

    public function getTotal($role)
    {
        return $this->where('id_role', $role)->countAllResults();
    }

    public function getUserById($id)
    {
        return $this->find($id);
    }

    public function createUser($data)
    {
        return $this->insert($data);
    }

    public function deleteUser($id)
    {
        return $this->delete($id);
    }

    public function updateUser($id, $data)
    {
        return $this->update($id, $data);
    }
}