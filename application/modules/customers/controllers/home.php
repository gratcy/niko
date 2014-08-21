<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> library('sales/sales_lib');
		$this -> load -> library('branch/branch_lib');
		$this -> load -> model('customers_model');
	}

	function index() {
		$pager = $this -> pagination_lib -> pagination($this -> customers_model -> __get_customers(),3,10,site_url('customers'));
		$view['customers'] = $this -> pagination_lib -> paginate();
		$view['pages'] = $this -> pagination_lib -> pages();
		$this->load->view('customers', $view);
	}
	
	function customers_add() {
		if ($_POST) {
			$name = $this -> input -> post('name', TRUE);
			$contactname = $this -> input -> post('contactname', TRUE);
			$email = $this -> input -> post('email', TRUE);
			$addr = $this -> input -> post('addr', TRUE);
			$addr2 = $this -> input -> post('addr2', TRUE);
			$cash = $this -> input -> post('cash', TRUE);
			$credit = $this -> input -> post('credit', TRUE);
			$limit = $this -> input -> post('limit', TRUE);
			$npwp = $this -> input -> post('npwp', TRUE);
			$phone1 = $this -> input -> post('phone1', TRUE);
			$phone2 = $this -> input -> post('phone2', TRUE);
			$fax = $this -> input -> post('fax', TRUE);
			$branch = (int) $this -> input -> post('branch');
			$city = (int) $this -> input -> post('city');
			$prov = (int) $this -> input -> post('prov');
			$pkp = $this -> input -> post('pkp');
			$special = (int) $this -> input -> post('special');
			$sales = (int) $this -> input -> post('sales');
			$cat = (int) $this -> input -> post('cat');
			$delivery = (int) $this -> input -> post('delivery');
			$status = (int) $this -> input -> post('status');
			
			if (!$branch || !$name || !$sales) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('customers' . '/' . __FUNCTION__));
			}
			else if (!$phone1 || !$phone2) {
				__set_error_msg(array('error' => 'Telp I dan Telp II harus di isi !!!'));
				redirect(site_url('customers' . '/' . __FUNCTION__));
			}
			else if (!$addr || !$city || !$prov) {
				__set_error_msg(array('error' => 'Alamat, Kota dan Provinsi harus di isi !!!'));
				redirect(site_url('customers' . '/' . __FUNCTION__));
			}
			else {
				$arr = array('cbid' => $branch, 'ccat' => $cat, 'cname' => $name, 'caddr' => $addr . '*' . $addr2, 'ccity' => $city, 'cprov' => $prov, 'cdeliver' => $delivery, 'cphone' => $phone1 . '*' . $phone2 . '*' . $fax, 'ccontactname' => $contactname, 'cemail' => $email, 'csid' => $sales, 'ccash' => $cash, 'ccredit' => $credit, 'climit' => $limit, 'cnpwp' => $npwp, 'cpkp' => $pkp, 'cspecial' => $special, 'cstatus' => $status);
				if ($this -> customers_model -> __insert_customers($arr)) {
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('customers'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('customers'));
				}
			}
		}
		else {
			$view['branch'] = $this -> branch_lib -> __get_branch();
			$view['sales'] = $this -> sales_lib -> __get_sales();
			$this->load->view(__FUNCTION__, $view);
		}
	}
	
	function customers_update($id) {
		if ($_POST) {
			$name = $this -> input -> post('name', TRUE);
			$contactname = $this -> input -> post('contactname', TRUE);
			$email = $this -> input -> post('email', TRUE);
			$addr = $this -> input -> post('addr', TRUE);
			$addr2 = $this -> input -> post('addr2', TRUE);
			$cash = $this -> input -> post('cash', TRUE);
			$credit = $this -> input -> post('credit', TRUE);
			$limit = $this -> input -> post('limit', TRUE);
			$npwp = $this -> input -> post('npwp', TRUE);
			$phone1 = $this -> input -> post('phone1', TRUE);
			$phone2 = $this -> input -> post('phone2', TRUE);
			$fax = $this -> input -> post('fax', TRUE);
			$branch = (int) $this -> input -> post('branch');
			$city = (int) $this -> input -> post('city');
			$prov = (int) $this -> input -> post('prov');
			$pkp = $this -> input -> post('pkp');
			$special = (int) $this -> input -> post('special');
			$sales = (int) $this -> input -> post('sales');
			$status = (int) $this -> input -> post('status');
			$cat = (int) $this -> input -> post('cat');
			$delivery = (int) $this -> input -> post('delivery');
			$id = (int) $this -> input -> post('id');
			
			if ($id) {
				if (!$branch || !$name || !$sales) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('customers' . '/' . __FUNCTION__ . '/' . $id));
				}
				else if (!$phone1 || !$phone2) {
					__set_error_msg(array('error' => 'Telp I dan Telp II harus di isi !!!'));
					redirect(site_url('customers' . '/' . __FUNCTION__ . '/' . $id));
				}
				else if (!$addr || !$city || !$prov) {
					__set_error_msg(array('error' => 'Alamat, Kota dan Provinsi harus di isi !!!'));
					redirect(site_url('customers' . '/' . __FUNCTION__ . '/' . $id));
				}
				else {
					$arr = array('cbid' => $branch, 'ccat' => $cat, 'cname' => $name, 'caddr' => $addr . '*' . $addr2, 'ccity' => $city, 'cprov' => $prov, 'cdeliver' => $delivery, 'cphone' => $phone1 . '*' . $phone2 . '*' . $fax, 'ccontactname' => $contactname, 'cemail' => $email, 'csid' => $sales, 'ccash' => $cash, 'ccredit' => $credit, 'climit' => $limit, 'cnpwp' => $npwp, 'cpkp' => $pkp, 'cspecial' => $special, 'cstatus' => $status);
					if ($this -> customers_model -> __update_customers($id, $arr)) {	
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('customers'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('customers'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('customers'));
			}
		}
		else {
			$view['id'] = $id;
			$view['detail'] = $this -> customers_model -> __get_customers_detail($id);
			$view['branch'] = $this -> branch_lib -> __get_branch($view['detail'][0] -> cbid);
			$view['sales'] = $this -> sales_lib -> __get_sales($view['detail'][0] -> csid);
			$this->load->view(__FUNCTION__, $view);
		}
	}
	
	function customers_delete($id) {
		if ($this -> customers_model -> __delete_customers($id)) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('customers'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('customers'));
		}
	}
}
