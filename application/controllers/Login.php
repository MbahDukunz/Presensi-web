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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $this->input->post('nip');
            $password = $this->input->post('password');
            $hasil = $this->m_login->cek_login($username,$password);
            if ($hasil->num_rows() == 1) {
                foreach ($hasil->result() as $sess) {
                    $response["user"]["id_pegawai"] = $sess->id_pegawai;
                    $response["user"]["nama"] = $sess->nama;
                    $response["user"]["level"] = $sess->level;
                    $response["user"]["nip"] = $sess->nip;
                    $response["user"]["jabatan"] = $sess->jabatan;
                    $response["user"]["id_bidang"] = $sess->id_bidang;
                    $response["user"]["id_seksi"] = $sess->id_seksi;
                    echo json_encode($response);
                }
            }
        }
    }

    function getDataForU(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $this->input->post('id_pegawai');
            // $id = 3;
            $hasil = $this->m_login->getData($id);
            if ($hasil->num_rows() == 1) {
                foreach ($hasil->result() as $sess) {
                    $response["user"]["nohp"] = $sess->nohp;
                    $response["user"]["alamat"] = $sess->alamat; 
                    echo json_encode($response);
                }
            }
        }
    }

    function edit(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $this->input->post('id_pegawai');
            $pwd = $this->input->post('password');
            $noh = $this->input->post('nohp');
            $ala = $this->input->post('alamat');
            $this->m_login->updateData($id,$pwd,$noh,$ala);
        }
    }
    
    public function readkegiatan() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_pegawai = $this->input->post('id_pegawai');
            $hasil = $this->m_login->getKegiatan($id_pegawai);
            if ($hasil->num_rows() == 1) {
                foreach ($hasil as $row) {
                    // $response["error"] = FALSE;
                    $response["kegiatan"]["idk"] = $row->id_kegiatan;
                    $response["kegiatan"]["namak"] = $row->nama_kegiatan;
                    $response["kegiatan"]["tgl"] = $row->tanggal_kegiatan;
                    $response["kegiatan"]["foto"] = $row->foto;
                    $response["user"]["level"] = $row->level;
                    $response["user"]["id"] = $row->id;
                    echo json_encode($response);
                }
            }
        }
    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}