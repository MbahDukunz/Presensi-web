<?php

class Pegawai_M extends CI_Model {

  function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

	public function getData()
	{
		    $this->db->from('tbl_users');
        $this->db->join('tbl_seksi', 'tbl_users.id_seksi = tbl_seksi.id_seksi');
        $this->db->join('tbl_bidang', 'tbl_users.id_bidang = tbl_bidang.id_bidang');
        $this->db->order_by('tbl_users.id_pegawai','Desc');
        return $this->db->get()->result();
  }

  public function getDatab()
	{
		return $this->db->get('tbl_bidang')->result();
  }
public function getDatas()
	{
		return $this->db->get('tbl_seksi')->result();


  }  
    
  public function addData()
  {
    $data = array (
    	'nip'=> $this->input->post('nip'),
      'id_bidang' => $this->input->post('id_bidang'),
      'id_seksi' => $this->input->post('id_seksi'),
      'password' => $this->input->post('password'),
      'nama' => $this->input->post('nama'),
      'jabatan' => $this->input->post('jabatan'),
      'level' => $this->input->post('level'),
      'nohp' => $this->input->post('nohp'),
      'alamat' => $this->input->post('alamat')
    );
    $this->db->insert('tbl_users', $data);
  }

  public function editData($i)
  {
    return $this->db->get_where('tbl_users', array('nip' => $i));
  }

  public function updateData()
  {
    $id = $this->input->post('nip');
    $data = array (
      'id_bidang' => $this->input->post('id_bidang'),
      'id_seksi' => $this->input->post('id_seksi'),
      'password' => $this->input->post('password'),
      'nama' => $this->input->post('nama'),
      'jabatan' => $this->input->post('jabatan'),
      'level' => $this->input->post('level'),
      'nohp' => $this->input->post('nohp'),
      'alamat' => $this->input->post('alamat')
    );
    $this->db->where('nip', $id);
    $this->db->update('tbl_users', $data);
  }

  public function deleteData($id)
  {
    return $this->db->delete('tbl_users', array('nip' => $id));
  }


}

