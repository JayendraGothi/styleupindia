<?php

class Admin extends CI_Controller
{
    /**
     * Login page
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('order_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('email');
    }

    /**
     * Display all the orders to the user
     */
    public function index()
    {
        if (isset($this->session->userdata['full_name'])) {
            $data['full_name'] = $this->session->userdata['full_name'];
        } else {
            $data['full_name'] = null;
        }

        // Send to login page if not logged in
        if (!$this->session->userdata['isAdmin']) {
            redirect('index.php/home');
        }
        $data['orders'] = $this->order_model->getAllOrders();
        $this->load->view('allcashbackorders', $data);
    }

    /**
     * Update Status
     */
    public function status()
    {
        // Send to login page if not logged in
        if (!$this->session->userdata['isAdmin']) {
            redirect('index.php/login/logout');
        }

        if (!$this->input->post('submit')) {
            redirect('index.php/admin');
        } else {
            $this->order_model->updateStatus();
            redirect('index.php/admin');
        }
    }
}

?>