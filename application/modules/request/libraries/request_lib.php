<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Request_lib {
    protected $_ci;

    function __construct() {
        $this->_ci = & get_instance();
        $this->_ci->load->model('request/request_model');
    }
    
    function __get_request($id='',$bid='',$type=1) {
		$receiving = $this -> _ci -> request_model -> __get_request_select($bid,$type);

		$res = '<option value=""></option>';
		foreach($receiving as $k => $v)
			if ($id == $v -> did)
				$res .= '<option dtitle="'.$v -> dtitle.'" ddate="'.date('d/m/Y', $v -> ddate).'" value="'.$v -> did.'" selected>'.'R0'.$v -> dtype.str_pad($v -> did, 4, "0", STR_PAD_LEFT).'</option>';
			else
				$res .= '<option dtitle="'.$v -> dtitle.'" ddate="'.date('d/m/Y', $v -> ddate).'" value="'.$v -> did.'">'.'R0'.$v -> dtype.str_pad($v -> did, 4, "0", STR_PAD_LEFT).'</option>';
		return $res;
	}
}
