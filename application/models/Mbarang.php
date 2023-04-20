<?php
class Mbarang extends CI_Model
{
	function getdata()
	{
		$hasil = $this->db->query("select a.*,b.satuan,c.kategori from barang a left join satuan b on b.id = a.id_satuan left join kategori c on c.id = a.id_kategori");
		return $hasil;
	}
	function getdatasatu($id)
	{
		$hasil = $this->db->query("select a.*,b.satuan,c.kategori from barang a left join satuan b on b.id = a.id_satuan left join kategori c on c.id = a.id_kategori where a.id =" . $id . " ");
		return $hasil;
	}
	function hapus($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('barang');
	}
	function simpan()
	{
		$data = $_POST;
		$data['kode'] = $this->input->post('kode');
		$data['nama_barang'] = $this->input->post('barang');
		$data['id_kategori'] = $this->input->post('id_kategori');
		$data['id_satuan'] = $this->input->post('id_satuan');
		unset($data['id']);
		unset($data['barang']);
		$simpan = $this->db->insert('barang', $data);
		if ($simpan) {
			$hasil = $this->db->query("select * from barang where nama_barang = '" . $data['nama_barang'] . "' ");
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
		$data['nama_barang'] = $this->input->post('barang');
		$data['id_kategori'] = $this->input->post('id_kategori');
		$data['id_satuan'] = $this->input->post('id_satuan');
		unset($data['barang']);
		$this->db->where('id', $data['id']);
		$simpan = $this->db->update('barang', $data);
		//getdatabykode($data['kode']);
		if ($simpan) {
			$hasil = $this->db->query("select * from barang where id ='" . $data['id'] . "' ");
		} else {
			$hasil = "gagal";
		}
		return $hasil;
	}
	function getkode()
	{
		$hasil = $this->db->query("SELECT MAX(kode) as kode FROM barang WHERE kode LIKE 'BR%' ");
		return $hasil;
	}
}
