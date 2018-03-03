<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('products/products_model');
		$this -> load -> model('branch/branch_model');
		$this -> load -> model('services_wo/services_wo_model');
		$this -> load -> model('sparepart/sparepart_model');
		$this -> load -> model('customers/customers_model');
	}

	function index() {
		$view['products'] = $this -> products_model -> __get_recent_products();
		$view['customers'] = $this -> customers_model -> __get_recent_customers($this -> memcachedlib -> sesresult['ubid']);
		$view['sparepart'] = $this -> sparepart_model -> __get_recent_sparepart();
		$view['services'] = $this -> services_wo_model -> __get_recent_services_wo($this -> memcachedlib -> sesresult['ubid']);
		$view['total_product'] = $this -> products_model -> __get_total_product();
		$view['total_branch'] = $this -> branch_model -> __get_total_branch();
		$this->load->view('index', $view);
	}

	function switchbranch($id) {
		if ($this -> memcachedlib -> sesresult['uid'] == 6 || $this -> memcachedlib -> sesresult['uid'] == 13 || $this -> memcachedlib -> sesresult['uid'] == 23 || $this -> memcachedlib -> sesresult['uid'] == 1) {
			$login = $this -> memcachedlib -> get('__login');
			$login['ubid'] = $id;
			$login['ubranch'] = __get_branch($id, 1);
			$this -> memcachedlib -> __regenerate_cache('__login', $login, false);
			redirect($_SERVER['HTTP_REFERER']);
		}
		else
			redirect(site_url());
	}
}
