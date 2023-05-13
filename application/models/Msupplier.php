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
		$data['kategori'] = $this->input->post('kategori');
		unset($data['id']);
		$simpan = $this->db->insert('kategori', $data);
		if ($simpan) {
			$hasil = $this->db->query("select * from kategori where kategori = '" . $data['kategori'] . "' ");
		} else {
			$hasil = 'gagal';
		}
		return $hasil;
	}
	function edit()
	{
		$data = $_POST;
		$data['id'] = $this->input->post('id');
		$data['kategori'] = $this->input->post('kategori');
		$this->db->where('id', $data['id']);
		$simpan = $this->db->update('kategori', $data);
		//getdatabykode($data['kode']);
		if ($simpan) {
			$hasil = $this->db->query("select * from kategori where id ='" . $data['id'] . "' ");
		} else {
			$hasil = "gagal";
		}
		return $hasil;
	}
}
