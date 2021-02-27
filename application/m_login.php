<?php 

class M_login extends CI_Model{	
    
    function cek_login($i,$p){	
        return $this->db->get_where('tbl_users', array('nip' => $i,'password' => $p));	
    }	
    
    function getGet($i){	
        return $this->db->select('nama,level')->from('tbl_users')->where('nip', $i)->get();
	}
}