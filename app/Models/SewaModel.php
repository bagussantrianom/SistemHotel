<?php

namespace App\Models;

use CodeIgniter\Model;

class SewaModel extends Model
{


    //membuat fungsi untuk mengambil data dari database
    public function ambilData()
    {
        //membuat variabel query;
        //membuat objek db untuk menjalankan fungsi query untuk menselect semuda data dari tabel tb_kamar
        $query = $this->db->query("SELECT * FROM tb_sewa");
        //mengembalikan dinlai data
        return $query->getResult();
    }

    //membuat fungsi utk menerima inputan $table dan %data dari controller
    function simpanData($table, $data)
    {
        //script dari query simpan
        //insert inputan apapun yang di inputkan di $table pada controller
        //insert inputan apapun yang diinputkan di $data pada controller
        $this->db->table($table)->insert($data);
        return $this->db->insertID();
    }

    function getKamar($nama)
    {
        return $this->db->table('tb_kamar')->getWhere(['nama_kamar' => $nama])->getResult();
    }

    function updateData($table, $data)
    {
        $db = $this->db->table($table);
        $db->set('status', $data['status']);
        $db->where('id', $data['id']);
        $db->update();
    }

    function uploadDB($data)
    {
        $db = $this->db->table('tb_sewa');
        $db->set('bukti_bayar', $data['path']);
        $db->where('id', $data['id']);
        $db->update();
    }
}
