<?php

namespace App\Models;

use CodeIgniter\Model;


class DaftarMahasiswaModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id_users';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_lengkap', 'nim', 'kontak', 'email', 'tgl_rencana', 'username', 'password', 'id_role', 'id_jenis_kelamin', 'id_fakultas_mahasiswa', 'id_departemen_mahasiswa', 'id_prodi_departemen', 'status_approval'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    
     // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
    
    public function getMahasiswaByRole($role)
    {
        return $this->where('id_role', $role)->paginate(5);
    }

    public function getTotal($role)
    {
        return $this->where('id_role', $role)->countAllResults();
    }

    public function getUserById($id_users)
    {
        return $this->find($id_users);
    }

    public function createUser($data)
    {
        return $this->insert($data);
    }

    public function deleteUser($id_users)
    {
        return $this->delete($id_users);
    }

    public function updateUser($id_users, $data)
    {
        return $this->update($id_users, $data);
    }

    public function getPendingApprovals()
    {
        return $this->where('status_approval', 'pending')->findAll();
    }

    public function approveUser($id_users)
    {
        return $this->update($id_users, ['status_approval' => 'approved']);
    }

    public function rejectUser($id_users)
    {
        return $this->update($id_users, ['status_approval' => 'rejected']);
    }

    public function getStatusApproval($id_users)
    {
        return $this->select('status_approval')->where('id_users', $id_users)->first();
    }
}