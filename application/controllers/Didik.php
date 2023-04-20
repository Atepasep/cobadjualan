<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');

class Didik extends CI_Controller {
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masukkepayroll')!=true){
			$url = base_url('login');
			redirect($url);
		}else{
			if(substr($this->session->userdata('modulpayroll'),1,1)!='1'){
				$this->session->set_flashdata('msg','akseserror');
				$url = base_url('main');
				redirect($url);
			}
		}
		$this->load->model('mdidik');
	}
	function index(){
		$header['submodul'] = 2;
		$header['namalogpayroll']=$this->session->userdata('namalogpayroll');
		$data['datadidik'] = $this->mdidik->getdata()->result_array();
		$data['urlsimpan'] = base_url().'didik/simpandidik';
		$data['urledit'] = base_url().'didik/editdidik';
		$footer['modul'] = 'didik';
		$this->load->view('header',$header);
		$this->load->view('page/didik',$data);
		$this->load->view('footer',$footer);
	}
	function clear(){
		$this->session->set_flashdata('kodeid','');
		$url = base_url().'didik';
		redirect($url);
	}
	function getdatasatu(){
		$id = $_POST['id'];
		$hasil = $this->mdidik->getdatasatu($id)->result();
		echo json_encode($hasil);
	}
	function simpandidik(){
		$hasil = $this->mdidik->simpandidik();
		if($hasil->num_rows() > 0){
			$jadi = $hasil->row(); //$this->mdidik->getdatabykode($kode)->row();
			$this->session->set_flashdata('kodeid',$jadi->id);
			$url = base_url().'didik';
			redirect($url);
		}
	}
	function editdidik(){
		$hasil = $this->mdidik->editdidik();
		if($hasil->num_rows() > 0){
			$jadi = $hasil->row(); //$this->mdidik->getdatabykode($kode)->row();
			$this->session->set_flashdata('kodeid',$jadi->id);
			$url = base_url().'didik';
			redirect($url);
		}		
	}
	function hapusdidik($id){
		$this->mdidik->hapusdidik($id);
		$url = base_url().'didik';
		redirect($url);
	}
}
