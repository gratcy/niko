<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> library('branch/branch_lib');
		$this -> load -> library('sales/sales_lib');
		$this -> load -> model('komisi_model');
		$this -> load -> library('customers/customers_lib');
	}

	function index() {
		// $pager = $this -> pagination_lib -> pagination($this -> komisi_model -> __get_komisi(),3,10,site_url('komisi'));
		// $view['komisi'] = $this -> komisi_model -> __get_komisi();
		// $view['pages'] = $this -> pagination_lib -> pages();
		
		
		$pager = $this -> pagination_lib -> pagination($this -> komisi_model -> __get_komisi(),3,10,site_url('komisi'));
		//$view['komisi'] = $this -> pagination_lib -> paginate();
		$view['komisi'] = $this -> komisi_model -> __get_komisi();
		$view['komisi_all'] = $this -> komisi_model -> __get_komisi_all();
		$view['pages'] = $this -> pagination_lib -> pages();		
		
		$this->load->view('komisi', $view);
	}


	
}
		
?>