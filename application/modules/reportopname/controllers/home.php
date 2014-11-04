<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> model('reportopname_model');
	}

	function index($type=1) {
		if (!$type) $type = 1;
		$pager = $this -> pagination_lib -> pagination($this -> reportopname_model -> __get_reportopname($type),3,10,site_url('reportopname/' . $type));
		$view['reportopname'] = $this -> pagination_lib -> paginate();
		$view['pages'] = $this -> pagination_lib -> pages();
		$view['type'] = $type;
		$view['from'] = date('d/m/Y', strtotime('-1 month', time()));
		$view['to'] = date('d/m/Y');
		$this->load->view('reportopname', $view);
	}
	
	function sortreport($type,$from,$to) {
		$dfrom = $this -> input -> post('dfrom', TRUE);
		$dto = $this -> input -> post('dto', TRUE);
		if ($dfrom && $dto) {
			$from = strtotime(str_replace('/','-',$dfrom));
			$to = strtotime(str_replace('/','-',$dto));
			redirect(site_url('reportopname/sortreport/'.$type.'/'.$from.'/'.$to));
		}
		else {
			$view['from'] = date('d/m/Y',$from);
			$view['to'] = date('d/m/Y',$to);
			$pager = $this -> pagination_lib -> pagination($this -> reportopname_model -> __get_reportopname($type, $from, $to),3,10,site_url('reportopname/' . $type));
			$view['reportopname'] = $this -> pagination_lib -> paginate();
			$view['pages'] = $this -> pagination_lib -> pages();
			$view['type'] = $type;
			$this->load->view('reportopname', $view);
		}
	}
}
