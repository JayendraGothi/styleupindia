<?php
	function asset_url(){
	   return base_url().'public/';
	}

	function login_url(){
		return base_url().'index.php/home';
	}

	function is_rejected($value){
		return $value == 4;
	}

	function str_status($value){
		if ($value == 0){
			return "Pending";
		} elseif($value == 1){
			return "Under Progress";
		} elseif($value == 2){
			return "Approved";
		} elseif($value == 3){
			return "Credited";
		} elseif($value == 4){
			return "Rejected";
		}
	}

	function add_months($date){
		return date('Y-m-d', strtotime("+3 months", strtotime($date)));
	}

	function format_date($date){
		return date('d F Y', strtotime($date));
	}
?>