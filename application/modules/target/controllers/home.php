<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> library('branch/branch_lib');
		$this -> load -> library('sales/sales_lib');
		$this -> load -> model('target_model');
	}

	function index() {
		$pager = $this -> pagination_lib -> pagination($this -> target_model -> __get_target((__get_roles('ExecuteAllBranchTargetOmset') == 1 ? 0 : $this -> memcachedlib -> sesresult['ubid'])),3,10,site_url('target'));
		$view['target'] = $this -> pagination_lib -> paginate();
		$view['pages'] = $this -> pagination_lib -> pages();
		$this->load->view('target', $view);
	}
	
	function target_add() {
		if ($_POST) {
			$branch = (int) $this -> input -> post('branch');
			$sales = (int) $this -> input -> post('sales');
			$target = str_replace(',','',$this -> input -> post('target'));
			$my = $this -> input -> post('my', TRUE);
			$status = (int) $this -> input -> post('status');
			
			if (!$branch || !$sales || !$target || !$my) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('target' . '/' . __FUNCTION__));
			}
			else {
				$arr = array('tbid' => $branch, 'tsid' => $sales, 'tmy' => $my, 'ttarget' => $target, 'tstatus' => $status);
				if ($this -> target_model -> __insert_target($arr)) {
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('target'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('target'));
				}
			}
		}
		else {
			$view['branch'] = $this -> branch_lib -> __get_branch();
			$view['sales'] = $this -> sales_lib -> __get_sales('',$this -> memcachedlib -> sesresult['ubid']);
			$this->load->view(__FUNCTION__, $view);
		}
	}
	
	function target_update($id) {
		if ($_POST) {
			$branch = (int) $this -> input -> post('branch');
			$sales = (int) $this -> input -> post('sales');
			$target = str_replace(',','',$this -> input -> post('target'));
			$my = $this -> input -> post('my', TRUE);
			$status = (int) $this -> input -> post('status');
			$id = (int) $this -> input -> post('id');
			
			if ($id) {
				if (!$branch || !$sales || !$target || !$my) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('target' . '/' . __FUNCTION__ . '/' . $id));
				}
				else {
					$arr = array('tbid' => $branch, 'tsid' => $sales, 'tmy' => $my, 'ttarget' => $target, 'tstatus' => $status);
					if ($this -> target_model -> __update_target($id, $arr)) {	
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('target'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('target'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('target'));
			}
		}
		else {
			$view['id'] = $id;
			$view['detail'] = $this -> target_model -> __get_target_detail($id,(__get_roles('ExecuteAllBranchTargetOmset') == 1 ? 0 : $this -> memcachedlib -> sesresult['ubid']));
			$view['branch'] = $this -> branch_lib -> __get_branch($view['detail'][0] -> tbid);
			$view['sales'] = $this -> sales_lib -> __get_sales($view['detail'][0] -> tsid,$this -> memcachedlib -> sesresult['ubid']);
			$this->load->view(__FUNCTION__, $view);
		}
	}
	
	function target_delete($id) {
		if ($this -> target_model -> __delete_target($id,(__get_roles('ExecuteAllBranchTargetOmset') == 1 ? 0 : $this -> memcachedlib -> sesresult['ubid']))) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('target'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('target'));
		}
	}
}
