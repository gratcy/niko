<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> library('branch/branch_lib');
		$this -> load -> library('products/products_lib');
		$this -> load -> library('sparepart/sparepart_lib');
		$this -> load -> model('inventory/inventory_model');
		$this -> load -> model('opname_model');
	}

	function index($type=1) {
		if (!$type) $type = 1;
		
		if ($type == 1)
			$perm = (__get_roles('ExecuteAllBranchOpnameProduct') == 1 ? "" : $this -> memcachedlib -> sesresult['ubid']);
		elseif ($type == 2)
			$perm = (__get_roles('ExecuteAllBranchOpnameSparepart') == 1 ? "" : $this -> memcachedlib -> sesresult['ubid']);
		elseif ($type == 3)
			$perm = (__get_roles('ExecuteAllBranchOpnameServices') == 1 ? "" : $this -> memcachedlib -> sesresult['ubid']);
		else
			$perm = (__get_roles('ExecuteAllBranchOpnameReturn') == 1 ? "" : $this -> memcachedlib -> sesresult['ubid']);
		
		
		$pager = $this -> pagination_lib -> pagination($this -> opname_model -> __get_opname_inventory($type,$perm),3,10,site_url('opname/' . $type));
		$view['opname'] = $this -> pagination_lib -> paginate();
		$view['type'] = $type;
		$view['pages'] = $this -> pagination_lib -> pages();
		$this->load->view('opname', $view);
	}

	function opname_update($type, $id) {
		if ($_POST) {
			$id = (int) $this -> input -> post('id');
			$type = (int) $this -> input -> post('type');
			$stock = (int) $this -> input -> post('stock');
			$stockout = (int) $this -> input -> post('stockout');
			$stockin = (int) $this -> input -> post('stockin');
			$stockbegining = (int) $this -> input -> post('stockbegining');
			
			$stock2 = (int) $this -> input -> post('stock2');
			$stockout2 = (int) $this -> input -> post('stockout2');
			$stockin2 = (int) $this -> input -> post('stockin2');
			$stockbegining2 = (int) $this -> input -> post('stockbegining2');
			
			
			if ($id && $type) {
				$arr = array('itype' => $type, 'istockbegining' => $stockbegining, 'istockin' => $stockin, 'istockout' => $stockout, 'istock' => $stock);
				if ($this -> inventory_model -> __update_inventory($id, $arr, $type)) {
					$oarr = array('oidid' => $id,'otype' => $type, 'odate' => time(), 'ostockbegining' => $stockbegining2, 'ostockin' => $stockin2, 'ostockout' => $stockout2, 'ostock' => $stock2);
					$this -> opname_model -> __insert_opname($oarr);
					
					__set_error_msg(array('info' => 'Stock opname berhasil dilakukan.'));
					redirect(site_url('opname/' . $type));
				}
				else {
					__set_error_msg(array('error' => 'Gagal mengubah stock !!!'));
					redirect(site_url('opname/' . $type));
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('opname/' . $type));
			}
		}
		else {
			$view['id'] = $id;
			$view['type'] = $type;
			$view['detail'] = $this -> inventory_model -> __get_inventory_detail($type, $id);
			$view['branch'] = $this -> branch_lib -> __get_branch($view['detail'][0] -> ibid);
			if ($type == 1 || $type == 3 || $type == 4)
				$view['items'] = $this -> products_lib -> __get_products($view['detail'][0] -> iiid);
			else
				$view['items'] = $this -> sparepart_lib -> __get_sparepart($view['detail'][0] -> iiid);
			$this->load->view(__FUNCTION__, $view);
		}
	}
}
