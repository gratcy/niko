<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> library('branch/branch_lib');
		$this -> load -> library('sales/sales_lib');
		$this -> load -> library('products/products_lib');
		$this -> load -> model('sales_order/sales_order_model');
		$this -> load -> model('sales_order_detail_model');
		$this -> load -> model('purchase_order/purchase_order_model');
		$this -> load -> model('purchase_order_detail/purchase_order_detail_model');		
	}

	function index() {
		$pager = $this -> pagination_lib -> pagination($this -> sales_order_detail_model -> __get_sales_order_detail(),3,10,site_url('sales_order_detail'));
		$view['sales_order_detail'] = $this -> pagination_lib -> paginate();
		$view['pages'] = $this -> pagination_lib -> pages();
		$this->load->view('sales_order_detail', $view);
	}



	function sales_order_details($id,$scid) {
			$view['id'] = $id;
			$view['scid'] = $scid;
			$view['detailx'] = $this -> sales_order_model -> __get_sales_order_detail($id);
			$view['detail'] =$this -> sales_order_detail_model -> __get_sales_order_detail_cust($id);						
			$view['pbid'] = $this -> branch_lib -> __get_branch();
			$view['psid'] = $this -> sales_lib -> __get_sales();
			$view['pppid'] = $this -> products_lib -> __get_products();	
	
			$this->load->view('sales_order_details',$view);
	}
	
	function delivery_order_details($id,$scid) {
			$view['id'] = $id;
			$view['scid'] = $scid;
			$view['detailx'] = $this -> sales_order_model -> __get_sales_order_detail($id);
			$view['detail'] =$this -> sales_order_detail_model -> __get_sales_order_detail_cust($id);						
			$view['pbid'] = $this -> branch_lib -> __get_branch();
			$view['psid'] = $this -> sales_lib -> __get_sales();
			$view['pppid'] = $this -> products_lib -> __get_products();	
	
			$this->load->view('delivery_order_details',$view);
	}	

	function sales_order_report($id,$scid) {
			$view['id'] = $id;
			$view['scid'] = $scid;
			$view['detailx'] = $this -> sales_order_model -> __get_sales_order_detail($id);
			$view['detail'] =$this -> sales_order_detail_model -> __get_sales_order_detail_cust($id);						
			$view['pbid'] = $this -> branch_lib -> __get_branch();
			$view['psid'] = $this -> sales_lib -> __get_sales();
			$view['pppid'] = $this -> products_lib -> __get_products();	
	
			$this->load->view('sales_order_report',$view);
	}	

	function delivery_order_report($id,$scid) {
			$view['id'] = $id;
			$view['scid'] = $scid;
			$view['detailx'] = $this -> sales_order_model -> __get_sales_order_detail($id);
			$view['detail'] =$this -> sales_order_detail_model -> __get_sales_order_detail_cust($id);						
			$view['pbid'] = $this -> branch_lib -> __get_branch();
			$view['psid'] = $this -> sales_lib -> __get_sales();
			$view['pppid'] = $this -> products_lib -> __get_products();	
	
			$this->load->view('delivery_order_report',$view);
	}	
	
	function sales_order_detail_add($id,$scid) {
		if ($_POST) {
		

		    $ssid = $this -> input -> post('id', TRUE);
			$spid = $this -> input -> post('spid', TRUE);
			$sqty = $this -> input -> post('sqty', TRUE);
			$sprice = $this -> input -> post('price', TRUE);
			$sdisc = $this -> input -> post('pdisc', TRUE);

		

					$arr = array( 'sid' =>'' ,'ssid' => $ssid,'spid' => $spid,'sqty' => $sqty ,'sprice' => $sprice,'sdisc' => $sdisc);					
					if ($this -> sales_order_detail_model -> __insert_sales_order_detail($arr,$spid)) {
						__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
						redirect(site_url('sales_order_detail/home/sales_order_detail_add/'. $id .'/'. $scid .''));
					}
					else {
						__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
						redirect(site_url('sales_order_detail/home'));
					}

		}
		else {
		
			$view['id'] = $id;
			$view['scid'] = $scid;
			$view['detailx'] = $this -> sales_order_model -> __get_sales_order_detail($id);
			$view['detail'] =$this -> sales_order_detail_model -> __get_sales_order_detail_cust($id);						
			$view['pbid'] = $this -> branch_lib -> __get_branch();
			$view['psid'] = $this -> sales_lib -> __get_sales();
			$view['pppid'] = $this -> products_lib -> __get_products();	
			
			$this->load->view('sales_order_detail_add',$view);
		}
	}




	function delivery_order($id,$scid) {
		if ($_POST) {
		

		    $sid = $this -> input -> post('id', TRUE);
			$scid = $this -> input -> post('scid', TRUE);
			$snodo = $this -> input -> post('snodo', TRUE);
			$snopol = $this -> input -> post('snopol', TRUE);
			$stgldos = $this -> input -> post('stgldo', TRUE);
			
			$stgldox = explode("/",$stgldos);			
			$stgldo="$stgldox[2]-$stgldox[1]-$stgldox[0]";				
			
			
			$snomor = $this -> input -> post('snomor', TRUE);

		

					$arr = array('sid' => $sid, 'scid' => $scid, 'scid' => $snodo, 
					'snodo' => $scid, 'snopol' => $snopol, 'stgldo' => $stgldo, 'snomor' => $snomor	);						
					if ($this -> sales_order_detail_model ->__update_delivery_order($sid, $arr)) {	
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('sales_order_detail/home/delivery_order_details/'. $sid . '/' . $scid));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('sales_order_detail/home/sales_order_details/'. $sid . '/' . $scid));
					}

		}
		else {
		
			$view['id'] = $id;
			$view['scid'] = $scid;
			$view['detailx'] = $this -> sales_order_model -> __get_sales_order_detail($id);
			$view['detail'] =$this -> sales_order_detail_model -> __get_sales_order_detail_cust($id);						
			$view['pbid'] = $this -> branch_lib -> __get_branch();
			$view['psid'] = $this -> sales_lib -> __get_sales();
			$view['pppid'] = $this -> products_lib -> __get_products();	
			
			$this->load->view('delivery_order',$view);
		}
	}





	
	function sales_order_detail_update($id) {
	//print_r($id);die;
		if ($_POST) {
		//print_r($_POST);die;	
			

			$ssid = $this -> input -> post('ssid', TRUE);
			$spid = $this -> input -> post('spid', TRUE);
			
			$id = (int) $this -> input -> post('id');
			
			if ($id) {
				// if (!$name || !$npwp || !$addr || !$phone1 || !$phone2 || !$city || !$prov) {
					// __set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					// redirect(site_url('sales_order_detail' . '/' . __FUNCTION__ . '/' . $id));
				// }
				// else {
			// else {
					$arr = array('ssid' => $ssid, 'spid' => $spid );						
					if ($this -> sales_order_detail_model -> __update_sales_order_detail($id, $arr)) {	
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('sales_order_detail/home'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('sales_order_detail/home'));
					}
				//}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('sales_order_detail/home'));
			}
		}
		else {
			$view['id'] = $id;
			
			$view['detail'] = $this -> sales_order_detail_model -> __get_sales_order_detail($id);
			$view['sbid'] = $this -> branch_lib -> __get_branch($view['detail'][0] -> sbid);
			$view['ssid'] = $this -> sales_lib -> __get_sales($view['detail'][0] -> ssid);
			$view['ppid'] = $this -> products_lib -> __get_products($view['detail'][0] -> ppid);
			$this->load->view(__FUNCTION__, $view);
		}
	}
	
	function sales_order_detail_delete($id) {
		if ($this -> sales_order_detail_model -> __delete_sales_order_detail($id)) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('sales_order_detail/home'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('sales_order_detail'));
		}
	}
}
