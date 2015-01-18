<?php
class Order extends CI_Controller {
	/**
	 * Login page
	 */
	function __construct(){
        parent::__construct();
        $this->load->model('order_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    /**
     * Display all the orders to the user
     */
    public function index(){
        // Send to login page if not logged in
        if (!$this->session->userdata['validated']){
            redirect('index.php/home');
        }
        $data['user'] = $this->session->userdata;
        $data['orders'] = $this->order_model->getOrders();

        if (isset($this->session->userdata['full_name'])){
           $data['full_name'] = $this->session->userdata['full_name'];
        }else{
            $data['full_name'] = null;
        }

        $data['body'] = $this->load->view('order_list', $data, true);
        return $this->load->view('base_template', $data);
    }

    /**
     * Display all the orders to the user
     */
    public function user($id){
        // Send to login page if not logged in
        if (!$this->session->userdata['validated']){
            redirect('index.php/home');
        }

        // Send to login page if not logged in
        if (!$this->session->userdata['isAdmin']){
            redirect('index.php/login/logout');
        }

        $data['orders'] = $this->order_model->getAllUserOrders($id);

        if (isset($this->session->userdata['full_name'])){
            $data['full_name'] = $this->session->userdata['full_name'];
        }else{
            $data['full_name'] = null;
        }

        return $this->load->view('allcashbackorders', $data);
    }

    /**
     * Create order
     */
    public function add(){
        if (isset($this->session->userdata['full_name'])){
           $data['full_name'] = $this->session->userdata['full_name'];
        }else{
            $data['full_name'] = null;
        }

        // Send to login page if not logged in
        if (!$this->session->userdata['validated']){
            redirect('index.php/home');
        }

        $data['totals'] = $this->order_model->getTotalCashBack($this->session->userdata['userid']);

        if ($this->input->post('submit')){
            $this->validationRules();
            if ($this->form_validation->run() == FALSE){
                $data['body'] = $this->load->view('cashback_form', $data, true);
            }else{
                $this->order_model->createOrder();
                redirect('index.php/order');
            }
        }else{
            $data['body'] = $this->load->view('cashback_form', $data, true);
        }

        return $this->load->view('base_template', $data);
    }

    /**
     * Set Validations
     */
    protected function validationRules(){
        $this->form_validation->set_rules('order_id', 'Order Id', 'required|is_unique[orders.order_id]');
        $this->form_validation->set_rules('merchant', 'Merchant', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required');
        $this->form_validation->set_rules('date', 'Date', 'required');
    }
}
?>