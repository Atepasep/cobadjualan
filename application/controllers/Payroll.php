<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Payroll extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		// if ($this->session->userdata('masukkepayroll') != true) {
		// 	$url = base_url('login');
		// 	redirect($url);
		// } else {
		// 	if (substr($this->session->userdata('modulpayroll'), 7, 1) != '1') {
				$url = base_url('main');
				redirect($url);
		// 	}
		// }
	}
	function index()
	{
		$header['submodul'] = 4;
		$header['namalogpayroll'] = $this->session->userdata('namalogpayroll');
		if (!$this->session->flashdata('kodepayroll')) {
			$this->session->set_flashdata('bulanperiode', date('m'));
			$this->session->set_flashdata('tahunperiode', date('Y'));
			$this->session->set_flashdata('kodepayroll', 'SALARY');
			$this->session->set_flashdata('namapt', 'S');
			$this->session->set_flashdata('namaloc', '');
		} else {
			$this->session->set_flashdata('bulanperiode', $this->session->flashdata('bulanperiode'));
			$this->session->set_flashdata('tahunperiode', $this->session->flashdata('tahunperiode'));
			$this->session->set_flashdata('kodepayroll', $this->session->flashdata('kodepayroll'));
			$this->session->set_flashdata('namapt', $this->session->flashdata('namapt'));
			$this->session->set_flashdata('namaloc', $this->session->flashdata('namaloc'));
		}
		$data['datapayroll'] = $this->mpayroll->getdata()->result_array();
		$data['jmthp'] = $this->mpayroll->getdatathp()->row_array();
		$data['count'] = count($data['datapayroll']);
		$data['hitungkirim'] = $this->mpayroll->gethitungkirim()->result_array();
		$data['cekrilis'] = $this->mpayroll->cekrilis();
		$footer['modul'] = 'payroll';
		$this->load->view('header', $header);
		$this->load->view('page/payroll', $data);
		$this->load->view('footer', $footer);
	}
	function clear()
	{
		$this->session->set_flashdata('bulanperiode', $this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode', $this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll', $this->session->flashdata('kodepayroll'));
		$this->session->set_flashdata('namapt', 'S');
		$this->session->set_flashdata('namaloc', '');
		$url = base_url() . 'payroll';
		redirect($url);
	}
	function prosespayroll($id = 0)
	{
		$header['submodul'] = 4;
		$header['namalogpayroll'] = $this->session->userdata('namalogpayroll');
		$this->session->set_flashdata('bulanperiode', $this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode', $this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll', $this->session->flashdata('kodepayroll'));
		$this->session->set_flashdata('namapt', $this->session->flashdata('namapt'));
		$data['kodepayroll'] = $this->session->flashdata('kodepayroll');
		$data['bulanperiode'] = $this->session->flashdata('bulanperiode');
		$data['tahunperiode'] = $this->session->flashdata('tahunperiode');
		if ($id == 1) {
			$data['urlnya'] = base_url() . 'payroll/simpanpayroll/1';
			$data['tombol'] = "Reset dan Update";
		} else {
			$data['urlnya'] = base_url() . 'payroll/simpanpayroll';
			$data['tombol'] = "Proses";
		}
		$footer['modul'] = 'payroll';
		$this->load->view('header', $header);
		$this->load->view('page/prosespayroll', $data);
		$this->load->view('footer', $footer);
	}
	function simpanpayroll($id = 0)
	{
		$hasil = $this->mpayroll->simpanpayroll($id);
		$this->session->set_flashdata('bulanperiode', $this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode', $this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll', $this->session->flashdata('kodepayroll'));
		$this->session->set_flashdata('namapt', $this->session->flashdata('namapt'));
		$url = base_url() . 'payroll';
		redirect($url);
	}
	function ubahperiode()
	{
		$kode = $_POST['kode'];
		$bulan = $_POST['bulan'];
		$tahun = $_POST['tahun'];
		$pt = $_POST['pt'];
		$loc = $_POST['loc'];
		$this->session->set_flashdata('kodepayroll', $kode);
		$this->session->set_flashdata('bulanperiode', $bulan);
		$this->session->set_flashdata('tahunperiode', $tahun);
		$this->session->set_flashdata('namapt', $pt);
		$this->session->set_flashdata('namaloc', $loc);
		echo true;
	}
	function getdatasatu()
	{
		$id = $_POST['id'];
		$hasil = $this->mpengguna->getdatasatu($id)->result();
		echo json_encode($hasil);
	}
	function simpangaji()
	{
		$hasil = $this->mmastergaji->simpangaji();
		if ($hasil->num_rows() > 0) {
			$jadi = $hasil->row(); //$this->mpengguna->getdatabykode($kode)->row();
			$this->session->set_flashdata('kodeid', $jadi->id);
			$url = base_url() . 'mastergaji';
			redirect($url);
		}
	}
	function getview($id)
	{
		$this->session->set_flashdata('bulanperiode', $this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode', $this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll', $this->session->flashdata('kodepayroll'));
		$this->session->set_flashdata('namapt', $this->session->flashdata('namapt'));
		$temp = $this->mpayroll->getdatasatu($id)->row_array();
		$data['id'] = $id;
		$data['noinduk'] = $temp['noinduk'];
		$data['nama'] = $temp['nama'];
		$data['bagian'] = $temp['bagian'];
		$data['jabatan'] = $temp['jabatan'];
		$data['gaji'] = $temp['gaji'];
		$data['tunjab'] = $temp['tunjab'];
		$data['tunskill'] = $temp['tunskill'];
		$data['astek'] = $temp['astek'];
		$data['jp'] = $temp['jp'];
		$data['other'] = $temp['other'];
		$data['bijab'] = $temp['bijab'];
		$data['ptkp'] = $temp['ptkp'];
		$data['pkp'] = $temp['pkp'];
		$data['pphyear'] = $temp['pphyear'];
		$data['pphmonth'] = $temp['pphmonth'];
		$data['pphgovmnt'] = $temp['pphgovmnt'];
		$data['meal'] = $temp['meal'];
		$data['transport'] = $temp['transport'];
		$data['koperasi'] = $temp['koperasi'];
		$data['thp'] = $temp['thp'];
		$data['loan'] = $temp['loan'];
		$data['bpjs'] = $temp['bpjs'];
		$data['realthp'] = $temp['realthp'];
		$data['biayabank'] = $temp['biayabank'];
		$data['jamsostek'] = $temp['jamsostek'];
		$data['total'] = $temp['total'];
		$data['editke'] = $temp['editke'];
		$data['bank'] = $temp['bank'];
		$data['bankadr'] = $temp['bankadr'];
		$data['rekname'] = $temp['rekname'];
		$data['norek'] = $temp['norek'];
		$data['loc'] = $temp['loc'];
		$data['prc_bonus'] = $temp['prc_bonus'];
		$data['thr_bonus'] = $temp['thr_bonus'];
		$this->load->view('page/viewdetail', $data);
	}
	function editview($id)
	{
		$this->session->set_flashdata('bulanperiode', $this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode', $this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll', $this->session->flashdata('kodepayroll'));
		$this->session->set_flashdata('namapt', $this->session->flashdata('namapt'));
		$temp = $this->mpayroll->getdatasatu($id)->row_array();
		$data['id'] = $id;
		$data['noinduk'] = $temp['noinduk'];
		$data['nama'] = $temp['nama'];
		$data['bagian'] = $temp['bagian'];
		$data['jabatan'] = $temp['jabatan'];
		$data['gaji'] = $temp['gaji'];
		$data['tunjab'] = $temp['tunjab'];
		$data['tunskill'] = $temp['tunskill'];
		$data['astek'] = $temp['astek'];
		$data['jp'] = $temp['jp'];
		$data['other'] = $temp['other'];
		$data['bijab'] = $temp['bijab'];
		$data['ptkp'] = $temp['ptkp'];
		$data['pkp'] = $temp['pkp'];
		$data['pphyear'] = $temp['pphyear'];
		$data['pphmonth'] = $temp['pphmonth'];
		$data['pphgovmnt'] = $temp['pphgovmnt'];
		$data['meal'] = $temp['meal'];
		$data['transport'] = $temp['transport'];
		$data['koperasi'] = $temp['koperasi'];
		$data['thp'] = $temp['thp'];
		$data['loan'] = $temp['loan'];
		$data['bpjs'] = $temp['bpjs'];
		$data['realthp'] = $temp['realthp'];
		$data['biayabank'] = $temp['biayabank'];
		$data['jamsostek'] = $temp['jamsostek'];
		$data['total'] = $temp['total'];
		$data['editke'] = $temp['editke'];
		$data['prc_bonus'] = $temp['prc_bonus'];
		$data['thr_bonus'] = $temp['thr_bonus'];
		$data['code'] = $temp['code'];
		$this->load->view('page/editpayroll', $data);
	}
	function simpaneditpayroll()
	{
		$this->session->set_flashdata('bulanperiode', $this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode', $this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll', $this->session->flashdata('kodepayroll'));
		$this->session->set_flashdata('namapt', $this->session->flashdata('namapt'));
		$id = $_POST['id'];
		$other = $_POST['other'];
		$astek = $_POST['astek'];
		$jp = $_POST['jp'];
		$bijab = $_POST['bijab'];
		$pkp = $_POST['pkp'];
		$pphyear = $_POST['pphyear'];
		$pphmonth = $_POST['pphmonth'];
		$pphgovmnt = $_POST['pphgovmnt'];
		$meal = $_POST['meal'];
		$transport = $_POST['transport'];
		$koperasi = $_POST['koperasi'];
		$thp = $_POST['thp'];
		$loan = $_POST['loan'];
		$realthp = $_POST['realthp'];
		$biayabank = $_POST['biayabank'];
		$jamsostek = $_POST['jamsostek'];
		$editke = $_POST['editke'];
		$hasil = $this->mpayroll->simpaneditpayroll($id, $other, $astek, $jp, $bijab, $pkp, $pphyear, $pphmonth, $pphgovmnt, $meal, $transport, $koperasi, $thp, $loan, $realthp, $biayabank, $jamsostek, $editke)->result();
		echo json_encode($hasil);
	}
	function senddata($id)
	{
		$this->session->set_flashdata('bulanperiode', $this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode', $this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll', $this->session->flashdata('kodepayroll'));
		$this->session->set_flashdata('namapt', $this->session->flashdata('namapt'));
		$temp = $this->mpayroll->getdatasatu($id)->row_array();
		$data['id'] = $id;
		$data['noinduk'] = $temp['noinduk'];
		$data['nama'] = $temp['nama'];
		$this->load->view('page/senddata', $data);
	}
	function senddataok()
	{
		$this->session->set_flashdata('bulanperiode', $this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode', $this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll', $this->session->flashdata('kodepayroll'));
		$this->session->set_flashdata('namapt', $this->session->flashdata('namapt'));
		$id = $_POST['id'];
		$hasil = $this->mpayroll->senddataok($id)->result();
		echo json_encode($hasil);
	}
	function unsenddata($id)
	{
		$this->session->set_flashdata('bulanperiode', $this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode', $this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll', $this->session->flashdata('kodepayroll'));
		$this->session->set_flashdata('namapt', $this->session->flashdata('namapt'));
		$temp = $this->mpayroll->getdatasatu($id)->row_array();
		$data['id'] = $id;
		$data['noinduk'] = $temp['noinduk'];
		$data['nama'] = $temp['nama'];
		$this->load->view('page/unsenddata', $data);
	}
	function senddatang()
	{
		$this->session->set_flashdata('bulanperiode', $this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode', $this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll', $this->session->flashdata('kodepayroll'));
		$this->session->set_flashdata('namapt', $this->session->flashdata('namapt'));
		$id = $_POST['id'];
		$hasil = $this->mpayroll->senddatang($id)->result();
		echo json_encode($hasil);
	}
	function sendall()
	{
		$this->session->set_flashdata('bulanperiode', $this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode', $this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll', $this->session->flashdata('kodepayroll'));
		$this->session->set_flashdata('namapt', $this->session->flashdata('namapt'));
		$this->mpayroll->sendall();
		$url = base_url() . 'payroll';
		redirect($url);
	}
	function getbacksend()
	{
		$this->session->set_flashdata('bulanperiode', $this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode', $this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll', $this->session->flashdata('kodepayroll'));
		$this->session->set_flashdata('namapt', $this->session->flashdata('namapt'));
		$this->mpayroll->getbacksend();
		$url = base_url() . 'payroll';
		redirect($url);
	}
	function kirimemail($id)
	{
		$this->session->set_flashdata('bulanperiode', $this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode', $this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll', $this->session->flashdata('kodepayroll'));
		$this->session->set_flashdata('namapt', $this->session->flashdata('namapt'));
		$temp = $this->mpayroll->getdatasatu($id)->row_array();
		$data['id'] = $id;
		$data['noinduk'] = $temp['noinduk'];
		$data['nama'] = $temp['nama'];
		$data['email'] = $temp['email'];
		$this->load->view('page/kirimemail', $data);
	}
	function taxreport()
	{
		$this->session->set_flashdata('bulanperiode', $this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode', $this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll', $this->session->flashdata('kodepayroll'));
		$this->session->set_flashdata('namapt', $this->session->flashdata('namapt'));
		//$data['temp'] = $this->mpayroll->getdata()->result();
		// $data['id'] = $id;
		// $data['noinduk'] = $temp['noinduk'];
		// $data['nama'] = $temp['nama'];
		// $data['email'] = $temp['email'];
		$this->load->view('page/taxreport');
	}
	function financereport()
	{
		$this->session->set_flashdata('bulanperiode', $this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode', $this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll', $this->session->flashdata('kodepayroll'));
		$this->session->set_flashdata('namapt', $this->session->flashdata('namapt'));
		//$data['temp'] = $this->mpayroll->getdata()->result();
		// $data['id'] = $id;
		// $data['noinduk'] = $temp['noinduk'];
		// $data['nama'] = $temp['nama'];
		// $data['email'] = $temp['email'];
		$this->load->view('page/financereport');
	}
	function txtreport()
	{
		$this->session->set_flashdata('bulanperiode', $this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode', $this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll', $this->session->flashdata('kodepayroll'));
		$this->session->set_flashdata('namapt', $this->session->flashdata('namapt'));
		//$data['temp'] = $this->mpayroll->getdata()->result();
		// $data['id'] = $id;
		// $data['noinduk'] = $temp['noinduk'];
		// $data['nama'] = $temp['nama'];
		// $data['email'] = $temp['email'];
		$this->load->view('page/txtreport');
	}
	function buatpdf()
	{
		$this->session->set_flashdata('bulanperiode', $this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode', $this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll', $this->session->flashdata('kodepayroll'));
		$this->session->set_flashdata('namapt', $this->session->flashdata('namapt'));
		$id = $_POST['id'];
		$temp = $this->mpayroll->getdatasatu($id)->row_array();
		if ($_SESSION['kodepayroll'] != 'SALARY') {
			$namafile = $this->session->flashdata('kodepayroll') . '_' . $this->session->flashdata('tahunperiode');
		} else {
			$namafile = $this->session->flashdata('kodepayroll') . '_' . namabulan($this->session->flashdata('bulanperiode')) . '_' . $this->session->flashdata('tahunperiode');
		}
		$file = LOK_FILE . $namafile . '_' . $temp['noinduk'] . '.pdf';
		$pdf = new FPDF_Protection('p', 'mm', 'A5');
		$pdf->SetProtection(array('print'), strtolower($temp['pdfpass']));
		// $pdf->SetProtection(array('print'), '');
		// membuat halaman baru
		$pdf->AddPage();
		// setting jenis font yang akan digunakan
		$pdf->SetFont('Arial', 'B', 14);
		$pdf->Image(base_url() . 'assets/images/gambar.jpeg', 10, 10, -300);
		// mencetak string 
		$pdf->Cell(10, 4, '', 0, 1);
		$pdf->Cell(25);
		$pdf->Cell(110, 5, 'PT. INDONEPTUNE NET MANUFACTURING', 10, 1, 'L');
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(25);
		$pdf->Cell(110, 5, $temp['loc'], 0, 1);
		$pdf->Line(10, 30, 140, 30);
		// Memberikan space kebawah agar tidak terlalu rapat
		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('times', 'B', 9);
		$pdf->Cell(65, 6, $temp['code'] . ' ' . namabulan(substr($temp['periode'], 4, 2)) . ' ' . substr($temp['periode'], 0, 4), 0, 0);
		$pdf->SetFont('times', '', 9);
		$pdf->Cell(65, 6, date('d-m-Y'), 0, 0);
		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->Cell(65, 6, 'Nama', 0, 0);
		$pdf->Cell(65, 6, ': ' . $temp['nama'], 0, 0);
		$pdf->Cell(10, 4, '', 0, 1);
		$pdf->Cell(65, 6, 'Beneficiary Bank', 0, 0);
		$pdf->Cell(65, 6, ': ' . trim($temp['bank']) . ' - ' . trim($temp['bankadr']), 0, 0);
		$pdf->Cell(10, 4, '', 0, 1);
		$pdf->Cell(65, 6, 'Nomor Rekening', 0, 0);
		$pdf->Cell(65, 6, ': ' . $temp['norek'], 0, 0);
		$pdf->Cell(10, 4, '', 0, 1);
		$pdf->Cell(65, 6, 'Atas Nama', 0, 0);
		$pdf->Cell(65, 6, ': ' . $temp['rekname'], 0, 0);
		$pdf->Line(10, 58, 140, 58);
		$pdf->Cell(10, 4, '', 0, 1);
		$pdf->Cell(10, 6, '', 0, 1);
		$pdf->Cell(65, 6, 'Gaji Pokok', 0, 0);
		$pdf->Cell(10, 6, 'Rp.', 0, 0);
		$pdf->Cell(40, 6, rupiah($temp['gaji'], 0), 0, 0, 'R');
		$pdf->Cell(10, 4, '', 0, 1);
		$pdf->Cell(65, 6, 'Tunjangan Jabatan', 0, 0);
		$pdf->Cell(10, 6, 'Rp.', 0, 0);
		$pdf->Cell(40, 6, rupiah($temp['tunjab'], 0), 0, 0, 'R');
		if ($temp['tunskill'] > 0) {
			$pdf->Cell(10, 4, '', 0, 1);
			$pdf->Cell(65, 6, 'Tunjangan Skill', 0, 0);
			$pdf->Cell(10, 6, 'Rp.', 0, 0);
			$pdf->Cell(40, 6, rupiah($temp['tunskill'], 0), 0, 0, 'R');
			// $pdf->Line(70,74,140,74);
		}
		$pdf->SetFont('times', 'B', 9);
		$pdf->Cell(10, 6, '', 0, 1);
		$pdf->Cell(65, 6, 'Gaji Kotor', 0, 0, 'C');
		$pdf->Cell(10, 6, 'Rp.', 'T', 0);
		$pdf->Cell(40, 6, rupiah($temp['gaji'] + $temp['tunjab'] + $temp['tunskill'], 0), 'T', 0, 'R');
		if ($_SESSION['kodepayroll'] != 'SALARY') {
			$pdf->Cell(10, 6, '', 0, 1);
			$pdf->Cell(65, 6, ucwords(strtolower($_SESSION['kodepayroll'])) . ' ' . $temp['prc_bonus'] . '% x ' . rupiah($temp['gaji'] + $temp['tunjab'] + $temp['tunskill'], 0), 0, 0);
			$pdf->Cell(10, 6, 'Rp.', 'T', 0);
			$pdf->Cell(40, 6, rupiah($temp['thr_bonus'], 0), 'T', 0, 'R');
		}
		$pdf->SetFont('times', '', 9);
		$pdf->Cell(10, 8, '', 0, 1);
		$pdf->Cell(65, 6, 'Astek', 0, 0);
		$pdf->Cell(10, 6, 'Rp.', 0, 0);
		$pdf->Cell(40, 6, rupiah($temp['astek'], 0), 0, 0, 'R');
		$pdf->Cell(10, 4, '', 0, 1);
		$pdf->Cell(65, 6, 'Jaminan Pensiun', 0, 0);
		$pdf->Cell(10, 6, 'Rp.', 0, 0);
		$pdf->Cell(40, 6, rupiah($temp['jp'], 0), 0, 0, 'R');
		$pdf->Cell(10, 4, '', 0, 1);
		$pdf->Cell(65, 6, 'Biaya Jabatan', 0, 0);
		$pdf->Cell(10, 6, 'Rp.', 0, 0);
		$pdf->Cell(40, 6, rupiah($temp['bijab'], 0), 0, 0, 'R');
		$pdf->Cell(10, 4, '', 0, 1);
		$pdf->Cell(65, 6, 'Penghasilan Tidak Kena Pajak (PTKP)', 0, 0);
		$pdf->Cell(10, 6, 'Rp.', 0, 0);
		$pdf->Cell(40, 6, rupiah($temp['ptkp'], 0), 0, 0, 'R');
		$pdf->Cell(10, 4, '', 0, 1);
		$pdf->Cell(65, 6, 'Penghasil Kena Pajak (PKP)', 0, 0);
		$pdf->Cell(10, 6, 'Rp.', 0, 0);
		$pdf->Cell(40, 6, rupiah($temp['pkp'], 0), 0, 0, 'R');
		$pdf->Cell(10, 4, '', 0, 1);
		$pdf->Cell(65, 6, 'PPh 21', 0, 0);
		$pdf->Cell(10, 6, 'Rp.', 0, 0);
		$pdf->Cell(40, 6, rupiah($temp['pphmonth'], 0), 0, 0, 'R');
		if ($_SESSION['kodepayroll'] == 'SALARY') {
			$pdf->Cell(10, 8, '', 0, 1);
			$pdf->Cell(65, 6, 'Gaji Kotor', 0, 0);
			$pdf->Cell(10, 6, 'Rp.', 0, 0);
			$pdf->Cell(40, 6, rupiah($temp['gaji'] + $temp['tunjab'] + $temp['tunskill'], 0), 0, 0, 'R');
		} else {
			$pdf->Cell(10, 8, '', 0, 1);
			$pdf->Cell(65, 6, ucwords(strtolower($_SESSION['kodepayroll'])), 0, 0);
			$pdf->Cell(10, 6, 'Rp.', 0, 0);
			$pdf->Cell(40, 6, rupiah($temp['thr_bonus'], 0), 0, 0, 'R');
		}
		$pdf->Cell(10, 4, '', 0, 1);
		$pdf->Cell(65, 6, 'Astek', 0, 0);
		$pdf->Cell(10, 6, 'Rp.', 0, 0);
		$pdf->Cell(40, 6, '(' . rupiah($temp['astek'], 0) . ')', 0, 0, 'R');
		$pdf->Cell(10, 4, '', 0, 1);
		$pdf->Cell(65, 6, 'Jaminan Pensiun', 0, 0);
		$pdf->Cell(10, 6, 'Rp.', 0, 0);
		$pdf->Cell(40, 6, '(' . rupiah($temp['jp'], 0) . ')', 0, 0, 'R');
		$pdf->Cell(10, 4, '', 0, 1);
		$pdf->Cell(65, 6, 'PPh 21', 0, 0);
		$pdf->Cell(10, 6, 'Rp.', 0, 0);
		$pdf->Cell(40, 6, '(' . rupiah($temp['pphmonth'], 0) . ')', 0, 0, 'R');
		$kolom21 = 0;
		if ($temp['pphgovmnt'] > 0) {
			$pdf->Cell(10, 4, '', 0, 1);
			$pdf->Cell(65, 6, 'PPh 21 (ditanggung Pemerintah)', 0, 0);
			$pdf->Cell(10, 6, 'Rp.', 0, 0);
			$pdf->Cell(40, 6, rupiah($temp['pphgovmnt'], 0), 0, 0, 'R');
			$kolom21 = 10;
		}
		$kolomoth = 0;
		if ($temp['other'] > 0) {
			$pdf->Cell(10, 4, '', 0, 1);
			$pdf->Cell(65, 6, 'Additional', 0, 0);
			$pdf->Cell(10, 6, 'Rp.', 0, 0);
			$pdf->Cell(40, 6, rupiah($temp['other'], 0), 0, 0, 'R');
			$kolomoth = 10;
		}
		$pdf->Cell(10, 8, '', 0, 1);
		$pdf->Cell(10, 4, '', 0, 1);
		$pdf->Cell(65, 6, 'Transport Allowance', 0, 0);
		$pdf->Cell(10, 6, 'Rp.', 0, 0);
		$pdf->Cell(40, 6, rupiah($temp['transport'], 0), 0, 0, 'R');
		$pdf->Cell(10, 4, '', 0, 1);
		$pdf->Cell(65, 6, 'Koperasi', 0, 0);
		$pdf->Cell(10, 6, 'Rp.', 0, 0);
		$pdf->Cell(40, 6, rupiah($temp['koperasi'], 0), 0, 0, 'R');
		$kolomloan = 0;
		if ($temp['loan'] > 0) {
			$pdf->Cell(10, 4, '', 0, 1);
			$pdf->Cell(65, 6, 'Loan', 0, 0);
			$pdf->Cell(10, 6, 'Rp.', 0, 0);
			$pdf->Cell(40, 6, rupiah($temp['loan'], 0), 0, 0, 'R');
			$kolomloan = 10;
		}
		$kolombpjs = 0;
		if ($temp['bpjs'] > 0) {
			$pdf->Cell(10, 4, '', 0, 1);
			$pdf->Cell(65, 6, 'Bpjs', 0, 0);
			$pdf->Cell(10, 6, 'Rp.', 0, 0);
			$pdf->Cell(40, 6, rupiah($temp['bpjs'], 0), 0, 0, 'R');
			$kolombpjs = 10;
		}
		// $pdf->Line(70,125+$kolomloan+$kolombpjs+$kolom21+$kolomoth,140,125+$kolombpjs+$kolomloan+$kolom21+$kolomoth);
		$pdf->SetFont('times', 'B', 9);
		$pdf->Cell(10, 8, '', 0, 1);
		$pdf->Cell(65, 6, 'Take Home Pay', 0, 0, 'C');
		$pdf->Cell(10, 6, 'Rp.', 'T', 0);
		$pdf->Cell(40, 6, rupiah($temp['realthp'], 0), 'T', 0, 'R');
		$pdf->Cell(10, 10, '', 0, 1);
		$pdf->Image(base_url() . 'assets/images/ttdhg.png', $pdf->GetX(), $pdf->GetY(), 45);
		$pdf->Cell(65, 6, '', 0, 0);
		$pdf->Image(base_url() . 'assets/images/ttdmh.png', $pdf->GetX(), $pdf->GetY(), 45);
		$pdf->Cell(22, 22, '', 0, 1);
		$pdf->SetFont('Arial', 'I', 7);
		$pdf->Cell(128, 6, 'dicetak pada : ' . date('d-M-Y H:i:s'), 0, 0, 'R');
		$pdf->Output($file, 'F');
		if (file_exists($file)) {
			$kode = $temp['code'] . ' ' . namabulan(substr($temp['periode'], 4, 2)) . ' ' . substr($temp['periode'], 0, 4);
			$bapakibu = $temp['jenkel'] == 'L' ? 'Bapak ' : 'Ibu ';
			$namakar  = $temp['nama'];
			$message = '<html><body>';
			$message .= '<table style="border-collapse: collapse; width: 100%; height: 144px;" border="0">';
			$message .= '<tbody>';
			$message .= '<tr><td colspan="3">Kepada Yth <br> ' . $bapakibu . ' <strong>' . $namakar . '</strong></td></tr>';
			$message .= '<tr><td colspan="3">Terlampir kami sampaikan e-Slip <strong>' . $kode . '</strong> anda.<br></td></tr>';
			$message .= '<tr><td colspan="3">Silahkan gunakan password untuk membuka e-Slip gaji anda, yang terdiri dari :<br></td></tr>';
			$message .= '<tr><td style="width:45px; padding-left:20px;">xxxx</td><td>:</td><td>Empat Digit terakhir nomor kartu debit anda<td></tr>';
			$message .= '<tr><td style="padding-left:20px;">dd</td><td>:</td><td>Dua digit tanggal lahir anda</td></tr>';
			$message .= '<tr><td style="padding-left:20px;">mm</td><td>:</td><td>Dua digit bulan lahir anda</td></tr>';
			$message .= '<tr><td style="padding-left:20px;">yy</td><td>:</td><td>Dua digit tahun lahir anda</td></tr>';
			$message .= '<tr><td colspan="3"><br>Contoh : Password untuk tanggal lahir 20 Maret 1971 dan 4 Digit terakhir kartu debit anda misalnya 4444 adalah 4444200371.<br></td></tr>';
			$message .= '<tr><td colspan="3"><br>Untuk menikmati fasilitas layanan e-Slip gaji, pastikan anda memiliki program Adobe Reader minimal versi 6.0 pada komputer atau handphone anda.<br></td></tr>';
			$message .= '<tr><td colspan="3"><br>Hormat kami, <br> Berry Laksana</td></tr>';
			$message .= '</tbody>';
			$message .= '</table>';
			$message .= '</body></html>';
			$sendmail = array('file' => $file, 'penerima' => $temp['email'], 'pesan' => $message, 'subjek' => $kode);
			$send = $this->mailer->send_with_attachment($sendmail);
			if (strtoupper($send['status']) == 'SUKSES') {
				$this->mpayroll->sendmail($temp['id']);
				echo true;
			} else {
				echo $send['message'];
			}
		}
	}
	function buatlapfinance()
	{
		$this->session->set_flashdata('bulanperiode', $this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode', $this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll', $this->session->flashdata('kodepayroll'));
		$this->session->set_flashdata('namapt', $this->session->flashdata('namapt'));
		// $id = $_POST['id'];
		switch ($this->session->flashdata('namapt')) {
			case 'M':
				$namapt = 'CV. MEGA DEWA LAUT';
				break;
			case 'L':
				$namapt = 'CV. LAUT INDONESIA NIAGA';
				break;
			case 'I':
				$namapt = 'PT. INDONEPTUNE NET MANUFACTURING';
				break;
			default:
				$namapt = '';
				break;
		}
		$namalap = $this->session->flashdata('kodepayroll') == 'SALARY' ?  $this->session->flashdata('kodepayroll') . ' ' . strtoupper(namabulan($this->session->flashdata('bulanperiode'), 1)) : $this->session->flashdata('kodepayroll');
		$temp = $this->mpayroll->getdata()->result_array();
		$namafile = $this->session->flashdata('kodepayroll') . $this->session->flashdata('bulanperiode') . $this->session->flashdata('tahunperiode');
		$grossf = 0;
		$grossc = 0;
		$otherf = 0;
		$otherc = 0;
		$mealf = 0;
		$mealc = 0;
		$transf = 0;
		$transc = 0;
		$pphf = 0;
		$pphc = 0;
		$astekf = 0;
		$astekc = 0;
		$jpf = 0;
		$jpc = 0;
		$bpjsf = 0;
		$bpjsc = 0;
		$kopf = 0;
		$kopc = 0;
		$loanf = 0;
		$loanc = 0;
		$totalc = 0;
		$totalf = 0;
		$bibank = 0;
		$jmrekod = 0;
		$jmokhg = 0;
		$jmokmh = 0;
		$govf = 0;
		$govc = 0;
		foreach ($temp as $datatemp) {
			$bibank = $datatemp['biayabank'];
			$jmrekod += 1;
			$jmokhg += $datatemp['hg'];
			$jmokmh += $datatemp['mh'];
			if ($datatemp['loc'] == 'FACTORY') {
				if ($this->session->flashdata('kodepayroll') == 'SALARY') {
					$grossf += ($datatemp['gaji'] + $datatemp['tunjab'] + $datatemp['tunskill']);
				} else {
					$grossf += $datatemp['thr_bonus'];
				}
				$otherf += $datatemp['other'];
				$mealf += $datatemp['meal'];
				$transf += $datatemp['transport'];
				$pphf += $datatemp['pphmonth'];
				$astekf += $datatemp['astek'];
				$jpf += $datatemp['jp'];
				$bpjsf += $datatemp['bpjs'];
				$kopf += $datatemp['koperasi'];
				$loanf += $datatemp['loan'];
				$govf += $datatemp['pphgovmnt'];
			} else {
				if ($this->session->flashdata('kodepayroll') == 'SALARY') {
					$grossc += ($datatemp['gaji'] + $datatemp['tunjab'] + $datatemp['tunskill']);
				} else {
					$grossc += $datatemp['thr_bonus'];
				}
				$otherc += $datatemp['other'];
				$mealc += $datatemp['meal'];
				$transc += $datatemp['transport'];
				$pphc += $datatemp['pphmonth'];
				$astekc += $datatemp['astek'];
				$jpc += $datatemp['jp'];
				$bpjsc += $datatemp['bpjs'];
				$kopc += $datatemp['koperasi'];
				$loanc += $datatemp['loan'];
				$govc += $datatemp['pphgovmnt'];
				// $totalc = $grossc+$otherc+$mealc+$transc+$pphc+$astekc+$jpc+$bpjsc+$kopc+$loanc;
			}
		}
		// $totalf = ($grossf + $otherf + $mealf + $transf) + ((($pphf * -1) + $govf) + ($astekf * -1) + ($jpf * -1) + ($bpjsf * -1) + ($kopf * -1) + ($loanf * -1));
		$totalf = ($grossf + $otherf + $mealf + $transf) - ($pphf + $govf + $astekf + $jpf + $bpjsf + $kopf + $loanf);
		// $totalc = ($grossc + $otherc + $mealc + $transc) + ((($pphc * -1) + $govc) + ($astekc * -1) + ($jpc * -1) + ($bpjsc * -1) + ($kopc * -1) + ($loanc * -1));
		$totalc = ($grossc + $otherc + $mealc + $transc) - ($pphc + $govc + $astekc + $jpc + $bpjsc + $kopc + $loanc);
		$file = 'LaporanUntukFinance' . $namafile . '.pdf';
		$pdf = new FPDF_Protection('p', 'mm', 'A4');
		$pdf->SetProtection(array('print'), '');
		// membuat halaman baru
		$pdf->AddPage();
		// setting jenis font yang akan digunakan
		$pdf->SetFont('helvetica', 'B', 14);
		$pdf->Cell(10, 2, '', 0, 1);
		$pdf->Cell(5);
		$pdf->Cell(10, 5, 'Summary of ' . $namalap . ' ' . $this->session->flashdata('tahunperiode') . ' ' . $namapt, 10, 1, 'L');
		$pdf->SetFont('helvetica', '', 11);
		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->Cell(5);
		$pdf->Cell(10, 11, 'Non Factory Staffs', 0, 1);
		$pdf->SetFont('helvetica', '', 10);
		$pdf->Cell(5);
		$pdf->Cell(85, 6, 'Gross Salary', 0, 0);
		$pdf->Cell(10, 6, 'Rp. ', 0, 0);
		$pdf->Cell(25, 6, rupiah($grossc, 2), 0, 0, 'R');
		$pdf->Cell(5, 5, '', 0, 1);
		$pdf->Cell(5);
		$pdf->Cell(85, 6, 'Additional', 0, 0);
		$pdf->Cell(10, 6, 'Rp. ', 0, 0);
		$pdf->Cell(25, 6, rupiah($otherc, 2), 0, 0, 'R');
		$pdf->Cell(5, 5, '', 0, 1);
		$pdf->Cell(5);
		$pdf->Cell(85, 6, 'Meals Allowance', 0, 0);
		$pdf->Cell(10, 6, 'Rp. ', 0, 0);
		$pdf->Cell(25, 6, rupiah($mealc, 2), 0, 0, 'R');
		$pdf->Cell(5, 5, '', 0, 1);
		$pdf->Cell(5);
		$pdf->Cell(85, 6, 'Transport Allowance', 0, 0);
		$pdf->Cell(10, 6, 'Rp. ', 0, 0);
		$pdf->Cell(25, 6, rupiah($transc, 2), 0, 0, 'R');
		$pdf->Cell(5, 5, '', 0, 1);
		$pdf->Cell(5);
		$pdf->Cell(85, 6, 'Pph 21', 0, 0);
		$pdf->Cell(10, 6, 'Rp. ', 0, 0);
		$pdf->Cell(25, 6, rupiah($pphc * -1, 2), 0, 0, 'R');
		$pdf->Cell(5, 5, '', 0, 1);
		$pdf->Cell(5);
		$pdf->Cell(85, 6, 'Astek', 0, 0);
		$pdf->Cell(10, 6, 'Rp. ', 0, 0);
		$pdf->Cell(25, 6, rupiah($astekc * -1, 2), 0, 0, 'R');
		$pdf->Cell(5, 5, '', 0, 1);
		$pdf->Cell(5);
		$pdf->Cell(85, 6, 'Jaminan Pensiun', 0, 0);
		$pdf->Cell(10, 6, 'Rp. ', 0, 0);
		$pdf->Cell(25, 6, rupiah($jpc * -1, 2), 0, 0, 'R');
		$pdf->Cell(5, 5, '', 0, 1);
		$pdf->Cell(5);
		$pdf->Cell(85, 6, 'BPJS', 0, 0);
		$pdf->Cell(10, 6, 'Rp. ', 0, 0);
		$pdf->Cell(25, 6, rupiah($bpjsc * -1, 2), 0, 0, 'R');
		$pdf->Cell(5, 5, '', 0, 1);
		$pdf->Cell(5);
		$pdf->Cell(85, 6, 'Koperasi', 0, 0);
		$pdf->Cell(10, 6, 'Rp. ', 0, 0);
		$pdf->Cell(25, 6, rupiah($kopc * -1, 2), 0, 0, 'R');
		$pdf->Cell(5, 5, '', 0, 1);
		$pdf->Cell(5);
		$pdf->Cell(85, 6, 'Loan Payment', 0, 0);
		$pdf->Cell(10, 6, 'Rp. ', 0, 0);
		$pdf->Cell(25, 6, rupiah($loanc * -1, 2), 0, 0, 'R');
		$pdf->Cell(5, 7, '', 0, 1);
		$pdf->Line(15, 86, 140, 86);
		$pdf->SetFont('helvetica', 'B', 10);
		$pdf->Cell(5);
		$pdf->Cell(85, 6, 'Take home pay', 0, 0);
		$pdf->Cell(10, 6, 'Rp. ', 0, 0);
		$pdf->Cell(25, 6, rupiah($totalc, 2), 0, 0, 'R');
		$pdf->SetFont('helvetica', '', 11);
		$pdf->Cell(10, 12, '', 0, 1);
		$pdf->Cell(5);
		// Factory Staff
		$pdf->Cell(10, 11, 'Factory Staffs', 0, 1);
		$pdf->SetFont('helvetica', '', 10);
		$pdf->Cell(5);
		$pdf->Cell(85, 6, 'Gross Salary', 0, 0);
		$pdf->Cell(10, 6, 'Rp. ', 0, 0);
		$pdf->Cell(25, 6, rupiah($grossf, 2), 0, 0, 'R');
		$pdf->Cell(5, 5, '', 0, 1);
		$pdf->Cell(5);
		$pdf->Cell(85, 6, 'Additional', 0, 0);
		$pdf->Cell(10, 6, 'Rp. ', 0, 0);
		$pdf->Cell(25, 6, rupiah($otherf, 2), 0, 0, 'R');
		$pdf->Cell(5, 5, '', 0, 1);
		$pdf->Cell(5);
		$pdf->Cell(85, 6, 'Meals Allowance', 0, 0);
		$pdf->Cell(10, 6, 'Rp. ', 0, 0);
		$pdf->Cell(25, 6, rupiah($mealf, 2), 0, 0, 'R');
		$pdf->Cell(5, 5, '', 0, 1);
		$pdf->Cell(5);
		$pdf->Cell(85, 6, 'Transport Allowance', 0, 0);
		$pdf->Cell(10, 6, 'Rp. ', 0, 0);
		$pdf->Cell(25, 6, rupiah($transf, 2), 0, 0, 'R');
		$pdf->Cell(5, 5, '', 0, 1);
		$pdf->Cell(5);
		$pdf->Cell(85, 6, 'Pph 21', 0, 0);
		$pdf->Cell(10, 6, 'Rp. ', 0, 0);
		$pdf->Cell(25, 6, rupiah($pphf * -1, 2), 0, 0, 'R');
		$pdf->Cell(5, 5, '', 0, 1);
		$pdf->Cell(5);
		$pdf->Cell(85, 6, 'Astek', 0, 0);
		$pdf->Cell(10, 6, 'Rp. ', 0, 0);
		$pdf->Cell(25, 6, rupiah($astekf * -1, 2), 0, 0, 'R');
		$pdf->Cell(5, 5, '', 0, 1);
		$pdf->Cell(5);
		$pdf->Cell(85, 6, 'Jaminan Pensiun', 0, 0);
		$pdf->Cell(10, 6, 'Rp. ', 0, 0);
		$pdf->Cell(25, 6, rupiah($jpf * -1, 2), 0, 0, 'R');
		$pdf->Cell(5, 5, '', 0, 1);
		$pdf->Cell(5);
		$pdf->Cell(85, 6, 'BPJS', 0, 0);
		$pdf->Cell(10, 6, 'Rp. ', 0, 0);
		$pdf->Cell(25, 6, rupiah($bpjsf * -1, 2), 0, 0, 'R');
		$pdf->Cell(5, 5, '', 0, 1);
		$pdf->Cell(5);
		$pdf->Cell(85, 6, 'Koperasi', 0, 0);
		$pdf->Cell(10, 6, 'Rp. ', 0, 0);
		$pdf->Cell(25, 6, rupiah($kopf * -1, 2), 0, 0, 'R');
		$pdf->Cell(5, 5, '', 0, 1);
		$pdf->Cell(5);
		$pdf->Cell(85, 6, 'Loan Payment', 0, 0);
		$pdf->Cell(10, 6, 'Rp. ', 0, 0);
		$pdf->Cell(25, 6, rupiah($loanf * -1, 2), 0, 0, 'R');
		$pdf->Cell(5, 7, '', 0, 1);
		$pdf->Line(15, 161, 140, 161);
		$pdf->SetFont('helvetica', 'B', 10);
		$pdf->Cell(5);
		$pdf->Cell(85, 6, 'Take home pay', 0, 0);
		$pdf->Cell(10, 6, 'Rp. ', 0, 0);
		$pdf->Cell(25, 6, rupiah($totalf, 2), 0, 0, 'R');
		$pdf->SetFont('helvetica', '', 11);
		$pdf->Cell(10, 12, '', 0, 1);
		$pdf->Cell(5);
		// Company Staff
		$pdf->Cell(10, 11, 'Company Staffs', 0, 1);
		$pdf->SetFont('helvetica', '', 10);
		$pdf->Cell(5);
		$pdf->Cell(85, 6, 'Gross Salary', 0, 0);
		$pdf->Cell(10, 6, 'Rp. ', 0, 0);
		$pdf->Cell(25, 6, rupiah($grossf + $grossc, 2), 0, 0, 'R');
		$pdf->Cell(5, 5, '', 0, 1);
		$pdf->Cell(5);
		$pdf->Cell(85, 6, 'Additional', 0, 0);
		$pdf->Cell(10, 6, 'Rp. ', 0, 0);
		$pdf->Cell(25, 6, rupiah($otherf + $otherc, 2), 0, 0, 'R');
		$pdf->Cell(5, 5, '', 0, 1);
		$pdf->Cell(5);
		$pdf->Cell(85, 6, 'Meals Allowance', 0, 0);
		$pdf->Cell(10, 6, 'Rp. ', 0, 0);
		$pdf->Cell(25, 6, rupiah($mealf + $mealc, 2), 0, 0, 'R');
		$pdf->Cell(5, 5, '', 0, 1);
		$pdf->Cell(5);
		$pdf->Cell(85, 6, 'Transport Allowance', 0, 0);
		$pdf->Cell(10, 6, 'Rp. ', 0, 0);
		$pdf->Cell(25, 6, rupiah($transf + $transc, 2), 0, 0, 'R');
		$pdf->Cell(5, 5, '', 0, 1);
		$pdf->Cell(5);
		$pdf->Cell(85, 6, 'Pph 21', 0, 0);
		$pdf->Cell(10, 6, 'Rp. ', 0, 0);
		$pdf->Cell(25, 6, rupiah(($pphf * -1) + ($pphc * -1), 2), 0, 0, 'R');
		$pdf->Cell(5, 5, '', 0, 1);
		$pdf->Cell(5);
		$pdf->Cell(85, 6, 'Astek', 0, 0);
		$pdf->Cell(10, 6, 'Rp. ', 0, 0);
		$pdf->Cell(25, 6, rupiah(($astekf * -1) + ($astekc * -1), 2), 0, 0, 'R');
		$pdf->Cell(5, 5, '', 0, 1);
		$pdf->Cell(5);
		$pdf->Cell(85, 6, 'Jaminan Pensiun', 0, 0);
		$pdf->Cell(10, 6, 'Rp. ', 0, 0);
		$pdf->Cell(25, 6, rupiah(($jpf * -1) + ($jpc * -1), 2), 0, 0, 'R');
		$pdf->Cell(5, 5, '', 0, 1);
		$pdf->Cell(5);
		$pdf->Cell(85, 6, 'BPJS', 0, 0);
		$pdf->Cell(10, 6, 'Rp. ', 0, 0);
		$pdf->Cell(25, 6, rupiah(($bpjsf * -1) + ($bpjsc * -1), 2), 0, 0, 'R');
		$pdf->Cell(5, 5, '', 0, 1);
		$pdf->Cell(5);
		$pdf->Cell(85, 6, 'Koperasi', 0, 0);
		$pdf->Cell(10, 6, 'Rp. ', 0, 0);
		$pdf->Cell(25, 6, rupiah(($kopf * -1) + ($kopc * -1), 2), 0, 0, 'R');
		$pdf->Cell(5, 5, '', 0, 1);
		$pdf->Cell(5);
		$pdf->Cell(85, 6, 'Loan Payment', 0, 0);
		$pdf->Cell(10, 6, 'Rp. ', 0, 0);
		$pdf->Cell(25, 6, rupiah(($loanf * -1) + ($loanc * -1), 2), 0, 0, 'R');
		$pdf->Cell(5, 7, '', 0, 1);
		$pdf->Line(15, 236, 140, 236);
		$pdf->SetFont('helvetica', 'B', 10);
		$pdf->Cell(5);
		$pdf->Cell(85, 6, 'Take home pay', 0, 0);
		$pdf->Cell(10, 6, 'Rp. ', 0, 0);
		$pdf->Cell(25, 6, rupiah($totalf + $totalc, 2), 0, 0, 'R');
		// Bank Charges
		$pdf->Cell(10, 8, '', 0, 1);
		$pdf->SetFont('helvetica', '', 10);
		$pdf->Cell(5);
		$pdf->Cell(85, 6, 'Bank Charges', 0, 0);
		$pdf->Cell(10, 6, 'Rp. ', 0, 0);
		$pdf->Cell(25, 6, rupiah($bibank, 2), 0, 0, 'R');
		$pdf->Cell(5, 6, '', 0, 1);
		$pdf->Line(15, 251, 140, 251);
		$pdf->SetFont('helvetica', 'B', 10);
		$pdf->Cell(5);
		$pdf->Cell(85, 6, 'Take home pay', 0, 0);
		$pdf->Cell(10, 6, 'Rp. ', 0, 0);
		$pdf->Cell(25, 6, rupiah($bibank + $totalf + $totalc, 2), 0, 0, 'R');
		$pdf->Cell(5, 9, '', 0, 1);
		$pdf->SetFont('helvetica', '', 9);
		$pdf->Cell(5);
		$pdf->Cell(110, 6, 'Issued by,', 0, 0);
		if ($jmokhg == $jmrekod) {
			$pdf->Image(base_url() . 'assets/images/ttdhg.png', 13, 265, 45);
		}
		$pdf->Cell(65, 6, 'Approved by,', 0, 0);
		if ($jmokmh == $jmrekod) {
			$pdf->Image(base_url() . 'assets/images/ttdmh.png', 120, 265, 45);
		}
		$pdf->Output($file, 'D');
	}
	function buatexcel()
	{
		$this->session->set_flashdata('bulanperiode', $this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode', $this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll', $this->session->flashdata('kodepayroll'));
		$this->session->set_flashdata('namapt', $this->session->flashdata('namapt'));
		$data = $this->mpayroll->getdata()->result_array();
		$filename = $this->session->flashdata('kodepayroll') . $this->session->flashdata('bulanperiode') . $this->session->flashdata('tahunperiode');
		$bulan = namabulan($this->session->flashdata('bulanperiode')) . ' ' . $this->session->flashdata('tahunperiode');
		$true = $this->excelspread->unduhfile($data, $filename, $bulan);
		echo $true;
	}
	function downloadexcelbonus()
	{
		$this->session->set_flashdata('bulanperiode', $this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode', $this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll', $this->session->flashdata('kodepayroll'));
		$this->session->set_flashdata('namapt', $this->session->flashdata('namapt'));
		$data = $this->mpayroll->getdatabonus()->result_array();
		$filename = 'formatbonus' . $this->session->flashdata('tahunperiode');
		$bulan = $this->session->flashdata('tahunperiode');
		$true = $this->excelspread->unduhfilebonus($data, $filename, $bulan);
		echo $true;
	}
	function downloadexcelthr()
	{
		$this->session->set_flashdata('bulanperiode', $this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode', $this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll', $this->session->flashdata('kodepayroll'));
		$this->session->set_flashdata('namapt', $this->session->flashdata('namapt'));
		$data = $this->mpayroll->getdatathr()->result_array();
		$filename = 'formatthr' . $this->session->flashdata('tahunperiode');
		$bulan = $this->session->flashdata('tahunperiode');
		$true = $this->excelspread->unduhfilethr($data, $filename, $bulan);
		echo $true;
	}
	function getalldatatomail()
	{
		$this->session->set_flashdata('bulanperiode', $this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode', $this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll', $this->session->flashdata('kodepayroll'));
		$this->session->set_flashdata('namapt', $this->session->flashdata('namapt'));
		$temp['dataemail'] = $this->mpayroll->getdata()->result_array();
		$this->load->view('page/kirimemailall', $temp);
	}
	function rilisportal()
	{
		$this->session->set_flashdata('bulanperiode', $this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode', $this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll', $this->session->flashdata('kodepayroll'));
		$this->session->set_flashdata('namapt', $this->session->flashdata('namapt'));
		$this->mpayroll->rilisportal();
		$url = base_url() . 'payroll';
		redirect($url);
	}
	function unrilisportal()
	{
		$this->session->set_flashdata('bulanperiode', $this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode', $this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll', $this->session->flashdata('kodepayroll'));
		$this->session->set_flashdata('namapt', $this->session->flashdata('namapt'));
		$this->mpayroll->unrilisportal();
		$url = base_url() . 'payroll';
		redirect($url);
	}
	function bacadbf($file)
	{
		if (file_exists($file)) {
			$datatrans = $this->dbf->bacadbf($file);
			$stres = print_r($datatrans);
			$this->session->set_flashdata('msgbacadbf', $stres);
			return $stres;
		}
	}
	function buattxt()
	{
		$this->session->set_flashdata('bulanperiode', $this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode', $this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll', $this->session->flashdata('kodepayroll'));
		$this->session->set_flashdata('namapt', $this->session->flashdata('namapt'));
		$namafile = $this->session->flashdata('kodepayroll') . 'Staff' . $this->session->flashdata('tahunperiode') . $this->session->flashdata('bulanperiode');
		$data = $this->mpayroll->getdata()->result_array();
		$file = $this->excelspread->txtfile($namafile, $data);
		echo $file;
	}
}
