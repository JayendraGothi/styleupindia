<?php
class User extends CI_Controller {
    /**
     * Login page
     */
    function __construct(){
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('order_model');
    }

    /**
     * Display all the orders to the user
     */
    public function index(){
        if (isset($this->session->userdata['full_name'])){
            $data['full_name'] = $this->session->userdata['full_name'];
        }else{
            $data['full_name'] = null;
        }

        // Send to login page if not logged in
        if (!$this->session->userdata['isAdmin']){
            redirect('index.php/home');
        }
        $data['users'] = $this->user_model->getAllUsers();

        $this->load->view('users', $data);
    }

    /**
     * Display all the orders to the user
     */
    public function view($id){
        if (isset($this->session->userdata['full_name'])){
            $data['full_name'] = $this->session->userdata['full_name'];
        }else{
            $data['full_name'] = null;
        }

        // Send to login page if not logged in
        if (!$this->session->userdata['isAdmin']){
            redirect('index.php/home');
        }
        $data['users'] = $this->user_model->getAllOrders();

        $this->load->view('allcashbackorders', $data);
    }
}
?>