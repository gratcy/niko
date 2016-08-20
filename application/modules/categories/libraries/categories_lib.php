<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories_lib {
    protected $_ci;

    function __construct() {
        $this->_ci = & get_instance();
        $this->_ci->load->model('categories/categories_model');
    }
    
    function __get_categories($id='') {
		$users = $this -> _ci -> categories_model -> __get_categories_select();
		$res = '<option value=""></option>';
		foreach($users as $k => $v)
			if ($id == $v -> cid)
				$res .= '<option value="'.$v -> cid.'" selected>'.$v -> cname.'</option>';
			else
				$res .= '<option value="'.$v -> cid.'">'.$v -> cname.'</option>';
		return $res;
	}
    
    function __get_categories_check($ccid='') {
		if ($ccid) $ccid = unserialize($ccid);
		$cat = $this -> _ci -> categories_model -> __get_categories(2);
		$res = '<table>';
		foreach($cat as $k => $v) {
			$res .= '<tr>';
			$res .= '<td><b>'.$v -> cname.'</b></td><td></td>';
			$res .= '</tr>';
			$res .= '<tr>';
			$res .= '<td>Cash (%)</td><td><input type="text" value="'.(isset($ccid[$v -> cid]) ? $ccid[$v -> cid][0] : '').'" name="cid['.$v -> cid.'][]" class="form-control"></td>';
			$res .= '</tr>';
			$res .= '<tr>';
			$res .= '<td>Credit (%)</td><td><input type="text" value="'.(isset($ccid[$v -> cid]) ? $ccid[$v -> cid][1] : '').'" name="cid['.$v -> cid.'][]" class="form-control"></td>';
			$res .= '</tr>';
			$res .= '<tr>';
			$res .= '<td>Penalty (%)</td><td><input type="text" value="'.(isset($ccid[$v -> cid]) ? $ccid[$v -> cid][2] : '').'" name="cid['.$v -> cid.'][]" class="form-control"></td>';
			$res .= '</tr>';
			$res .= '<tr>';
			$res .= '<td>Limit Cash</td><td><input type="number" value="'.(isset($ccid[$v -> cid]) ? $ccid[$v -> cid][3] : '').'" name="cid['.$v -> cid.'][]" class="form-control"></td>';
			$res .= '</tr>';
			$res .= '<tr>';
			$res .= '<td>Limit Credit</td><td><input type="number" value="'.(isset($ccid[$v -> cid]) ? $ccid[$v -> cid][4] : '').'" name="cid['.$v -> cid.'][]" class="form-control"></td>';
			$res .= '</tr>';
			$res .= '<tr><td>&nbsp;</td><td>&nbsp;</td></tr>';
		}
		$res .= '</table>';
		return $res;
	}
}
