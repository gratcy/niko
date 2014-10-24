<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> library('branch/branch_lib');
		$this -> load -> library('sales/sales_lib');
		$this -> load -> model('purchase_order_model');
		$this -> load -> library('customers/customers_lib');
		$this -> load -> library('suplier/suplier_lib');
	}

	function index() {
		$keyword = $this -> input -> post('keyword');
		if ($keyword) {
			$view['keyword'] = $keyword;
			$view['purchase_order'] = $this -> purchase_order_model -> __get_search($keyword);
			$view['pages'] = '';
		}
		else {
			$pager = $this -> pagination_lib -> pagination($this -> purchase_order_model -> __get_purchase_order(),3,10,site_url('purchase_order'));
			$view['purchase_order'] = $this -> pagination_lib -> paginate();
			$view['pages'] = $this -> pagination_lib -> pages();
			$view['keyword'] = '';
		}
		$this->load->view('purchase_order', $view);
	}
	
	function penerimaan() {
		$keyword = $this -> input -> post('keyword');
		if ($keyword) {
			$view['keyword'] = $keyword;
			$view['purchase_order'] = $this -> purchase_order_model -> __get_search($keyword);
			$view['pages'] = '';
		}
		else {
			$pager = $this -> pagination_lib -> pagination($this -> purchase_order_model -> __get_purchase_order(),3,10,site_url('purchase_order'));
			$view['purchase_order'] = $this -> pagination_lib -> paginate();
			$view['pages'] = $this -> pagination_lib -> pages();
			$view['keyword'] = '';
		}
		$this->load->view('penerimaan', $view);
	}	
	
	function purchase_order_add() {
		if ($_POST) {
		
		
			$pbid = $this -> input -> post('pbid', TRUE);
			$pnobukti = $this -> input -> post('pnobukti', TRUE);
			$pref = $this -> input -> post('pref', TRUE);
			$ptglx = explode("/",$this -> input -> post('ptgl', TRUE));			
			$ptgl="$ptglx[2]-$ptglx[1]-$ptglx[0]";					
			$psid = $this -> input -> post('psid', TRUE);
			$pgudang = $this -> input -> post('pgudang', TRUE);
			$pstatus = (int)$this ->input -> post('pstatus', TRUE);
			$pcdate=date('Y-m-d');
			$pcid = $this -> input -> post('pcid', TRUE);
			$pssid = $this -> input -> post('pssid', TRUE);
			$ptype = $this -> input -> post('ptype', TRUE);
		
			// print_r($_POST);die;
			
			// if (!$name || !$npwp || !$addr || !$phone1 || !$phone2 || !$city || !$prov) {
				// __set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				// redirect(site_url('purchase_order' . '/' . __FUNCTION__));
			// }
			// else {
					$arr = array('pbid' => $pbid, 'pnobukti' => $pnobukti, 'pref' => $pref, 'ptgl' => $ptgl, 'psid' => $psid, 'pgudang' => $pgudang,'pstatus' => $pstatus,'pcdate' => $pcdate,'pcid'=>$pcid,'ptype' => $ptype,'pssid'=>$pssid );	
				if ($this -> purchase_order_model -> __insert_purchase_order($arr)) {
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					
					$lastid=$this->db->insert_id();	
					
					 $this -> purchase_order_model -> __get_total_purchase_order_monthly($ptglx[1],$ptglx[2],$lastid);
					
									
					redirect(site_url('purchase_order_detail/home/purchase_order_detail_add/'. $lastid .''));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('purchase_order/home'));
				}
			//}
		}
		else {

			
		$view['pcid'] = $this -> customers_lib -> __get_customers();
		$view['pssid'] = $this -> suplier_lib -> __get_suplier();
		$view['pbid'] = $this -> branch_lib -> __get_branch();
		$view['psid'] = $this -> sales_lib -> __get_sales('',$this -> memcachedlib -> sesresult['ubid']);
		$this->load->view('purchase_order_add',$view);
		}
	}
	
	function purchase_order_update($id) {
	//print_r($id);die;
		if ($_POST) {
		//print_r($_POST);die;	
			$pbid = $this -> input -> post('pbid', TRUE);
			$pnobukti = $this -> input -> post('pnobukti', TRUE);
			$pref = $this -> input -> post('pref', TRUE);
			$ptgl = $this -> input -> post('ptgl', TRUE);
			$psid = $this -> input -> post('psid', TRUE);
			$pgudang = $this -> input -> post('pgudang', TRUE);
			$pstatus = (int)$this ->input -> post('pstatus', TRUE);
			$id = (int) $this -> input -> post('id');
			
			if ($id) {
				// if (!$name || !$npwp || !$addr || !$phone1 || !$phone2 || !$city || !$prov) {
					// __set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					// redirect(site_url('purchase_order' . '/' . __FUNCTION__ . '/' . $id));
				// }
				// else {
			// else {
					$arr = array('pbid' => $pbid, 'pnobukti' => $pnobukti, 'pref' => $pref, 'ptgl' => $ptgl, 'psid' => $psid, 'pgudang' => $pgudang,'pstatus' => $pstatus );	
					
					
					
					
					if ($this -> purchase_order_model -> __update_purchase_order($id, $arr)) {	
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
											
						//redirect(site_url('purchase_order/home'));
					redirect(site_url('purchase_order_detail/home/purchase_order_detail_add/'. $id .''));						
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('purchase_order/home'));
					}
				//}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('purchase_order/home'));
			}
		}
		else {
			$view['id'] = $id;
			
			$view['detail'] = $this -> purchase_order_model -> __get_purchase_order_detail($id);
			$view['pbid'] = $this -> branch_lib -> __get_branch($view['detail'][0] -> pbid);
			$view['psid'] = $this -> sales_lib -> __get_sales($view['detail'][0] -> psid,$this -> memcachedlib -> sesresult['ubid']);
			$this->load->view(__FUNCTION__, $view);
		}
	}
	
	function purchase_order_delete($id) {
		if ($this -> purchase_order_model -> __delete_purchase_order($id)) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('purchase_order/home'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('purchase_order'));
		}
	}
	
	function get_suggestion() {
		$hint = '';
		$a = array();
		$q = $_SERVER['QUERY_STRING'];
		$arr = $this -> purchase_order_model -> __get_suggestion();
		
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
