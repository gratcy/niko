<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Purchase_order_detail_lib {
    protected $_ci;

    function __construct() {
        $this->_ci = & get_instance();
        $this->_ci->load->model('purchase_order_detail/purchase_order_detail_model');
    }
    
    function __get_purchase_order_detail($id='') {
		$purchase_order_detail = $this -> _ci -> purchase_order_detail_model -> __get_purchase_order_detail_select();
		$res = '<option value=""></option>';
		foreach($purchase_order_detail as $k => $v)
			if ($id == $v -> bid)
				$res .= '<option value="'.$v -> bid.'" selected>'.$v -> bname.'</option>';
			else
				$res .= '<option value="'.$v -> bid.'">'.$v -> bname.'</option>';
		return $res;
	}

	function __get_purchase_order_detail_moq($arr = array()) {
		$purchase_order_detail = $this -> _ci -> purchase_order_detail_model -> __get_purchase_order_detail_select();
		$res = '';
		foreach($purchase_order_detail as $k => $v)
			$res .= $v -> bname.' <input type="text" name="moq['.$v -> bid.']" class="form-control" style="text-align:right;" onkeyup="formatharga(this.value,this)" value="'.($arr == array() ? '0' : self::__check_moq($arr, 1)).'" />';
		return $res;
	}
	
	function __check_moq($arr, $bid) {
		foreach($arr as $k => $v)
			if ($v -> mbid == $bid) return $v -> mqty;
	}
}
