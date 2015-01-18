<?php
class Bank extends CI_Controller {
	/**
	 * Login page
	 */
	function __construct(){
        parent::__construct();
        $this->load->model('bank_model');
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
        $data['bank'] = $this->bank_model->getBank();

        if (isset($this->session->userdata['full_name'])){
           $data['full_name'] = $this->session->userdata['full_name'];
        }else{
            $data['full_name'] = null;
        }

        $data['body'] = $this->load->view('bank_details', $data, true);
        return $this->load->view('base_template', $data);
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

        $data['bank'] = $this->bank_model->getBank();

        if ($this->input->post('submit')){
            $this->validationRules();
            if ($this->form_validation->run() == FALSE){
                $data['body'] = $this->load->view('bank_details', $data, true);
            }else{
                $this->bank_model->createAccount();
                $this->index();
            }
        }else{
            redirect('index.php/bank');
        }

        return $this->load->view('base_template', $data);
    }

    /**
     * update order
     */
    public function update($id){
        if (isset($this->session->userdata['full_name'])){
            $data['full_name'] = $this->session->userdata['full_name'];
        }else{
            $data['full_name'] = null;
        }

        // Send to login page if not logged in
        if (!$this->session->userdata['validated']){
            redirect('index.php/home');
        }
        $data['id'] = $id;
        $bank = $this->bank_model->getBank();
        if ($bank->user_id != $this->session->userdata['userid']){
            redirect('index.php/login/logout');
        }else{
            $data['holder_name'] = $bank->holder_name;
            $data['name'] = $bank->name;
            $data['branch'] = $bank->branch;
            $data['ifsc_code'] = $bank->ifsc_code;
            $data['account_number'] = $bank->account_number;
        }

        if ($this->input->post('submit')){
            $this->validationRules();
            if ($this->form_validation->run() == FALSE){
                $data['body'] = $this->load->view('update_bank_details', $data, true);
            }else{
                $this->bank_model->updateAccount($id);
                $data['bank'] = $bank;
                redirect('index.php/bank');
            }
        }else{
            $data['body'] = $this->load->view('update_bank_details', $data, true);
        }

        return $this->load->view('base_template', $data);
    }

    /**
     * Set Validations
     */
    protected function validationRules(){
        $this->form_validation->set_rules('holder_name', 'Account Holder Name', 'required');
        $this->form_validation->set_rules('name', 'Bank Name', 'required');
        $this->form_validation->set_rules('account_number', 'Account Number', 'required');
        $this->form_validation->set_rules('ifsc_code', 'IFSC Code', 'required');
        $this->form_validation->set_rules('branch', 'Branch', 'required');
    }
}
?>