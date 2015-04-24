<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Suplier_lib {
    protected $_ci;

    function __construct() {
        $this->_ci = & get_instance();
        $this->_ci->load->model('suplier/suplier_model');
    }
    
    function __get_suplier($id='') {
		$suplier = $this -> _ci -> suplier_model -> __get_suplier_select();
		$res = '<option value=""></option>';
		foreach($suplier as $k => $v)
			if ($id == $v -> sid)
				$res .= '<option value="'.$v -> sid.'" selected>'.$v -> sname.'</option>';
			else
				$res .= '<option value="'.$v -> sid.'">'.$v -> sname.'</option>';
		return $res;
	}

}
