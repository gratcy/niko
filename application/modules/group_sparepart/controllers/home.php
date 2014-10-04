<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> model('group_sparepart_model');
	}

	function index() {
		$pager = $this -> pagination_lib -> pagination($this -> group_sparepart_model -> __get_group_sparepart(),3,10,site_url('group_sparepart'));
		$view['group_sparepart'] = $this -> pagination_lib -> paginate();
		$view['pages'] = $this -> pagination_lib -> pages();
		$this->load->view('group_sparepart', $view);
	}
	
	function group_sparepart_add() {
		if ($_POST) {
			$name = $this -> input -> post('name', TRUE);
			$desc = $this -> input -> post('desc', TRUE);
			$status = (int) $this -> input -> post('status');
			
			if (!$name || !$desc) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('group_sparepart' . '/' . __FUNCTION__));
			}
			else {
				$arr = array('cname' => $name, 'cdesc' => $desc, 'ctype' => 5, 'cstatus' => $status);
				if ($this -> group_sparepart_model -> __insert_group_sparepart($arr)) {
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('group_sparepart'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('group_sparepart'));
				}
			}
		}
		else {
			$this->load->view(__FUNCTION__, '');
		}
	}
	
	function group_sparepart_update($id) {
		if ($_POST) {
			$name = $this -> input -> post('name', TRUE);
			$desc = $this -> input -> post('desc', TRUE);
			$status = (int) $this -> input -> post('status');
			$id = (int) $this -> input -> post('id');
			
			if ($id) {
				if (!$name || !$desc) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('group_sparepart' . '/' . __FUNCTION__ . '/' . $id));
				}
				else {
					$arr = array('cname' => $name, 'cdesc' => $desc, 'ctype' => 5, 'cstatus' => $status);
					if ($this -> group_sparepart_model -> __update_group_sparepart($id, $arr)) {	
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('group_sparepart'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('group_sparepart'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('group_sparepart'));
			}
		}
		else {
			$view['id'] = $id;
			$view['detail'] = $this -> group_sparepart_model -> __get_group_sparepart_detail($id);
			$this->load->view(__FUNCTION__, $view);
		}
	}
	
	function group_sparepart_delete($id) {
		if ($this -> group_sparepart_model -> __delete_group_sparepart($id)) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('group_sparepart'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('group_sparepart'));
		}
	}
}
