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
		$pager = $this -> pagination_lib -> pagination($this -> komisi_model -> __get_komisi(),3,10,site_url('komisi'));
			$view['komisi'] = $this -> komisi_model -> __get_komisi();
			$view['pages'] = $this -> pagination_lib -> pages();

		//}
		// if(!isset($_POST['approve'])){$_POST['approve']="";}
		// if($_POST['approve']=='1'){
			// $id=$this -> input -> post('id', TRUE);
			// $arr=array('sstatus' => '3');
			// $this -> pembayaran_model -> __update_pembayaran($id, $arr);
			
			   // $scid=$_POST['scid'];
				// $limit=$_POST['sisaplafon_after'];
				// $arrl = array('climit' => $limit);
					// $this -> customers_model -> __update_customers($scid, $arrl);			
		
		// }
		//print_r($view);
		
		$this->load->view('komisi', $view);
		}
		}
		
		?>