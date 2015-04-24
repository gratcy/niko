<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> library('services_wo/services_wo_lib');
		$this -> load -> library('sparepart/sparepart_lib');
		$this -> load -> model('technical/technical_model');
		$this -> load -> model('services_wo/services_wo_model');
		$this -> load -> model('products/products_model');
		$this -> load -> model('services_report_model');
		$this -> load -> model('inventory/inventory_model');
		$this -> load -> model('sparepart/sparepart_model');
		$this -> load -> model('services_sparepart/services_sparepart_model');
	}

	function index() {
		($this -> memcachedlib -> get('__services_report_product_add') ? $this -> memcachedlib -> delete('__services_report_product_add') : false);
		$keyword = $this -> input -> post('keyword');
		if ($keyword) {
			$view['keyword'] = $keyword;
			$view['services_report'] = $this -> services_report_model -> __get_search($keyword,(__get_roles('ExecuteAllBranchServicesReport') == 1 ? 0 : $this -> memcachedlib -> sesresult['ubid']));
			$view['pages'] = '';
		}
		else {
			$pager = $this -> pagination_lib -> pagination($this -> services_report_model -> __get_services_report((__get_roles('ExecuteAllBranchServicesReport') == 1 ? 0 : $this -> memcachedlib -> sesresult['ubid'])),3,10,site_url('services_report'));
			$view['services_report'] = $this -> pagination_lib -> paginate();
			$view['pages'] = $this -> pagination_lib -> pages();
			$view['keyword'] = '';
		}
		$this->load->view('services_report', $view);
	}
	
	function services_report_add() {
		if ($_POST) {
			$desc = $this -> input -> post('desc', TRUE);
			$wo = (int) $this -> input -> post('wo');
			$status = (int) $this -> input -> post('status');
			$pid = $this -> input -> post('pid');
			$sid = $this -> input -> post('sid');
			$tqty = $this -> input -> post('tqty');
			$fpqty = $this -> input -> post('fpqty');
			$suqty = $this -> input -> post('suqty');

			if (!$wo) {
				__set_error_msg(array('error' => 'No Work Order harus di isi !!!'));
				redirect(site_url('services_report' . '/' . __FUNCTION__));
			}
			else {
				$cwo = $this -> services_report_model -> __check_wo($wo);
				if ($cwo) {
					__set_error_msg(array('error' => 'No. WO Sudah digunakan !!!'));
					redirect(site_url('services_report' . '/' . __FUNCTION__));
				}
				
				$arr = array('ssid' => $wo, 'sdate' => time(), 'sdesc' => $desc, 'sstatus' => $status);
				if ($this -> services_report_model -> __insert_services_report($arr)) {
					$lastID = $this -> db -> insert_id();
					
					for($i=0;$i<count($pid);++$i) $this -> services_report_model -> __insert_services_report_product(array('ssid' => $lastID, 'spid' => $pid[$i], 'sqty' => $fpqty[$pid[$i]], 'sstatus' => 1));
					for($i=0;$i<count($sid);++$i) $this -> services_report_model -> __insert_services_report_sparepart(array('ssid' => $lastID, 'sssid' => $sid[$i], 'sqty' => $suqty[$sid[$i]], 'sstatus' => 1));
					
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('services_report'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('services_report'));
				}
			}
		}
		else {
			$view['wo'] = $this -> services_wo_lib -> __get_services_wo(0,(__get_roles('ExecuteAllBranchServicesReport') == 1 ? 0 : $this -> memcachedlib -> sesresult['ubid']));
			$this->load->view(__FUNCTION__, $view);
		}
	}
	
	function services_report_update($id) {
		if ($_POST) {
			$desc = $this -> input -> post('desc', TRUE);
			$swo = (int) $this -> input -> post('swo');
			$status = (int) $this -> input -> post('status');
			$id = (int) $this -> input -> post('id');
			$appsev = (int) $this -> input -> post('appsev');
			$pid = $this -> input -> post('pid');
			$sid = $this -> input -> post('sid');
			$fpqty = $this -> input -> post('fpqty');
			$suqty = $this -> input -> post('suqty');
			$tqty = $this -> input -> post('tqty');

			if ($id) {
				if (!$swo) {
					__set_error_msg(array('error' => 'No Work Order harus di isi !!!'));
					redirect(site_url('services_report' . '/' . __FUNCTION__ . '/' . $id));
				}
				else {
					if ($appsev == 3) {
						$status = 3;
						$this -> services_wo_model -> __update_services_wo($swo, array('sstatus' => 3));
					}

					$arr = array('sdesc' => $desc, 'sstatus' => $status);
					if ($this -> services_report_model -> __update_services_report($id, $arr)) {
						if ($appsev == 3) {
							$dwo = $this -> services_wo_model -> __get_services_wo_detail($swo);
							for($i=0;$i<count($sid);++$i) :
								$r = $this -> inventory_model -> __check_inventory(2,$dwo[0] -> sbid,$sid[$i]);
								$arr = array('istockout' => ($r[0] -> istockout + $suqty[$sid[$i]]), 'istock' => ($r[0] -> istock - $suqty[$sid[$i]]));
								$this -> inventory_model -> __update_inventory($r[0] -> iid, $arr, 2);
							endfor;
							
							for($i=0;$i<count($pid);++$i) :
								$r1 = $this -> inventory_model -> __check_inventory(1,$dwo[0] -> sbid,$pid[$i]);
								$arr1 = array('istockin' => ($r1[0] -> istockin + $fpqty[$pid[$i]]), 'istock' => ($r1[0] -> istock + $fpqty[$pid[$i]]));
								$this -> inventory_model -> __update_inventory($r1[0] -> iid, $arr1, 1);
							endfor;
							
							for($i=0;$i<count($pid);++$i) :
								$r2 = $this -> inventory_model -> __check_inventory(3,$dwo[0] -> sbid,$pid[$i]);
								if ($r2[0]) {
									$arr2 = array('istockin' => ($r2[0] -> istockin + ($tqty[$pid[$i]] - $fpqty[$pid[$i]])), 'istock' => ($r2[0] -> istock + ($tqty[$pid[$i]] - $fpqty[$pid[$i]])));
									$this -> inventory_model -> __update_inventory($r2[0] -> iid, $arr2, 3);
								}
								else {
									$arr2 = array('ibid' => $dwo[0] -> sbid, 'iiid' => $pid[$i], 'itype' => 3, 'istockbegining' => ($tqty[$pid[$i]] - $fpqty[$pid[$i]]), 'istockin' => ($tqty[$pid[$i]] - $fpqty[$pid[$i]]), 'istockout' => 0, 'istock' => ($tqty[$pid[$i]] - $fpqty[$pid[$i]]), 'istatus' => 1);
									$this -> inventory_model -> __insert_inventory($arr2);
								}
							endfor;
							
							for($i=0;$i<count($pid);++$i) :
								$r3 = $this -> inventory_model -> __check_inventory(4,$dwo[0] -> sbid,$pid[$i]);
								if (!$r3[0]) {
									$arr3 = array('ibid' => $dwo[0] -> sbid, 'iiid' => $pid[$i], 'itype' => 4, 'istockbegining' => $fpqty[$pid[$i]], 'istockin' => $fpqty[$pid[$i]], 'istockout' => 0, 'istock' => $fpqty[$pid[$i]], 'istatus' => 1);
									$this -> inventory_model -> __insert_inventory($arr3);
								}
								else {
									$arr3 = array('istockout' => ($r3[0] -> istockout + $fpqty[$pid[$i]]), 'istock' => ($r3[0] -> istock - $fpqty[$pid[$i]]));
									$this -> inventory_model -> __update_inventory($r3[0] -> iid, $arr3, 4);
								}
							endfor;
						}
						
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('services_report'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('services_report'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('services_report'));
			}
		}
		else {
			$view['id'] = $id;
			$view['sparepart'] = $this -> sparepart_lib -> __get_sparepart();
			$view['detail'] = $this -> services_report_model -> __get_services_report_detail($id);
			$view['wo'] = $this -> services_wo_lib -> __get_services_wo($view['detail'][0] -> ssid,(__get_roles('ExecuteAllBranchServicesReport') == 1 ? 0 : $this -> memcachedlib -> sesresult['ubid']));
			$this->load->view(__FUNCTION__, $view);
		}
	}
	
	function services_report_delete($id) {
		if ($this -> services_report_model -> __delete_services_report($id)) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('services_report'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('services_report'));
		}
	}
	
	function product_tmp($wo) {
		$t = (int) $this -> input -> get('t');
		$id = (int) $this -> input -> get('id');
		$r = $this -> services_wo_model -> __get_services_wo_detail($wo);
		$p = $this -> products_model -> __get_products_detail($r[0] -> spid);
		
		$res = '<input type="hidden" value="'.$p[0] -> pid.'" name="pid"><label for="text1" class="control-label">Product: '.$p[0] -> pname.'</label><br>';
		$res .= '<label for="text1" class="control-label">Code: '.$p[0] -> pcode.'</label><br><br>';
		if ($t == 2) {
			$sql = $this -> services_report_model -> __get_services_report_product($id);
			$sp = $this -> services_report_model -> __check_sparepart($id);
			$res .= '<table class="table table-bordered">';
			$res .= '<thead>';
			$res .= '<tr><th style="width:20px;">No. </th><th>Serial No.</th><th style="width:100px;">Total Sparepart</th><th>Sparepart</th><th style="width:100px;">QTY</th></tr>';
			$res .= '</thead>';
			$res .= '<tbody>';
			if (count($sp) >= count($sql)) {
				foreach($sql as $k => $v) {
					$d  = $this -> services_report_model -> __get_detail_sparepart($id, $v -> sid);
					$res .= '<tr aw="'.$v -> sid.'"><td>'.($k+1).'.</td><td><input type="text" class="form-control" name="sno['.$v -> sid.']" value="'.$v -> sno.'"></td><td><input type="text" class="form-control" name="spr['.$v -> sid.']" pl="'.$v -> sid.'" value="'.$v -> stsparepart.'"></td>';
					$res .= '<td>';
					for($i=0;$i<$v -> stsparepart;++$i)
						$res .= '<select name="spn['.$v -> sid.'][]" data-placeholder="Item Sparepart" class="form-control chzn-select">'.$this -> sparepart_lib -> __get_sparepart($d[$i] -> sspareid).'</select>';
					$res .= '</td>';
					$res .= '<td>';
					for($i=0;$i<$v -> stsparepart;++$i)
						$res .= '<input type="text" class="form-control" name="sqty['.$v -> sid.'][]" value="'.$d[$i] -> sqty.'">';
					$res .= '</td>';
					$res .= '</tr>';
				}
			}
			else {
				foreach($sql as $k => $v)
					$res .= '<tr aw="'.$v -> sid.'"><td>'.($k+1).'.</td><td><input type="text" class="form-control" name="sno['.$v -> sid.']" value="'.$v -> sno.'"></td><td><input type="text" class="form-control" name="spr['.$v -> sid.']" pl="'.$v -> sid.'" value="'.$v -> stsparepart.'"></td><td></td><td></td></tr>';
			}
		}
		else {
			$res .= '<table class="table table-bordered" id="sadd">';
			$res .= '<thead>';
			$res .= '<tr><th style="width:20px;">No. </th><th>Serial No.</th></tr>';
			$res .= '</thead>';
			$res .= '<tbody>';
			for($i=0;$i<$r[0] -> sqty;++$i) :
				$res .= '<tr><td>'.($i+1).'.</td><td><input type="text" class="form-control" name="sno[]"></td></tr>';
			endfor;
		}
		$res .= '</tbody>';
		$res .= '</table>';
		echo $res;
	}
	
	function services_report_print($id) {
		$view['sid'] = $id;
		$rep = $this -> services_report_model -> __get_services_report_detail($id);
		$id = $rep[0] -> ssid;
		$view['detail'] = $this -> services_wo_model -> __get_services_wo_detail_print($id, (__get_roles('ExecuteAllBranchServicesWO') == 1 ? 0 : $this -> memcachedlib -> sesresult['ubid']));
		$arr = $this -> services_wo_model -> __get_technical_services($id);
		foreach($arr as $k => $v) $ids[] = $v -> stid;
		$view['technical'] = $this -> technical_model -> __get_technical_services(implode(',', $ids));
		
		$ids = array();
		$arr = $this -> services_wo_model -> __get_product_services($id);
		foreach($arr as $k => $v) $ids[] = $v -> spid;
		
		$view['product'] = $this -> products_model -> __get_products_services(implode(',', $ids), 2, $id);
		
		$ids = array();
		$qr = $this -> services_sparepart_model -> __get_sparepart_services_det_r($id);
		$id = $qr[0] -> sid;
		$arr = $this -> services_sparepart_model -> __get_sparepart_services_det($id);
		foreach($arr as $k => $v) $ids[] = $v -> sssid;
		$view['sparepart'] = $this -> sparepart_model -> __get_sparepart_services(implode(',', $ids),$id);

		$this -> load -> view('print/services_report', $view, false);
	}
}
