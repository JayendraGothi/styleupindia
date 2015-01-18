<?php
class Login extends CI_Controller {
	/**
	 * Login page
	 */
	function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    /**
     * Login user
     */
	public function process(){
		// Load the model
        $this->load->model('user_model');

        // Validate the user can login
        $result = $this->user_model->validate();

        // Now we verify the result
        if(! $result){
            // If user did not validate, then show them login page again
            $msg = '<font color=red>Invalid username and/or password.</font><br />';
            redirect('index.php/home', $msg);
        }else{
            // If user did validate, 
            // Send them to members area
            if (isset($this->session->userdata['isAdmin'])){
            	redirect('index.php/admin');
            }
            redirect('index.php/order/add');
        }    
	}

	/**
	 * Registration page
	 */
	public function register(){
		
		if ($this->input->post('submit')){
			$this->validationRules();
			if ($this->form_validation->run() == FALSE){
				$data['body'] = $this->load->view('register', null, true);
			}else{
				$this->load->model('user_model');
				$this->user_model->createUser();
				redirect('index.php/order/add');
			}
		}else{
			$data['body'] = $this->load->view('register', null, true);
		}

		return $this->load->view('base_template', $data);
	}

	/**
	 * Logout page
	 */
	public function logout(){
		$data = array(
            'userid' => "",
            'full_name' => "",
            'validate' => false,
			'isAdmin' => false
        );
		$this->session->unset_userdata($data);
		redirect('index.php/home');
	}

	/**
	 * Set Validations
	 */
	protected function validationRules(){
		$this->form_validation->set_rules('full_name', 'Full Name', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
	}
}
?>
