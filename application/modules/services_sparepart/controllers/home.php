<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> library('services_wo/services_wo_lib');
		$this -> load -> model('sparepart/sparepart_model');
		$this -> load -> model('services_wo/services_wo_model');
		$this -> load -> model('services_sparepart_model');
		$this -> load -> model('inventory/inventory_model');
		$this -> load -> model('services_report/services_report_model');
	}

	function index() {
		($this -> memcachedlib -> get('__services_sparepart_sparepart_add') ? $this -> memcachedlib -> delete('__services_sparepart_sparepart_add') : false);
		$keyword = $this -> input -> post('keyword');
		if ($keyword) {
			$view['keyword'] = $keyword;
			$view['services_sparepart'] = $this -> services_sparepart_model -> __get_search($keyword,(__get_roles('ExecuteAllBranchServicesSparepart') == 1 ? 0 : $this -> memcachedlib -> sesresult['ubid']));
			$view['pages'] = '';
		}
		else {
			$pager = $this -> pagination_lib -> pagination($this -> services_sparepart_model -> __get_services_sparepart((__get_roles('ExecuteAllBranchServicesSparepart') == 1 ? 0 : $this -> memcachedlib -> sesresult['ubid'])),3,10,site_url('services_sparepart'));
			$view['services_sparepart'] = $this -> pagination_lib -> paginate();
			$view['pages'] = $this -> pagination_lib -> pages();
			$view['keyword'] = '';
		}
		$this->load->view('services_sparepart', $view);
	}
	
	function services_sparepart_add() {
		if ($_POST) {
			$desc = $this -> input -> post('desc', TRUE);
			$wo = (int) $this -> input -> post('wo');
			$qty = $this -> input -> post('qty');
			$status = (int) $this -> input -> post('status');
			$sid = $this -> input -> post('sid');
			
			if (!$wo || !$sid || !$qty) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('services_sparepart' . '/' . __FUNCTION__));
			}
			else {
				$arr = array('ssid' => $wo, 'sdesc' => $desc, 'sstatus' => $status);
				if ($this -> services_sparepart_model -> __insert_services_sparepart($arr)) {
					$lastID = $this -> db -> insert_id();
					
					for($i=0;$i<count($sid);++$i) $this -> services_sparepart_model -> __insert_services_sparepart_det(array('ssid' => $lastID, 'sssid' => $sid[$i], 'sqty' => $qty[$sid[$i]], 'sstatus' => 1));
					
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('services_sparepart'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('services_sparepart'));
				}
			}
		}
		else {
			$view['wo'] = $this -> services_wo_lib -> __get_services_wo(0,(__get_roles('ExecuteAllBranchServicesSparepart') == 1 ? 0 : $this -> memcachedlib -> sesresult['ubid']));
			$this->load->view(__FUNCTION__, $view);
		}
	}
	
	function services_sparepart_update($id) {
		if ($_POST) {
			$desc = $this -> input -> post('desc', TRUE);
			$wo = (int) $this -> input -> post('wo');
			$owo = (int) $this -> input -> post('owo');
			$qty = $this -> input -> post('qty');
			$status = (int) $this -> input -> post('status');
			$sid = $this -> input -> post('sid');
			$id = (int) $this -> input -> post('id');
			$appsev = (int) $this -> input -> post('appsev');

			if ($id) {
				if (!$wo || !$sid || !$qty) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('services_sparepart' . '/' . __FUNCTION__ . '/' . $id));
				}
				else {
					if ($appsev == 3) $status = 3;
					$arr = array('ssid' => $wo, 'sdesc' => $desc, 'sstatus' => $status);
					if ($this -> services_sparepart_model -> __update_services_sparepart($id, $arr)) {
						$dwo = $this -> services_wo_model -> __get_services_wo_detail($wo);
						if ($owo <> $wo) {
							for($i=0;$i<count($sid);++$i)
							$this -> services_sparepart_model -> __update_services_sparepart_det($owo,$sid[$i],array('ssid' => $wo));
						}
						
						//~ if ($appsev == 3) {
							//~ for($i=0;$i<count($sid);++$i) {
								//~ if ($this -> inventory_model -> __check_inventory(2,$dwo[0] -> sbid,$sid[$i])) {
									//~ $r = $this -> inventory_model -> __check_inventory(2,$dwo[0] -> sbid,$sid[$i]);
									//~ $arr = array('istockin' => ($r[0] -> istockin - $qty[$sid[$i]]), 'istockout' => 0, 'istock' => ($r[0] -> istock - $qty[$sid[$i]]));
									//~ $this -> inventory_model -> __update_inventory($r[0] -> iid, $arr, 2);
								//~ }
								//~ else {
									//~ $arr = array('ibid' => $dwo[0] -> sbid, 'iiid' => $sid[$i], 'itype' => 2, 'istockbegining' => $qty[$sid[$i]], 'istockin' => $qty[$sid[$i]], 'istockout' => 0, 'istock' => $qty[$sid[$i]], 'istatus' => 1);
									//~ $this -> inventory_model -> __insert_inventory($arr);
								//~ }
							//~ }
						//~ }
						
						for($i=0;$i<count($sid);++$i) $this -> services_sparepart_model -> __update_services_sparepart_det($id,$sid[$i],array('sqty' => $qty[$sid[$i]]));
					
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('services_sparepart'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('services_sparepart'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('services_sparepart'));
			}
		}
		else {
			$view['id'] = $id;
			$view['detail'] = $this -> services_sparepart_model -> __get_services_sparepart_detail($id);
			$view['wo'] = $this -> services_wo_lib -> __get_services_wo($view['detail'][0] -> ssid,(__get_roles('ExecuteAllBranchServicesSparepart') == 1 ? 0 : $this -> memcachedlib -> sesresult['ubid']));
			$this->load->view(__FUNCTION__, $view);
		}
	}
	
	function services_sparepart_delete($id) {
		if ($this -> services_sparepart_model -> __delete_services_sparepart($id)) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('services_sparepart'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('services_sparepart'));
		}
	}
	
	function sparepart_delete($type) {
		$ssid = (int) $this -> input -> post('ssid');
		$sid = (int) $this -> input -> post('sid');
		if ($ssid) {
			if ($type == 1) {
				$ids = $this -> memcachedlib -> get('__services_sparepart_sparepart_add');
				$res = array();
				for($i=0;$i<count($ids);++$i)
					if ($ids[$i] <> $ssid) $res[] = $ids[$i];
				$this -> memcachedlib -> set('__services_sparepart_sparepart_add', $res, 3600);
			}
			else {
				$this -> services_sparepart_model -> __delete_sparepart_services_det($sid, $ssid);
			}
		}
	}
	
	function sparepart_search($type) {
		$id = (int) $this -> input -> get('id');
		$keyword = $this -> input -> post('keyword');
		
		$pager = $this -> pagination_lib -> pagination($this -> sparepart_model -> __get_sparepart_services_search($keyword),3,10,site_url('services_sparepart/sparepart_add/' . $type));
		$view['sparepart'] = $this -> pagination_lib -> paginate();
		$view['pages'] = $this -> pagination_lib -> pages();
		$view['id'] = $id;
		$view['type'] = $type;
		$view['services'] = true;
		$this -> load -> view('box/sparepart_add', $view, false);
	}
	
	function sparepart_add($type) {
		$id = (int) $this -> input -> get('id');
		if ($_POST) {
			$sid = $this -> input -> post('sid');
			if ($type == 1) {
				$ids = $this -> memcachedlib -> get('__services_sparepart_sparepart_add');
				if ($ids) $sid = array_unique(array_merge($sid, $ids));
				
				$this -> memcachedlib -> set('__services_sparepart_sparepart_add', $sid, 3600);
			}
			else {
				for($i=0;$i<count($sid);++$i) {
					if (!$this -> services_sparepart_model -> __check_sparepart_services($id, $sid[$i])) {
						$this -> services_sparepart_model -> __insert_services_sparepart_det(array('ssid' => $id, 'sssid' => $sid[$i], 'sstatus' => 1));
					}
					else {
						__set_error_msg(array('error' => 'sparepart sudah terdaftar !!!'));
						redirect(site_url('services_sparepart/sparepart_add/' . $type . '?id=' . $id));
					}
				}
			}
			__set_error_msg(array('info' => 'sparepart berhasil ditambahkan.'));
			redirect(site_url('services_sparepart/sparepart_add/' . $type . '?id=' . $id));
		}
		else {
			$pager = $this -> pagination_lib -> pagination($this -> sparepart_model -> __get_sparepart_services('',''),3,10,site_url('services_sparepart/sparepart_add/' . $type));
			$view['sparepart'] = $this -> pagination_lib -> paginate();
			$view['pages'] = $this -> pagination_lib -> pages();
			$view['id'] = $id;
			$view['type'] = $type;
			$view['services'] = true;
			$this -> load -> view('box/sparepart_add', $view, false);
		}
	}
	
	function sparepart_tmp($type) {
		$id = (int) $this -> input -> get('id');
		$rep = (int) $this -> input -> get('r');
		$sid = (int) $this -> input -> get('sid');
		$ids = array();
		$view['sparepart'] = array();
		
		if ($type == 1) {
			$ids = $this -> memcachedlib -> get('__services_sparepart_sparepart_add');
		}
		else {
			if ($rep == 1) {
				$qr = $this -> services_sparepart_model -> __get_sparepart_services_det_r($id);
				$id = $qr[0] -> sid;
			}
			$arr = $this -> services_sparepart_model -> __get_sparepart_services_det($id);
			foreach($arr as $k => $v) $ids[] = $v -> sssid;
		}

		$view['id'] = $id;
		$view['report'] = $rep;
		$view['type'] = $type;
		$view['services'] = true;
		$view['sid'] = $sid;
		if ($ids) {
			$view['sparepart'] = $this -> sparepart_model -> __get_sparepart_services(implode(',', $ids),$id);
			$this -> load -> view('box/sparepart_tmp', $view, false);
		}
	}
	
	function services_sparepart_print($id) {
		$view['detail'] = $this -> services_sparepart_model -> __get_services_sparepart_detail_print($id);
		$arr = $this -> services_sparepart_model -> __get_sparepart_services_det($id);
		foreach($arr as $k => $v) $ids[] = $v -> sssid;
		$view['sparepart'] = $this -> sparepart_model -> __get_sparepart_services(implode(',', $ids),$id);
		$this -> load -> view('print/services_sparepart', $view, false);
	}
}
