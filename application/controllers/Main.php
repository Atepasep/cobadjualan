<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');

class Main extends CI_Controller {
	function __construct(){
		parent::__construct();
		// if($this->session->userdata('masukkepayroll')!=true){
			// $url = base_url('login');
			// redirect($url);
		// }
	}
	function index(){
		$header['submodul'] = 1;
		// $header['namalogpayroll']=$this->session->userdata('namalogpayroll');
		$header['modul']='dashboard';
		$this->load->view('header',$header);
		$this->load->view('page/home');
		$this->load->view('footer');
	}
}
