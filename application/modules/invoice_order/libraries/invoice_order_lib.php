<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class invoice_order_lib {
    protected $_ci;

    function __construct() {
        $this->_ci = & get_instance();
        $this->_ci->load->model('invoice_order/invoice_order_model');
    }
    
    // function __get_invoice_order($id='') {
		// $invoice_order = $this -> _ci -> invoice_order_model -> __get_invoice_order_select();
		// $res = '<option value=""></option>';
		// foreach($invoice_order as $k => $v)
			// if ($id == $v -> bid)
				// $res .= '<option value="'.$v -> bid.'" selected>'.$v -> bname.'</option>';
			// else
				// $res .= '<option value="'.$v -> bid.'">'.$v -> bname.'</option>';
		// return $res;
	// }



}
