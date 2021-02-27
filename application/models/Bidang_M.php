<?php

class Bidang_M extends CI_Model {

  function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

	public function getData()
	{
		return $this->db->get('tbl_bidang');
  }
    
  public function addData()
  {
    $data = array (
      'nama_bidang' => $this->input->post('nama_bidang')
    );
    $this->db->insert('tbl_bidang', $data);
  }

  public function editData($i)
  {
    return $this->db->get_where('tbl_bidang', array('id_bidang' => $i));
  }

  public function updateData()
  {
    $id = $this->input->post('id_bidang');
    $data = array (
      'nama_bidang' => $this->input->post('nama_bidang')
    );
    $this->db->where('id_bidang', $id);
    $this->db->update('tbl_bidang', $data);
  }

  public function deleteData($id)
  {
    return $this->db->delete('tbl_bidang', array('id_bidang' => $id));
  }

  

}

