<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> library('branch/branch_lib');
		$this -> load -> model('request_model');
	}

	function index() {
		(!$this -> memcachedlib -> get('__request_items') ? '' : $this -> memcachedlib -> delete('__request_items'));
		$keyword = $this -> input -> post('keyword');
		$view['keyword'] = '';
		if ($keyword) {
			$view['keyword'] = $keyword;
			$view['request'] = $this -> request_model -> __get_request_search($keyword, $this -> memcachedlib -> sesresult['ubid']);
			$view['pages'] = '';
		}
		else {
			$pager = $this -> pagination_lib -> pagination($this -> request_model -> __get_request($this -> memcachedlib -> sesresult['ubid']),3,10,site_url('request'));
			$view['request'] = $this -> pagination_lib -> paginate();
			$view['pages'] = $this -> pagination_lib -> pages();
		}
		$this->load->view('request', $view);
	}
	
	function request_add() {
		if ($_POST) {
			$title = $this -> input -> post('title', TRUE);
			$desc = $this -> input -> post('desc', TRUE);
			$items = $this -> input -> post('items');
			$items2 = $this -> input -> post('items2');
			$bfrom = (int) $this -> input -> post('bfrom');
			$bto = (int) $this -> input -> post('bto');
			$rtype = (int) $this -> input -> post('rtype');
			$status = (int) $this -> input -> post('status');
			
			if (!$bto || !$bfrom || !$title) {
				__set_error_msg(array('error' => 'Cabang Asal, Tujuan dan Judul harus di isi !!!'));
				redirect(site_url('request' . '/' . __FUNCTION__));
			}
			else if (!$rtype) {
				__set_error_msg(array('error' => 'Jenis Request harus di isi !!!'));
				redirect(site_url('request' . '/' . __FUNCTION__));
			}
			else if (!$items && !$items2) {
				__set_error_msg(array('error' => 'Item Request harus di isi !!!'));
				redirect(site_url('request' . '/' . __FUNCTION__));
			}
			else {
				$arr = array('dtype' => $rtype, 'dbfrom' => $bfrom, 'dbto' => $bto, 'ddate' => time(), 'dtitle' => $title, 'ddesc' => $desc, 'dstatus' => $status);
				if ($this -> request_model -> __insert_request($arr)) {
					$drid = $this -> db -> insert_id();
					
					foreach($items as $k => $v)
						$this -> request_model -> __insert_request_item(array('ddrid' => $drid,'diid' => $k,'dqty' => $v, 'ditype' => 1,'dstatus' => 1));

					foreach($items2 as $k => $v)
						$this -> request_model -> __insert_request_item(array('ddrid' => $drid,'diid' => $k,'dqty' => $v, 'ditype' => 2,'dstatus' => 1));
					
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('request'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('request'));
				}
			}
		}
		else {
			$view['bfrom'] = $this -> branch_lib -> __get_branch();
			$view['bto'] = $this -> branch_lib -> __get_branch();
			$this->load->view(__FUNCTION__, $view);
		}
	}
	
	function request_update($id) {
		if ($_POST) {
			$id = (int) $this -> input -> post('id');
			$title = $this -> input -> post('title', TRUE);
			$desc = $this -> input -> post('desc', TRUE);
			$items = $this -> input -> post('items');
			$bfrom = (int) $this -> input -> post('bfrom');
			$bto = (int) $this -> input -> post('bto');
			$app = (int) $this -> input -> post('app');
			$rtype = (int) $this -> input -> post('rtype');
			
			if ($app == 1) $status = 3;
			else $status = (int) $this -> input -> post('status');
			
			if ($id) {
				if (!$bfrom || !$bto || !$title) {
					__set_error_msg(array('error' => 'Cabang Asal, Tujuan dan Judul harus di isi !!!'));
					redirect(site_url('request' . '/' . __FUNCTION__ . '/' . $id));
				}
				else if (!$rtype) {
					__set_error_msg(array('error' => 'Jenis Request harus di isi !!!'));
					redirect(site_url('request' . '/' . __FUNCTION__ . '/' . $id));
				}
				else {
					$arr = array('dtype' => $rtype, 'dbfrom' => $bfrom, 'dbto' => $bto, 'ddate' => time(), 'dtitle' => $title, 'ddesc' => $desc, 'dstatus' => $status);
					if ($this -> request_model -> __update_request($id, $arr)) {
						
					foreach($items as $k => $v)
						$this -> request_model -> __update_request_item($k,array('dqty' => $v));
						
					foreach($items2 as $k => $v)
						$this -> request_model -> __update_request_item($k,array('dqty' => $v));
						
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('request'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('request'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('request'));
			}
		}
		else {
			$view['id'] = $id;
			$view['detail'] = $this -> request_model -> __get_request_detail($id);
			$view['bfrom'] = $this -> branch_lib -> __get_branch($view['detail'][0] -> dbfrom);
			$view['bto'] = $this -> branch_lib -> __get_branch($view['detail'][0] -> dbto);
			$this->load->view(__FUNCTION__, $view);
		}
	}
	
	function request_delete($id) {
		if ($this -> request_model -> __delete_request($id)) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('request'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('request'));
		}
	}
	
	function request_items_add($type) {
		$pid = $this -> input -> post('pid');
		$sid = $this -> input -> post('sid');
		if (!$pid && !$sid) {
			__set_error_msg(array('error' => 'Item harus dipilih !!!'));
			redirect(site_url('request/request_list_items/' . $type));
		}
		else {
			if ($type == 1) {
				$DidN = (!$this -> memcachedlib -> get('__request_items') ? array() : $this -> memcachedlib -> get('__request_items'));
				if ($DidN['pid'] || $DidN['sid']) {
					$arr = array_unique(array_merge((!$DidN['pid'] ? array() : $DidN['pid']),(!$pid ? array() : $pid)));
					$arr2 = array_unique(array_merge((!$DidN['sid'] ? array() : $DidN['sid']),(!$sid ? array() : $sid)));
					$this -> memcachedlib -> set('__request_items', array_merge(array('pid' => $arr),array('sid' => $arr2)), 900);
				}
				else
					$this -> memcachedlib -> set('__request_items', array_merge(array('pid' => $pid),array('sid' => $sid)), 900);
			}
			else {
				$drid = (int) $this -> input -> post('did');
				foreach($pid as $k => $v)
					$this -> request_model -> __insert_request_item(array('ddrid' => $drid,'diid' => $v,'dstatus' => 1, 'ditype' => 1));

				foreach($sid as $k => $v)
					$this -> request_model -> __insert_request_item(array('ddrid' => $drid,'diid' => $v,'dstatus' => 1, 'ditype' => 2));
			}

			__set_error_msg(array('info' => 'Item berhasil ditambahkan.'));
			redirect(site_url('request/request_list_items/' . $type));
		}
	}
	
	function request_items($did) {
		if ($did) {
			$view['type'] = 2;
			$view['did'] = $did;
			$view['items'][0] = $this -> request_model -> __get_items($did, 1, 2);
			$view['items'][1] = $this -> request_model -> __get_items($did, 2, 2);
		}
		else {
			$view['items'] = array(array(),array());
			$view['did'] = 0;
			$iid = $this -> memcachedlib -> get('__request_items');
			if (!$iid) return false;
			$pid = ($iid['pid'] ? implode(',',$iid['pid']) : '');
			$sid = ($iid['sid'] ? implode(',',$iid['sid']) : '');

			$view['type'] = 1;
			if ($pid) $view['items'][0] = $this -> request_model -> __get_items($pid, 1, 1);
			if ($sid) $view['items'][1] = $this -> request_model -> __get_items($sid, 2, 1);
		}
		$this->load->view('tmp/' . __FUNCTION__, $view, FALSE);
	}
	
	function request_items_delete($type) {
		$pid = (int) $this -> input -> post('pid');
		$sid = (int) $this -> input -> post('sid');
		$did = (int) $this -> input -> post('did');
		
		if ($pid || $sid) {
			if ($type == 1) {
				$items = $this -> memcachedlib -> get('__request_items');
				$arr = array();
				foreach($items as $v) {
					if ($v <> $pid) $arr[] = $v;
					if ($v <> $sid) $arr[] = $v;
				}
				$this -> memcachedlib -> set('__request_items', $arr, 900);
			}
			else {
				if ($did) {
					if ($pid) $this -> request_model -> __delete_request_item($did,$pid,1);
					if ($sid) {
						if ($this -> request_model -> __delete_request_item($did,$sid,2)) echo 'berhasil';
						else echo 'gagal';
					}
				}
			}
		}
	}
	
	function request_list_items($type, $did) {
		$view['items'][0] = $this -> request_model -> __get_request_items(1);
		$view['items'][1] = $this -> request_model -> __get_request_items(2);

		$view['type'] = $type;
		$view['did'] = $did;
		$this->load->view('tmp/' . __FUNCTION__, $view, FALSE);
	}
	
	function request_detail($id) {
		$view['items'][0] = $this -> request_model -> __get_items($id, 1, 2);
		$view['items'][1] = $this -> request_model -> __get_items($id, 2, 2);
		$view['detail'] = $this -> request_model -> __get_request_items_detail($id);
		$view['id'] = $id;
		if ($view['detail'][0] -> dstatus != 3) redirect(site_url('request'));
		$this->load->view(__FUNCTION__, $view);
	}
	
	function export($type,$id) {
		if ($type == 'excel') {
			ini_set('memory_limit', '-1');
			$this -> load -> library('excel');
			$data = $this -> request_model -> __export($this -> memcachedlib -> sesresult['ubid']);
			$arr = array();
			
			foreach($data as $K => $v)
				$arr[] = array('R'.str_pad($v -> did, 4, "0", STR_PAD_LEFT),__get_date($v -> ddate), $v -> fbname, $v -> tbname, $v -> dtitle, $v -> ddesc, $v -> total_item, ($v -> dstatus == 3 ? 'Approved' : __get_status($v -> dstatus,1)));
			
			$data = array('header' => array('Request No.', 'Date', 'Branch From','Branch To','Title','Description','Total Item','Status'), 'data' => $arr);

			$this -> excel -> sEncoding = 'UTF-8';
			$this -> excel -> bConvertTypes = false;
			$this -> excel -> sWorksheetTitle = 'Distribution Request - PT. Niko Elektronic indonesia';
			
			$this -> excel -> addArray($data);
			$this -> excel -> generateXML('dist-request-' . date('Ymd'));
		}
		else if ($type == 'excel_detail') {
			$filename ="request_detail-".$id.".xls";
			header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment; filename='.$filename);
			header("Cache-Control: max-age=0");
			$view['items'][0] = $this -> request_model -> __get_items($id, 1, 2);
			$view['items'][1] = $this -> request_model -> __get_items($id, 2, 2);
			$view['detail'] = $this -> request_model -> __get_request_items_detail($id);
			$view['id'] = $id;
			
			if ($view['detail'][0] -> dstatus != 3) redirect(site_url('request'));
			
			$this->load->view('print/dist_request', $view, false);
		}
	}
}
