<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Barang extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		// if($this->session->userdata('masukkepayroll')!=true){
		// $url = base_url('login');
		// redirect($url);
		// }

		$this->load->model('Mbarang');
		$this->load->model('Msatuan');
		$this->load->model('Mkategori');
	}
	function index()
	{
		$header['submodul'] = 2;
		// $header['namalogpayroll']=$this->session->userdata('namalogpayroll');
		$header['modul'] = 'barang';
		$data['urlsimpan'] = base_url() . 'barang/simpan';
		$data['urledit'] = base_url() . 'barang/edit';
		$data['barang'] = $this->Mbarang->getdata();
		$data['satuan'] = $this->Msatuan->getdata();
		$data['kategori'] = $this->Mkategori->getdata();
		$data['kode'] = carikodebarang();
		$this->load->view('header', $header);
		$this->load->view('page/barang', $data);
		$this->load->view('footer');
	}
	function hapus($id)
	{
		$this->Mbarang->hapus($id);
		$url = base_url() . 'barang';
		redirect($url);
	}
	function simpan()
	{
		$hasil = $this->Mbarang->simpan();
		if ($hasil) {
			$array = $hasil->row_array();
			$this->session->set_flashdata('kodebarang', $array['id']);
			$url = base_url() . 'barang';
			redirect($url);
		}else{
			$this->session->set_flashdata('msg','akseserror');
			$url = base_url() . 'barang';
			redirect($url);
		}
	}
	function edit()
	{
		$hasil = $this->Mbarang->edit();
		if ($hasil) {
			$array = $hasil->row_array();
			$this->session->set_flashdata('kodebarang', $array['id']);
			$url = base_url() . 'barang';
			redirect($url);
		}
	}
	function getdatasatu()
	{
		$id = $_POST['id'];
		$hasil = $this->Mbarang->getdatasatu($id)->result();
		echo json_encode($hasil);
	}
	function getdatabykode(){
		$kode = $_POST['kod'];
		$hasil = $this->Mbarang->getdatabykode($kode)->result();
		echo json_encode($hasil);
	}
	function kode()
	{
		echo carikodebarang();
	}
}
