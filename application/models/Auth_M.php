<?php

class Auth_M extends CI_Model{

    function cek_login($i,$p){	
        return $this->db->get_where('tbl_users', array('nip' => $i,'password' => $p));	
    }	
    
    function getGet($i){	
        return $this->db->select('*')->from('tbl_users')->where('nip', $i)->get();
	}
}