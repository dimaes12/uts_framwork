<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function index()
	{
		$this->load->model('categori_model');
		$data["kategori_list"] = $this->categori_model->getDataKategori();
		$this->load->view('kategori_datatables',$data);	
	}

public function create()
	{
		// idPegawai = 1
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->load->model('categori_model');	
		if($this->form_validation->run()==FALSE){
			$this->load->view('tambah_kategori_view');
		}else{
			$this->categori_model->insertKategori();
			$this->load->view('tambah_kategori_sukses');
		}
	}
	
	public function update($id)
	{
		//load library
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|alpha_numeric_spaces');
		//sebelum update data harus ambil data lama yang akan di update
		$this->load->model('categori_model');
		$data['kategori_datatables']=$this->categori_model->getKategori($id);
		//skeleton code
		if($this->form_validation->run()==FALSE){

		//setelah load data dikirim ke view

			$this->load->view('edit_kategori_view',$data);

		}else{
			$this->categori_model->updateById($id);
			$data["kategori_list"] = $this->categori_model->getDataKategori();
			$this->load->view('kategori_datatables',$data);

		}
	}

		public function delete($id)
 	{ 
 	 	$this->load->model('categori_model');
  		$this->categori_model->deleteById($id);
 	 	redirect('kategori');
	 }

	 

}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */

 ?>