<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('printpage_model');
		$this -> load -> model('receiving/receiving_model');
		$this -> load -> model('request/request_model');
		$this -> load -> model('transfer/transfer_model');
	}

	function receiving($id) {
		$view['items'][0] = $this -> receiving_model -> __get_items($id, 1, 2);
		$view['items'][1] = $this -> receiving_model -> __get_items($id, 2, 2);
		$view['detail'] = $this -> receiving_model -> __get_receiving_detail($id);
		if ($view['detail'][0] -> rstatus != 3) redirect(site_url('receiving'));
		$this->load->view('print/' . __FUNCTION__, $view, false);
	}
	
	function dist_transfer($id) {
		$view['detail'] = $this -> transfer_model -> __get_transfer_items_detail($id);
		$view['items'][0] = $this -> request_model -> __get_items($view['detail'][0] -> ddrid, 1, 2);
		$view['items'][1] = $this -> request_model -> __get_items($view['detail'][0] -> ddrid, 2, 2);
		$view['id'] = $id;
		if ($view['detail'][0] -> dstatus != 3) redirect(site_url('transfer'));
		$this->load->view('print/'.__FUNCTION__, $view, false);
	}
	
	function dist_request($id) {
		$view['items'][0] = $this -> request_model -> __get_items($id, 1, 2);
		$view['items'][1] = $this -> request_model -> __get_items($id, 2, 2);
		$view['detail'] = $this -> request_model -> __get_request_items_detail($id);
		$view['id'] = $id;
		if ($view['detail'][0] -> dstatus != 3) redirect(site_url('request'));
		$this->load->view('print/' . __FUNCTION__, $view, false);
	}
}
