<?php 

class Data_kamar extends CI_Controller{
    public function index()
    {
        $data['kamar'] = $this->db->query("SELECT *FROM type_kamar tk, kamar kmr
                         WHERE tk.id_type=kmr.id_type ORDER BY id_kamar ASC")->result();
        //$data['kamar']=$this->sewa_model->get_data('kamar')->result();
        //$data['type_kamar']=$this->sewa_model->get_data('type_kamar')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_kamar',$data);
        $this->load->view('templates_admin/footer');
        
    }
    public function tambah_kamar()
    {
        $data['type_kamar']=$this->sewa_model->get_data('type_kamar')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_tambah_kamar',$data);
        $this->load->view('templates_admin/footer');
        
    }

    public function tambah_kamar_aksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->tambah_kamar();
        }else {
            $id_type      = $this->input->post('id_type');
            $nama_kamar     = $this->input->post('nama_kamar');
            $status         = $this->input->post('status');
            $gambar         = $_FILES['gambar']['name'];
            if($gambar=''){}else{
                $config['upload_path']      ='./assets/upload';
                $config['allowed_types']    ='jpg|png|jpeg';
                
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('gambar')){
                    echo "Gambar Gagal Di Upload";
                }else{
                    $gambar=$this->upload->data('file_name');
                }
            }
            
            $data = array(
                'id_type'             => $id_type,
                'nama_kamar'            => $nama_kamar,
                'status'                => $status,

                'gambar'                => $gambar

            );
            $this->sewa_model->insert_data($data,'kamar');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Ditambah</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('admin/data_kamar');
        }
    }

    public function update_kamar($id)
    {
        $where=array('id_kamar' => $id);
        $data['kamar']=$this->db->query("SELECT*FROM kamar kmr, type_kamar tk WHERE kmr.id_type = tk.id_type AND kmr.id_kamar ='$id'")->result();
        $data['type_kamar']=$this->sewa_model->get_data('type_kamar')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_update_kamar',$data);
        $this->load->view('templates_admin/footer');
    }

    public function update_kamar_aksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('pesan','<div class="alert alert-sm alert-danger alert-dismissible fade show" role="alert">
                    <strong>Terdapat Kesalahan, Coba Ulangi Kembali</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
            $this->index();
        }else{
            $id             = $this->input->post('id_kamar');
            $id_type      = $this->input->post('id_type');
            $nama_kamar     = $this->input->post('nama_kamar');
            $status         = $this->input->post('status');
            $gambar         = $_FILES['gambar']['name'];
            if($gambar){
                $config['upload_path']      ='./assets/upload';
                $config['allowed_types']    ='jpg|png|jpeg';

                $this->load->library('upload',$config);

                if($this->upload->do_upload('gambar')){
                    $gambar=$this->upload->data('file_name');
                    $this->db->set('gambar', $gambar);
            }else{
                echo $this->upload->display_error();
                }
            }
            $data = array(
                'id_type'             => $id_type,
                'nama_kamar'            => $nama_kamar,
                'status'                => $status
            );
            $where = array (
                'id_kamar'      =>$id
            );
                $this->sewa_model->update_data('kamar',$data,$where);
                $this->session->set_flashdata('pesan','<div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Data Berhasil Diupdate</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                redirect('admin/data_kamar');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_type','Type Kamar', 'required');
        $this->form_validation->set_rules('status','Status', 'required');
        $this->form_validation->set_rules('nama_kamar','Nama Kamar', 'required');
    }

    public function detail_kamar($id)
    {
        $where= array('id_kamar' => $id);
        $data['detail'] = $this->db->query("SELECT *FROM type_kamar tk, kamar kmr
                         WHERE tk.id_type=kmr.id_type AND id_kamar='$id'")->result();  
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/detail_kamar',$data);
        $this->load->view('templates_admin/footer');
    }
    public function delete_kamar($id){
        $where = array('id_kamar' => $id);
        $this->sewa_model->delete_data($where,'kamar');
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Dihapus</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('admin/data_kamar');
    }
}

?>