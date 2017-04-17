<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Categori_Model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}	

		public function getDataKategori()
		{
			$this->db->select("id,nama");
			$query = $this->db->get('kategori');
			return $query->result();
		}

		public function getBarangByKategori($id)
		{
			$this->db->select("barang.id, barang.nama as namaBarang, kategori.nama as namaKategori, kode,DATE_FORMAT(tanggal_beli,'%d-%m-%Y') as tanggal_beli,foto,fk_kategori");
			$this->db->where('fk_kategori', $id);	
			$this->db->join('kategori', 'kategori.id  = barang.fk_kategori', 'left');	
			$query = $this->db->get('barang'); 
			return $query->result(); 
		}           
                                    
		public function insertKategori()
		{
			$object = array(
				'nama' => $this->input->post('nama'),
				);
			$this->db->insert('kategori',$object); 
		}

			public function insertBarang($id)
		{
			$object = array(
				'nama' =>$this->input->post('nama') ,
				'kode' =>$this->input->post('kode') ,
				'tanggal_beli' =>$this->input->post('tanggal_beli') ,
				'foto' => $this->upload->data('file_name') ,
				'fk_kategori' => $id 
				);
			$this->db->insert('barang',$object); 
		}

		public function getKategori($id)
		{
			$this->db->where('id', $id);	
			$query = $this->db->get('kategori',1);
			return $query->result();

		}

			public function getBarang($id)
		{
			$this->db->where('id', $id);	
			$query = $this->db->get('barang',1);
			return $query->result();

		}
		public function updateById($id)
		{
			$data = array(
				'nama' => $this->input->post('nama'),
				 );
			$this->db->where('id', $id);
			$this->db->update('kategori', $data);
		}

		public function deleteById($id) 
		{
			$this->db->where('id',$id);
			$this->db->delete('kategori');
		}

		public function hapusBarang($id)
		{
			$this->db->where('id', $id);
			$this->db->delete('barang');
		}

		public function updateBarang($id)
		{
			$object = array('nama' => $this->input->post('nama'),
						'tanggal_beli' => $this->input->post('tanggal_beli'),
						'foto' => $this->upload->data('file_name'));
			$this->db->where('id', $id);
			$this->db->update('barang', $object);
		}




}
	

/* End of file Categori_Model.php */
/* Location: ./application/models/Categori_Model.php */
?>