<?php
class Msatuan extends CI_Model
{
	function getdata()
	{
		$hasil = $this->db->query("select * from satuan");
		return $hasil;
	}
	function getdatasatu($id)
	{
		$hasil = $this->db->query("select * from satuan where id =" . $id . " ");
		return $hasil;
	}
	function hapus($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('satuan');
	}
	function simpan()
	{
		$data = $_POST;
		$data['kode'] = strtoupper($this->input->post('kode'));
		$data['satuan'] = ucwords($this->input->post('satuan'));
		unset($data['id']);
		$simpan = $this->db->insert('satuan', $data);
		if ($simpan) {
			$hasil = $this->db->query("select * from satuan where satuan = '" . $data['satuan'] . "' ");
		} else {
			$hasil = 'gagal';
		}
		return $hasil;
	}
	function edit()
	{
		$data = $_POST;
		$data['id'] = $this->input->post('id');
		$data['kode'] = $this->input->post('kode');
		$data['satuan'] = $this->input->post('satuan');
		$this->db->where('id', $data['id']);
		$simpan = $this->db->update('satuan', $data);
		//getdatabykode($data['kode']);
		if ($simpan) {
			$hasil = $this->db->query("select * from satuan where id ='" . $data['id'] . "' ");
		} else {
			$hasil = "gagal";
		}
		return $hasil;
	}
}
