<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> library('branch/branch_lib');
		$this -> load -> model('technical_model');
	}

	function index() {
		$keyword = $this -> input -> post('keyword');
		if ($keyword) {
			$view['technical'] = $this -> technical_model -> __get_search($keyword,(__get_roles('ExecuteAllBranchTechnical') == 1 ? 0 : $this -> memcachedlib -> sesresult['ubid']));
			$view['pages'] = '';
			$view['keyword'] = $keyword;
		}
		else {
			$pager = $this -> pagination_lib -> pagination($this -> technical_model -> __get_technical((__get_roles('ExecuteAllBranchTechnical') == 1 ? 0 : $this -> memcachedlib -> sesresult['ubid'])),3,10,site_url('technical'));
			$view['technical'] = $this -> pagination_lib -> paginate();
			$view['pages'] = $this -> pagination_lib -> pages();
			$view['keyword'] = '';
		}
		$this->load->view('technical', $view);
	}
	
	function technical_add() {
		if ($_POST) {
			$branch = (int) $this -> input -> post('branch');
			$code = $this -> input -> post('code', TRUE);
			$name = $this -> input -> post('name', TRUE);
			$phone1 = $this -> input -> post('phone1', TRUE);
			$phone2 = $this -> input -> post('phone2', TRUE);
			$email = $this -> input -> post('email', TRUE);
			$joindate = strtotime($this -> input -> post('joindate', TRUE));
			$status = (int) $this -> input -> post('status');
			
			if (!$name || !$branch || !$phone1 || !$phone2 || !$email || !$code) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('technical' . '/' . __FUNCTION__));
			}
			else {
				$arr = array('tbid' => $branch, 'tcode' => $code, 'tname' => $name, 'tphone' => $phone1 . '*' . $phone2, 'temail' => $email, 'tjoindate' => $joindate, 'tstatus' => $status);
				if ($this -> technical_model -> __insert_technical($arr)) {
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('technical'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('technical'));
				}
			}
		}
		else {
			$view['branch'] = $this -> branch_lib -> __get_branch();
			$this->load->view(__FUNCTION__, $view);
		}
	}
	
	function technical_update($id) {
		if ($_POST) {
			$branch = (int) $this -> input -> post('branch');
			$code = $this -> input -> post('code', TRUE);
			$name = $this -> input -> post('name', TRUE);
			$phone1 = $this -> input -> post('phone1', TRUE);
			$phone2 = $this -> input -> post('phone2', TRUE);
			$email = $this -> input -> post('email', TRUE);
			$joindate = strtotime($this -> input -> post('joindate', TRUE));
			$status = (int) $this -> input -> post('status');
			$id = (int) $this -> input -> post('id');
			
			if ($id) {
				if (!$name || !$branch || !$phone1 || !$phone2 || !$email || !$code) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('technical' . '/' . __FUNCTION__ . '/' . $id));
				}
				else {
					$arr = array('tbid' => $branch, 'tcode' => $code, 'tname' => $name, 'tphone' => $phone1 . '*' . $phone2, 'temail' => $email, 'tjoindate' => $joindate, 'tstatus' => $status);
					if ($this -> technical_model -> __update_technical($id, $arr)) {	
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('technical'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('technical'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('technical'));
			}
		}
		else {
			$view['id'] = $id;
			$view['detail'] = $this -> technical_model -> __get_technical_detail($id,(__get_roles('ExecuteAllBranchTechnical') == 1 ? 0 : $this -> memcachedlib -> sesresult['ubid']));
			$view['branch'] = $this -> branch_lib -> __get_branch($view['detail'][0] -> tbid);
			$this->load->view(__FUNCTION__, $view);
		}
	}
	
	function technical_delete($id) {
		if ($this -> technical_model -> __delete_technical($id,(__get_roles('ExecuteAllBranchTechnical') == 1 ? 0 : $this -> memcachedlib -> sesresult['ubid']))) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('technical'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('technical'));
		}
	}
	
	function get_suggestion() {
		$hint = '';
		$a = array();
		$q = $_SERVER['QUERY_STRING'];
		$arr = $this -> technical_model -> __get_suggestion();
		
		foreach($arr as $k => $v) $a[] = array('name' => $v -> name);
		
		if (strlen($q) > 0) {
			for($i=0; $i<count($a); $i++) {
				if (strtolower($q) == strtolower(substr($a[$i]['name'],0,strlen($q)))) {
					if ($hint == '')
						$hint .='<div class="autocomplete-suggestion" data-index="'.$i.'">'.$a[$i]['name'].'</div>';
					else
						$hint .= '<div class="autocomplete-suggestion" data-index="'.$i.'">'.$a[$i]['name'].'</div>';
				}
			}
		}
		
		echo ($hint == '' ? '<div class="autocomplete-suggestion">No Suggestion</div>' : $hint);
	}
}
