<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> library('branch/branch_lib');
		$this -> load -> library('request/request_lib');
		$this -> load -> model('request/request_model');
		$this -> load -> model('receiving_model');
	}

	function index() {
		(!$this -> memcachedlib -> get('__receiving_items') ? '' : $this -> memcachedlib -> delete('__receiving_items'));
		$pager = $this -> pagination_lib -> pagination($this -> receiving_model -> __get_receiving($this -> memcachedlib -> sesresult['ubid']),3,10,site_url('receiving'));
		$view['receiving'] = $this -> pagination_lib -> paginate();
		$view['pages'] = $this -> pagination_lib -> pages();
		$this->load->view('receiving', $view);
	}
	
	function receiving_add() {
		if ($_POST) {
			$id = (int) $this -> input -> post('id');
			$rid = (int) $this -> input -> post('rid');
			$desc = $this -> input -> post('desc', TRUE);
			$docno = $this -> input -> post('docno', TRUE);
			$vendor = $this -> input -> post('vendor', TRUE);
			$items = $this -> input -> post('items');
			$items2 = $this -> input -> post('items2');
			$waktu = str_replace('/','-',$this -> input -> post('waktu', TRUE));
			$branch = (int) $this -> input -> post('branch');
			$rtype = (int) $this -> input -> post('rtype');
			$status = (int) $this -> input -> post('status');
			
			if (!$docno || !$branch) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('receiving' . '/' . __FUNCTION__));
			}
			else {
				$arr = array('rbid' => $branch,'rtype' => $rtype, 'rdocno' => $docno, 'riid' => $rid, 'rvendor' => $vendor, 'rdate' => strtotime($waktu), 'rdesc' => $desc, 'rstatus' => $status);
				if ($this -> receiving_model -> __insert_receiving($arr)) {
					$rrid = $this -> db -> insert_id();
					foreach($items as $k => $v)
						$this -> receiving_model -> __insert_receiving_item(array('rrid' => $rrid,'rbid' => $this -> memcachedlib -> sesresult['ubid'],'riid' => $k,'rqty' => $v,'rstatus' => 1, 'ritype' => 1));
					
					foreach($items2 as $k => $v)
						$this -> receiving_model -> __insert_receiving_item(array('rrid' => $rrid,'rbid' => $this -> memcachedlib -> sesresult['ubid'],'riid' => $k,'rqty' => $v,'rstatus' => 1, 'ritype' => 2));
						
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('receiving'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('receiving'));
				}
			}
		}
		else {
			$view['branch'] = $this -> branch_lib -> __get_branch();
			$this->load->view(__FUNCTION__, $view);
		}
	}
	
	function receiving_update($id) {
		if ($_POST) {
			$id = (int) $this -> input -> post('id');
			$rid = (int) $this -> input -> post('rid');
			$desc = $this -> input -> post('desc', TRUE);
			$docno = $this -> input -> post('docno', TRUE);
			$vendor = $this -> input -> post('vendor', TRUE);
			$items = $this -> input -> post('items');
			$items2 = $this -> input -> post('items2');
			$waktu = str_replace('/','-',$this -> input -> post('waktu', TRUE));
			$rtype = (int) $this -> input -> post('rtype');
			$app = (int) $this -> input -> post('app');

			if ($app == 1) $status = 3;
			else $status = (int) $this -> input -> post('status');

			if ($id) {
				if (!$docno) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('receiving' . '/' . __FUNCTION__ . '/' . $id));
				}
				else {
					$upa = false;
					$arr = array('rtype' => $rtype, 'rdocno' => $docno, 'riid' => $rid, 'rvendor' => $vendor, 'rdate' => strtotime($waktu), 'rdesc' => $desc, 'rstatus' => $status);
					if ($this -> receiving_model -> __update_receiving($id, $arr)) {
						$iid = array();
						foreach($items as $k => $v) {
							$this -> receiving_model -> __update_receiving_item($k,array('rqty' => $v));
							if ($app == 1) {
								$iid = $this -> receiving_model -> __get_receiving_item_detail($k);
								if (isset($iid[0] -> riid)) {
									$iv = $this -> receiving_model -> __get_inventory_detail($iid[0] -> riid,1,$this -> memcachedlib -> sesresult['ubid']);
									$this -> receiving_model -> __update_inventory($iid[0] -> riid,$this -> memcachedlib -> sesresult['ubid'],1,array('istockin' => ($iv[0] -> istockin+$v),'istock' => ($iv[0] -> istock + $v)));
								}
							}
						}

						$iid2 = 0;
						foreach($items2 as $k => $v) {
							$this -> receiving_model -> __update_receiving_item($k,array('rqty' => $v));
							if ($app == 1) {
								$iid = $this -> receiving_model -> __get_receiving_item_detail($k);
								if (isset($iid[0] -> riid)) {
									$iv = $this -> receiving_model -> __get_inventory_detail($iid[0] -> riid,2,$this -> memcachedlib -> sesresult['ubid']);
									$this -> receiving_model -> __update_inventory($iid[0] -> riid,$this -> memcachedlib -> sesresult['ubid'],2,array('istockin' => ($iv[0] -> istockin+$v),'istock' => ($iv[0] -> istock + $v)));
								}
							}
						}

						__set_error_msg(array('info' => 'Data berhasil diubah'.($upa == true ? ' dan buku berhasil di import' : '').'.'));
						redirect(site_url('receiving'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('receiving'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('receiving'));
			}
		}
		else {
			$view['id'] = $id;
			$view['detail'] = $this -> receiving_model -> __get_receiving_detail($id);
			$view['branch'] = $this -> branch_lib -> __get_branch($view['detail'][0] -> rbid);
			$this->load->view(__FUNCTION__, $view);
		}
	}
	
	function receiving_types($type,$id) {
		$res = '';
		if ($type == 1) {
			$res .= '<select name="rid" class="form-control" id="rid">';
			$res .= $this -> request_lib -> __get_request($id,$this -> memcachedlib -> sesresult['ubid'],3);
			$res .= '</select>';
		}
		else {
			$r = $this -> receiving_model -> __get_receiving_vendor($id);
			$res .= '<input type="text" name="vendor" class="form-control" autocomplete="off" value="'.($id ? $r[0] -> rvendor : '').'" />';
		}
		echo $res;
	}
	
	function receiving_list_items($type, $did) {
		$view['items'][0] = $this -> request_model -> __get_request_items(1);
		$view['items'][1] = $this -> request_model -> __get_request_items(2);
		
		$view['type'] = $type;
		$view['did'] = $did;
		$this->load->view('tmp/' . __FUNCTION__, $view, FALSE);
	}
	
	function receiving_detail($id) {
		$view['items'][0] = $this -> receiving_model -> __get_items($id, 1, 2);
		$view['items'][1] = $this -> receiving_model -> __get_items($id, 2, 2);
		$view['detail'] = $this -> receiving_model -> __get_receiving_detail($id);
		if ($view['detail'][0] -> rstatus != 3) redirect(site_url('receiving'));
		$this->load->view(__FUNCTION__, $view);
	}
	
	function receiving_delete($id) {
		if ($this -> receiving_model -> __delete_receiving($id)) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('receiving'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('receiving'));
		}
	}
	
	function receiving_items($did) {
		if ($did) {
			$view['type'] = 2;
			$view['did'] = $did;
			$view['items'][0] = $this -> receiving_model -> __get_items($did, 1, 2);
			$view['items'][1] = $this -> receiving_model -> __get_items($did, 2, 2);
		}
		else {
			$iid = $this -> memcachedlib -> get('__receiving_items');
			if (!$iid) return false;
			$pid = implode(',',$iid['pid']);
			$sid = implode(',',$iid['sid']);

			$view['did'] = 0;
			$view['type'] = 1;
			if ($pid) $view['items'][0] = $this -> receiving_model -> __get_items($pid, 1, 1);
			if ($sid) $view['items'][1] = $this -> receiving_model -> __get_items($sid, 2, 1);
		}
		$this->load->view('tmp/' . __FUNCTION__, $view, FALSE);
	}
	
	
	function receiving_items_delete($type) {
		$pid = (int) $this -> input -> post('pid');
		$sid = (int) $this -> input -> post('sid');
		$did = (int) $this -> input -> post('did');
		
		if ($pid || $sid) {
			if ($type == 1) {
				$items = $this -> memcachedlib -> get('__receiving_items');
				$arr = array();
				$arr2 = array();
				
				foreach($items['pid'] as $v) {
					if ($v <> $pid) $arr[] = $v;
				}
				
				foreach($items['sid'] as $v) {
					if ($v <> $sid) $arr2[] = $v;
				}
				$this -> memcachedlib -> set('__receiving_items', array_merge(array('pid' => $arr),array('sid' => $arr2)), 900);
			}
			else {
				if ($did) {
					if ($pid) $this -> receiving_model -> __delete_receiving_item($did,$pid);
					if ($sid) $this -> receiving_model -> __delete_receiving_item($did,$sid);
				}
			}
		}
	}
	
	function receiving_items_add($type) {
		$pid = $this -> input -> post('pid');
		$sid = $this -> input -> post('sid');
		if (!$pid && !$sid) {
			__set_error_msg(array('error' => 'Item harus dipilih !!!'));
			redirect(site_url('receiving/receiving_list_items/' . $type));
		}
		else {
			if ($type == 1) {
				$DidN = (!$this -> memcachedlib -> get('__receiving_items') ? array() : $this -> memcachedlib -> get('__receiving_items'));
				if ($DidN['pid'] || $DidN['sid']) {
					$arr = array_unique(array_merge((!$DidN['pid'] ? array() : $DidN['pid']),(!$pid ? array() : $pid)));
					$arr2 = array_unique(array_merge((!$DidN['sid'] ? array() : $DidN['sid']),(!$sid ? array() : $sid)));
					$this -> memcachedlib -> set('__receiving_items', array_merge(array('pid' => $arr),array('sid' => $arr2)), 900);
				}
				else
					$this -> memcachedlib -> set('__receiving_items', array_merge(array('pid' => $pid),array('sid' => $sid)), 900);
			}
			else {
				$drid = (int) $this -> input -> post('did');
				foreach($pid as $k => $v)
					$this -> receiving_model -> __insert_receiving_item(array('rrid' => $drid, 'rbid' => $this -> memcachedlib -> sesresult['ubid'],'riid' => $v,'rstatus' => 1, 'ritype' => 1));

				foreach($sid as $k => $v)
					$this -> receiving_model -> __insert_receiving_item(array('rrid' => $drid, 'rbid' => $this -> memcachedlib -> sesresult['ubid'],'riid' => $v,'rstatus' => 1, 'ritype' => 2));
			}

			__set_error_msg(array('info' => 'Item berhasil ditambahkan.'));
			redirect(site_url('receiving/receiving_list_items/' . $type));
		}
	}
	
	function export($type,$id) {
		if ($type == 'excel') {
			ini_set('memory_limit', '-1');
			$this -> load -> library('excel');
			$data = $this -> receiving_model -> __export($this -> memcachedlib -> sesresult['ubid']);
			
			$arr = array();
			foreach($data as $K => $v)
				$arr[] = array($v -> rdocno, __get_receiving_type($v -> rtype,1),($v -> rtype == 1 ? __get_receiving_name($v -> riid, $v -> rtype) : $v -> rvendor), __get_date($v -> rdate), $v -> rdesc, $v -> total_books, ($v -> rstatus == 3 ? 'Approved' : __get_status($v -> rstatus,1)));
			
			$data = array('header' => array('Doc No.', 'Type', 'Request No. / Publisher','Date','Description','Total Item','Status'), 'data' => $arr);

			$this -> excel -> sEncoding = 'UTF-8';
			$this -> excel -> bConvertTypes = false;
			$this -> excel -> sWorksheetTitle = 'Item Receiving - PT. Niko Elektronic indonesia';
			
			$this -> excel -> addArray($data);
			$this -> excel -> generateXML('dist-receiving-' . date('Ymd'));
		}
		else if ($type == 'excel_detail') {
			$filename ="receiving_detail-".$id.".xls";
			header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment; filename='.$filename);
			header("Cache-Control: max-age=0");
			$view['items'][0] = $this -> receiving_model -> __get_items($id, 1, 2);
			$view['items'][1] = $this -> receiving_model -> __get_items($id, 2, 2);
			$view['detail'] = $this -> receiving_model -> __get_receiving_detail($id);
			if ($view['detail'][0] -> rstatus != 3) redirect(site_url('receiving'));
			$this->load->view('print/receiving', $view, false);
		}
	}
}
