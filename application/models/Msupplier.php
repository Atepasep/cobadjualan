<?php
class Msupplier extends CI_Model
{
	function getdata()
	{
		$hasil = $this->db->get('supplier');
		return $hasil;
	}
	function getdatasatu($id)
	{
		
		$hasil = $this->db->get_where('supplier',array('id'=>$id));
		return $hasil;
	}
	function hapus($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('supplier');
	}
	function simpan()
	{
		$data = $_POST;
		unset($data['id']);
		unset($data['xalamat']);
		$data['rt'] = $this->input->post('rt') == '' ? '000' : $this->input->post('rt');
		$data['rw'] = $this->input->post('rw') == '' ? '000' : $this->input->post('rw');
		$simpan = $this->db->insert('supplier', $data);
		if ($simpan) {
			$hasil = $this->db->query("select * from supplier where nama = '" . $data['nama'] . "' ");
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
		$this->db->where('id', $data['id']);
		$simpan = $this->db->update('supplier', $data);
		//getdatabykode($data['kode']);
		if ($simpan) {
			$hasil = $this->db->query("select * from supplier where id ='" . $data['id'] . "' ");
		} else {
			$hasil = "gagal";
		}
		return $hasil;
	}
}
