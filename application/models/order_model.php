<?php 

class Order_model extends CI_Model {

    var $merchant   = '';
    var $order_id = '';
    var $user_id = '';
    var $status = '';
    var $date = '';
    var $amount = '';
    var $notes = '';

    function __construct(){
        parent::__construct();

        $this->load->library('encrypt');
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
    }

    /**
     * Update Status
     */
    public function updateStatus(){
        $order_id = $this->security->xss_clean($this->input->post('order_id'));
        $status = $this->security->xss_clean($this->input->post('status'));
        $notes = $this->security->xss_clean($this->input->post('notes'));
        $cashback = $this->security->xss_clean($this->input->post('cashback'));

        $data = array(
            'status' => $status,
            'notes' => $notes,
            'cashback'=>$cashback
        );

        $this->db->where('id', $order_id);
        $this->db->update('orders', $data); 
        return true;
    }
}

?>