<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> library('categories/categories_lib');
		$this -> load -> library('packaging/packaging_lib');
		$this -> load -> library('products/products_lib');
		$this -> load -> library('branch/branch_lib');
		$this -> load -> model('products_model');
	}

	function index() {
		$pager = $this -> pagination_lib -> pagination($this -> products_model -> __get_products(),3,10,site_url('products'));
		$view['products'] = $this -> pagination_lib -> paginate();
		$view['pages'] = $this -> pagination_lib -> pages();
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
			$disc = (int) $this -> input -> post('disc');
			$status = (int) $this -> input -> post('status');

			if (!$name || !$desc || $consume == '' || $store == '' || $key == '' || $semi == '' || $dist == '' || !$code) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('products' . '/' . __FUNCTION__));
			}
			else {
				$arr = array('pcid' => $category, 'pgroup' => $group, 'ptype' => $type, 'ppid' => $packaging, 'pcode' => $code, 'pname' => $name, 'pdesc' => $desc, 'phpp' => $basic, 'pdist' => $dist, 'psemi' => $semi, 'pkey' => $key, 'pstore' => $store, 'pconsume' => $consume, 'ppoint' => $point, 'pdisc' => $disc, 'pstatus' => $status);
				if ($this -> products_model -> __insert_products($arr)) {
					$pid = $this -> db-> insert_id();
					
					foreach($moq as $k => $v)
						$this -> products_model -> __insert_moq(array('mbid' => $k, 'mpid' => $pid, 'mqty' => str_replace(',','',$v)));

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
			$disc = (int) $this -> input -> post('disc');
			$id = (int) $this -> input -> post('id');
			$group = (int) $this -> input -> post('group');
			$type = (int) $this -> input -> post('type');
			$moq = $this -> input -> post('moq', TRUE);
			
			if ($id) {
				if (!$name || !$desc || $consume == '' || $store == '' || $key == '' || $semi == '' || $dist == '' || !$code) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('products' . '/' . __FUNCTION__ . '/' . $id));
				}
				else {
					$arr = array('pcid' => $category, 'pgroup' => $group, 'ptype' => $type, 'ppid' => $packaging, 'pcode' => $code, 'pname' => $name, 'pdesc' => $desc, 'phpp' => $basic, 'pdist' => $dist, 'psemi' => $semi, 'pkey' => $key, 'pstore' => $store, 'pconsume' => $consume, 'ppoint' => $point, 'pdisc' => $disc, 'pstatus' => $status);
					if ($this -> products_model -> __update_products($id, $arr)) {
						foreach($moq as $k => $v)
							$this -> products_model -> __update_moq($id,$k, array('mqty' => str_replace(',','',$v)));
						
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
}
