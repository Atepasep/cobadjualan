<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kategori extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		// if($this->session->userdata('masukkepayroll')!=true){
		// $url = base_url('login');
		// redirect($url);
		// }

		$this->load->model('Mkategori');
	}
	function index()
	{
		$header['submodul'] = 2;
		// $header['namalogpayroll']=$this->session->userdata('namalogpayroll');
		$header['modul'] = 'kategori';
		$data['urlsimpan'] = base_url() . 'kategori/simpan';
		$data['urledit'] = base_url() . 'kategori/edit';
		$data['kategori'] = $this->Mkategori->getdata();
		$this->load->view('header', $header);
		$this->load->view('page/kategori', $data);
		$this->load->view('footer');
	}
	function hapus($id)
	{
		$this->Mkategori->hapus($id);
		$url = base_url() . 'kategori';
		redirect($url);
	}
	function simpan()
	{
		$hasil = $this->Mkategori->simpan();
		if ($hasil) {
			$array = $hasil->row_array();
			$this->session->set_flashdata('kodekategori', $array['id']);
			$url = base_url() . 'kategori';
			redirect($url);
		}
	}
	function edit()
	{
		$hasil = $this->Mkategori->edit();
		if ($hasil) {
			$array = $hasil->row_array();
			$this->session->set_flashdata('kodekategori', $array['id']);
			$url = base_url() . 'kategori';
			redirect($url);
		}
	}
	function getdatasatu()
	{
		$id = $_POST['id'];
		$hasil = $this->Mkategori->getdatasatu($id)->result();
		echo json_encode($hasil);
	}
}
