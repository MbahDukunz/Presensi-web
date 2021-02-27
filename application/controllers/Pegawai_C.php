<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_C extends CI_Controller {

    function __construct(){
		parent::__construct();		
        $this->load->model('pegawai_m');
        $this->load->model('kegiatan_m');
		$this->load->helper('url');
		//ini yang tmbah
		$this->load->model('auth_m');
	}

	public function index()
	{
		//ini yang tmbah
        if ($this->session->userdata('login') == 'Sudah Login') 
        {
        $data['pegawai'] = $this->pegawai_m->getData();
        $a['pegawai'] = json_encode($data);
        $this->load->view('v_pegawai',$a);
        } else { 
            $this->load->view('v_welcome');
        }
    }
    
    public function tambah()
    {
    	$data['bidang'] = $this->pegawai_m->getDatab();
    	// $data['seksi'] = $this->pegawai_m->getDatas();
        $this->load->view('v_inputpegawai',$data);

    }

    public function simpan()
    {
        $this->pegawai_m->addData();
        redirect('pegawai_c/index');
    }

    public function edit($id)
    {
        $data['bidang'] = $this->pegawai_m->getDatab();
        $data['seksi'] = $this->pegawai_m->getDatas();
        $data['pegawai'] = $this->pegawai_m->editData($id)->result();
        $this->load->view('v_editpegawai',$data);
    }

    public function update()
    {
        $this->pegawai_m->updateData();
        redirect('pegawai_c/index');
    }

    public function hapus($i)
    {
        $this->pegawai_m->deleteData($i);
        redirect('Pegawai_C/index');
    }
}
