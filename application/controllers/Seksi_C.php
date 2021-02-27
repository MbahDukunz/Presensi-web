<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seksi_C extends CI_Controller {

    function __construct(){
		parent::__construct();		
		$this->load->model('seksi_m');
		$this->load->helper('url');
	}

	public function index()
	{
        //ini yang tmbah
        if ($this->session->userdata('login') == 'Sudah Login') 
        {
        $data['seksi'] = $this->seksi_m->getData()->result_array();
        $a['seksi'] = json_encode($data);
        $this->load->view('v_seksi',$a);
        } else { 
            $this->load->view('v_welcome');
        }
    }

    public function AmbilData()
    {
        $id_bidang=$_POST['id_bidang'];
        $data['seksi'] = $this->seksi_m->AmbilData($id_bidang);
        $output=array();
        foreach ($data['seksi'] as $s ) {
            $output[]=$s;
        }
        echo json_encode($output);
    }

    
    public function tambah()
    {
        $data['bidang'] = $this->seksi_m->getDatab();
        $this->load->view('v_inputseksi',$data);
    }

    public function simpan()
    {
        $this->seksi_m->addData();
        redirect('seksi_c/index');
    }

    public function edit($id)
    {
        $data['bidang'] = $this->seksi_m->getDatab();
        $data['seksi'] = $this->seksi_m->editData($id)->result();
        $this->load->view('v_editseksi',$data);
    }

    public function update()
    {
        $this->seksi_m->updateData();
        redirect('seksi_c/index');
    }

    public function hapus($i)
    {
        $this->seksi_m->deleteData($i);
        redirect('seksi_c/index');
    }
}
