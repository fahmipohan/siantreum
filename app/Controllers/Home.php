<?php

namespace App\Controllers;

use App\Models\AntreanModel;
use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        $antreans = $this->antreanModel
            ->select('antrean.*, users.nama as dosen_nama')
            ->join('users', 'antrean.dosen_id = users.id')
            ->paginate(10);

        $data = [
            'title' => 'SIANTREUM',
            'antre' => $antreans,
            'pager' => $this->antreanModel->pager,
        ];

        return view('landingpage', $data);
    }

    public function monitorAntrean()
    {
        $antreans = $this->antreanModel
            ->select('antrean.*, users.nama as dosen_nama')
            ->join('users', 'antrean.dosen_id = users.id')
            ->get()
            ->getResultArray();

        $data = [
            'antre' => $antreans
        ];

        return view('user/monitor-antrean', $data);
    }

}