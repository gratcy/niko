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
		$this -> load -> library('delivery_order/delivery_order_lib');
		$this -> load -> model('sales_order_model');
		$this -> load -> model('retur_order/retur_order_model');
		$this -> load -> model('retur_order_detail/retur_order_detail_model');
		//$this -> load -> model('sales_order_detail_model');
		$this -> load -> library('customers/customers_lib');
	}

	function index() {
		if(!isset($_GET['search'])){ $_GET['search']="";}
		$keyword = $this -> input -> post('keyword');
		$view['keyword'] = $keyword;
		if ($keyword) {
			
			
			
			//$view['pages'] = '';
			$view['sales_order'] = $this -> delivery_order_model -> __get_search($keyword);
		}
		else {
			$pager = $this -> pagination_lib -> pagination($this -> delivery_order_model -> __get_sales_order(),3,10,site_url('delivery_order/home/index/'));
			if($_GET['search']=='1'){
			$view['sales_order'] = $this -> delivery_order_model -> __get_sales_orderz();	
			}else{			
			$view['sales_order'] = $this -> pagination_lib -> paginate();
			}
			$view['pages'] = $this -> pagination_lib -> pages();
			$view['keyword'] = '';
		}
		$this->load->view('delivery_orders', $view);
	}
	
	function delivery_order_sub($id,$sbid) {
		

			$pager = $this -> pagination_lib -> pagination($this -> delivery_order_model -> __get_do_list($id),3,10,site_url('delivery_order/home/delivery_order_sub/'.$id.'/'.$sbid.'/'));
			$view['sales_order'] = $this -> pagination_lib -> paginate();
			$view['pages'] = $this -> pagination_lib -> pages();
			$view['id'] = $id;
			$view['ssisa']=$this -> delivery_order_model -> __get_sisa_so($id);
			$view['sbid'] = $sbid;			
			$view['headerx'] = $this->delivery_order_model -> __get_do_select($id);
		$this->load->view('delivery_order_sub', $view);
	}

	
	function delivery_order_sub_tg($id,$sbid) {
		
			$noro=$this -> delivery_order_model -> __get_noro($id);
			//print_r($noro);
			$norox= $noro[0]->snoro;//die;
			$view['snamex']= $noro[0]->sname;
			$pager = $this -> pagination_lib -> pagination($this -> delivery_order_model -> __get_do_list_tgx($id,$norox),3,10,site_url('delivery_order/home/delivery_order_sub_tg/'.$id.'/'.$sbid.'/'));
			$view['sales_order'] = $this -> pagination_lib -> paginate();
			$view['pages'] = $this -> pagination_lib -> pages();
			$view['id'] = $id;
			$view['ssisa']=$this -> delivery_order_model -> __get_sisa_ro($id);
			$view['sbid'] = $sbid;			
			$view['headerx'] = $this->delivery_order_model -> __get_do_select($id);
		$this->load->view('delivery_order_sub_tg', $view);
	}	
	


