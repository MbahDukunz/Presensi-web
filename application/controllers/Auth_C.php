<?php

class Auth_C extends CI_Controller{

function __construct(){
  parent::__construct();
  $this->load->database();
  $this->load->model('auth_m');
}

	function index(){
        if ($this->session->userdata('login') != 'Sudah Login') {
        $this->load->view('v_welcome');
        } 
	}

function login()
  {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $a =  $this->auth_m->getGet($username)->result();
        $cek = $this->auth_m->cek_login($username,$password)->num_rows();
		if($cek > 0){
			$data_session = array(
                'nip' => $username,
                'nama' => $a[0]->nama,
                'level' => $a[0]->level,
                'id_bidang' => $a[0]->id_bidang,
                'id_seksi' => $a[0]->id_seksi,
                'id_pegawai' => $a[0]->id_pegawai,
                'login'=> "Sudah Login"
				);
    
            $this->session->set_userdata($data_session);
            if($data_session['level'] == '0'){
                //Kalau Admin
                // echo "Admin";
            	redirect('pegawai_c/index');
            } else {
                //Bukan Admin
                // echo "Not Admin";
            		redirect('kegiatan_c/index');
            }
		} else {
			$this->load->view('welcome');
		}
  }
 
  function logout(){
    $this->session->sess_destroy();
    redirect('welcome/index');
  }
}