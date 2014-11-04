<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customers_lib {
    protected $_ci;

    function __construct() {
        $this->_ci = & get_instance();
        $this->_ci->load->model('customers/customers_model');
    }
    
    function __get_customers($id='') {
		$customers = $this -> _ci -> customers_model -> __get_customers_select();
		$res = '<option value=""></option>';
		foreach($customers as $k => $v)
			if ($id == $v -> cid)
				$res .= '<option value="'.$v -> cid.'" selected>'.$v -> cname.'</option>';
			else
				$res .= '<option value="'.$v -> cid.'">'.$v -> cname.'</option>';
		return $res;
	}

}
