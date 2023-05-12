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
		$foto = $this->input->post('file_path');
		if (!empty($foto)) {
			$data['gb'] = $this->uploadLogo();
			$fotodulu = FCPATH . "assets/images/barang/" . $data['old_gb'];
			if ($data['old_gb'] != 'add-files.svg') {
				unlink($fotodulu);
			}
		} else {
			$data['gb'] = 'add-files.svg'; 
		}
		unset($data['barang']);
		unset($data['file_path']);
		unset($data['old_gb']);
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
	public function uploadLogo()
	{
		$this->load->library('upload');
		$this->uploadConfig = array(
			'upload_path' => LOK_UPLOAD_BARANG,
			'allowed_types' => 'jpg|jpeg|png',
			'max_size' => max_upload() * 1024,
		);
		// Adakah berkas yang disertakan?
		$adaBerkas = $_FILES['fotobarang']['name'];
		if (empty($adaBerkas)) {
			return NULL;
		}
		$uploadData = NULL;
		$this->upload->initialize($this->uploadConfig);
		if ($this->upload->do_upload('fotobarang')) {
			$uploadData = $this->upload->data();
			$namaFileUnik = uniqid('DG') . $uploadData['file_ext']; //$uploadData['file_name'];
			$fileRenamed = rename(
				$this->uploadConfig['upload_path'] . $uploadData['file_name'],
				$this->uploadConfig['upload_path'] . $namaFileUnik
			);
			$uploadData['file_name'] = $fileRenamed ? $namaFileUnik : $uploadData['file_name'];
		} else {
			$_SESSION['success'] = -1;
			$tidakupload = $this->upload->display_errors(NULL, NULL);
			$this->session->set_flashdata('msgupload', $tidakupload);
		}
		return (!empty($uploadData)) ? $uploadData['file_name'] : 'nophoto.png';
	}
}
