<?php

namespace App\Models;

use CodeIgniter\Model;

class DataAntreModel extends Model
{
    protected $table            = 'data_antrean';
    protected $primaryKey       = 'id_data_antrean';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kode_verif', 'antrean_id', 'no_urut'
    ];

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

    public function getAntreanByUserId($id)
    {
        return $this->db->table('data_antrean')
            ->select('data_antrean.*')
            ->join('antrean', 'data_antrean.id_antrean = antrean.id_antrean')
            ->where('antrean.id_users', $id)
            ->get()
            ->getResultArray();
    }

    public function countAntreanByUserId($id)
    {
        return $this->db->table('data_antrean')
            ->select('data_antrean.*')
            ->join('antrean', 'data_antrean.id_antrean = antrean.id_antrean')
            ->where('antrean.id_users', $id)
            ->countAllResults();
    }

    public function resetQueue($id)
    {
        $antrean_id = $this->db->table('antrean')
            ->select('id_antrean')
            ->where('id_users', $id)
            ->get()
            ->getRow()->id;


        // Delete rows from data_antrean based on antrean_id
        return $this->db->table('data_antrean')
            ->where('id_antrean', $antrean_id)
            ->delete();
    }
}