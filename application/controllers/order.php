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
                print_r($this->input->post('date'));
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

    public function check_past_date($date){
        $start_ts = strtotime("now - 5 days");
        $user_ts = strtotime($date);

        return $user_ts >= $start_ts;
    }

    public function check_future_date($date){
        $end_ts = strtotime("now");
        $user_ts = strtotime($date);

        return $user_ts < $end_ts;
    }

    /**
     * Set Validations
     */
    protected function validationRules(){
        $this->form_validation->set_rules('order_id', 'Order Id', 'required|is_unique[orders.order_id]');
        $this->form_validation->set_rules('merchant', 'Merchant', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required');
        $this->form_validation->set_rules('date', 'Date', 'required|callback_check_past_date|callback_check_future_date');
        $this->form_validation->set_message('check_past_date', 'We Accept orders from last 5 days only.');
        $this->form_validation->set_message('check_future_date', 'Future Date not Allowed.');
    }
}
?>