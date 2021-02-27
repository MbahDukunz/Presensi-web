<?php 

class M_login extends CI_Model{	
    
    function cek_login($i,$p){	
        return $this->db->get_where('tbl_users', array('nip' => $i,'password' => $p));	
    }	
    
    function getData($i){	
        return $this->db->get_where('tbl_users', array('id_pegawai' => $i));
    }
    
    function updateData($i,$p,$n,$a){
        $data = array(
            'password' => $p,
            'nohp' => $n,
            'alamat' => $a
        );
        $this->db->where('id_pegawai', $i);
        return $this->db->update('tbl_users', $data);
    }


    public function getKegiatan($id_pegawai)
    {
        $this->db->select('*');
        $this->db->from('tbl_kegiatan');
        $this->db->where('id_pegawai',$id_pegawai);
        $this->db->order_by('tbl_kegiatan.id_kegiatan','Desc');
        return $this->db->get()->result();
    }
    
}