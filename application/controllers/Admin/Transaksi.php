<?php 

class Transaksi extends CI_Controller{

    public function index(){

        $data['transaksi'] = $this->db->query("SELECT *FROM transaksi tr, kamar kmr, users usr, type_kamar tk 
                            WHERE tr.id_kamar=kmr.id_kamar AND tr.id_users=usr.id_users AND tk.id_type=kmr.id_type ORDER BY id_transaksi DESC")->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_transaksi',$data);
        $this->load->view('templates_admin/footer');
    }

    public function pembayaran($id)
    {
        $where =array ('id_transaksi' => $id);
        $data['pembayaran'] = $this ->db->query("SELECT* FROM transaksi WHERE id_transaksi='$id'")->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/konfirmasi_pembayaran',$data);
        $this->load->view('templates_admin/footer');
    }

    public function cek_pembayaran()
    {
        $id                        = $this->input->post('id_transaksi');
        $status_pembayaran         = $this->input->post('status_pembayaran');
        $tanggal_pembayaran        = $this->input->post('tanggal_pembayaran');

        $data =array(
            'status_pembayaran' => $status_pembayaran,
            'tanggal_pembayaran' => $tanggal_pembayaran
        );

        $where = array(
            'id_transaksi' =>$id
        );

        $this->sewa_model->update_data('transaksi',$data,$where);
        
        redirect('admin/transaksi');
    }

    public function download_pembayaran($id)
    {
        $this->load->helper('download');
        $filePembayaran = $this->sewa_model->downloadPembayaran($id);
        $file = 'assets/upload/'.$filePembayaran['bukti_pembayaran'];
        force_download($file,NULL);
    }

    public function transaksi_selesai($id)
    {
        $where= array('id_transaksi' => $id);
        $data['transaksi'] = $this->db->query("SELECT *FROM transaksi tr, kamar kmr, users usr 
                            WHERE tr.id_kamar=kmr.id_kamar AND tr.id_users=usr.id_users AND id_transaksi='$id'")->result();
        //$data['transaksi']=$this->db->query("SELECT*FROM transaksi WHERE id_transaksi='$id'")->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/transaksi_selesai',$data);
        $this->load->view('templates_admin/footer');
    }

    public function transaksi_selesai_aksi()
    {
        
        $id                     = $this->input->post('id_transaksi');
        $idk                    = $this->input->post('id_kamar');
        

        $data=array(
            'id_kamar'              => $idk,
        );

        $where = array(
            'id_transaksi' => $id
        );
        
        $this->sewa_model->update_data('transaksi', $data,$where);
        $status = $this->input->post('status');
        $status= array(
            'status'    =>$status
        );
        $idk = array(
                'id_kamar' =>$idk
            );
        $this->sewa_model->update_data('kamar',$status,$idk);
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Transaksi Berhasil Di Update</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/transaksi');

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
            redirect('admin/transaksi');
    }
    
}

?>