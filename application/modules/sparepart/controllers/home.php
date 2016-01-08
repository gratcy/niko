<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> library('group_sparepart/group_sparepart_lib');
		$this -> load -> library('group_product/group_product_lib');
		$this -> load -> model('inventory/inventory_model');
		$this -> load -> model('branch/branch_model');
		$this -> load -> model('sparepart_model');
	}

	function index() {
		$keyword = $this -> input -> post('keyword');
		if ($keyword) {
			$view['keyword'] = $keyword;
			$view['sparepart'] = $this -> sparepart_model -> __get_search($keyword);
			$view['pages'] = '';
		}
		else {
			$pager = $this -> pagination_lib -> pagination($this -> sparepart_model -> __get_sparepart(),3,10,site_url('sparepart'));
			$view['sparepart'] = $this -> pagination_lib -> paginate();
			$view['pages'] = $this -> pagination_lib -> pages();
			$view['keyword'] = '';
		}
		$this->load->view('sparepart', $view);
	}
	
	function sparepart_add() {
		if ($_POST) {
			$agent = str_replace(',','',$this -> input -> post('agent', TRUE));
			$retail = str_replace(',','',$this -> input -> post('retail', TRUE));
			$name = $this -> input -> post('name', TRUE);
			$groupproduct = (int) $this -> input -> post('groupproduct');
			$status = (int) $this -> input -> post('status');
			$special = (int) $this -> input -> post('special');
			
			if (!$agent || !$retail || !$name) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('sparepart' . '/' . __FUNCTION__));
			}
			else {
				$arr = array('sgroupproduct' => $groupproduct, 'sname' => $name, 'spriceagent' => $agent, 'spriceretail' => $retail, 'sspecial' => $special, 'sstatus' => $status);
				if ($this -> sparepart_model -> __insert_sparepart($arr)) {
					$sid = $this -> db -> insert_id();
					$branch = $this -> branch_model -> __get_branch_select('');
					
					foreach($branch as $k => $v) {
						$arr = array('ibid' => $v -> bid, 'iiid' => $sid, 'itype' => 2, 'istockbegining' => 0, 'istockin' => 0, 'istockout' => 0, 'istock' => 0, 'istatus' => 1);
						$this -> inventory_model -> __insert_inventory($arr);
						
						$arr = array('ibid' => $v -> bid, 'iiid' => $sid, 'itype' => 5, 'istockbegining' => 0, 'istockin' => 0, 'istockout' => 0, 'istock' => 0, 'istatus' => 1);
						$this -> inventory_model -> __insert_inventory($arr);
					}
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('sparepart'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('sparepart'));
				}
			}
		}
		else {
			$view['group_product'] = $this -> group_product_lib -> __get_group_product();
			$this->load->view(__FUNCTION__, $view);
		}
	}
	
	function sparepart_update($id) {
		if ($_POST) {
			$agent = str_replace(',','',$this -> input -> post('agent', TRUE));
			$retail = str_replace(',','',$this -> input -> post('retail', TRUE));
			$name = $this -> input -> post('name', TRUE);
			$groupproduct = (int) $this -> input -> post('groupproduct');
			$status = (int) $this -> input -> post('status');
			$id = (int) $this -> input -> post('id');
			$special = (int) $this -> input -> post('special');
			
			if ($id) {
				if (!$agent || !$retail || !$name) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('sparepart' . '/' . __FUNCTION__ . '/' . $id));
				}
				else {
					$arr = array('sgroupproduct' => $groupproduct, 'sname' => $name, 'spriceagent' => $agent, 'spriceretail' => $retail, 'sspecial' => $special, 'sstatus' => $status);
					if ($this -> sparepart_model -> __update_sparepart($id, $arr)) {	
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('sparepart'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('sparepart'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('sparepart'));
			}
		}
		else {
			$view['id'] = $id;
			$view['detail'] = $this -> sparepart_model -> __get_sparepart_detail($id);
			$view['group_product'] = $this -> group_product_lib -> __get_group_product($view['detail'][0] -> sgroupproduct);
			$this->load->view(__FUNCTION__, $view);
		}
	}
	
	function sparepart_delete($id) {
		if ($this -> sparepart_model -> __delete_sparepart($id)) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('sparepart'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('sparepart'));
		}
	}
	
	function get_suggestion() {
		header('Content-type: application/javascript');
		$hint = '';
		$a = array();
		$q = $_SERVER['QUERY_STRING'];
		$arr = $this -> sparepart_model -> __get_suggestion();
		if (strlen($q) < 2) return false;
		
		foreach($arr as $k => $v) $a[] = array('name' => $v -> name, 'id' => $v -> id);
		if (strlen($q) > 0) {
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
				
				if (strtolower($q)==strtolower(substr($a[$i]['name'],0,strlen($q)))) {
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
		}
		
		echo json_encode($hint);
	}
}
