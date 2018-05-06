<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> library('peticash_categories/peticash_categories_lib');
		$this -> load -> model('peticash_model');
	}

	function index() {
		$view['from'] = date('d/m/Y', strtotime('-1 month', time()));
		$view['to'] = date('d/m/Y');
		$view['peticash'] = $this -> peticash_model -> __get_peticash(strtotime('-1 month', time()), time());
		$view['saldo'] = $this -> peticash_model -> __get_current_saldo();
		$this->load->view('peticash', $view);
	}
	
	function sortpeticash($from,$to) {
		$dfrom = $this -> input -> post('dfrom', TRUE);
		$dto = $this -> input -> post('dto', TRUE);
		if ($dfrom && $dto) {
			$from = strtotime(str_replace('/','-',$dfrom));
			$to = strtotime(str_replace('/','-',$dto));
			redirect(site_url('peticash/sortpeticash/'.$from.'/'.$to));
		}
		else {
			$view['peticash'] = $this -> peticash_model -> __get_peticash($from, $to);
			$view['from'] = date('d/m/Y',$from);
			$view['to'] = date('d/m/Y',$to);
			$this->load->view('peticash', $view);
		}
	}
	
	function peticash_add() {
		if ($_POST) {
			$desc = $this -> input -> post('desc', TRUE);
			$ptype = (int) $this -> input -> post('ptype');
			$nominal = (float) str_replace(',', '', $this -> input -> post('nominal'));
			$category = (int) $this -> input -> post('category');
			$waktu = str_replace('/','-',$this -> input -> post('waktu', TRUE));
			
			if (!$ptype || !$desc || !$category || !$waktu) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('peticash' . '/' . __FUNCTION__));
			}
			else {
				$csaldo = $this -> peticash_model -> __get_current_saldo();
				if ($ptype == 1) $saldo = $nominal + $csaldo[0] -> psaldo;
				else $saldo = $csaldo[0] -> psaldo - $nominal;
				
				$arr = array('pcid' => $category, 'ptype' => $ptype, 'pnominal' => $nominal, 'psaldo' => $saldo, 'pbid' => $this -> memcachedlib -> sesresult['ubid'], 'pdate' => strtotime($waktu), 'pdesc' => $desc, 'pstatus' => 1);
				if ($this -> peticash_model -> __insert_peticash($arr)) {
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('peticash'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('peticash'));
				}
			}
		}
		else {
			$view['category'] = $this -> peticash_categories_lib -> __get_peticash_categories();
			$this->load->view(__FUNCTION__, $view);
		}
	}
}
