<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Services_wo_lib {
    protected $_ci;

    function __construct() {
        $this->_ci = & get_instance();
        $this->_ci->load->model('services_wo/services_wo_model');
    }
    
    function __get_services_wo($id='', $bid) {	
		$branch = $this -> _ci -> services_wo_model -> __get_services_wo_select($bid);		
		$res = '<option value=""></option>';
		foreach($branch as $k => $v)
			if ($id == $v -> sid)
				$res .= '<option value="'.$v -> sid.'" selected>'.$v -> sno.'</option>';
			else
				$res .= '<option value="'.$v -> sid.'">'.$v -> sno.'</option>';
		return $res;
	}
}
