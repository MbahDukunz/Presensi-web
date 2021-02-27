<?php

class Kegiatan_m extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getDatab()
	{
		return $this->db->get('tbl_bidang')->result();
    }

    public function getDatas()
    {
        return $this->db->get('tbl_seksi')->result();
    }

    public function getData()
    {
        $level = $this->session->userdata('level');
        $id_pegawai = $this->session->userdata('id_pegawai');
        $id_seksi = $this->session->userdata('id_seksi');
        $id_bidang = $this->session->userdata('id_bidang');
        $this->db->select('*');
        $this->db->from('tbl_kegiatan');
        $this->db->join('tbl_users', 'tbl_kegiatan.id_pegawai = tbl_users.id_pegawai');
        $this->db->join('tbl_seksi', 'tbl_kegiatan.id_seksi = tbl_seksi.id_seksi');
        $this->db->join('tbl_bidang', 'tbl_kegiatan.id_bidang = tbl_bidang.id_bidang');
        if ($level == 4) {
            # code...
            $this->db->where("tbl_users.id_pegawai = $id_pegawai");
        }
        elseif ($level == 3) {
            # code...
            $this->db->where("tbl_users.id_seksi = $id_seksi");
            $this->db->where("tbl_users.id_bidang = $id_bidang");
        }
        elseif ($level == 2) {
            # code...
            $this->db->where("tbl_users.id_bidang = $id_bidang");
        }
        $this->db->where("tbl_users.level >= $level");
        $this->db->order_by('tbl_kegiatan.id_kegiatan','Desc');
        return $this->db->get()->result();
    }

    public function getKegiatan($id_pegawai)
    {
        $this->db->select('*');
        $this->db->from('tbl_kegiatan');
        $this->db->where('id_pegawai',$id_pegawai);
        $this->db->order_by('tbl_kegiatan.id_kegiatan','Desc');
        return $this->db->get()->result();
    }

    public function getK($i)
    {
        $this->db->select('*');
        $this->db->from('tbl_kegiatan');
        $this->db->where('id_kegiatan',$i);
        $this->db->order_by('tbl_kegiatan.id_kegiatan','Desc');
        return $this->db->get()->result();
    }
    
    public function addData($gambar,$status)
    {
        if ($status == 1) 
        {
            # code...
            $data = array (
            'foto' => $gambar,
            'nama_kegiatan' => $this->input->post('nama_kegiatan'),
            'id_pegawai' => $this->session->userdata('id_pegawai'),
            'id_bidang' => $this->session->userdata('id_bidang'),
            'id_seksi' => $this->session->userdata('id_seksi'),
            'latitude' => '-',
            'longitude' => '-',
            'tanggal_kegiatan' => $this->input->post('tanggal_kegiatan'));
        }
        elseif ($status == 2) 
        {
            # code...
            $config['upload_path'] = FCPATH . "/uploads/";
            $config['allowed_types'] = 'jpg|png|jpeg|webp';
            $this->load->library('upload', $config);

            $file_name = htmlspecialchars($_FILES['upload']['name']);

            if ($file_name != null) 
            {
            $target_path = "/uploads/";
            move_uploaded_file($_FILES['upload']['tmp_name'], $file_name);
            $data = array (
            'foto' => $gambar,
            'nama_kegiatan' => str_replace('"', '',$this->input->post('nama_kegiatan')),
            'id_pegawai' => str_replace('"', '',$this->input->post('id_pegawai')),
            'id_bidang' =>  str_replace('"', '',$this->input->post('id_bidang')),
            'id_seksi' =>  str_replace('"', '',$this->input->post('id_seksi')),
            'latitude' =>   str_replace('"', '',$this->input->post('latitude')),
            'longitude' =>   str_replace('"', '',$this->input->post('longitude')),
            'tanggal_kegiatan' => date("l, j F Y H:i:s"));
            }
        }
        $this->db->insert('tbl_kegiatan', $data);
    }

    public function editData($i)
    {
        return $this->db->get_where('tbl_kegiatan', array('id_kegiatan' => $i));
    }

    public function updateData($gambar, $status)
    {
        $id = $this->input->post('id_kegiatan');
        if ($status == 1) 
        {
            if($gambar == 0)
            {
                # code...
                $data = array (
                'nama_kegiatan' => $this->input->post('nama_kegiatan'),
                'id_pegawai' => $this->session->userdata('id_pegawai'),
                'id_bidang' => $this->session->userdata('id_bidang'),
                'id_seksi' => $this->session->userdata('id_seksi'),
                'latitude' => '-',
                'longitude' => '-',
                'tanggal_kegiatan' => $this->input->post('tanggal_kegiatan'));
            } 
            else 
            {
                # code...
                $data = array (
                'foto' => $gambar,
                'nama_kegiatan' => $this->input->post('nama_kegiatan'),
                'id_pegawai' => $this->session->userdata('id_pegawai'),
                'id_bidang' => $this->session->userdata('id_bidang'),
                'id_seksi' => $this->session->userdata('id_seksi'),
                'latitude' => '-',
                'longitude' => '-',
                'tanggal_kegiatan' => $this->input->post('tanggal_kegiatan'));
            }
        }
        elseif ($status == 2) 
        {
            # code...
            $data = array (
            'foto' => $gambar,
            'nama_kegiatan' => $this->input->post('nama_kegiatan'),
            'id_pegawai' => $this->input->post('id_pegawai'),
            'id_bidang' => $this->input->post('id_bidang'),
            'id_seksi' => $this->input->post('id_seksi'),
            'latitude' => '-',
            'longitude' => '-',
            'tanggal_kegiatan' => date("l, j F Y H:i:s"));
        }
        $this->db->where('id_kegiatan', $id);
        $this->db->update('tbl_kegiatan', $data);
    }

    public function deleteData($id)
    {
        return $this->db->delete('tbl_kegiatan', array('id_kegiatan' => $id));
    }

}

