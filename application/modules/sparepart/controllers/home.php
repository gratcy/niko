<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> library('products/products_lib');
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
			$code = $this -> input -> post('code', TRUE);
			$agent = $this -> input -> post('agent', TRUE);
			$retail = $this -> input -> post('retail', TRUE);
			$name = $this -> input -> post('name', TRUE);
			$nocomp = $this -> input -> post('nocomp', TRUE);
			$product = (int) $this -> input -> post('product');
			$status = (int) $this -> input -> post('status');
			$group = (int) $this -> input -> post('group');
			
			if (!$code || !$agent || !$retail || !$name || !$nocomp || !$product) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('sparepart' . '/' . __FUNCTION__));
			}
			else {
				$arr = array('spid' => $product, 'scode' => $code, 'sname' => $name, 'sgroup' => $group, 'snocomponent' => $nocomp, 'spriceagent' => $agent, 'spriceretail' => $retail, 'sstatus' => $status);
				if ($this -> sparepart_model -> __insert_sparepart($arr)) {
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
			$view['products'] = $this -> products_lib -> __get_products();
			$this->load->view(__FUNCTION__, $view);
		}
	}
	
	function sparepart_update($id) {
		if ($_POST) {
			$code = $this -> input -> post('code', TRUE);
			$agent = $this -> input -> post('agent', TRUE);
			$retail = $this -> input -> post('retail', TRUE);
			$name = $this -> input -> post('name', TRUE);
			$nocomp = $this -> input -> post('nocomp', TRUE);
			$product = (int) $this -> input -> post('product');
			$status = (int) $this -> input -> post('status');
			$group = (int) $this -> input -> post('group');
			$id = (int) $this -> input -> post('id');
			
			if ($id) {
				if (!$code || !$agent || !$retail || !$name || !$nocomp || !$product) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('sparepart' . '/' . __FUNCTION__ . '/' . $id));
				}
				else {
					$arr = array('spid' => $product, 'scode' => $code, 'sname' => $name, 'sgroup' => $group, 'snocomponent' => $nocomp, 'spriceagent' => $agent, 'spriceretail' => $retail, 'sstatus' => $status);
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
			$view['products'] = $this -> products_lib -> __get_products($view['detail'][0] -> spid);
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
		$hint = '';
		$a = array();
		$q = $_SERVER['QUERY_STRING'];
		$arr = $this -> sparepart_model -> __get_suggestion();
		
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
