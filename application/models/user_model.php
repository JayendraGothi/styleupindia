<?php 

class User_model extends CI_Model {

    var $email   = '';
    var $password = '';
    var $full_name = '';

    function __construct(){
        parent::__construct();

        $this->load->library('encrypt');
    }

    function createUser(){
    	$this->full_name = $this->input->post('full_name');
    	$this->email = $this->input->post('email');
    	$pass = $this->input->post('password');
    	$this->password = $this->encrypt->sha1($pass);
    	$this->db->insert('users', $this);
    	return true;
    }

    /**
     * Display Admin Order List
     */
    public function getAllUsers(){
        $this->db->select('banks.*, users.*');
        $this->db->from('banks');
        $this->db->join('users', 'banks.user_id = users.id', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function validate(){
        // grab user input
        $username = $this->security->xss_clean($this->input->post('email'));
        $password = $this->encrypt->sha1($this->security->xss_clean($this->input->post('password')));

        // Prep the query
        $this->db->where('email', $username);
        $this->db->where('password', $password);
        
        // Run the query
        $query = $this->db->get('users');
        // Let's check if there are any results
        if($query->num_rows == 1)
        {
            // If there is a user, then create session data
            $row = $query->row();

            $data = array(
                'userid' => $row->id,
                'full_name' => $row->full_name,
                'validated' => true
            );
            if ($row->isAdmin == 1){
                $data['isAdmin'] = true;
            }

            $this->session->set_userdata($data);
            return true;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }

}

?>