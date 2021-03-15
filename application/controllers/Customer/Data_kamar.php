<?php 

class Data_kamar extends CI_Controller{
    public function index()
    {
        $data['kamar'] = $this->db->query("SELECT *FROM type_kamar tk, kamar kmr
                         WHERE tk.id_type=kmr.id_type ORDER BY id_kamar ASC")->result();
        $this->load->view('templates_customer/header');
        $this->load->view('customer/data_kamar',$data);
        $this->load->view('templates_customer/footer');
        
    }
    public function detail_kamar($id)
    {
        $where= array('id_kamar' => $id);
        $data['detail'] = $this->db->query("SELECT *FROM type_kamar tk, kamar kmr
                         WHERE tk.id_type=kmr.id_type AND id_kamar='$id'")->result();           
       // $data['detail'] = $this->sewa_model->ambil_id_kamar($id);
        $this->load->view('templates_customer/header');
        $this->load->view('customer/detail_kamar',$data);
        $this->load->view('templates_customer/footer');
        
    }

}

?>