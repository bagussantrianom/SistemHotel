<?php

namespace App\Controllers;

use App\Models\KamarModel;

class Kamar extends BaseController
{
    //membuat variabel $kamar
    protected $mkamar;

    protected $table = "tb_kamar";

    public function __construct()
    {
        //membuat objek mkamar dengan menginisiasi model kamar
        $this->mkamar = new KamarModel();
    }

    public function index()
    {
        //membuat var getdata;
        //untuk menyuruh objek agar dapat memanggil fungsi ambilData() di model
        $ambildata = $this->mkamar->ambilData();

        //membuat var $data dalam bentuk array sebagai penampung data yang telah diambil di modal
        $data = [
            'title' => 'Kelola Kamar',
            //mengambil fungsi
            'dataKamar' => $ambildata
        ];

        //mengirim $data yang telah disimpan ke View untuk menampilkan data data nya
        return view('pages/kamar', $data);
    }

    //membuat method yang berfungsi untuk menyimpan inputan data dari form tambah pada view
    function simpanForm()
    {
        //membuat nama variabel utk mengambil data dari inputan view sesuai dengan 'name'
        $kodeKamar = $this->request->getPost("kodeKamar");
        $namaKamar = $this->request->getPost("namaKamar");
        $hargaKamar = $this->request->getPost("hargaKamar");

        //membuat array utk menampung variabel ke data untuk langsung masuk ke simpan
        //yg kiri nama atribute di database, yg kanan nama 'name' dari inputan view
        $data = [
            'kode_kamar' => $kodeKamar,
            'nama_kamar' => $namaKamar,
            'harga_kamar' => $hargaKamar,
        ];

        try {
            //membuat variabel baru dengan nama simpan untuk melempar data ke model
            //objek model menjalankan method simpanData yang berada di model dan mengirim data array nya dengan tabel
            $simpan =  $this->mkamar->simpanData($this->table, $data);
            //jika simpan berhasil maka :
            if ($simpan) {
                //menjalankan script alert dan me redirect ke controller /kamar
                echo "<script>alert('Data berhasil disimpan'); window.location='" . base_url('/kamar') . "';</script>";
                //jika gagal maka :
            } else {
                echo "<script>alert('Data gagal disimpan'); window.location='" . base_url('/kamar') . "';</script>";
            }
            //jika data sudah ada maka :
        } catch (\Exception $e) {
            echo "<script>alert('Data sudah ada'); window.location='" . base_url('/kamar') . "';</script>";
        }
    }

    //membuat method yang berfungsi untuk menyimpan inputan data dari form tambah pada view
    function editForm()
    {
        //membuat nama variabel utk mengambil data dari inputan view sesuai dengan 'name'
        $id = $this->request->getPost("id_kamar");
        $kodeKamar = $this->request->getPost("kodeKamar");
        $namaKamar = $this->request->getPost("namaKamar");
        $hargaKamar = $this->request->getPost("hargaKamar");
        //membuat array utk menampung variabel ke data untuk langsung masuk ke edit
        //yg kiri nama atribute di database, yg kanan nama 'name' dari inputam view
        $data = [
            'kode_kamar' => $kodeKamar,
            'nama_kamar' => $namaKamar,
            'harga_kamar' => $hargaKamar,
        ];
        $where = ['id' => $id];

        try {
            //membuat variabel baru dengan nama edit untuk melempar data ke model
            //objek model menjalankan method editData yang berada di model dan mengirim data array nya dengan tabel
            $edit =  $this->mkamar->editData($this->table, $data, $where);
            //jika edit berhasil maka :h
            if ($edit) {
                //menjalankan script alert dan me redirect ke controller /kamar
                echo "<script>alert('Data berhasil diedit'); window.location='" . base_url('/kamar') . "';</script>";
                //jika gagal maka :
            } else {
                echo "<script>alert('Data gagal diedit'); window.location='" . base_url('/kamar') . "';</script>";
            }
            //jika data sudah ada maka :
        } catch (\Exception $e) {
            echo "<script>alert('Data sudah ada'); window.location='" . base_url('/kamar') . "';</script>";
        }
    }


    //membuat method yang berfungsi untuk menghapus data dari view
    //menerima parameter dari view yaitu kode kamar
    function hapusData($kodeKamar)
    {
        //membuat variabel untuk menampung data where id dari inputan view
        //yg kiri nama atribute di database, yg kanan nama 'name' dari inputan view
        $where = ['kode_kamar' => $kodeKamar];

        try {
            //membuat variabel baru dengan nama hapus untuk melempar data ke model
            //objek model menjalankan method hapusData yang berada di model dan mengirim data array nya dengan tabel
            //menambahkam parameter where sebagai parameter menggunakan id
            $hapus =  $this->mkamar->hapusData($this->table, $where);
            //jika hapus berhasil maka :
            if ($hapus) {
                //menjalankan script alert dan me redirect ke controller /kamar
                echo "<script>alert('Data berhasil dihapus'); window.location='" . base_url('/kamar') . "';</script>";
                //jika gagal maka :
            } else {
                echo "<script>alert('Data gagal dihapus'); window.location='" . base_url('/kamar') . "';</script>";
            }
            //jika data sudah ada maka :
        } catch (\Exception $e) {
            echo "<script>alert('Data sudah ada'); window.location='" . base_url('/kamar') . "';</script>";
        }
    }
}
