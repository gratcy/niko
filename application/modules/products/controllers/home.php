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
		header('Content-type: application/javascript');
		$hint = '';
		$a = array();
		$q = urldecode($_SERVER['QUERY_STRING']);
		$arr = $this -> products_model -> __get_suggestion();
		if (strlen($q) < 2) return false;
		foreach($arr as $k => $v) $a[] = array('name' => trim($v -> name), 'id' => $v -> id);

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
	
	function export_products() {
		ini_set('memory_limit', '-1');
		$this -> load -> library('excel');
		$data = $this -> products_model -> __get_export($this -> memcachedlib -> sesresult['ubid']);
		
		$arr = array();
		foreach($data as $K => $v) {
			$arr[] = array($v -> pid, $v -> pcode, $v -> pname, $v -> pvolume, $v -> ppname, __get_rupiah($v -> pdist,1), __get_rupiah($v -> psemi,1), __get_rupiah($v -> pkey,1), __get_rupiah($v -> pstore,1), __get_rupiah($v -> pconsume,1), __get_status($v -> pstatus,1));
		}
		
		$data = array('header' => array('Product ID','Code', 'Name', 'Volume/Pcs','Packaging','Price Distributor','Price Semi','Price Agent','Price Store', 'Price Consumer', 'Status'), 'data' => $arr);
		$this -> excel -> sEncoding = 'UTF-8';
		$this -> excel -> bConvertTypes = false;
		$this -> excel -> sWorksheetTitle = 'Product List - PT. Niko Elektronic indonesia';
		
		$this -> excel -> addArray($data);
		$this -> excel -> generateXML('ProductList-' . date('Ymd'));
	}
}
