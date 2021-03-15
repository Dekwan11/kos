<?php

class Data_type extends CI_Controller{

    public function index()
    {
        $data['type_kamar']=$this->sewa_model->get_data('type_kamar')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_type',$data);
        $this->load->view('templates_admin/footer');

    }

    public function tambah_type()
    {
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_tambah_type');
        $this->load->view('templates_admin/footer');

    }

    public function tambah_type_aksi()
    {
        $this->_rules();

        if($this->form_validation->run()==FALSE){
            $this->tambah_type();
        }else{
            $kode_type          = $this->input->post('kode_type');
            $nama_type          = $this->input->post('nama_type');
            $fasilitas          = $this->input->post('fasilitas');
            $harga              = $this->input->post('harga');

            $data= array(
                'kode_type'     => $kode_type,
                'nama_type'     => $nama_type,
                'fasilitas'     => $fasilitas,
                'harga'         => $harga
            );

            $this->sewa_model->insert_data($data,'type_kamar');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Ditambah</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/data_type');
        }
    }

    public function update_type($id)
    {
        $where=array('id_type' => $id);
        $data['type_kamar']=$this->db->query("SELECT * FROM type_kamar WHERE id_type ='$id'")->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_update_type',$data);
        $this->load->view('templates_admin/footer');
    }

    public function update_type_aksi()
    {
        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('pesan','<div class="alert alert-sm alert-danger alert-dismissible fade show" role="alert">
                    <strong>Terdapat Kesalahan, Coba Ulangi Kembali</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
            $this->index();
        }else{
            $id            = $this->input->post('id_type');
            $kode_type     = $this->input->post('kode_type');
            $nama_type     = $this->input->post('nama_type');
            $fasilitas     = $this->input->post('fasilitas');
            $harga         = $this->input->post('harga');
            
            $data = array(
                'kode_type'         => $kode_type,
                'nama_type'         => $nama_type,
                'fasilitas'         => $fasilitas,
                'harga'             => $harga
            );
            $where = array (
                'id_type'      => $id
            );
                $this->sewa_model->update_data('type_kamar',$data,$where);
                $this->session->set_flashdata('pesan','<div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Data Berhasil Diupdate</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                redirect('admin/data_type');
        }
    }
    public function _rules()
    {
        $this->form_validation->set_rules('kode_type', 'Kode Type', 'required');
        $this->form_validation->set_rules('nama_type', 'Kode Type', 'required');
        $this->form_validation->set_rules('fasilitas', 'Fasilitas', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
    }

    public function delete_type($id)
    {
        $where = array('id_type' => $id);
        $this->sewa_model->delete_data($where,'type_kamar');
        $this->sewa_model->delete_data($where,'kamar');
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Dihapus</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('admin/data_type');
    }
}

?>