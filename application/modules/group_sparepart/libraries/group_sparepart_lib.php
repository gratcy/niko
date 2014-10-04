<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group_sparepart_lib {
    protected $_ci;

    function __construct() {
        $this->_ci = & get_instance();
        $this->_ci->load->model('group_sparepart/group_sparepart_model');
    }
    
    function __get_group_sparepart($id='') {
		$users = $this -> _ci -> group_sparepart_model -> __get_group_sparepart_select();
		$res = '<option value=""></option>';
		foreach($users as $k => $v)
			if ($id == $v -> cid)
				$res .= '<option value="'.$v -> cid.'" selected>'.$v -> cname.'</option>';
			else
				$res .= '<option value="'.$v -> cid.'">'.$v -> cname.'</option>';
		return $res;
	}

}
