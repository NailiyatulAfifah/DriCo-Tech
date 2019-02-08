<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobil extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('login')!=TRUE) {
			redirect('Admin/login','refresh');
		}
		$this->load->model('m_mobil','mobil');
	}

	public function index()
	{
		$data['tampil_mobil']=$this->mobil->tampil();
		$data['kategori']=$this->mobil->data_kategori();
		$data['konten']="v_mobil";
		$data['judul']="Daftar mobil";
		$this->load->view('template', $data);
	}

	public function toko()
	{
		$data['tampil_mobil']=$this->mobil->tampil();
		$data['kategori']=$this->mobil->data_kategori();
		$data['konten']="toko";
		$data['judul']="DriCo-Tech";
		$this->load->view('template', $data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('kode_mobil', 'kode_mobil', 'trim|required');
		$this->form_validation->set_rules('tipe_mobil', 'tipe_mobil', 'trim|required');
		$this->form_validation->set_rules('id_kategori', 'id_kategori', 'trim|required');
		$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
		$this->form_validation->set_rules('stok', 'stok', 'trim|required');
		$this->form_validation->set_rules('harga', 'harga', 'trim|required');
	}

	public function edit_mobil($id)
	{
		$data=$this->mobil->detail($id);
		echo json_encode($data);
	}

	public function hapus($kode_mobil='')
	{
		if ($this->mobil->hapus_mobil($kode_mobil)) 
		{
			$this->session->set_flashdata('pesan', 'Sukses Hapus mobil');
			redirect('mobil','refresh');
		}
		else
		{
			$this->session->set_flashdata('pesan', 'Gagal Hapus mobil');
			redirect('mobil','refresh');
		}
	}
}
?>