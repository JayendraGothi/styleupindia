<?php
class Home extends CI_Controller {
	/**
	 * Login page
	 */
	function __construct(){
        parent::__construct();
    }

    public function index($msg = null){
        if (isset($this->session->userdata['validated']) && $this->session->userdata['validated']){
            redirect('index.php/order/add');
        }

        if (isset($this->session->userdata['full_name'])){
    	   $data['full_name'] = $this->session->userdata['full_name'];
        }else{
            $data['full_name'] = null;
        }
        $data['msg'] = $msg;
        $data['body'] = $this->load->view('home', $data, true);
        return $this->load->view('base_template', $data);
    }
}
?>