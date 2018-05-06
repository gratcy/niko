<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Peticash_categories_lib {
    protected $_ci;

    function __construct() {
        $this->_ci = & get_instance();
        $this->_ci->load->model('peticash_categories/peticash_categories_model');
    }
    
    function __get_peticash_categories($id='') {
		$users = $this -> _ci -> peticash_categories_model -> __get_peticash_categories_select();
		$res = '<option value=""></option>';
		foreach($users as $k => $v)
			if ($id == $v -> cid)
				$res .= '<option value="'.$v -> cid.'" selected>'.$v -> cname.'</option>';
			else
				$res .= '<option value="'.$v -> cid.'">'.$v -> cname.'</option>';
		return $res;
	}
}
