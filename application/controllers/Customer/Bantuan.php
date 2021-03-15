<?php 

class Bantuan extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates_customer/header');
        $this->load->view('customer/bantuan');
        $this->load->view('templates_customer/footer');
        
    }
}

?>