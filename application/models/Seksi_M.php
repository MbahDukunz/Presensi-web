<?php

class Seksi_m extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getDatab()
	{
		return $this->db->get('tbl_bidang')->result();
    }

    public function getData()
    {
        $this->db->select('*');
        $this->db->from('tbl_seksi');
        $this->db->join('tbl_bidang', 'tbl_seksi.id_bidang = tbl_bidang.id_bidang');
        return $this->db->get();
    }

    public function AmbilData($id_bidang)
    {
        $this->db->select('*');
        $this->db->where('id_bidang',$id_bidang);
        $this->db->from('tbl_seksi');
        return $this->db->get()->result();
    }
    
    public function addData()
    {
        $data = array (  
            'id_bidang' => $this->input->post('id_bidang'),
            'nama_seksi' => $this->input->post('nama_seksi')
        );
        $this->db->insert('tbl_seksi', $data);
    }

    public function editData($i)
    {
        return $this->db->get_where('tbl_seksi', array('id_seksi' => $i));
    }

    public function updateData()
    {
        $id = $this->input->post('id_seksi');
        $data = array (
            'id_bidang' => $this->input->post('id_bidang'),
            'nama_seksi' => $this->input->post('nama_seksi')
        );
        $this->db->where('id_seksi', $id);
        $this->db->update('tbl_seksi', $data);
    }

    public function deleteData($id)
    {
        return $this->db->delete('tbl_seksi', array('id_seksi' => $id));
    }

}

