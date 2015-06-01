<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> library('branch/branch_lib');
		$this -> load -> library('sales/sales_lib');
		$this -> load -> model('detail_komisi_model');
		$this -> load -> library('customers/customers_lib');
	}

	function index($sno_invoice) {
		$pager = $this -> pagination_lib -> pagination($this -> detail_komisi_model -> __get_detail_komisi($sno_invoice),3,10,site_url('detail_komisi'));
			$view['komisi'] = $this -> detail_komisi_model -> __get_detail_komisi($sno_invoice);
			$view['pages'] = $this -> pagination_lib -> pages();


		
		$this->load->view('detail_komisi', $view);
		}
		}
		
		?>