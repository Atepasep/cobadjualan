<?php
class Mcustomer extends CI_Model
{
	function getdata()
	{
		$hasil = $this->db->get('customer');
		return $hasil;
	}
	function getdataidentitas()
	{
		$hasil = $this->db->get('jn_identitas');
		return $hasil;
	}
	function getkode()
	{
		$hasil = $this->db->query("SELECT MAX(kode) as kode FROM customer WHERE kode LIKE 'CS%' ");
		return $hasil;
	}
	function getdatasatu($id)
	{
		
		$hasil = $this->db->get_where('customer',array('id'=>$id));
		return $hasil;
	}
	function hapus($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('customer');
	}
	function simpan()
	{
		$data = $_POST;
		unset($data['id']);
		unset($data['xalamat']);
		unset($data['xno_identitas']);
		$data['rt'] = $this->input->post('rt') == '' ? '000' : $this->input->post('rt');
		$data['rw'] = $this->input->post('rw') == '' ? '000' : $this->input->post('rw');
		$simpan = $this->db->insert('customer', $data);
		if ($simpan) {
			$hasil = $this->db->query("select * from customer where nama = '" . $data['nama'] . "' ");
		} else {
			$hasil = 'gagal';
		}
		return $hasil;
	}
	function edit()
	{
		$data = $_POST;
		$data['id'] = $this->input->post('id');
		$data['rt'] = $this->input->post('rt') == '' ? '000' : $this->input->post('rt');
		$data['rw'] = $this->input->post('rw') == '' ? '000' : $this->input->post('rw');
		unset($data['xalamat']);
		unset($data['xno_identitas']);
		$this->db->where('id', $data['id']);
		$simpan = $this->db->update('customer', $data);
		//getdatabykode($data['kode']);
		if ($simpan) {
			$hasil = $this->db->query("select * from customer where id ='" . $data['id'] . "' ");
		} else {
			$hasil = "gagal";
		}
		return $hasil;
	}
}
