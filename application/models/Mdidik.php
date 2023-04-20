<?php
	class Mdidik extends CI_Model {
		function getdata(){
			$hasil = $this->db->query("select * from pendidikan ");
			return $hasil;
		}
		function getdatasatu($id){
			$hasil = $this->db->query("select * from pendidikan where id =".$id." ");
			return $hasil;
		}
		function simpandidik(){
			$data = $_POST;
			$data['kode'] = $this->input->post('kode');
			$data['pendidikan'] = $this->input->post('pendidikan');
			unset($data['id']);
			$simpan = $this->db->insert('pendidikan',$data);
			//getdatabykode($data['kode']);
			if($simpan){
				$hasil = $this->db->query("select * from pendidikan where kode ='".$data['kode']."' ");
			}else{
				$hasil = "gagal";
			}
			return $hasil;
		}
		function editdidik(){
			$data = $_POST;
			$data['id'] = $this->input->post('id');
			$data['kode'] = $this->input->post('kode');
			$data['pendidikan'] = $this->input->post('pendidikan');
			$this->db->where('id',$data['id']);
			$simpan = $this->db->update('pendidikan',$data);
			//getdatabykode($data['kode']);
			if($simpan){
				$hasil = $this->db->query("select * from pendidikan where id ='".$data['id']."' ");
			}else{
				$hasil = "gagal";
			}
			return $hasil;			
		}
		function hapusdidik($id){
			$this->db->where('id',$id);
			$this->db->delete('pendidikan');
		}
	}
?>