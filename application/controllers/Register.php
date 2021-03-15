<?php 
class Register extends CI_Controller{

    public function index()
    {
        $this->_rules();
        if($this->form_validation->run()== FALSE){
            $this->load->view('templates_customer/header');
            $this->load->view('register_form');
            $this->load->view('templates_customer/footer');
        }else{
            $nama_users      = $this->input->post('nama_users');
            $username           = $this->input->post('username');
            $alamat             = $this->input->post('alamat');
            $no_telepon         = $this->input->post('no_telepon');
            $no_ktp             = $this->input->post('no_ktp');
            $password           = $this->input->post('password');
            $password2          = $this->input->post('password2');
            $role_id            = '2';
            
            $data= array(
                'nama_users'        => $nama_users,
                'username'          => $username,
                'alamat'            => $alamat,
                'no_telepon'        => $no_telepon,
                'no_ktp'            => $no_ktp,
                'password'          => md5($password),
                'role_id'           => $role_id
            );

            $this->sewa_model->insert_data($data,'users');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Ditambah</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('auth/login');
        }
    }
    public function _rules()
    {
        $this->form_validation->set_rules('nama_users', 'Nama Penghuni', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_telepon', 'No. Telepon', 'required');
        $this->form_validation->set_rules('no_ktp', 'No. KTP', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[password2]');
        $this->form_validation->set_rules('password2','Konfirmasi Password','required');
    }
}

?>