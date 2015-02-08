<?php 

class Order_model extends CI_Model {

    var $merchant   = '';
    var $order_id = '';
    var $user_id = '';
    var $status = '';
    var $date = '';
    var $amount = '';
    var $notes = '';
    var $rejection_reason = '';

    function __construct(){
        parent::__construct();

        $this->load->library('encrypt');
        $this->load->library('email');
        $this->load->helpers('utility');
    }

    /**
     * Display Order List
     */
    public function getOrders(){
        $userId = $this->session->userdata['userid'];
        $this->db->order_by('id', 'desc');
    	return $this->db->get_where('orders', array('user_id' => $userId))->result();
    }

    /**
     * Display Admin Order List
     */
    public function getAllOrders(){
        $this->db->select('users.*, orders.*');
        $this->db->from('orders');
        $this->db->join('users', 'orders.user_id = users.id', 'left'); 
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * Display User Order List
     */
    public function getAllUserOrders($user_id){
        $this->db->select('users.*, orders.*');
        $this->db->from('orders');
        $this->db->where('user_id', $user_id);
        $this->db->join('users', 'orders.user_id = users.id', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function getOrder($order_id){
        $this->db->select('users.*, orders.*');
        $this->db->from('orders');
        $this->db->where('orders.id', $order_id);
        $this->db->join('users', 'orders.user_id = users.id', 'left');
        $query = $this->db->get();
        return $query->row();
    }

    public function getTotalCashBack($user_id){
        $orders = $this->getAllUserOrders($user_id);

        $totals = array(
            'total_pending' => 0,
            'total_confirmed' => 0,
            'total_paid' => 0,
        );

        foreach($orders as $order){
            if ($order->status == 0 || $order->status == 1){
                $totals['total_pending'] += $order->cashback;
            }elseif($order->status == 2){
                $totals['total_confirmed'] += $order->cashback;
            }elseif($order->status == 3){
                $totals['total_paid'] += $order->cashback;
            }
        }
        return $totals;

    }

    /**
     * Create New Order
     */
    public function createOrder(){
        // grab user input
        $this->order_id = $this->security->xss_clean($this->input->post('order_id'));
        $this->merchant = $this->security->xss_clean($this->input->post('merchant'));
        $this->status = 0;
        $this->amount = $this->security->xss_clean($this->input->post('amount'));
        $this->date = $this->security->xss_clean($this->input->post('date'));
        $this->user_id = $this->session->userdata['userid'];

        $this->db->insert('orders', $this);

        $email_data = array(
            'full_name' => $this->session->userdata['full_name'],
            'order' => $this,
            'view' => "admin_order_email",
            'subject' => 'StyleUpIndia New Order',
            'email' => "raj.kothari90@gmail.com"
        );

        $this->sendEmail($email_data);
    }

    /**
     * Update Status
     */
    public function updateStatus(){
        $order_id = $this->security->xss_clean($this->input->post('order_id'));
        $status = $this->security->xss_clean($this->input->post('status'));
        $notes = $this->security->xss_clean($this->input->post('notes'));
        $rejection_reason = $this->security->xss_clean($this->input->post('rejection_reason'));
        $cashback = $this->security->xss_clean($this->input->post('cashback'));

        $order = $this->getOrder($order_id);

        if (is_null($order)){
            return false;
        }

        if ($order->status != $status){
            $data = array(
                'status' => $status,
                'notes' => $notes,
                'cashback'=>$cashback,
                'rejection_reason'=>$rejection_reason
            );
            $order->status = $status;

            $this->db->where('id', $order_id);
            $this->db->update('orders', $data);

            $email_data = array(
                'full_name' => $order->full_name,
                'order' => $order,
                'view' => "status_update",
                'subject' => 'StyleUpIndia Status Update',
                'email' => $order->email
            );

            $this->sendEmail($email_data);
        }
        return true;
    }

    public function sendEmail($email_data){
        $email = $this->load->view($email_data['view'], $email_data, true);
        $this->email->from('raj.kothari90@gmail.com', 'Raj');
        $this->email->to($email_data['email']);

        $this->email->subject($email_data['subject']);
        $this->email->message($email);
        $this->email->bcc('customercare@styleupindia.com');

        $this->email->send();
    }
}

?>