<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> library('branch/branch_lib');
		$this -> load -> library('products/products_lib');
		$this -> load -> library('sparepart/sparepart_lib');
		$this -> load -> model('inventory_model');
		$this -> load -> model('products/products_model');
	}

	function index($type) {
		if (!$type) $type = 1;
		
		//~ if ($type == 1)
			//~ $perm = (__get_roles('ExecuteAllBranchInventoryProduct') == 1 ? "" : $this -> memcachedlib -> sesresult['ubid']);
		//~ elseif ($type == 2)
			//~ $perm = (__get_roles('ExecuteAllBranchInventorySparepart') == 1 ? "" : $this -> memcachedlib -> sesresult['ubid']);
		//~ elseif ($type == 3)
			//~ $perm = (__get_roles('ExecuteAllBranchInventoryRejectProduct') == 1 ? "" : $this -> memcachedlib -> sesresult['ubid']);
		//~ elseif ($type == 4)
			//~ $perm = (__get_roles('ExecuteAllBranchInventoryReturn') == 1 ? "" : $this -> memcachedlib -> sesresult['ubid']);
		//~ else
			//~ $perm = (__get_roles('ExecuteAllBranchInventoryRejectSparepart') == 1 ? "" : $this -> memcachedlib -> sesresult['ubid']);
		$perm = $this -> memcachedlib -> sesresult['ubid'];
		
		$keyword = $this -> input -> post('keyword');
		$view['perm'] = $perm;
		$view['type'] = $type;
		
		if ($this -> memcachedlib -> sesresult['ubid'] == 1) {
			$view['branch'] = $this -> inventory_model -> __get_branch_inventory();
			if ($keyword) {
				$view['keyword'] = $keyword;
				$view['inventory'] = $this -> inventory_model -> __get_search($keyword,$type,$perm,1);
				$view['pages'] = '';
			}
			else {
				$pager = $this -> pagination_lib -> pagination($this -> inventory_model -> __get_inventory_main($type),3,10,site_url('inventory/' . $type));
				$view['inventory'] = $this -> pagination_lib -> paginate();
				$view['pages'] = $this -> pagination_lib -> pages();
				$view['keyword'] = '';
			}
			$this->load->view('inventory_main', $view);
		}
		else {
			if ($keyword) {
				$view['keyword'] = $keyword;
				$view['inventory'] = $this -> inventory_model -> __get_search($keyword,$type,$perm,2);
				$view['pages'] = '';
			}
			else {
				$pager = $this -> pagination_lib -> pagination($this -> inventory_model -> __get_inventory($type,$perm),3,10,site_url('inventory/' . $type));
				$view['inventory'] = $this -> pagination_lib -> paginate();
				$view['pages'] = $this -> pagination_lib -> pages();
				$view['keyword'] = '';
			}
			$this->load->view('inventory', $view);
		}
	}
	
	function inventory_add($type) {
		if ($_POST) {
			$type = (int) $this -> input -> post('type');
			$stock = (int) $this -> input -> post('stock');
			$stockout = (int) $this -> input -> post('stockout');
			$stockin = (int) $this -> input -> post('stockin');
			$stockbegining = (int) $this -> input -> post('stockbegining');
			$item = (int) $this -> input -> post('item');
			$branch = (int) $this -> input -> post('branch');
			$status = (int) $this -> input -> post('status');
			
			if (!$item || !$branch || !$type) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('inventory' . '/' . __FUNCTION__ . '/' . $type));
			}
			else {
				$arr = array('ibid' => $branch, 'iiid' => $item, 'itype' => $type, 'istockbegining' => $stockbegining, 'istockin' => $stockin, 'istockout' => $stockout, 'istock' => $stock, 'istatus' => $status);
				if ($this -> inventory_model -> __insert_inventory($arr)) {
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('inventory/' . $type));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('inventory/' . $type));
				}
			}
		}
		else {
			if ($type == 1)
			$view['perm'] = 'ExecuteAllBranchInventoryProduct';
			else if ($type == 2)
			$view['perm'] = 'ExecuteAllBranchInventorySparepart';
			else if ($type == 3)
			$view['perm'] = 'ExecuteAllBranchInventoryRejectProduct';
			elseif ($type == 4)
			$view['perm'] = 'ExecuteAllBranchInventoryReturn';
			else
			$view['perm'] = 'ExecuteAllBranchInventoryRejectSparepart';
			
			$view['type'] = $type;
			$view['branch'] = $this -> branch_lib -> __get_branch();
			if ($type == 1 || $type == 3)
				$view['items'] = $this -> products_lib -> __get_products();
			else
				$view['items'] = $this -> sparepart_lib -> __get_sparepart();
			$this->load->view(__FUNCTION__, $view);
		}
	}
	
	function inventory_update($type,$id) {
		if ($_POST) {
			$type = (int) $this -> input -> post('type');
			$stock = (int) $this -> input -> post('stock');
			$stockout = (int) $this -> input -> post('stockout');
			$stockin = (int) $this -> input -> post('stockin');
			$stockbegining = (int) $this -> input -> post('stockbegining');
			$item = (int) $this -> input -> post('item');
			$branch = (int) $this -> input -> post('branch');
			$status = (int) $this -> input -> post('status');
			$id = (int) $this -> input -> post('id');
			
			if ($id && $type) {
				if (!$item || !$branch) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('inventory' . '/' . __FUNCTION__ . '/' . $type . '/' . $id));
				}
				else {
					$arr = array('ibid' => $branch, 'iiid' => $item, 'istatus' => $status);
					if ($this -> inventory_model -> __update_inventory($id, $arr, $type)) {	
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('inventory/' . $type));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('inventory/' . $type));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('inventory/' . $type));
			}
		}
		else {
			if ($type == 1)
				$perm = (__get_roles('ExecuteAllBranchInventoryProduct') == 1 ? "" : $this -> memcachedlib -> sesresult['ubid']);
			elseif ($type == 2)
				$perm = (__get_roles('ExecuteAllBranchInventorySparepart') == 1 ? "" : $this -> memcachedlib -> sesresult['ubid']);
			elseif ($type == 3)
				$perm = (__get_roles('ExecuteAllBranchInventoryRejectProduct') == 1 ? "" : $this -> memcachedlib -> sesresult['ubid']);
			elseif ($type == 4)
				$perm = (__get_roles('ExecuteAllBranchInventoryReturn') == 1 ? "" : $this -> memcachedlib -> sesresult['ubid']);
			else
				$perm = (__get_roles('ExecuteAllBranchInventoryRejectSparepart') == 1 ? "" : $this -> memcachedlib -> sesresult['ubid']);
				
			if ($type == 1)
			$view['perm'] = 'ExecuteAllBranchInventoryProduct';
			else if ($type == 2)
			$view['perm'] = 'ExecuteAllBranchInventorySparepart';
			else if ($type == 3)
			$view['perm'] = 'ExecuteAllBranchInventoryRejectProduct';
			else if ($type == 4)
			$view['perm'] = 'ExecuteAllBranchInventoryReturn';
			else
			$view['perm'] = 'ExecuteAllBranchInventoryRejectSparepart';
			
			$view['id'] = $id;
			$view['type'] = $type;
			$view['detail'] = $this -> inventory_model -> __get_inventory_detail($type,$id,$perm);
			$view['branch'] = $this -> branch_lib -> __get_branch($view['detail'][0] -> ibid);
			if ($type == 1 || $type == 3)
				$view['items'] = $this -> products_lib -> __get_products($view['detail'][0] -> iiid);
			else
				$view['items'] = $this -> sparepart_lib -> __get_sparepart($view['detail'][0] -> iiid);
				
			$this->load->view(__FUNCTION__, $view);
		}
	}

	function inventory_delete($type,$id) {
		if ($type == 1)
			$perm = (__get_roles('ExecuteAllBranchInventoryProduct') == 1 ? "" : $this -> memcachedlib -> sesresult['ubid']);
		elseif ($type == 2)
			$perm = (__get_roles('ExecuteAllBranchInventorySparepart') == 1 ? "" : $this -> memcachedlib -> sesresult['ubid']);
		elseif ($type == 3)
			$perm = (__get_roles('ExecuteAllBranchInventoryRejectProduct') == 1 ? "" : $this -> memcachedlib -> sesresult['ubid']);
		elseif ($type == 4)
			$perm = (__get_roles('ExecuteAllBranchInventoryReturn') == 1 ? "" : $this -> memcachedlib -> sesresult['ubid']);
		else
			$perm = (__get_roles('ExecuteAllBranchInventoryRejectSparepart') == 1 ? "" : $this -> memcachedlib -> sesresult['ubid']);
			
		if ($this -> inventory_model -> __delete_inventory($id,$perm)) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('inventory/' . $type));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('inventory/' . $type));
		}
	}
	
	function get_suggestion($type) {
		header('Content-type: application/javascript');
		$hint = '';
		$a = array();
		$q = urldecode($_SERVER['QUERY_STRING']);
		
		if ($type == 2 || $type == 5) $arr = $this -> sparepart_model -> __get_suggestion();
		else $arr = $this -> products_model -> __get_suggestion();
		
		if (strlen($q) < 2) return false;
		
		foreach($arr as $k => $v) $a[] = array('name' => $v -> name, 'id' => $v -> id);
		
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
		
		echo json_encode($hint);
	}
	
	function card_stock($id, $iid, $type) {
		$this -> load -> model('opname/opname_model');
		$this -> load -> model('receiving/receiving_model');
		
		$branch = $this -> memcachedlib -> sesresult['ubid'];
		$opnamePlus = $this -> opname_model -> __get_stock_adjustment_hist($id, $branch, $type, 1);
		$opnameMin = $this -> opname_model -> __get_stock_adjustment_hist($id, $branch, $type, 2);
		
		$recevingApp = array();
		$recevingUnApp = array();
		$returnApp = array();
		$returnUnApp = array();
		$returnTransApp = array();
		$returnTransUnApp = array();
		$SO = array();
		$DO = array();
		$TukarGuling = array();
		
		$ServiceProductApp = array();
		$ServiceProductUnApp = array();
		$ServiceSparepartApp = array();
		$ServiceSparepartUnApp = array();
		$TransCustomerApp = array();
		$TransCustomerUnApp = array();
		$TukarGulingApp = array();
		$TukarGulingUnApp = array();
		
		if ($type == 1) :
			$SO = $this -> inventory_model -> __get_sales_order($iid, $branch, $type, 1);
			$DO = $this -> inventory_model -> __get_sales_order($iid, $branch, $type, 2);
			$TukarGulingApp = $this -> inventory_model -> __get_tukar_guling($iid, $branch, $type, 1);
			$TukarGulingUnApp = $this -> inventory_model -> __get_tukar_guling($iid, $branch, $type, 2);
		
			$recevingApp = $this -> receiving_model -> __get_receiving_hist($iid, $branch, $type, 1, 0);
			$recevingUnApp = $this -> receiving_model -> __get_receiving_hist($iid, $branch, $type, 2, 0);
			
			$TransCustomerApp = $this -> inventory_model -> __get_transfer_customer($iid, $branch, 1, 1);
			$TransCustomerUnApp = $this -> inventory_model -> __get_transfer_customer($iid, $branch, 2, 1);
		elseif ($type == 2) :
			$recevingApp = $this -> receiving_model -> __get_receiving_hist($iid, $branch, 2, 1, 0);
			$recevingUnApp = $this -> receiving_model -> __get_receiving_hist($iid, $branch, 2, 2, 0);
			
			$ServiceSparepartApp = $this -> inventory_model -> __get_services_items($iid, $branch, 2, 1);
			$ServiceSparepartUnApp = $this -> inventory_model -> __get_services_items($iid, $branch, 2, 2);
			
			$TransCustomerApp = $this -> inventory_model -> __get_transfer_customer($iid, $branch, 1, 2);
			$TransCustomerUnApp = $this -> inventory_model -> __get_transfer_customer($iid, $branch, 2, 2);
		elseif ($type == 4) :
			$returnApp = $this -> inventory_model -> __get_return_order($iid, $branch, $type, 1);
			$returnUnApp = $this -> inventory_model -> __get_return_order($iid, $branch, $type, 2);
			
			$returnTransApp = $this -> inventory_model -> __get_return_transfer($iid, $branch, 1, 1);
			$returnTransUnApp = $this -> inventory_model -> __get_return_transfer($iid, $branch, 2, 1);
			
			$ServiceProductApp = $this -> inventory_model -> __get_services_items($iid, $branch, 1, 1);
			$ServiceProductUnApp = $this -> inventory_model -> __get_services_items($iid, $branch, 1, 2);
		elseif ($type == 5) :
			$recevingApp = $this -> receiving_model -> __get_receiving_hist($iid, $branch, 1, 1, 1);
			$recevingUnApp = $this -> receiving_model -> __get_receiving_hist($iid, $branch, 1, 2, 1);
			
			$returnTransApp = $this -> inventory_model -> __get_return_transfer($iid, $branch, 1, 2);
			$returnTransUnApp = $this -> inventory_model -> __get_return_transfer($iid, $branch, 2, 2);
			
			$ServiceSparepartApp = $this -> inventory_model -> __get_services_items($iid, $branch, 2, 1);
			$ServiceSparepartUnApp = $this -> inventory_model -> __get_services_items($iid, $branch, 2, 2);
		endif;
		
		$data = array_merge($opnamePlus, $opnameMin, $recevingApp, $recevingUnApp, $SO, $DO, $TukarGulingApp, $TukarGulingUnApp, $returnApp, $returnUnApp, $returnTransApp, $returnTransUnApp, $ServiceProductApp, $ServiceProductUnApp, $ServiceSparepartApp, $ServiceSparepartUnApp, $TransCustomerApp, $TransCustomerUnApp);

		usort($data, "__sortArrayByDate");
		$view['type'] = $type;
		$view['detail'] = $data;
		$view['book'] = $this -> inventory_model -> __get_product($iid, $branch, $type);
		if ($this -> input -> get('export') == 'excel') :
			$filename ="card_stock-".$id."-".$iid."-".$type.".xls";
			header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment; filename='.$filename);
			header("Cache-Control: max-age=0");
		endif;
		$this->load->view('print/card_stock', $view, false);
	}
	
	function export_excel($type) {
		ini_set('memory_limit', '-1');
		$this -> load -> library('excel');
		$data = $this -> inventory_model -> __export($type,$this -> memcachedlib -> sesresult['ubid']);
		
		$arr = array();
		foreach($data as $K => $v) {
			if ($type != 2 && $type != 5)
				$arr[] = array($v -> code, $v -> name, $v -> istockbegining, $v -> istockin, $v -> istockout, __get_stock_adjustment($v -> iid, $this -> memcachedlib -> sesresult['ubid'], 2, $type), __get_stock_adjustment($v -> iid, $this -> memcachedlib -> sesresult['ubid'], 1, $type), __get_stock_process($this -> memcachedlib -> sesresult['ubid'], $v -> iiid, $type), $v -> istock);
			else
				$arr[] = array($v -> name, $v -> istockbegining, $v -> istockin, $v -> istockout, __get_stock_adjustment($v -> iid, $this -> memcachedlib -> sesresult['ubid'], 2, $type), __get_stock_adjustment($v -> iid, $this -> memcachedlib -> sesresult['ubid'], 1, $type), __get_stock_process($this -> memcachedlib -> sesresult['ubid'], $v -> iiid, $type), $v -> istock);
		}
		
		if ($type != 2 && $type != 5)
			$data = array('header' => array('Code', 'Name', 'Stock Begining', 'Stock In','Stock Out','Adjusment (-)','Adjusment (+)','Stock Proccess','Stock Final'), 'data' => $arr);
		else
			$data = array('header' => array('Name', 'Stock Begining', 'Stock In','Stock Out','Adjusment (-)','Adjusment (+)','Stock Proccess','Stock Final'), 'data' => $arr);

		$this -> excel -> sEncoding = 'UTF-8';
		$this -> excel -> bConvertTypes = false;
		$this -> excel -> sWorksheetTitle = 'Inventory '.__get_inventory_type($type).' - PT. Niko Elektronic indonesia';
		
		$this -> excel -> addArray($data);
		$this -> excel -> generateXML('inventory-'.__get_inventory_type($type).'-' . date('Ymd'));
	}
}
