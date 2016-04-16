<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> library('branch/branch_lib');
		$this -> load -> library('sales/sales_lib');
		$this -> load -> library('delivery_order/delivery_order_lib');
		$this -> load -> model('sales_order_model');
		//$this -> load -> model('sales_order_detail_model');
		$this -> load -> library('customers/customers_lib');
	}

	function index() {
		if(!isset($_GET['search'])){ $_GET['search']="";}
		$keyword = $this -> input -> post('keyword');
		if ($keyword) {
			$view['keyword'] = $keyword;
			$view['pages'] = '';
			$view['sales_order'] = '';
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
		

			$pager = $this -> pagination_lib -> pagination($this -> delivery_order_model -> __get_do_list($id),3,10,site_url('delivery_order/home/delivery_order_details'));
			$view['sales_order'] = $this -> pagination_lib -> paginate();
			$view['pages'] = $this -> pagination_lib -> pages();
			$view['id'] = $id;
			$view['ssisa']=$this -> delivery_order_model -> __get_sisa_so($id);
			$view['sbid'] = $sbid;			
			$view['headerx'] = $this->delivery_order_model -> __get_do_select($id);
		$this->load->view('delivery_order_sub', $view);
	}

	function invoice_order() {	
            $sbid= $this -> memcachedlib -> sesresult['ubid'];
			//die;
			$pager = $this -> pagination_lib -> pagination($this -> delivery_order_model -> __get_inv_list(),3,10,site_url('delivery_order/home/invoice_order/'));
			$view['sales_order'] = $this -> pagination_lib -> paginate();
			//$view['detailx'] = $this -> sales_order_detail_model -> __get_delivery_order_detail($id,$snodo);
			$view['pages'] = $this -> pagination_lib -> pages();
			//$view['id'] = $id;
			//$view['ssisa']=$this -> delivery_order_model -> __get_sisa_so($id);
			$view['sbid'] = $sbid;			
			//$view['headerx'] = $this->delivery_order_model -> __get_do_select($id);
			$this->load->view('invoice_order', $view);
	}

	function invoice_order_report() {	
            $sbid= $this -> memcachedlib -> sesresult['ubid'];
			//$sbid=2;
			 if(!isset($_POST['xexcel'])){$_POST['xexcel']="";}
			//print_r($_POST);
			$xexcel=$_POST['xexcel'];
			//echo $xexcel;//die;
			if($xexcel=="Excel"){ $stx=False;}else{$stx=True;}
			//echo $stx;//die;
			$pager = $this -> pagination_lib -> pagination($this -> delivery_order_model -> __get_inv_list_detail(),3,10,site_url('delivery_order/home/invoice_order_report/'));
			//$view['sales_order'] = $this -> pagination_lib -> paginate();
			$view['sales_order'] =$this -> delivery_order_model -> __get_inv_list_detailk();

			$view['pages'] = $this -> pagination_lib -> pages();
			//$view['id'] = $id;
			//$view['ssisa']=$this -> delivery_order_model -> __get_sisa_so($id);
			$view['sbid'] = $sbid;	
			//$view['sales'] = $this -> sales_lib -> __get_sales('',$this -> memcachedlib -> sesresult['ubid']);
			$view['sales'] = $this -> sales_lib -> __get_sales('',2);
			//$view['headerx'] = $this->delivery_order_model -> __get_do_select($id);
			$this->load->view('invoice_order_report', $view,$stx);
	}	
	
}
