<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bidang_C extends CI_Controller {

    function __construct(){
		parent::__construct();		
		$this->load->model('bidang_m');
		$this->load->helper('url');
	}

	public function index()
	{
        //ini yang tmbah
        if ($this->session->userdata('login') == 'Sudah Login') 
        {
        $data['bidang'] = $this->bidang_m->getData()->result();
        $a['bidang'] = json_encode($data);
        $this->load->view('v_bidang',$a);
        } else { 
            $this->load->view('v_welcome');
        }
    }
    
    public function tambah()
    {
        $this->load->view('v_inputbidang');
    }

    public function simpan()
    {
        $this->bidang_m->addData();
        redirect('bidang_c/index');
    }

    public function edit($id)
    {
        $data['bidang'] = $this->bidang_m->editData($id)->result();
        $this->load->view('v_editbidang',$data);
    }

    public function update()
    {
        $this->bidang_m->updateData();
        redirect('bidang_c/index');
    }

    public function hapus($i)
    {
        $this->bidang_m->deleteData($i);
        redirect('bidang_c/index');
    }
}
