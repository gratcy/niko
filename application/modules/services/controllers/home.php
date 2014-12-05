<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> library('branch/branch_lib');
		$this -> load -> library('products/products_lib');
		$this -> load -> library('customers/customers_lib');
		$this -> load -> model('services_model');
		$this -> load -> model('inventory/inventory_model');
	}

	function index() {
		$keyword = $this -> input -> post('keyword');
		if ($keyword) {
			$view['keyword'] = $keyword;
			$view['services'] = $this -> services_model -> __get_search($keyword,(__get_roles('ExecuteAllBranchServices') == 1 ? 0 : $this -> memcachedlib -> sesresult['ubid']));
			$view['pages'] = '';
		}
		else {
			$pager = $this -> pagination_lib -> pagination($this -> services_model -> __get_services((__get_roles('ExecuteAllBranchServices') == 1 ? 0 : $this -> memcachedlib -> sesresult['ubid'])),3,10,site_url('services'));
			$view['services'] = $this -> pagination_lib -> paginate();
			$view['pages'] = $this -> pagination_lib -> pages();
			$view['keyword'] = '';
		}
		$this->load->view('services', $view);
	}
	
	function services_add() {
		if ($_POST) {
			$noseri = $this -> input -> post('noseri', TRUE);
			$dfrom = $this -> input -> post('dfrom', TRUE);
			$dto = $this -> input -> post('dto', TRUE);
			$branch = (int) $this -> input -> post('branch');
			$product = (int) $this -> input -> post('product');
			$cond = (int) $this -> input -> post('cond');
			$qty = (int) $this -> input -> post('qty');
			$scid = (int) $this -> input -> post('scid');
			$status = (int) $this -> input -> post('status');
			
			if (!$noseri || !$dfrom || !$dto || !$branch || !$product || !$qty || !$scid) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('services' . '/' . __FUNCTION__));
			}
			else {
				$dfrom = strtotime(str_replace('/','-',$dfrom));
				$dto = strtotime(str_replace('/','-',$dto));
				$arr = array('sdate' => time(), 'sbid' => $branch, 'scid' => $scid, 'spid' => $product, 'sqty' => $qty, 'snoseri' => $noseri, 'scondition' => $cond, 'sdatefrom' => $dfrom, 'sdateto' => $dto, 'sstatus' => $status);
				if ($this -> services_model -> __insert_services($arr)) {
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('services'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('services'));
				}
			}
		}
		else {
			$view['customers'] = $this -> customers_lib -> __get_customers();
			$view['branch'] = $this -> branch_lib -> __get_branch();
			$view['products'] = $this -> products_lib -> __get_products();
			$this->load->view(__FUNCTION__, $view);
		}
	}
	
	function services_update($id) {
		if ($_POST) {
			$noseri = $this -> input -> post('noseri', TRUE);
			$dfrom = $this -> input -> post('dfrom', TRUE);
			$dto = $this -> input -> post('dto', TRUE);
			$branch = (int) $this -> input -> post('branch');
			$product = (int) $this -> input -> post('product');
			$cond = (int) $this -> input -> post('cond');
			$qty = (int) $this -> input -> post('qty');
			$scid = (int) $this -> input -> post('scid');
			$status = (int) $this -> input -> post('status');
			$id = (int) $this -> input -> post('id');
			$appsev = (int) $this -> input -> post('appsev');
			
			if ($id) {
				if (!$noseri || !$dfrom || !$dto || !$branch || !$product || !$qty || !$scid) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('services' . '/' . __FUNCTION__ . '/' . $id));
				}
				else {
					if ($appsev == 3) $status = 3;
					$dfrom = strtotime(str_replace('/','-',$dfrom));
					$dto = strtotime(str_replace('/','-',$dto));
					
					$arr = array('sbid' => $branch, 'scid' => $scid, 'spid' => $product, 'sqty' => $qty, 'snoseri' => $noseri, 'scondition' => $cond, 'sdatefrom' => $dfrom, 'sdateto' => $dto, 'sstatus' => $status);
					if ($this -> services_model -> __update_services($id, $arr)) {
						if ($appsev == 3) {
							if ($this -> inventory_model -> __check_inventory(4,$branch,$product)) {
								$r = $this -> inventory_model -> __check_inventory(4,$branch,$product);
								$arr = array('istockin' => ($r[0] -> istockin + $qty), 'istockout' => 0, 'istock' => ($r[0] -> istock + $qty));
								$this -> inventory_model -> __update_inventory($r[0] -> iid, $arr, 4);
							}
							else {
								$arr = array('ibid' => $branch, 'iiid' => $product, 'itype' => 4, 'istockbegining' => $qty, 'istockin' => $qty, 'istockout' => 0, 'istock' => $qty, 'istatus' => 1);
								$this -> inventory_model -> __insert_inventory($arr);
							}
						}
						
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('services'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('services'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('services'));
			}
		}
		else {
			$view['id'] = $id;
			$view['detail'] = $this -> services_model -> __get_services_detail($id, (__get_roles('ExecuteAllBranchServices') == 1 ? 0 : $this -> memcachedlib -> sesresult['ubid']));
			$view['branch'] = $this -> branch_lib -> __get_branch($view['detail'][0] -> sbid);
			$view['products'] = $this -> products_lib -> __get_products($view['detail'][0] -> spid);
			$view['customers'] = $this -> customers_lib -> __get_customers($view['detail'][0] -> scid);
			$this->load->view(__FUNCTION__, $view);
		}
	}
	
	function services_delete($id) {
		if ($this -> services_model -> __delete_services($id, (__get_roles('ExecuteAllBranchServices') == 1 ? 0 : $this -> memcachedlib -> sesresult['ubid']))) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('services'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('services'));
		}
	}
	
	function get_suggestion() {
		$hint = '';
		$a = array();
		$q = $_SERVER['QUERY_STRING'];
		$arr = $this -> services_model -> __get_suggestion();
		
		foreach($arr as $k => $v) $a[] = array('name' => $v -> name);
		
		if (strlen($q) > 0) {
			for($i=0; $i<count($a); $i++) {
				if (strtolower($q) == strtolower(substr($a[$i]['name'],0,strlen($q)))) {
					if ($hint == '')
						$hint .='<div class="autocomplete-suggestion" data-index="'.$i.'">'.$a[$i]['name'].'</div>';
					else
						$hint .= '<div class="autocomplete-suggestion" data-index="'.$i.'">'.$a[$i]['name'].'</div>';
				}
			}
		}
		
		echo ($hint == '' ? '<div class="autocomplete-suggestion">No Suggestion</div>' : $hint);
	}
}
