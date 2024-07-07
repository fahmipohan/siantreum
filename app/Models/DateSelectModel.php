<?php

namespace App\Models;

use CodeIgniter\Model;

class DateSelectModel extends Model
{
    protected $table            = 'tanggal_pilih';
    protected $primaryKey       = 'id_tanggal_pilih';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['tanggal_terpilih', 'id_users'];

    public function countUsersByDate($date)
    {
        return $this->where('tanggal_terpilih', $date)->countAllResults();
    }

    public function addUserDateSelection($data)
    {
        return $this->insert($data);
    }
}