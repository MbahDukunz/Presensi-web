<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone

class Kegiatan_C extends CI_Controller {

    function __construct(){
		parent::__construct();		
		$this->load->model('kegiatan_m');
        $this->load->helper('url');
        $this->load->library('upload');
	}

    public function readkegiatan() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_pegawai = $this->input->post('id_pegawai');
            $hasil = $this->kegiatan_m->getKegiatan($id_pegawai);
            if ($hasil->num_rows() == 1) {
                foreach ($hasil as $row) {
                    $response["error"] = FALSE;
                    $response["kegiatan"]["nama_pegawai"] = $sess->nama;
                    $response["kegiatan"]["foto"] = $sess->username;
                    $response["kegiatan"]["id_kegiatan"] = $sess->jabatan;
                    $response["kegiatan"]["id_bidang"] = $sess->unit_kerja;
                    $response["user"]["level"] = $sess->level;
                    $response["user"]["id"] = $sess->id;
                    echo json_encode($response);
                }
            }
        }
    }

	public function index()
	{
        //ini yang tmbah
        if ($this->session->userdata('login') == 'Sudah Login') 
        {
            $data['kegiatan'] = $this->kegiatan_m->getData();
            $a['kegiatan'] = json_encode($data);
            $this->load->view('v_kegiatan',$a);
        } 
        else 
        { 
            $this->load->view('v_welcome');
        }
    }

    public function lihat($i)
    {
        //ini yang tmbah
        if ($this->session->userdata('login') == 'Sudah Login') 
        {
            $data['kegiatan'] = $this->kegiatan_m->getK($i);
            $a['kegiatan'] = json_encode($data);
            $this->load->view('v_lihatkegiatan',$a);
        } 
        else 
        { 
            $this->load->view('v_welcome');
        }
    }
    
    public function tambah()
    {
        $this->load->view('v_inputkegiatan');
    }

    public function simpan()
    {
        if ($this->input->post('submit')) 
        {
            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
            $config['encrypt_name'] = TRUE;

            $this->upload->initialize($config);
            if (!empty($_FILES['filefoto']['name'])) 
            {
                if ($this->upload->do_upload('filefoto')) 
                {
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/images/' . $gbr['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '60%';
                    $config['new_image'] = './assets/images/' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $gambar = $gbr['file_name'];
                    $this->kegiatan_m->addData($gambar,1);
                    redirect('kegiatan_c/index');
                } 
                else 
                {
                    $this->session->set_flashdata('error', "Data Gagal Di Tambahkan, mohon untuk dicek kembali sebelum klik 'Simpan'");
                    redirect("kegiatan_c/tambah");
                }
            }
            else 
            {
                $this->session->set_flashdata('error', "Data Gagal Di Tambahkan, mohon untuk dicek kembali sebelum klik 'Simpan'");
                redirect("kegiatan_c/tambah");
            }
        }
        elseif ($_SERVER['REQUEST_METHOD'] == 'POST') 
            {
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
                $config['encrypt_name'] = TRUE;
    
                $this->upload->initialize($config);

                $gambar = htmlspecialchars($_FILES['upload']['name']);

                if ($gambar != null) {
                    $target_path = "/uploads/";
                    move_uploaded_file($_FILES['upload']['tmp_name'], $gambar);
                    $this->kegiatan_m->addData($gambar,2);
                }
            } 
    }

    public function edit($id)
    {
        $data['kegiatan'] = $this->kegiatan_m->editData($id)->result();
        $this->load->view('v_editkegiatan',$data);
    }

    public function update()
    {
        if ($this->input->post('submit')) 
        {
            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
            $config['encrypt_name'] = TRUE;

            $this->upload->initialize($config);
            if (!empty($_FILES['filefoto']['name'])) 
            {
                if ($this->upload->do_upload('filefoto')) 
                {
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/images/' . $gbr['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '60%';
                    $config['new_image'] = './assets/images/' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $gambar = $gbr['file_name'];
                    $this->kegiatan_m->updateData($gambar,1);
                    redirect('kegiatan_c/index');
                } 
                else 
                {
                    $this->session->set_flashdata('error', "Data Gagal Di Tambahkan, mohon untuk dicek kembali sebelum klik 'Update'");
                redirect("kegiatan_c/edit");
                }
            }
            else 
            {
                $gambar = 0;
                    $this->kegiatan_m->updateData($gambar,1);
                    redirect('kegiatan_c/index');
                
            }
        }
        elseif ($_SERVER['REQUEST_METHOD'] == 'POST') 
            {
                $gambar = '-'; # code...
                $this->kegiatan_m->updateData($gambar,2);
            } 
        redirect('kegiatan_c/index');
    }

    public function hapus($i)
    {
        $this->kegiatan_m->deleteData($i);
        redirect('kegiatan_c/index');
    }
}
