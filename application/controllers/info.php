<?php
class Info extends CI_Controller {
    /**
     * Login page
     */
    function __construct(){
        parent::__construct();
    }

    public function index($msg = null){
        $data['body'] = $this->load->view('missing_cashback', null, true);
        return $this->load->view('base_template', $data);
    }

    public function termsandconditions($msg = null){
        $data['body'] = $this->load->view('termsandconditions', null, true);
        return $this->load->view('base_template', $data);
    }

    public function disclaimer($msg = null){
        $data['body'] = $this->load->view('disclaimer', null, true);
        return $this->load->view('base_template', $data);
    }

}
?>