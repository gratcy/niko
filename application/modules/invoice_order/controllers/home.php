<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> library('branch/branch_lib');
		$this -> load -> library('sales/sales_lib');
		$this -> load -> library('invoice_order/invoice_order_lib');
		$this -> load -> model('invoice_order_model');
		//$this -> load -> model('sales_order_model');
		$this -> load -> library('customers/customers_lib');
	}

	function index() {
		$keyword = $this -> input -> post('keyword');
		if ($keyword) {
			$view['keyword'] = $keyword;
			$view['pages'] = '';
			$view['sales_order'] = '';
		}
		else {
			$pager = $this -> pagination_lib -> pagination($this -> invoice_order_model -> __get_sales_order(),3,10,site_url('sales_order'));
			$view['sales_order'] = $this -> pagination_lib -> paginate();
			$view['pages'] = $this -> pagination_lib -> pages();
			$view['keyword'] = '';
		}
		$this->load->view('invoices', $view);
	}
	
	function invoice_order_create($id,$sbid) {
		

			$pager = $this -> pagination_lib -> pagination($this -> invoice_order_model -> __get_do_list($id),3,10,site_url('invoice_order/home/invoice_order_details'));
			$view['sales_order'] = $this -> pagination_lib -> paginate();
			$view['pages'] = $this -> pagination_lib -> pages();
			$view['id'] = $id;
			$view['ssisa']=$this -> invoice_order_model -> __get_sisa_so($id);
			$view['sbid'] = $sbid;			
			$view['headerx'] = $this->invoice_order_model -> __get_do_select($id);
		$this->load->view('invoice_order_create', $view);
	}
	
	function sales_order_update($id) {
	//print_r($id);die;
		if ($_POST) {
		//print_r($_POST);die;	
			$id = (int) $this -> input -> post('id');
			
			
			$sbid = $this -> input -> post('sbid', TRUE);
			$snoso = $this -> input -> post('snoso', TRUE);			
			// $stglx = explode("/",$this -> input -> post('stgl', TRUE));			
			// $stgl="$stglx[2]-$stglx[1]-$stglx[0]";		
			$stgl = $this -> input -> post('stgl', TRUE);			
			$ssid = $this -> input -> post('ssid', TRUE);			
			$sstatus = (int)$this ->input -> post('sstatus', TRUE);
			$scdate=date('Y-m-d');
			$sketerangan = $this -> input -> post('sketerangan', TRUE);
			$scid = $this -> input -> post('scid', TRUE);
			$stype = $this -> input -> post('stype', TRUE);
			$scurrency = $this -> input -> post('scurrency', TRUE);
			$skurs = $this -> input -> post('skurs', TRUE);
			$snpwp = $this -> input -> post('snpwp', TRUE);
			$ssisaplafon = $this -> input -> post('ssisaplafon', TRUE);
			$sfreeppn = $this -> input -> post('sfreeppn', TRUE);
			$ssubtotal = 0;
			$sppnnpwp = 0;
			$stotalsubppn = 0;
			$sppn = 0;
			$stotal = 0;	
			
			if ($id) {
				// if (!$name || !$npwp || !$addr || !$phone1 || !$phone2 || !$city || !$prov) {
					// __set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					// redirect(site_url('sales_order' . '/' . __FUNCTION__ . '/' . $id));
				// }
				// else {
			// else {
					$arr = array('sbid' => $sbid, 'snoso' => $snoso,  'stgl' => $stgl, 'ssid' => $ssid,'scid'=>$scid,'stype' => $stype,
					'scurrency' => $scurrency,'skurs' => $skurs,
					'snpwp' => $snpwp,'ssisaplafon' => $ssisaplafon,
					'sfreeppn' => $sfreeppn, 'ssubtotal' => $ssubtotal,		
					'sppnnpwp' => $sfreeppn, 'stotalsubppn' => $ssubtotal,	
					'sppn' => $sfreeppn, 'stotal' => $ssubtotal,'sketerangan' => $sketerangan,
					'sstatus' => $sstatus,'scdate' => $scdate );		
					
					
					
					if ($this -> sales_order_model -> __update_sales_order($id, $arr)) {	
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
											
						//redirect(site_url('sales_order/home'));
					redirect(site_url('sales_order_detail/home/sales_order_detail_add/'. $id .'/'. $scid .''));						
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('sales_order/home'));
					}
				//}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('sales_order/home'));
			}
		}
		else {
			$view['id'] = $id;
			
			$view['detail'] = $this -> sales_order_model -> __get_sales_order_detail($id);
			$view['sbid'] = $this -> branch_lib -> __get_branch($view['detail'][0] -> sbid);
			$view['ssid'] = $this -> sales_lib -> __get_sales($view['detail'][0] -> ssid,$this -> memcachedlib -> sesresult['ubid']);
			$this->load->view(__FUNCTION__, $view);
		}
	}
	
	function sales_order_delete($id) {
		if ($this -> sales_order_model -> __delete_sales_order($id)) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('sales_order/home'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('sales_order'));
		}
	}
}
