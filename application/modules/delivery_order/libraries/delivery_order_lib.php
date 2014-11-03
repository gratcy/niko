<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class delivery_order_lib {
    protected $_ci;

    function __construct() {
        $this->_ci = & get_instance();
        $this->_ci->load->model('delivery_order/delivery_order_model');
    }
    
    function __get_delivery_order($id='') {
		$delivery_order = $this -> _ci -> delivery_order_model -> __get_delivery_order_select();
		$res = '<option value=""></option>';
		foreach($delivery_order as $k => $v)
			if ($id == $v -> bid)
				$res .= '<option value="'.$v -> bid.'" selected>'.$v -> bname.'</option>';
			else
				$res .= '<option value="'.$v -> bid.'">'.$v -> bname.'</option>';
		return $res;
	}



}
