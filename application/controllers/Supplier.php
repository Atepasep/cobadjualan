<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Supplier extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		// if($this->session->userdata('masukkepayroll')!=true){
		// $url = base_url('login');
		// redirect($url);
		// }

		$this->load->model('Msupplier');
	}
	function index()
	{
		$header['submodul'] = 2;
		// $header['namalogpayroll']=$this->session->userdata('namalogpayroll');
		$header['modul'] = 'supplier';
		$data['urlsimpan'] = base_url() . 'supplier/simpan';
		$data['urledit'] = base_url() . 'supplier/edit';
		$data['supplier'] = $this->Msupplier->getdata();
		$this->load->view('header', $header);
		$this->load->view('page/supplier', $data);
		$this->load->view('footer');
	}
	function hapus($id)
	{
		$this->Msupplier->hapus($id);
		$url = base_url() . 'supplier';
		redirect($url);
	}
	function simpan()
	{
		$hasil = $this->Msupplier->simpan();
		if ($hasil) {
			$array = $hasil->row_array();
			$this->session->set_flashdata('kodesupplier', $array['id']);
			$url = base_url() . 'supplier';
			redirect($url);
		}
	}
	function edit()
	{
		$hasil = $this->Msupplier->edit();
		if ($hasil) {
			$array = $hasil->row_array();
			$this->session->set_flashdata('kodesupplier', $array['id']);
			$url = base_url() . 'supplier';
			redirect($url);
		}
	}
	function getdatasatu()
	{
		$id = $_POST['id'];
		$hasil = $this->Msupplier->getdatasatu($id)->result();
		echo json_encode($hasil);
	}
}
