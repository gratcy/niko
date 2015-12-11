<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> library('branch/branch_lib');
		$this -> load -> library('products/products_lib');
		$this -> load -> model('technical/technical_model');
		$this -> load -> model('products/products_model');
		$this -> load -> model('services_wo_model');
		$this -> load -> model('inventory/inventory_model');
		$this -> load -> model('services_report/services_report_model');
	}

	function index() {
		($this -> memcachedlib -> get('__services_wo_technical_add') ? $this -> memcachedlib -> delete('__services_wo_technical_add') : false);
		($this -> memcachedlib -> get('__services_wo_product_add') ? $this -> memcachedlib -> delete('__services_wo_product_add') : false);
		$keyword = $this -> input -> post('keyword');
		if ($keyword) {
			$view['keyword'] = $keyword;
			$view['services_wo'] = $this -> services_wo_model -> __get_search($keyword,(__get_roles('ExecuteAllBranchServicesWO') == 1 ? 0 : $this -> memcachedlib -> sesresult['ubid']));
			$view['pages'] = '';
		}
		else {
			$pager = $this -> pagination_lib -> pagination($this -> services_wo_model -> __get_services_wo((__get_roles('ExecuteAllBranchServicesWO') == 1 ? 0 : $this -> memcachedlib -> sesresult['ubid'])),3,10,site_url('services_wo'));
			$view['services_wo'] = $this -> pagination_lib -> paginate();
			$view['pages'] = $this -> pagination_lib -> pages();
			$view['keyword'] = '';
		}
		$this->load->view('services_wo', $view);
	}
	
	function services_wo_add() {
		if ($_POST) {
			$dfrom = $this -> input -> post('dfrom', TRUE);
			$dto = $this -> input -> post('dto', TRUE);
			$desc = $this -> input -> post('desc', TRUE);
			$branch = (int) $this -> input -> post('branch');
			$status = (int) $this -> input -> post('status');
			$tid = $this -> input -> post('tid');
			$pid = $this -> input -> post('pid');
			$tqty = $this -> input -> post('tqty');

			if (!$dfrom || !$dto || !$branch) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('services_wo' . '/' . __FUNCTION__));
			}
			else {
				$dfrom = strtotime(str_replace('/','-',$dfrom));
				$dto = strtotime(str_replace('/','-',$dto));
				$arr = array('sno' => '', 'sbid' => $branch, 'sdate' => time(), 'sdatefrom' => $dfrom, 'sdateto' => $dto, 'sdesc' => $desc, 'sstatus' => $status);
				if ($this -> services_wo_model -> __insert_services_wo($arr)) {
					$lastID = $this -> db -> insert_id();
					
					$nowo = str_pad($lastID, 4, "0", STR_PAD_LEFT) . '/0'.$branch.'/'.date('m/Y/'). str_pad(($this -> services_wo_model -> __check_nowo($branch) + 1), 3, "0", STR_PAD_LEFT);
					$this -> services_wo_model -> __update_services_wo($lastID, array('sno' => $nowo));
					
					for($i=0;$i<count($tid);++$i) $this -> services_wo_model -> __insert_services_wo_technical(array('ssid' => $lastID, 'stid' => $tid[$i], 'sstatus' => 1));
					
					for($i=0;$i<count($pid);++$i) {
						$this -> services_wo_model -> __insert_services_wo_product(array('ssid' => $lastID, 'spid' => $pid[$i], 'sqty' => $tqty[$pid[$i]], 'sstatus' => 1));
					}
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('services_wo'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('services_wo'));
				}
			}
		}
		else {
			$view['branch'] = $this -> branch_lib -> __get_branch();
			$this->load->view(__FUNCTION__, $view);
		}
	}
	
	function services_wo_update($id) {
		if ($_POST) {
			$appsev = (int) $this -> input -> post('appsev', TRUE);
			$dfrom = $this -> input -> post('dfrom', TRUE);
			$dto = $this -> input -> post('dto', TRUE);
			$desc = $this -> input -> post('desc', TRUE);
			$branch = (int) $this -> input -> post('branch');
			$tqty = $this -> input -> post('tqty');
			$pid = $this -> input -> post('pid');
			$status = (int) $this -> input -> post('status');
			$id = (int) $this -> input -> post('id');

			if ($appsev == 3) $status = 3;
			
			if ($id) {
				if (!$dfrom || !$dto || !$branch) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('services_wo' . '/' . __FUNCTION__ . '/' . $id));
				}
				else {
					$dfrom = strtotime(str_replace('/','-',$dfrom));
					$dto = strtotime(str_replace('/','-',$dto));

					for($i=0;$i<count($pid);++$i) {
						$this -> services_wo_model -> __update_services_wo_product($id,$pid[$i],array('sqty' => $tqty[$pid[$i]]));
						if ($appsev == 3) {
							$r2 = $this -> inventory_model -> __check_inventory(6,$branch,$pid[$i]);
							if ($r2[0])
								$this -> inventory_model -> __update_inventory($r2[0] -> iid, array('istockin' => ($r2[0] -> istockin + $tqty[$pid[$i]]), 'istock' => ($r2[0] -> istock + $tqty[$pid[$i]])), 6);
							else
								$this -> inventory_model -> __insert_inventory(array('ibid' => $branch, 'iiid' => $pid[$i], 'itype' => 6, 'istockbegining' => $tqty[$pid[$i]], 'istock' => $tqty[$pid[$i]], 'istatus' => 1));
						}
					}
					
					$arr = array('sbid' => $branch, 'sdate' => time(), 'sdatefrom' => $dfrom, 'sdateto' => $dto, 'sdesc' => $desc, 'sstatus' => $status);
					if ($this -> services_wo_model -> __update_services_wo($id, $arr)) {	
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('services_wo'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('services_wo'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('services_wo'));
			}
		}
		else {
			$view['id'] = $id;
			$view['detail'] = $this -> services_wo_model -> __get_services_wo_detail($id, (__get_roles('ExecuteAllBranchServicesWO') == 1 ? 0 : $this -> memcachedlib -> sesresult['ubid']));
			$view['branch'] = $this -> branch_lib -> __get_branch($view['detail'][0] -> sbid);
			$this->load->view(__FUNCTION__, $view);
		}
	}
	
	function services_wo_delete($id) {
		if ($this -> services_wo_model -> __delete_services_wo($id, (__get_roles('ExecuteAllBranchServicesWO') == 1 ? 0 : $this -> memcachedlib -> sesresult['ubid']))) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('services_wo'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('services_wo'));
		}
	}
	
	function get_suggestion() {
		$hint = '';
		$a = array();
		$q = $_SERVER['QUERY_STRING'];
		$arr = $this -> services_wo_model -> __get_suggestion();
		
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
	
	function technical_delete($type) {
		$tid = (int) $this -> input -> post('tid');
		$sid = (int) $this -> input -> post('sid');
		if ($tid) {
			if ($type == 1) {
				$ids = $this -> memcachedlib -> get('__services_wo_technical_add');
				$res = array();
				for($i=0;$i<count($ids);++$i)
					if ($ids[$i] <> $tid) $res[] = $ids[$i];
				$this -> memcachedlib -> set('__services_wo_technical_add', $res, 3600);
			}
			else {
				$this -> services_wo_model -> __delete_technical_services($sid, $tid);
			}
		}
	}
	
	function technical_add($type) {
		$id = (int) $this -> input -> get('id');
		if ($_POST) {
			$tid = $this -> input -> post('tid');
			if ($type == 1) {
				$ids = $this -> memcachedlib -> get('__services_wo_technical_add');
				if ($ids) $arr = array_unique(array_merge($tid, $ids));
				else $arr = $tid;
				
				$this -> memcachedlib -> set('__services_wo_technical_add', $arr, 3600);
			}
			else {
				for($i=0;$i<count($tid);++$i) {
					if (!$this -> services_wo_model -> __check_technical_services($id, $tid[$i])) {
						$this -> services_wo_model -> __insert_services_wo_technical(array('ssid' => $id, 'stid' => $tid[$i], 'sstatus' => 1));
					}
					else {
						__set_error_msg(array('error' => 'Technical sudah terdaftar !!!'));
						redirect(site_url('services_wo/technical_add/' . $type . '?id=' . $id));
					}
				}
			}
			__set_error_msg(array('info' => 'Technical berhasil ditambahkan.'));
			redirect(site_url('services_wo/technical_add/' . $type . '?id=' . $id));
		}
		else {
			$pager = $this -> pagination_lib -> pagination($this -> technical_model -> __get_technical_services(''),3,10,site_url('services_wo/technical_add/' . $type));
			$view['technical'] = $this -> pagination_lib -> paginate();
			$view['pages'] = $this -> pagination_lib -> pages();
			$view['id'] = $id;
			$view['type'] = $type;
			$view['services'] = true;
			$this -> load -> view('box/technical_add', $view, false);
		}
	}
	
	function technical_tmp($type) {
		$id = (int) $this -> input -> get('id');
		$rep = (int) $this -> input -> get('r');
		$ids = array();
		$view['technical'] = array();
		
		if ($type == 1) {
			$ids = $this -> memcachedlib -> get('__services_wo_technical_add');
		}
		else {
			$arr = $this -> services_wo_model -> __get_technical_services($id);
			foreach($arr as $k => $v) $ids[] = $v -> stid;
		}
		
		$view['id'] = $id;
		$view['type'] = $type;
		$view['services'] = true;
		$view['report'] = $rep;
		
		if ($ids) {
			$iw = '';
			foreach($ids as $k => $v) $iw .= ($v ? $v.',' : '');

			$view['technical'] = $this -> technical_model -> __get_technical_services(rtrim($iw,','));
			$this -> load -> view('box/technical_tmp', $view, false);
		}
	}
	function product_delete($type) {
		$pid = (int) $this -> input -> post('pid');
		$sid = (int) $this -> input -> post('sid');
		if ($pid) {
			if ($type == 1) {
				$ids = $this -> memcachedlib -> get('__services_wo_product_add');
				$res = array();
				for($i=0;$i<count($ids);++$i)
					if ($ids[$i] <> $pid) $res[] = $ids[$i];
				$this -> memcachedlib -> set('__services_wo_product_add', $res, 3600);
			}
			else {
				$this -> services_wo_model -> __delete_product_services($sid, $pid);
			}
		}
	}
	
	function product_add($type) {
		$id = (int) $this -> input -> get('id');
		if ($_POST) {
			$pid = $this -> input -> post('pid');
			if ($type == 1) {
				$ids = $this -> memcachedlib -> get('__services_wo_product_add');
				
				if ($ids) $tid = array_unique(array_merge($pid, $ids));
				else $tid = $pid;
				
				$this -> memcachedlib -> set('__services_wo_product_add', $tid, 3600);
			}
			else {
				for($i=0;$i<count($pid);++$i) {
					if (!$this -> services_wo_model -> __check_product_services($id, $pid[$i])) {
						$this -> services_wo_model -> __insert_services_wo_product(array('ssid' => $id, 'spid' => $pid[$i], 'sqty' => 0, 'sstatus' => 1));
					}
					else {
						__set_error_msg(array('error' => 'product sudah terdaftar !!!'));
						redirect(site_url('services_wo/product_add/' . $type . '?id=' . $id));
					}
				}
			}
			__set_error_msg(array('info' => 'product berhasil ditambahkan.'));
			redirect(site_url('services_wo/product_add/' . $type . '?id=' . $id));
		}
		else {
			$pager = $this -> pagination_lib -> pagination($this -> products_model -> __get_products_services(''),3,10,site_url('services_wo/product_add/' . $type));
			$view['product'] = $this -> pagination_lib -> paginate();
			$view['pages'] = $this -> pagination_lib -> pages();
			$view['id'] = $id;
			$view['type'] = $type;
			$view['services'] = true;
			$this -> load -> view('box/product_add', $view, false);
		}
	}
	
	function product_tmp($type) {
		$id = (int) $this -> input -> get('id');
		$rep = (int) $this -> input -> get('r');
		$sid = (int) $this -> input -> get('sid');
		$ids = array();
		$view['product'] = array();
		
		if ($type == 1) {
			$ids = $this -> memcachedlib -> get('__services_wo_product_add');
		}
		else {
			$arr = $this -> services_wo_model -> __get_product_services($id);
			foreach($arr as $k => $v) $ids[] = $v -> spid;
		}
		
		$view['id'] = $id;
		$view['type'] = $type;
		$view['services'] = true;
		$view['report'] = $rep;
		$view['sid'] = $sid;
		
		if ($ids) {
			$view['product'] = $this -> products_model -> __get_products_services(implode(',', $ids), $type, $id);
			$this -> load -> view('box/product_tmp', $view, false);
		}
	}
	
	function services_wo_print($id) {
		$view['detail'] = $this -> services_wo_model -> __get_services_wo_detail_print($id, (__get_roles('ExecuteAllBranchServicesWO') == 1 ? 0 : $this -> memcachedlib -> sesresult['ubid']));
		$arr = $this -> services_wo_model -> __get_technical_services($id);
		foreach($arr as $k => $v) {
			if ($v -> stid) $ids[] = $v -> stid;
		}
		$view['technical'] = $this -> technical_model -> __get_technical_services(implode(',', $ids));
		
		$ids = array();
		$arr = $this -> services_wo_model -> __get_product_services($id);
		foreach($arr as $k => $v) $ids[] = $v -> spid;
		
		$view['product'] = $this -> products_model -> __get_products_services(implode(',', $ids), 2, $id);
		$this -> load -> view('print/services_wo', $view, false);
	}
}
