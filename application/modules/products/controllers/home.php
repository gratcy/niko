<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> library('categories/categories_lib');
		$this -> load -> library('packaging/packaging_lib');
		$this -> load -> library('group_product/group_product_lib');
		$this -> load -> library('products/products_lib');
		$this -> load -> library('branch/branch_lib');
		$this -> load -> model('inventory/inventory_model');
		$this -> load -> model('products_model');
	}

	function index() {
		$keyword = $this -> input -> post('keyword');
		if ($keyword) {
			$view['keyword'] = $keyword;
			$view['products'] = $this -> products_model -> __get_search($keyword, $this -> memcachedlib -> sesresult['ubid']);
			$view['pages'] = '';
		}
		else {
			$pager = $this -> pagination_lib -> pagination($this -> products_model -> __get_products($this -> memcachedlib -> sesresult['ubid']),3,10,site_url('products'));
			$view['products'] = $this -> pagination_lib -> paginate();
			$view['pages'] = $this -> pagination_lib -> pages();
			$view['keyword'] = '';
		}
		$this->load->view('products', $view);
	}
	
	function products_add() {
		if ($_POST) {
			$desc = $this -> input -> post('desc', TRUE);
			$packaging = (int) $this -> input -> post('packaging');
			$category = (int) $this -> input -> post('category');
			$point = $this -> input -> post('point', TRUE);
			$type = (int) $this -> input -> post('type');
			$group = (int) $this -> input -> post('group');
			$consume = str_replace(',','',$this -> input -> post('consume', TRUE));
			$store = str_replace(',','',$this -> input -> post('store', TRUE));
			$key = str_replace(',','',$this -> input -> post('key', TRUE));
			$semi = str_replace(',','',$this -> input -> post('semi', TRUE));
			$dist = str_replace(',','',$this -> input -> post('dist', TRUE));
			$basic = str_replace(',','',$this -> input -> post('basic', TRUE));
			$name = $this -> input -> post('name', TRUE);
			$code = $this -> input -> post('code', TRUE);
			$moq = $this -> input -> post('moq', TRUE);
			$isi = (int) $this -> input -> post('isi');
			$status = (int) $this -> input -> post('status');

			if (!$name || !$desc || $consume == '' || $store == '' || $key == '' || $semi == '' || $dist == '' || !$code) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('products' . '/' . __FUNCTION__));
			}
			else {
				$arr = array('pcid' => $category, 'pgroup' => $group, 'ptype' => $type, 'ppid' => $packaging, 'pvolume' => $isi, 'pcode' => $code, 'pname' => $name, 'pdesc' => $desc, 'phpp' => $basic, 'pdist' => $dist, 'psemi' => $semi, 'pkey' => $key, 'pstore' => $store, 'pconsume' => $consume, 'ppoint' => $point, 'pstatus' => $status);
				if ($this -> products_model -> __insert_products($arr)) {
					$pid = $this -> db-> insert_id();
					
					foreach($moq as $k => $v) :
						$arr = array('ibid' => $k, 'iiid' => $pid, 'itype' => 1, 'istockbegining' => 0, 'istockin' => 0, 'istockout' => 0, 'istock' => 0, 'istatus' => 1);
						$this -> inventory_model -> __insert_inventory($arr);
						
						$arr = array('ibid' => $k, 'iiid' => $pid, 'itype' => 3, 'istockbegining' => 0, 'istockin' => 0, 'istockout' => 0, 'istock' => 0, 'istatus' => 1);
						$this -> inventory_model -> __insert_inventory($arr);
						
						$arr = array('ibid' => $k, 'iiid' => $pid, 'itype' => 4, 'istockbegining' => 0, 'istockin' => 0, 'istockout' => 0, 'istock' => 0, 'istatus' => 1);
						$this -> inventory_model -> __insert_inventory($arr);
						
						$this -> products_model -> __insert_moq(array('mbid' => $k, 'mpid' => $pid, 'mqty' => str_replace(',','',$v)));
					endforeach;
					
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('products'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('products'));
				}
			}
		}
		else {
			$view['products'] = $this -> products_lib -> __get_products();
			$view['category'] = $this -> categories_lib -> __get_categories();
			$view['packaging'] = $this -> packaging_lib -> __get_packaging();
			$view['group_product'] = $this -> group_product_lib -> __get_group_product();
			$this->load->view(__FUNCTION__, $view);
		}
	}
	
	function products_update($id) {
		if ($_POST) {
			$desc = $this -> input -> post('desc', TRUE);
			$point = $this -> input -> post('point', TRUE);
			$consume = str_replace(',','',$this -> input -> post('consume', TRUE));
			$store = str_replace(',','',$this -> input -> post('store', TRUE));
			$key = str_replace(',','',$this -> input -> post('key', TRUE));
			$semi = str_replace(',','',$this -> input -> post('semi', TRUE));
			$dist = str_replace(',','',$this -> input -> post('dist', TRUE));
			$basic = str_replace(',','',$this -> input -> post('basic', TRUE));
			$name = $this -> input -> post('name', TRUE);
			$code = $this -> input -> post('code', TRUE);
			$packaging = (int) $this -> input -> post('packaging');
			$category = (int) $this -> input -> post('category');
			$status = (int) $this -> input -> post('status');
			$id = (int) $this -> input -> post('id');
			$group = (int) $this -> input -> post('group');
			$type = (int) $this -> input -> post('type');
			$isi = (int) $this -> input -> post('isi');
			$moq = $this -> input -> post('moq', TRUE);
			
			if ($id) {
				if (!$name || !$desc || $consume == '' || $store == '' || $key == '' || $semi == '' || $dist == '' || !$code) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('products' . '/' . __FUNCTION__ . '/' . $id));
				}
				else {
					$arr = array('pcid' => $category, 'pgroup' => $group, 'ptype' => $type, 'ppid' => $packaging, 'pvolume' => $isi, 'pcode' => $code, 'pname' => $name, 'pdesc' => $desc, 'phpp' => $basic, 'pdist' => $dist, 'psemi' => $semi, 'pkey' => $key, 'pstore' => $store, 'pconsume' => $consume, 'ppoint' => $point, 'pstatus' => $status);
					if ($this -> products_model -> __update_products($id, $arr)) {
						foreach($moq as $k => $v)
							if ($this -> products_model -> __check_moq($id, $k))
								$this -> products_model -> __update_moq($id,$k, array('mqty' => str_replace(',','',$v)));
							else
								$this -> products_model -> __insert_moq(array('mbid' => $k, 'mpid' => $id, 'mqty' => str_replace(',','',$v)));

						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('products'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('products'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('products'));
			}
		}
		else {
			$view['id'] = $id;
			$view['detail'] = $this -> products_model -> __get_products_detail($id);
			$view['category'] = $this -> categories_lib -> __get_categories($view['detail'][0] -> pcid);
			$view['packaging'] = $this -> packaging_lib -> __get_packaging($view['detail'][0] -> ppid);
			$view['group_product'] = $this -> group_product_lib -> __get_group_product($view['detail'][0] -> pgroup);
			$view['moq'] = $this -> products_model -> __get_moq($id);

			$this->load->view(__FUNCTION__, $view);
		}
	}
	
	function products_delete($id) {
		if ($this -> products_model -> __delete_products($id)) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('products'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('products'));
		}
	}
	
	function get_suggestion() {
		$hint = '';
		$a = array();
		$q = $_SERVER['QUERY_STRING'];
		$arr = $this -> products_model -> __get_suggestion();
		
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
