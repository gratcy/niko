<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> library('sales/sales_lib');
		$this -> load -> library('branch/branch_lib');
		$this -> load -> library('categories/categories_lib');
		$this -> load -> model('customers_model');
	}

	function index() {
		$keyword = $this -> input -> post('keyword');
		if ($keyword) {
			$view['customers'] = $this -> customers_model -> __get_search($keyword, (__get_roles('ExecuteAllBranchCustomers') == 1 ? 0 : $this -> memcachedlib -> sesresult['ubid']));
			$view['keyword'] = $keyword;
			$view['pages'] = '';
		}
		else {
			$pager = $this -> pagination_lib -> pagination($this -> customers_model -> __get_customers((__get_roles('ExecuteAllBranchCustomers') == 1 ? 0 : $this -> memcachedlib -> sesresult['ubid'])),3,10,site_url('customers'));
			$view['customers'] = $this -> pagination_lib -> paginate();
			$view['pages'] = $this -> pagination_lib -> pages();
			$view['keyword'] = '';
		}
		$this->load->view('customers', $view);
	}
	
	function customers_add() {
		if ($_POST) {
			$cid = serialize($this -> input -> post('cid', TRUE));
			$name = $this -> input -> post('name', TRUE);
			$note = $this -> input -> post('note', TRUE);
			$contactname = $this -> input -> post('contactname', TRUE);
			$email = $this -> input -> post('email', TRUE);
			$addr = $this -> input -> post('addr', TRUE);
			$addr2 = $this -> input -> post('addr2', TRUE);
			$credit = str_replace(',','',$this -> input -> post('credit', TRUE));
			$cash = str_replace(',','',$this -> input -> post('cash', TRUE));
			$fkp = (int) $this -> input -> post('fkp', TRUE);
			$sp = (int) $this -> input -> post('sp', TRUE);
			$creditnico = (int) $this -> input -> post('creditnico', TRUE);
			$cashnico = (int) $this -> input -> post('cashnico', TRUE);
			$limit = str_replace(',','',$this -> input -> post('limit', TRUE));
			$ctop = str_replace(',','',$this -> input -> post('ctop', TRUE));
			$npwp = $this -> input -> post('npwp', TRUE);
			$phone1 = $this -> input -> post('phone1', TRUE);
			$phone2 = $this -> input -> post('phone2', TRUE);
			$joindate = strtotime(str_replace('/','-',$this -> input -> post('joindate', TRUE)));
			$fax = $this -> input -> post('fax', TRUE);
			$branch = (int) $this -> input -> post('branch');
			$city = (int) $this -> input -> post('city');
			$prov = (int) $this -> input -> post('prov');
			$pkp = $this -> input -> post('pkp');
			$special = (int) $this -> input -> post('special');
			$sales = (int) $this -> input -> post('sales');
			$cat = (int) $this -> input -> post('cat');
			$delivery = (int) $this -> input -> post('delivery');
			$ctyperetur = (int) $this -> input -> post('ctyperetur');
			$status = (int) $this -> input -> post('status');

			if (!$branch || !$name || !$sales) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('customers' . '/' . __FUNCTION__));
			}
			else if (!$addr || !$city || !$prov) {
				__set_error_msg(array('error' => 'Alamat, Kota dan Provinsi harus di isi !!!'));
				redirect(site_url('customers' . '/' . __FUNCTION__));
			}
			else {
				$arr = array('cbid' => $branch, 'ccat' => $cat, 'cname' => $name, 'caddr' => $addr . '*' . $addr2, 'ccity' => $city, 'cprov' => $prov, 'cdeliver' => $delivery, 'cphone' => $phone1 . '*' . $phone2 . '*' . $fax, 'ccontactname' => $contactname, 'cfkp' => $fkp.'*'.$sp, 'cjoindate' => $joindate, 'cemail' => $email, 'csid' => $sales, 'ccash' => $cash, 'ccredit' => $credit, 'ccashnico' => $cashnico, 'ccreditnico' => $creditnico, 'climit' => $limit, 'ctop' => $ctop, 'cnpwp' => $npwp, 'cpkp' => $pkp, 'cspecial' => $special, 'ctyperetur' => $ctyperetur, 'ccid' => $cid, 'cnote' => $note, 'cstatus' => $status);
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
			$view['sales'] = $this -> sales_lib -> __get_sales('',$this -> memcachedlib -> sesresult['ubid']);
			$view['customer_check'] = $this -> categories_lib -> __get_categories_check('');
			$this->load->view(__FUNCTION__, $view);
		}
	}
	
	function customers_update($id) {
		if ($_POST) {
			$cid = serialize($this -> input -> post('cid', TRUE));
			$name = $this -> input -> post('name', TRUE);
			$note = $this -> input -> post('note', TRUE);
			$contactname = $this -> input -> post('contactname', TRUE);
			$email = $this -> input -> post('email', TRUE);
			$addr = $this -> input -> post('addr', TRUE);
			$addr2 = $this -> input -> post('addr2', TRUE);
			$fkp = (int) $this -> input -> post('fkp', TRUE);
			$sp = (int) $this -> input -> post('sp', TRUE);
			$credit = str_replace(',','',$this -> input -> post('credit', TRUE));
			$cash = str_replace(',','',$this -> input -> post('cash', TRUE));
			$creditnico = (int) $this -> input -> post('creditnico', TRUE);
			$cashnico = (int) $this -> input -> post('cashnico', TRUE);
			$limit = str_replace(',','',$this -> input -> post('limit', TRUE));
			$ctop = str_replace(',','',$this -> input -> post('ctop', TRUE));
			$joindate = strtotime(str_replace('/','-',$this -> input -> post('joindate', TRUE)));
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
			$ctyperetur = (int) $this -> input -> post('ctyperetur');
			$id = (int) $this -> input -> post('id');
			
			if ($id) {
				if (!$branch || !$name || !$sales) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('customers' . '/' . __FUNCTION__ . '/' . $id));
				}
				else if (!$addr || !$city || !$prov) {
					__set_error_msg(array('error' => 'Alamat, Kota dan Provinsi harus di isi !!!'));
					redirect(site_url('customers' . '/' . __FUNCTION__ . '/' . $id));
				}
				else {
					$arr = array('cbid' => $branch, 'ccat' => $cat, 'cname' => $name, 'caddr' => $addr . '*' . $addr2, 'ccity' => $city, 'cprov' => $prov, 'cdeliver' => $delivery, 'cphone' => $phone1 . '*' . $phone2 . '*' . $fax, 'ccontactname' => $contactname, 'cfkp' => $fkp.'*'.$sp, 'cjoindate' => $joindate, 'cemail' => $email, 'csid' => $sales, 'ccash' => $cash, 'ccredit' => $credit, 'ccashnico' => $cashnico, 'ccreditnico' => $creditnico, 'climit' => $limit, 'ctop' => $ctop, 'cnpwp' => $npwp, 'cpkp' => $pkp, 'cspecial' => $special, 'ctyperetur' => $ctyperetur, 'ccid' => $cid, 'cnote' => $note, 'cstatus' => $status);
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
			$view['detail'] = $this -> customers_model -> __get_customers_detail($id, (__get_roles('ExecuteAllBranchCustomers') == 1 ? 0 : $this -> memcachedlib -> sesresult['ubid']));
			$view['branch'] = $this -> branch_lib -> __get_branch($view['detail'][0] -> cbid);
			$view['sales'] = $this -> sales_lib -> __get_sales($view['detail'][0] -> csid,$this -> memcachedlib -> sesresult['ubid']);
			$view['customer_check'] = $this -> categories_lib -> __get_categories_check($view['detail'][0] -> ccid);
			$this->load->view(__FUNCTION__, $view);
		}
	}
	
	function customers_delete($id) {
		if ($this -> customers_model -> __delete_customers($id, (__get_roles('ExecuteAllBranchCustomers') == 1 ? 0 : $this -> memcachedlib -> sesresult['ubid']))) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('customers'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('customers'));
		}
	}
	
	function get_suggestion() {
		header('Content-type: application/javascript');
		$hint = '';
		$a = array();
		$q = urldecode($_SERVER['QUERY_STRING']);
		$arr = $this -> customers_model -> __get_suggestion((__get_roles('ExecuteAllBranchCustomers') == 1 ? 0 : $this -> memcachedlib -> sesresult['ubid']));
		if (strlen($q) < 2) return false;
		
		foreach($arr as $k => $v) $a[] = array('name' => $v -> name, 'id' => $v -> id);
		if (strlen($q) > 0) {
			for($i=0; $i<count($a); $i++) {
				$a[$i]['name'] = trim($a[$i]['name']);
				$num_words = substr_count($a[$i]['name'],' ')+1;
				$pos = array();
				$is_suggestion_added = false;
				
				for ($cnt_pos=0; $cnt_pos<$num_words; $cnt_pos++) {
					if ($cnt_pos==0)
						$pos[$cnt_pos] = 0;
					else
						$pos[$cnt_pos] = strpos($a[$i]['name'],' ', $pos[$cnt_pos-1])+1;
				}
				
				if (strtolower($q)==strtolower(substr($a[$i]['name'],0,strlen($q))) || stripos($a[$i]['name'],$q)) {
					$hint[] = array('d' => $i, 'i' => $a[$i]['id'], 'n' => $a[$i]['name']);
					$is_suggestion_added = true;
				}
				for ($j=0;$j<$num_words && !$is_suggestion_added;$j++) {
					if(strtolower($q)==strtolower(substr($a[$i]['name'],$pos[$j],strlen($q)))){
						$hint[] = array('d' => $i, 'i' => $a[$i]['id'], 'n' => $a[$i]['name']);
						$is_suggestion_added = true;                                        
					}
				}
			}
		}
		
		echo json_encode($hint);
	}
	
	function export_customers() {
		ini_set('memory_limit', '-1');
		$this -> load -> library('excel');
		$data = $this -> customers_model -> __get_export($this -> memcachedlib -> sesresult['ubid']);
		
		$arr = array();
		foreach($data as $K => $v) {
			$addr = explode('*', $v -> caddr);
			$arr[] = array(__get_customer_category($v -> ccat,1), $v -> cname, $v -> ccontactname, $v -> sname, __get_rupiah($v -> ccash,2), __get_rupiah($v -> ccredit,2), __get_rupiah($v -> ctop,2), __get_rupiah($v -> climit,2), __get_rupiah($v -> rcvb,2), ($v -> cspecial == 0 ? 'No' : 'Yes'), __get_status($v -> cstatus,1));
		}
		
		$data = array('header' => array('Name', 'Name', 'PIC','Sales','TOP Cash','TOP Credit','TOP Credit Limit','Credit Current', 'Receivable', 'Special Attention', 'Status'), 'data' => $arr);
		$this -> excel -> sEncoding = 'UTF-8';
		$this -> excel -> bConvertTypes = false;
		$this -> excel -> sWorksheetTitle = 'Customer - PT. Niko Elektronic indonesia';
		
		$this -> excel -> addArray($data);
		$this -> excel -> generateXML('customer-' . date('Ymd'));
	}
}
