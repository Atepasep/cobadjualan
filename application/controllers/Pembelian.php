<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pembelian extends CI_Controller
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
		$this->load->model('Mpembelian');
	}
	function index()
	{
		$header['submodul'] = 3;
		// $header['namalogpayroll']=$this->session->userdata('namalogpayroll');
		$header['modul'] = 'pembelian';
		$data['urlsimpan'] = base_url() . 'pembelian/simpan';
		$data['urledit'] = base_url() . 'pembelian/edit';
		$data['barang'] = $this->Mbarang->getdata();
		$data['satuan'] = $this->Msatuan->getdata();
		$data['kategori'] = $this->Mkategori->getdata();
		if(!$this->session->userdata('kodebeli')){
		$milliseconds = floor(microtime(true) * 1000);
		$this->session->set_userdata('kodebeli','BL'.$milliseconds);
		}
		$this->load->view('header', $header);
		$this->load->view('page/pembelian', $data);
		$this->load->view('footer');
	}
	function carisupplier(){
		$this->load->view('modal/carisupplier');
	}
	public function caridatasupplier()
	{
		$data = $_POST['kodd'];
		// $jumlah = $this->m_pembelian->caridatasupplier($data)->result();
		$hasil = $this->Mpembelian->caridatasupplier($data)->result_array();
		$html = '';
		// if($jumlah->num_rows > 0){
		foreach ($hasil as $data) {
			// $selek = $data['id']==$grup ? "selected" : "";
			$html .= "<tr class='tabel-bodi text-hitam'><td>" . $data['kodepos'] . "</td><td>" . $data['nama'] . "</td><td>" . $data['alamat'] . "</td><td>" . $data['cp'] . "</td>";
			$html .= "<td style='text-align: center;'><a href='#' class='btn btn-sm bg-info flat text-hitam font-kecil-13' id='pilihsupplier' rel='" . $data['id'] . "' >Pilih</a></td></tr>";
		}
		// }else{
		// $html .= "<tr class='tabel-bodi'><td style='vertical-align: middle; text-align: center;' colspan='5'>Data tidak ditemukan</td></tr>";
		// }
		$cocok  = array('datagroup' => $html);
		echo json_encode($cocok);
	}
	public function getdatasupplier(){
		$id = $_POST['kodd'];
		$hasil = $this->Mpembelian->getdatasupplier($id)->result();
		echo json_encode($hasil);
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
