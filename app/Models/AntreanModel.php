<?php

namespace App\Models;

use CodeIgniter\Model;

class AntreanModel extends Model
{
    protected $table            = 'antrean';
    protected $primaryKey       = 'id_antrean';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['dosen_id', 'tanggal', 'keterangan', 'jumlah_antrean', 'maks_antrean', 'current_antre'];

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

    public function createAntrean($data)
    {
        return $this->insert($data);
    }

    public function deleteAntrean($id)
    {
        return $this->delete($id);
    }

    public function editAntrean($id, $data)
    {
        return $this->update($id, $data);
    }

    public function getAntreanByUserId($id)
    {
        return $this->where('dosen_id', $id)->paginate(5);
    }

    public function updateQueue($id)
    {
        $antrean = $this->where('dosen_id', $id)->first();

        if (!$antrean) {
            return false;
        }

        $current_antre = $antrean['current_antre'] + 1;

        $data = [
            'current_antre' => $current_antre
        ];

        try{
            $this->where('dosen_id', $id)->update($data);
            return true;
        } catch(\Exception $e){
            return false;
        }
    }
}