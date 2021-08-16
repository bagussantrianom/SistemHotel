<?php

namespace App\Controllers;

use App\Models\SewaModel;

class Sewa extends BaseController
{
    //membuat variabel $msewa
    protected $msewa;

    //membuat tabel tb_sewa untuk mendeklarasi tabel sewa pada database
    protected $table = "tb_sewa";

    public function __construct()
    {
        //membuat objek msewa dengan menginisiasi model sewa
        $this->msewa = new SewaModel();
    }

    public function index()
    {
        //mengirim $data yang telah disimpan ke View untuk menampilkan data data nya
        return view('pages/sewa');
    }

    //membuat method yang berfungsi untuk menyimpan inputan data dari form tambah pada view
    function simpanForm()
    {
        //membuat nama variabel utk mengambil data dari inputan view sesuai dengan 'name'
        $nama = $this->request->getPost("nama");
        $nomor = $this->request->getPost("nomor");
        $email = $this->request->getPost("email");
        $tgl_checkin = $this->request->getPost("tgl_checkin");
        $tgl_checkout = $this->request->getPost("tgl_checkout");
        $dewasa = $this->request->getPost("dewasa");
        $anakanak = $this->request->getPost("anakanak");
        $tipe_kamar = $this->request->getPost("tipe_kamar");

        //membuat array utk menampung variabel ke data
        //yg kiri nama atribute di database, yg kanan nama 'name' dari inputam view
        $data = [
            'nama' => $nama,
            'nomor' => $nomor,
            'email' => $email,
            'tgl_checkin' => $tgl_checkin,
            'tgl_checkout' => $tgl_checkout,
            'dewasa' => $dewasa,
            'anakanak' => $anakanak,
            'tipe_kamar' => $tipe_kamar,
            'status' => "Menunggu"
        ];

        try {
            //membuat variabel baru dengan nama simpan untuk melempar data ke model
            //objek model menjalankan method simpanData yang berada di model dan mengirim data array nya dengan tabel
            $simpan =  $this->msewa->simpanData($this->table, $data);
            //jika simpan berhasil maka :
            if ($simpan) {
                $kamar =  $this->msewa->getKamar($data['tipe_kamar']);
                $merged = array_merge($data, ['id' => $simpan], ['harga_kamar' => $kamar[0]->harga_kamar]);
                session()->setFlashdata('data', $merged);
                return redirect()->to('/bayar')->withInput();
                //jika gagal maka :
            } else {
                echo "<script>alert('Data gagal disimpan'); window.location='" . base_url('/sewa') . "';</script>";
            }
            //jika data sudah ada maka :
        } catch (\Exception $e) {
            echo "<script>alert('Data tidak valid'); window.location='" . base_url('/sewa') . "';</script>";
        }
    }
}
