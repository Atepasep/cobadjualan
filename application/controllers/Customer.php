<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		// if($this->session->userdata('masukkepayroll')!=true){
		// $url = base_url('login');
		// redirect($url);
		// }

		$this->load->model('Mcustomer');
	}
	function index()
	{
		$header['submodul'] = 2;
		// $header['namalogpayroll']=$this->session->userdata('namalogpayroll');
		$header['modul'] = 'customer';
		$data['urlsimpan'] = base_url() . 'customer/simpan';
		$data['urledit'] = base_url() . 'customer/edit';
		$data['identitas'] = $this->Mcustomer->getdataidentitas();
		$data['customer'] = $this->Mcustomer->getdata();
		$this->load->view('header', $header);
		$this->load->view('page/customer', $data);
		$this->load->view('footer');
	}
	function hapus($id)
	{
		$this->Mcustomer->hapus($id);
		$url = base_url() . 'customer';
		redirect($url);
	}
	function simpan()
	{
		$hasil = $this->Mcustomer->simpan();
		if ($hasil) {
			$array = $hasil->row_array();
			$this->session->set_flashdata('kodecustomer', $array['id']);
			$url = base_url() . 'customer';
			redirect($url);
		}
	}
	function edit()
	{
		$hasil = $this->Mcustomer->edit();
		if ($hasil) {
			$array = $hasil->row_array();
			$this->session->set_flashdata('kodecustomer', $array['id']);
			$url = base_url() . 'customer';
			redirect($url);
		}
	}
	function getdatasatu()
	{
		$id = $_POST['id'];
		$hasil = $this->Mcustomer->getdatasatu($id)->result();
		echo json_encode($hasil);
	}
	function kode()
	{
		echo carikodecustomer();
	}
}
