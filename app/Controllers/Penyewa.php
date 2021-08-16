<?php

namespace App\Controllers;

use App\Models\SewaModel;

class Penyewa extends BaseController
{
    protected $msewa;
    public function __construct()
    {
        $this->msewa = new SewaModel();
    }
    public function index()
    {
        //membuat var getdata;
        //untuk menyuruh objek agar dapat memanggil fungsi ambilData() di model
        $ambildata = $this->msewa->ambilData();
        //membuat var $data dalam bentuk array sebagai penampung data yang telah diambil di modal

        $data = [
            'dataSewa' => $ambildata,
            'title' => 'Data tamu hotel'
        ];
        return view('pages/penyewa', $data);
    }

    public function actionUpdateValidasi()
    {
        $status = 'Ditolak';
        if ($this->request->getVar('terima') !== null) {
            $status = 'Diterima';
        }
        $data = [
            'id' => $this->request->getVar('id'),
            'status' => $status
        ];
        $this->msewa->updateData('tb_sewa', $data);
        return redirect()->to('penyewa');
    }
}
