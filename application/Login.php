<?php 

class Login extends CI_Controller{

	function __construct(){
        parent::__construct();
        $this->load->database();	
		$this->load->model('m_login');

	}

	function index(){
		$this->load->view('v_login');
	}

	function aksi_login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $a =  $this->m_login->getGet($username)->result();
        $cek = $this->m_login->cek_login($username,$password)->num_rows();
		if($cek > 0){
			$data_session = array(
                'nip' => $username,
                'nama' => $a[0]->nama,
                'level' => $a[0]->level
				);
    
            $this->session->set_userdata($data_session);
            if($data_session['level'] == '0'){
                //Kalau Admin
                echo "Admin";
            } else {
                //Bukan Admin
                echo "Not Admin";
            }
		} else {
			echo "Username dan password salah !";
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}