function retur_order_details_done_tg($id,$scid) {	
			
		if ($_POST) {
		    $sid = $this -> input -> post('id', TRUE);
			$scid = $this -> input -> post('scid', TRUE);
			$snodo = $this -> input -> post('snodo', TRUE);
			$snopol = $this -> input -> post('snopol', TRUE);
			$stgldos = $this -> input -> post('stgldo', TRUE);
			$drivera = $this -> input -> post('driver', TRUE);
			$driverb = $this -> input -> post('adriver', TRUE);
			$driver=$drivera.'-'.$driverb;
			$stgldox = explode("/",$stgldos);			
			$stgldo="$stgldox[2]-$stgldox[1]-$stgldox[0]";
			$snomor = $this -> input -> post('snomor', TRUE);
			
			$arr = array('sid' => 0, 'ssid' => $id, 'spid' => 0, 'sqty' => 0, 'scid'=>$scid,'snodo' => $snodo, 'snopol' => $snopol, 'stgldo' => $stgldo, 'snomor' => $snomor,'driver'=>$driver,'dstatus'=>1	);						
			if ($this -> sales_order_detail_model -> __insert_delivery_order_detail($arr)) {
				__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
				redirect(site_url('sales_order_detail/home/delivery_order_details_add/'. $id .'/'. $scid .'/'.$snodo));
			}
			else {
				__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
				redirect(site_url('delivery_order/home/delivery_order_add/'. $id .'/'. $scid .''));
			}
		}
		else {
			$view['id'] = $id;
			$view['scid'] = $scid;
			// $view['detailx'] = $this -> sales_order_model -> __get_sales_order_detail($id);
			// $view['detail'] =$this -> sales_order_detail_model -> __get_sales_order_detail_prod($id);


			$view['detailx'] = $this -> retur_order_model -> __get_retur_order_detail_approve($id);			
			$view['detail'] =$this -> retur_order_detail_model -> __get_retur_order_detail_tg($id);	
            $view['jumtg'] =$this -> retur_order_detail_model ->__get_jum_accept_ro_tg($id);

			
			$view['pbid'] = $this -> branch_lib -> __get_branch();
			$view['psid'] = $this -> sales_lib -> __get_sales();
			$view['pppid'] = $this -> products_lib -> __get_products();				
			$this->load->view('retur_order_details_done_tg',$view);
			
		}
	}	


	function delivery_order_add_tg($id,$scid) {
		if ($_POST) {
		    $sid = $this -> input -> post('id', TRUE);
			$scid = $this -> input -> post('scid', TRUE);
			$snodo = $this -> input -> post('snodo', TRUE);
			$snopol = $this -> input -> post('snopol', TRUE);
			$stgldos = $this -> input -> post('stgldo', TRUE);
			$drivera = $this -> input -> post('driver', TRUE);
			$driverb = $this -> input -> post('adriver', TRUE);
			$driver=$drivera.'-'.$driverb;
			$stgldox = explode("/",$stgldos);			
			$stgldo="$stgldox[2]-$stgldox[1]-$stgldox[0]";
			$snomor = $this -> input -> post('snomor', TRUE);
			
			$arr = array('sid' => 0, 'ssid' => $id, 'spid' => 0, 'sqty' => 0, 'scid'=>$scid,'snodo' => $snodo, 'snopol' => $snopol, 'stgldo' => $stgldo, 'snomor' => $snomor,'driver'=>$driver,'dstatus'=>1	);						
			if ($this -> sales_order_detail_model -> __insert_delivery_order_detail($arr)) {
				__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
				redirect(site_url('sales_order_detail/home/delivery_order_details_add/'. $id .'/'. $scid .'/'.$snodo));
			}
			else {
				__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
				redirect(site_url('sales_order_detail/home/delivery_order_add/'. $id .'/'. $scid .''));
			}
		}
		else {
			$view['id'] = $id;
			$view['scid'] = $scid;
			$view['detailx'] = $this -> sales_order_model -> __get_sales_order_detail($id);
			$view['detail'] =$this -> sales_order_detail_model -> __get_sales_order_detail_prod($id);						
			$view['pbid'] = $this -> branch_lib -> __get_branch();
			$view['psid'] = $this -> sales_lib -> __get_sales();
			$view['pppid'] = $this -> products_lib -> __get_products();				
			$this->load->view('delivery_order_add_tg',$view);
		}
	}


	
	function invoice_order() {	
	
		if(!isset($_GET['search'])){ $_GET['search']="";}
		$keyword = $this -> input -> post('keyword');
		$view['keyword'] = $keyword;
		if ($keyword) {
			
			//echo $keyword;//die;
			
			//$view['pages'] = '';
			$view['sales_order'] = $this -> delivery_order_model -> __get_inv_list_search($keyword);
		}else{	
	
            $sbid= $this -> memcachedlib -> sesresult['ubid'];
			if(!isset($_GET['search'])){ $_GET['search']="";}
			//die;
			$pager = $this -> pagination_lib -> pagination($this -> delivery_order_model -> __get_inv_list(),3,10,site_url('delivery_order/home/invoice_order/'));
			if($_GET['search']=='1'){
			$view['sales_order'] = $this -> delivery_order_model -> __get_inv_listz();	
			}else{			
			$view['sales_order'] = $this -> pagination_lib -> paginate();
			}			
			//$view['sales_order'] = $this -> pagination_lib -> paginate();

			$view['pages'] = $this -> pagination_lib -> pages();
			//$view['id'] = $id;
			//$view['ssisa']=$this -> delivery_order_model -> __get_sisa_so($id);
			$view['sbid'] = $sbid;			
			//$view['headerx'] = $this->delivery_order_model -> __get_do_select($id);
		}
			$this->load->view('invoice_order', $view);
		
	}

	function invoice_order_report() {	
            $sbid= $this -> memcachedlib -> sesresult['ubid'];
			//$sbid=2;
			 if(!isset($_POST['xexcel'])){$_POST['xexcel']="";}
			$xexcel=$_POST['xexcel'];
			if($xexcel=="Excel"){ $stx=False;}else{$stx=True;}
			// $pager = $this -> pagination_lib -> pagination($this -> delivery_order_model -> __get_inv_list_detail(),3,10,site_url('delivery_order/home/invoice_order_report/'));
			$view['sales_order'] =$this -> delivery_order_model -> __get_inv_list_detailk();
			//$view['pages'] = $this -> pagination_lib -> pages();
			$view['sbid'] = $sbid;	
			$view['sales'] = $this -> sales_lib -> __get_sales('',2);
			$this->load->view('invoice_order_report', $view,$stx);
	}	
	
}
