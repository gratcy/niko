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
		$this -> load -> model('inventory_model');
	}

	function index($type) {
		if (!$type) $type = 1;
		
		if ($type == 1)
			$perm = (__get_roles('ExecuteAllBranchInventoryProduct') == 1 ? "" : $this -> memcachedlib -> sesresult['ubid']);
		elseif ($type == 2)
			$perm = (__get_roles('ExecuteAllBranchInventorySparepart') == 1 ? "" : $this -> memcachedlib -> sesresult['ubid']);
		elseif ($type == 3)
			$perm = (__get_roles('ExecuteAllBranchInventoryServices') == 1 ? "" : $this -> memcachedlib -> sesresult['ubid']);
		else
			$perm = (__get_roles('ExecuteAllBranchInventoryReturn') == 1 ? "" : $this -> memcachedlib -> sesresult['ubid']);
		
		$pager = $this -> pagination_lib -> pagination($this -> inventory_model -> __get_inventory($type,$perm),3,10,site_url('inventory/' . $type));
		$view['inventory'] = $this -> pagination_lib -> paginate();
		$view['type'] = $type;
		$view['pages'] = $this -> pagination_lib -> pages();
		$this->load->view('inventory', $view);
	}
	
	function inventory_add($type) {
		if ($_POST) {
			$type = (int) $this -> input -> post('type');
			$stock = (int) $this -> input -> post('stock');
			$stockout = (int) $this -> input -> post('stockout');
			$stockin = (int) $this -> input -> post('stockin');
			$stockbegining = (int) $this -> input -> post('stockbegining');
			$item = (int) $this -> input -> post('item');
			$branch = (int) $this -> input -> post('branch');
			$status = (int) $this -> input -> post('status');
			
			if (!$item || !$branch || !$type) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('inventory' . '/' . __FUNCTION__ . '/' . $type));
			}
			else {
				$arr = array('ibid' => $branch, 'iiid' => $item, 'itype' => $type, 'istockbegining' => $stockbegining, 'istockin' => $stockin, 'istockout' => $stockout, 'istock' => $stock, 'istatus' => $status);
				if ($this -> inventory_model -> __insert_inventory($arr)) {
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('inventory/' . $type));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('inventory/' . $type));
				}
			}
		}
		else {
			$view['type'] = $type;
			$view['branch'] = $this -> branch_lib -> __get_branch();
			if ($type == 1 || $type == 2 || $type == 3)
				$view['items'] = $this -> products_lib -> __get_products();
			else
				$view['items'] = $this -> sparepart_lib -> __get_sparepart();
			$this->load->view(__FUNCTION__, $view);
		}
	}
	
	function inventory_update($type,$id) {
		if ($_POST) {
			$type = (int) $this -> input -> post('type');
			$stock = (int) $this -> input -> post('stock');
			$stockout = (int) $this -> input -> post('stockout');
			$stockin = (int) $this -> input -> post('stockin');
			$stockbegining = (int) $this -> input -> post('stockbegining');
			$item = (int) $this -> input -> post('item');
			$branch = (int) $this -> input -> post('branch');
			$status = (int) $this -> input -> post('status');
			$id = (int) $this -> input -> post('id');
			
			if ($id && $type) {
				if (!$item || !$branch) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('inventory' . '/' . __FUNCTION__ . '/' . $type . '/' . $id));
				}
				else {
					$arr = array('ibid' => $branch, 'iiid' => $item, 'istatus' => $status);
					if ($this -> inventory_model -> __update_inventory($id, $arr, $type)) {	
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('inventory/' . $type));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('inventory/' . $type));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('inventory/' . $type));
			}
		}
		else {
			$view['id'] = $id;
			$view['type'] = $type;
			$view['detail'] = $this -> inventory_model -> __get_inventory_detail($type,$id,$this -> memcachedlib -> sesresult['ubid']);
			$view['branch'] = $this -> branch_lib -> __get_branch($view['detail'][0] -> ibid);
			if ($type == 1 || $type == 2 || $type == 3)
				$view['items'] = $this -> products_lib -> __get_products($view['detail'][0] -> iiid);
			else
				$view['items'] = $this -> sparepart_lib -> __get_sparepart($view['detail'][0] -> iiid);
			$this->load->view(__FUNCTION__, $view);
		}
	}

	function inventory_delete($type,$id) {
		if ($this -> inventory_model -> __delete_inventory($id,$this -> memcachedlib -> sesresult['ubid'])) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('inventory'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('inventory'));
		}
	}
}
