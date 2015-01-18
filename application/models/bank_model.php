<?php 

class Bank_model extends CI_Model {

    var $holder_name   = '';
    var $name = '';
    var $account_number = '';
    var $ifsc_code = '';
    var $branch = '';

    function __construct(){
        parent::__construct();
    }

    /**
     * Get Bank details
     */
    public function getBank(){
        $userId = $this->session->userdata['userid'];
    	$result = $this->db->get_where('banks', array('user_id' => $userId));
        if ($result->num_rows() > 0){
            return $result->row();
        }
        return null;
    }

    /**
     * Get Bank by id details
     */
    public function getBankById($id){
        $this->db->where('id', $id);
        return $this->db->result()->row();
    }

    /**
     * Display Admin Bank Account List
     */
    public function getAllAccounts(){
        $this->db->select('banks.*,users.*');
        $this->db->from('banks');
        $this->db->join('users', 'banks.user_id = users.id', 'left'); 
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * Create new bank details
     */
    public function createAccount(){
        // grab user input
        $this->holder_name = $this->security->xss_clean($this->input->post('holder_name'));
        $this->name = $this->security->xss_clean($this->input->post('name'));
        $this->ifsc_code = $this->security->xss_clean($this->input->post('ifsc_code'));;
        $this->branch = $this->security->xss_clean($this->input->post('branch'));
        $this->account_number = $this->security->xss_clean($this->input->post('account_number'));
        $this->user_id = $this->session->userdata['userid'];

        $this->db->insert('banks', $this);
    }

    /**
     * update Bank details
     */
    public function updateAccount($id){
        // grab user input
        $this->holder_name = $this->security->xss_clean($this->input->post('holder_name'));
        $this->name = $this->security->xss_clean($this->input->post('name'));
        $this->ifsc_code = $this->security->xss_clean($this->input->post('ifsc_code'));;
        $this->branch = $this->security->xss_clean($this->input->post('branch'));
        $this->account_number = $this->security->xss_clean($this->input->post('account_number'));

        $this->db->where('id', $id);
        $this->db->update('banks', $this);
    }
}

?>