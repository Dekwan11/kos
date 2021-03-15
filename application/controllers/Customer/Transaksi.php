<?php 

class Transaksi extends CI_Controller{
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
    public function index()
    {
        $users = $this->session->userdata('id_users');
        $data['transaksi'] = $this->db->query("SELECT *FROM transaksi tr, kamar kmr, users phi,type_kamar tk
                            WHERE tr.id_kamar=kmr.id_kamar AND tr.id_users=phi.id_users AND tk.id_type=kmr.id_type
                            AND phi.id_users='$users' ORDER BY id_transaksi DESC")->result();
        $this->load->view('templates_customer/header');
        $this->load->view('customer/transaksi',$data);
        $this->load->view('templates_customer/footer');
    }

    public function pembayaran($id)
    {
        $data['transaksi'] = $this->db->query("SELECT *FROM transaksi tr, kamar kmr, users phi, type_kamar tk 
                            WHERE tr.id_kamar=kmr.id_kamar AND tr.id_users=phi.id_users AND tk.id_type=kmr.id_type
                            AND tr.id_transaksi='$id' ORDER BY id_transaksi DESC")->result();
        $this->load->view('templates_customer/header');
        $this->load->view('customer/pembayaran',$data);
        $this->load->view('templates_customer/footer');
    }

    public function pembayaran_aksi()
    {
        
            $id                         = $this->input->post('id_transaksi');
            $bukti_pembayaran           = $_FILES['bukti_pembayaran']['name'];
            if($bukti_pembayaran){
                $config['upload_path']      ='./assets/upload';
                $config['allowed_types']    ='jpg|png|jpeg|pdf|doc|docx';

                $this->load->library('upload',$config);

                if($this->upload->do_upload('bukti_pembayaran')){
                    $bukti_pembayaran=$this->upload->data('file_name');
                    $this->db->set('bukti_pembayaran', $bukti_pembayaran);
                    $data= array(
                        'bukti_pembayaran' => $bukti_pembayaran,
                    );
                    $where = array(
                        'id_transaksi'  =>$id
                    );
                            $this->sewa_model->update_data('transaksi',$data,$where);
                            $this->session->set_flashdata('pesan','<div class="alert alert-info alert-dismissible fade show" role="alert">
                            <strong>Bukti Pembayaran Berhasil di Upload</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>');
                            redirect('customer/transaksi');
            }else{
                $this->session->set_flashdata('pesan','<div class="alert alert-sm alert-danger alert-dismissible fade show" role="alert">
                    <strong>Terdapat Kesalahan, Coba Ulangi Kembali</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                redirect('customer/transaksi');
                }
            }

                
            
    }
    public function batal_transaksi($id){
        $where = array('id_transaksi' => $id);
        $data = $this->sewa_model->get_where($where,'transaksi')->row();
        $where2 =array('id_kamar' => $data->id_kamar);
        $data2=array('status' => '1');

        $this->sewa_model->update_data('kamar',$data2,$where2);
        $this->sewa_model->delete_data($where,'transaksi');

         $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
         <strong>Sewa Dibatalkan</strong>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>');
            redirect('customer/transaksi');
    }
    
}
?>