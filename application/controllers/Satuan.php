<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Satuan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		// if($this->session->userdata('masukkepayroll')!=true){
		// $url = base_url('login');
		// redirect($url);
		// }

		$this->load->model('Msatuan');
	}
	function index()
	{
		$header['submodul'] = 2;
		// $header['namalogpayroll']=$this->session->userdata('namalogpayroll');
		$header['modul'] = 'satuan';
		$data['urlsimpan'] = base_url() . 'satuan/simpan';
		$data['urledit'] = base_url() . 'satuan/edit';
		$data['satuan'] = $this->Msatuan->getdata();
		$this->load->view('header', $header);
		$this->load->view('page/satuan', $data);
		$this->load->view('footer');
	}
	function hapus($id)
	{
		$this->Msatuan->hapus($id);
		$url = base_url() . 'satuan';
		redirect($url);
	}
	function simpan()
	{
		$hasil = $this->Msatuan->simpan();
		if ($hasil) {
			$array = $hasil->row_array();
			$this->session->set_flashdata('kodesatuan', $array['id']);
			$url = base_url() . 'satuan';
			redirect($url);
		}
	}
	function edit()
	{
		$hasil = $this->Msatuan->edit();
		if ($hasil) {
			$array = $hasil->row_array();
			$this->session->set_flashdata('kodesatuan', $array['id']);
			$url = base_url() . 'satuan';
			redirect($url);
		}
	}
	function getdatasatu()
	{
		$id = $_POST['id'];
		$hasil = $this->Msatuan->getdatasatu($id)->result();
		echo json_encode($hasil);
	}
}
