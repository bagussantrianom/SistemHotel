<?php

namespace App\Controllers;

use App\Models\SewaModel;

class Bayar extends BaseController
{

    public function index()
    {
        return view('pages/bayar', session()->getFlashdata('data'));
    }
    public function actionKonfirmasi()
    {
        $file = $this->request->getFile('upload_file');
        $fileName = $file->getRandomName();
        $file->move('uploads/berkas', $fileName);

        $msewa = new SewaModel();
        $data = [
            'id' => $this->request->getVar('id'),
            'path' => $fileName
        ];
        $msewa->uploadDB($data);
        return redirect()->to('/');
    }
}
