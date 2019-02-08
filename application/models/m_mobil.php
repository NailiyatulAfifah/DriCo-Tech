<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mobil extends CI_Model {
    public function tampil()
    {
        $tm_mobil=$this->db
                      ->join('kategori','kategori.id_kategori=mobil.id_kategori')
                      ->get('mobil')
                      ->result();
        return $tm_mobil;
    }
    public function data_kategori()
    {
        return $this->db->get('kategori')
                        ->result();
    }
    public function simpan_mobil($file_cover)
    {
        if ($file_cover=="") {
             $object = array(
                'kode_mobil' => $this->input->post('kode_mobil'),
                'tipe_mobil' => $this->input->post('tipe_mobil'), 
                'id_kategori' => $this->input->post('id_kategori'), 
                'tahun' => $this->input->post('tahun'), 
                'stok' => $this->input->post('stok'),
                'harga' => $this->input->post('harga')
             );
        }
        else
        {
            $object = array(
                'kode_mobil' => $this->input->post('kode_mobil'),
                'tipe_mobil' => $this->input->post('tipe_mobil'), 
                'id_kategori' => $this->input->post('id_kategori'), 
                'tahun' => $this->input->post('tahun'), 
                'stok' => $this->input->post('stok'),
                'harga' => $this->input->post('harga')
             );
        }
        return $this->db->insert('mobil', $object);
    }

    public function detail($a)
    {
        $tm_mobil=$this->db
                      ->join('kategori', 'kategori.id_kategori=mobil.id_kategori')
                      ->where('kode_mobil', $a)
                      ->get('mobil')
                      ->row();
        return $tm_mobil;

    }
    public function edit_mobil()
    {
        $data = array(
                'kode_mobil' => $this->input->post('kode_mobil'), 
                'tipe_mobil' => $this->input->post('tipe_mobil'), 
                'id_kategori' => $this->input->post('id_kategori'), 
                'tahun' => $this->input->post('tahun'), 
                'stok' => $this->input->post('stok'), 
                'harga' => $this->input->post('harga')
        );
        return $this->db->where('kode_mobil', $this->input->post('kode_mobil_lama'))
                        ->update('mobil', $data);
    }

    public function hapus_mobil($kode_mobil='')
    {
        return $this->db->where('kode_mobil', $kode_mobil)
                        ->delete('mobil');
    }
}
?>