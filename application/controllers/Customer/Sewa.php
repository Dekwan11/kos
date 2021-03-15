<?php 

class Sewa extends CI_Controller
{
    public function __construct(){
        parent::__construct();

        if($this->session->userdata('role_id') != '2'){ 
            $this->session->set_flashdata('pesan',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('auth/login');
        }
    }
    public function tambah_sewa($id)
    {
        
        $where= array('id_kamar' => $id);
        $data['detail'] = $this->db->query("SELECT *FROM type_kamar tk, kamar kmr
                         WHERE tk.id_type=kmr.id_type AND id_kamar='$id'")->result();    
        $this->load->view('templates_customer/header');
        $this->load->view('customer/tambah_sewa',$data);
        $this->load->view('templates_customer/footer');
    }
    public function tambah_sewa2($id)
    {
        
        $where= array('id_kamar' => $id);
        $data['detail'] = $this->db->query("SELECT *FROM type_kamar tk, kamar kmr
                         WHERE tk.id_type=kmr.id_type AND id_kamar='$id'")->result();    
        $this->load->view('templates_customer/header');
        $this->load->view('customer/tambah_sewa2',$data);
        $this->load->view('templates_customer/footer');
    }
    public function tambah_sewa_aksi()
    {

        $this->_rules();
        if($this->form_validation->run()== FALSE){
            $this->session->set_flashdata('pesan','<div class="alert alert-sm alert-danger alert-dismissible fade show" role="alert">
                    <strong>Terdapat Kesalahan, Coba Ulangi Kembali</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
            redirect('customer/data_kamar');
        }else{ 
            $id_users            = $this->session->userdata('id_users');
            $id_kamar               = $this->input->post('id_kamar');
            $tanggal_sewa           = $this->input->post('tanggal_sewa');

            $data= array(
                'id_users'              =>$id_users,
                'id_kamar'              =>$id_kamar,
                'tanggal_sewa'          =>$tanggal_sewa,
                'tanggal_pembayaran'    =>'-',
            );
            $this->sewa_model->insert_data($data,'transaksi');

            $status = array(
                'status' => '0'
            );

            $id = array(
                'id_kamar' =>$id_kamar
            );

            $this->sewa_model->update_data('kamar',$status,$id);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Tambah Sewa Berhasil, Silakan Selesaikan Pembayaran Anda dalam waktu 7 Hari</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('customer/data_kamar');
        }
    }
    public function _rules()
    {
        $this->form_validation->set_rules('tanggal_sewa','Tanggal Sewa', 'required');
    }
    
}
?>