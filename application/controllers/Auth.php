<?php 

class Auth extends CI_Controller{
    public function login()
    {
        $this->_rules();
        if($this->form_validation->run()== FALSE){
            $this->load->view('templates_customer/header');
            $this->load->view('form_login');
            $this->load->view('templates_customer/footer');
        }else{
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));

            $cek = $this->sewa_model->cek_login($username,$password);
            $this->session->set_userdata('id_users',$cek->id_users);
            if($cek == FALSE){
                $this->session->set_flashdata('pesan','Username atau Password yang Anda Masukkan Salah ! Coba Ulangi Kembali');
                    redirect('auth/login');
            }else{
                $this->session->set_userdata('username',$cek->username);
                $this->session->set_userdata('role_id',$cek->role_id);
                $this->session->set_userdata('nama_users',$cek->nama_users);

                switch ($cek->role_id){
                    case 1 : redirect('admin/dashboard');
                    break;
                    case 2 : redirect('dashboard');
                    break;
                    default : break;
                }
            }
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('dashboard');
    }

    public function ganti_password()
    {
        $this->load->view('templates_customer/header');
        $this->load->view('ganti_password');
        $this->load->view('templates_customer/footer');
    }

    public function ganti_passwordadmin()
    {
        $this->load->view('templates_customer/header');
        $this->load->view('ganti_passwordadmin');
        $this->load->view('templates_customer/footer');
    }

    public function ganti_password_aksi()
    {
        $pass_baru  = $this->input->post('pass_baru');
        $ulang_pass = $this->input->post('ulang_pass');

        $this->form_validation->set_rules('pass_baru','Password Baru','required|matches[ulang_pass]');
        $this->form_validation->set_rules('ulang_pass','Ulangi Password','required');

        if ($this->form_validation->run ()== FALSE) {
            $this->load->view('templates_customer/header');
            $this->load->view('ganti_password');
            $this->load->view('templates_customer/footer');
        }else{
            $data= array('password'=>md5($pass_baru));
            $id = array('id_users'=> $this->session->userdata('id_users'));

            $this->sewa_model->update_password($id,$data,'users');
            $this->session->set_flashdata('pesan','Password Anda Berhasil Di Ubah');
                    redirect('auth/logout');
        }
    }
}
?>