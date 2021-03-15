<?php

class Data_users extends CI_Controller{

    public function index()
    {
        $data['users']=$this->sewa_model->get_data('users')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_users',$data);
        $this->load->view('templates_admin/footer');
    }
    public function tambah_users()
    {
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_tambah_users');
        $this->load->view('templates_admin/footer');

    }

    public function tambah_users_aksi()
    {
        $this->_rules();

        if($this->form_validation->run()==FALSE){
            $this->tambah_users();
        }else{
            $nama_users      = $this->input->post('nama_users');
            $username           = $this->input->post('username');
            $alamat             = $this->input->post('alamat');
            $no_telepon         = $this->input->post('no_telepon');
            $no_ktp             = $this->input->post('no_ktp');
            $role_id             = $this->input->post('role_id');
            $password           = md5($this->input->post('password'));

            $data= array(
                'nama_users'     => $nama_users,
                'username'          => $username,
                'alamat'            => $alamat,
                'no_telepon'        => $no_telepon,
                'role_id'            => $role_id,
                'password'          => $password
            );

            $this->sewa_model->insert_data($data,'users');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Ditambah</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/data_users');
        }
    }

    public function update_users($id)
    {
        $where=array('id_users' => $id);
        $data['users']=$this->db->query("SELECT * FROM users WHERE id_users ='$id'")->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_update_users',$data);
        $this->load->view('templates_admin/footer');
    }

    public function update_users_aksi()
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
            $id                 = $this->input->post('id_users');
            $nama_users      = $this->input->post('nama_users');
            $username           = $this->input->post('username');
            $alamat             = $this->input->post('alamat');
            $no_telepon         = $this->input->post('no_telepon');
            $no_ktp             = $this->input->post('no_ktp');
            $password           = md5($this->input->post('password'));

            $data= array(
                'nama_users'     => $nama_users,
                'username'          => $username,
                'alamat'            => $alamat,
                'no_telepon'        => $no_telepon,
                'no_ktp'            => $no_ktp,
                'password'          => $password
            );
            $where = array (
                'id_users'      => $id
            );
                $this->sewa_model->update_data('users',$data,$where);
                $this->session->set_flashdata('pesan','<div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Data Berhasil Diupdate</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                redirect('admin/data_users');
        }
    }
    public function _rules()
    {
        $this->form_validation->set_rules('nama_users', 'Nama Penghuni', 'required');
        $this->form_validation->set_rules('username', 'Kode Type', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_telepon', 'No. Telepon', 'required');
        $this->form_validation->set_rules('no_ktp', 'No. KTP', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    }

    public function delete_users($id)
    {
        $where = array('id_users' => $id);
        $this->sewa_model->delete_data($where,'users');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Dihapus</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('admin/data_users');
    }
}


?>