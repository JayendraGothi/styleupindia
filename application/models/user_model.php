<?php 

class User_model extends CI_Model {

    var $email   = '';
    var $password = '';
    var $full_name = '';

    function __construct(){
        parent::__construct();

        $this->load->library('encrypt');
        $this->load->library('email', '', 'send_email');
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function changePassword($change_key){
        $password = $this->security->xss_clean($this->input->post('password'));
        $password_confirm = $this->security->xss_clean($this->input->post('password_confirm'));
        $data = array(
            'password' => $this->encrypt->sha1($password),
            'change_key' => null
        );
        $user = $this->checkChangeKey($change_key);
        $this->db->where('id', $user->id);
        $this->db->update('users', $data);
        return true;
    }

    function createUser(){
    	$this->full_name = $this->input->post('full_name');
    	$this->email = $this->input->post('email');
    	$pass = $this->input->post('password');
    	$this->password = $this->encrypt->sha1($pass);
    	$this->db->insert('users', $this);
        $data = array(
            'user' => $this,
            'view' => "registration_email",
            'subject' => 'Welcome to StyleUpIndia'
        );
        $this->sendEmail($data);

    	return true;
    }

    function getUser($email){
        $result = $this->db->get_where('users', array('email' => $email));
        if ($result->num_rows() > 0){
            return $result->row();
        }
        return null;
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

    public function arrangeForgotPassword($email){
        $this->db->where('email', $email);
        $change_key = $this->encrypt->sha1($email + $this->generateRandomString());
        $data = array(
            'change_key' => $change_key
        );
        $this->db->update('users', $data);
        return $change_key;
    }

    public function checkChangeKey($change_key){
        $result = $this->db->get_where('users', array('change_key' => $change_key));
        if ($result->num_rows() > 0){
            return $result->row();
        }
        return null;
    }

    public function forgotPassword($email){
        $user = $this->getUser($email);
        $change_key = $this->arrangeForgotPassword($email);
        $data = array(
            'url' => base_url() . "index.php/login/reset/" . $change_key,
            'user' => $user,
            'view' => "forgot_password_email",
            'subject' => 'Forgot Password'
        );
        $this->sendEmail($data);
    }

    public function sendEmail($data){
        $email = $this->load->view($data['view'], $data, true);
        $this->send_email->from('raj.kothari90@gmail.com', 'Raj');
        $this->send_email->to($data['user']->email);

        $this->send_email->subject($data['subject']);
        $this->send_email->message($email);
        $this->send_email->bcc('mkothari2001@yahoo.com');

        $this->send_email->send();
    }
}

?>