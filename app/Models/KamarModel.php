<?php

namespace App\Models;

use CodeIgniter\Model;

class KamarModel extends Model
{
    //membuat fungsi untuk mengambil data dari database
    public function ambilData()
    {
        //membuat variabel query;
        //membuat objek db untuk menjalankan fungsi query untuk menselect semuda data dari tabel tb_kamar
        $query = $this->db->query("SELECT * FROM tb_kamar");
        //mengembalikan dinilai data
        return $query->getResult();
    }

    //membuat fungsi utk menerima inputan $table dan $data dari controller
    function simpanData($table, $data)
    {
        //script dari query simpan
        //insert inputan apapun yang di inputkan di $table pada controller
        //insert inputan apapun yang diinputkan di $data pada controller
        $this->db->table($table)->insert($data);

        return true;
    }

    //membuat fungsi utk mengupdate inputan $table, $data dan $where dari controller
    function editData($table, $data, $where)
    {
        //script dari query edit
        //membuat objek $edit untuk meninisasi tabel
        //membuat objek $edit untuk men set data dari kontroller (yg kiri) dan databse (yg kanan)
        $edit = $this->db->table($table);
        //$edit mengirim attribut dari controller yang diinputkan melalui view ke database
        $edit->set('kode_kamar', $data['kode_kamar']);
        $edit->set('nama_kamar', $data['nama_kamar']);
        $edit->set('harga_kamar', $data['harga_kamar']);
        //parameter where sebagai parameter edit
        $edit->where('id', $where['id']);
        //melakukan update data
        $edit->update();

        return true;
    }

    function hapusData($table, $where)
    {
        //script dari query delete
        //insert inputan apapun yang di inputkan di $table pada controller
        //delete inputan pada parameter id $where pada controller
        $this->db->table($table)->delete($where);

        return true;
    }
}
