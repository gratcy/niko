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
		$this -> load -> model('products/products_model');
		$this -> load -> model('sparepart/sparepart_model');
		$this -> load -> model('inventory/inventory_model');
		$this -> load -> model('opname_model');
	}

	function index($type=1) {
		$keyword = trim($this -> input -> post('keyword'));
		$perm = $this -> memcachedlib -> sesresult['ubid'];
		if ($keyword) {
			$view['perm'] = $perm;
			$view['type'] = $type;
			$view['keyword'] = $keyword;
			$view['opname'] = $this -> opname_model -> __get_opname_inventory_search($keyword,$type,$perm);
			$view['pages'] = '';
		}
		else {
			if (!$type) $type = 1;
			
			//~ if ($type == 1)
				//~ $perm = (__get_roles('ExecuteAllBranchOpnameProduct') == 1 ? "" : $this -> memcachedlib -> sesresult['ubid']);
			//~ elseif ($type == 2)
				//~ $perm = (__get_roles('ExecuteAllBranchOpnameSparepart') == 1 ? "" : $this -> memcachedlib -> sesresult['ubid']);
			//~ elseif ($type == 3)
				//~ $perm = (__get_roles('ExecuteAllBranchOpnameServices') == 1 ? "" : $this -> memcachedlib -> sesresult['ubid']);
			//~ else
				//~ $perm = (__get_roles('ExecuteAllBranchOpnameReturn') == 1 ? "" : $this -> memcachedlib -> sesresult['ubid']);
			//~ 
			
			$pager = $this -> pagination_lib -> pagination($this -> opname_model -> __get_opname_inventory($type,$perm),3,10,site_url('opname/' . $type));
			$view['opname'] = $this -> pagination_lib -> paginate();
			$view['perm'] = $perm;
			$view['type'] = $type;
			$view['keyword'] = '';
			$view['pages'] = $this -> pagination_lib -> pages();
		}
		$this->load->view('opname', $view);
	}

	function opname_update($type, $id) {
		if ($_POST) {
			$id = (int) $this -> input -> post('id');
			$type = (int) $this -> input -> post('type');
			
			$aplus = (int) $this -> input -> post('aplus');
			$amin = (int) $this -> input -> post('amin');
			
			$stock2 = (int) $this -> input -> post('stock2');
			$desc = $this -> input -> post('desc', TRUE);
			$stockout2 = (int) $this -> input -> post('stockout2');
			$stockin2 = (int) $this -> input -> post('stockin2');
			$stockbegining2 = (int) $this -> input -> post('stockbegining2');
			
			
			if ($id && $type) {
				if ($aplus && $amin) {
					__set_error_msg(array('error' => 'Harus isi salah satu plus dan min !!!'));
					redirect(site_url('opname/opname_update/' . $type.'/' . $id));
				}
				else if ($amin && ($stock2 - $amin) < 0) {
					__set_error_msg(array('error' => 'Stock tidak bisa minus !!!'));
					redirect(site_url('opname/opname_update/' . $type.'/' . $id));
				}
				else {
					if ($aplus)
						$arr = array('istock' => $stock2 + $aplus);
					else
						$arr = array('istock' => $stock2 - $amin);
					
					if ($this -> inventory_model -> __update_inventory($id, $arr, $type)) {
						$oarr = array('oidid' => $id,'otype' => $type, 'odate' => time(), 'ostockbegining' => $stockbegining2, 'ostockin' => $stockin2, 'ostockout' => $stockout2, 'ostock' => $stock2, 'oadjustmin' => $amin, 'oadjustplus' => $aplus, 'odesc' => $desc);
						$this -> opname_model -> __insert_opname($oarr);
						
						__set_error_msg(array('info' => 'Stock opname berhasil dilakukan.'));
						redirect(site_url('opname/' . $type));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah stock !!!'));
						redirect(site_url('opname/' . $type));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('opname/' . $type));
			}
		}
		else {
			if ($type == 1)
				$perm = (__get_roles('ExecuteAllBranchOpnameProduct') == 1 ? "" : $this -> memcachedlib -> sesresult['ubid']);
			elseif ($type == 2)
				$perm = (__get_roles('ExecuteAllBranchOpnameSparepart') == 1 ? "" : $this -> memcachedlib -> sesresult['ubid']);
			elseif ($type == 3)
				$perm = (__get_roles('ExecuteAllBranchOpnameServices') == 1 ? "" : $this -> memcachedlib -> sesresult['ubid']);
			else
				$perm = (__get_roles('ExecuteAllBranchOpnameReturn') == 1 ? "" : $this -> memcachedlib -> sesresult['ubid']);
			
			$view['id'] = $id;
			$view['type'] = $type;
			$view['detail'] = $this -> inventory_model -> __get_inventory_detail($type, $id, $perm);
			$view['branch'] = $this -> branch_lib -> __get_branch($view['detail'][0] -> ibid);
			
			if ($type == 1 || $type == 3 || $type == 4)
				$view['items'] = $this -> products_model -> __get_products_detail($view['detail'][0] -> iiid);
			else
				$view['items'] = $this -> sparepart_model -> __get_sparepart_detail($view['detail'][0] -> iiid);
				
			$this->load->view(__FUNCTION__, $view);
		}
	}
	
	function get_suggestion($type) {
		header('Content-type: application/javascript');
		$hint = '';
		$a = array();
		$q = urldecode($_SERVER['QUERY_STRING']);
		
		if ($type == 2 || $type == 5) $arr = $this -> sparepart_model -> __get_suggestion();
		else $arr = $this -> products_model -> __get_suggestion();
		
		if (strlen($q) < 2) return false;
		
		foreach($arr as $k => $v) $a[] = array('name' => $v -> name, 'id' => $v -> id);
		
		for($i=0; $i<count($a); $i++) {
			$a[$i]['name'] = trim($a[$i]['name']);
			$num_words = substr_count($a[$i]['name'],' ')+1;
			$pos = array();
			$is_suggestion_added = false;
			
			for ($cnt_pos=0; $cnt_pos<$num_words; $cnt_pos++) {
				if ($cnt_pos==0)
					$pos[$cnt_pos] = 0;
				else
					$pos[$cnt_pos] = strpos($a[$i]['name'],' ', $pos[$cnt_pos-1])+1;
			}
			
			if (strtolower($q)==strtolower(substr($a[$i]['name'],0,strlen($q))) || stripos($a[$i]['name'],$q)) {
				$hint[] = array('d' => $i, 'i' => $a[$i]['id'], 'n' => $a[$i]['name']);
				$is_suggestion_added = true;
			}
			for ($j=0;$j<$num_words && !$is_suggestion_added;$j++) {
				if(strtolower($q)==strtolower(substr($a[$i]['name'],$pos[$j],strlen($q)))){
					$hint[] = array('d' => $i, 'i' => $a[$i]['id'], 'n' => $a[$i]['name']);
					$is_suggestion_added = true;                                        
				}
			}
		}
		
		echo json_encode($hint);
	}
}
