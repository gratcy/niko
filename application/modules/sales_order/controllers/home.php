<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> library('branch/branch_lib');
		$this -> load -> library('sales/sales_lib');
		$this -> load -> model('sales_order_model');
		$this -> load -> library('customers/customers_lib');
	}

	function index() {
		$keyword = $this -> input -> post('keyword');
		if ($keyword) {
			$view['keyword'] = $keyword;
			$view['sales_order'] = $this -> sales_order_model -> __get_search($keyword);
			$view['pages'] = '';
		}
		else {
			$pager = $this -> pagination_lib -> pagination($this -> sales_order_model -> __get_sales_order(),3,10,site_url('sales_order/home/index'));
			$view['sales_order'] = $this -> pagination_lib -> paginate();
			$view['pages'] = $this -> pagination_lib -> pages();
			$view['keyword'] = '';
		}
		if(!isset($_POST['approve'])){$_POST['approve']="";}
		if($_POST['approve']=='1'){
			$id=$this -> input -> post('id', TRUE);
			$arr=array('sstatus' => '3');
			$this -> sales_order_model -> __update_sales_order($id, $arr);
			
			   $scid=$_POST['scid'];
				$limit=$_POST['sisaplafon_after'];
				$arrl = array('climit' => $limit);
					$this -> customers_model -> __update_customers($scid, $arrl);			
		
		}
		
		
		$this->load->view('sales_order', $view);
	}
	
	function sales_order_add() {
		if ($_POST) {
		
			$stype = $this -> input -> post('product_type', TRUE);
			$discdate = $this -> input -> post('discdate', TRUE);
			$sbid = $this -> input -> post('sbid', TRUE);
			$snoso = $this -> input -> post('snoso', TRUE);			
			$stglx = explode("/",$this -> input -> post('stgl', TRUE));			
			$stgl="$stglx[2]-$stglx[1]-$stglx[0]";			
			$ssid = $this -> input -> post('csid', TRUE);			
			$sstatus = (int)$this ->input -> post('sstatus', TRUE);
			$scdate=date('Y-m-d');
			$scid = $this -> input -> post('cid', TRUE);
			
			$sketerangan = $this -> input -> post('sketerangan', TRUE);
			$sreff = $this -> input -> post('sreff', TRUE);
			$scurrency = $this -> input -> post('scurrency', TRUE);
			$climit = str_replace('',',',$this -> input -> post('climit', TRUE));
			$sfreeppn = $this -> input -> post('sfreeppn', TRUE);
			$stypepay = $this -> input -> post('stypepay', TRUE);
			$topx = str_replace('',',',$this -> input -> post('topx', TRUE));			
			$ccash = str_replace('',',',$this -> input -> post('ccash', TRUE));
			$ccredit = str_replace('',',',$this -> input -> post('ccredit', TRUE));
			if($stypepay=="Cash"){

			//$sduedate = date("Y-m-d",strtotime("$stgl + $ccash days"));	
			$sduedate = date("Y-m-d",strtotime("$stgl + 30 days"));	
			}else{			
			$sduedate = date("Y-m-d",strtotime("$stgl +30 days"));
			}
			$ssubtotal = 0;
			$sppnnpwp = 0;
			$stotalsubppn = 0;
			$sppn = 0;
			$stotal = 0;			
					$sduration=$this -> sales_order_model -> __get_duration($stype,$stypepay,$scid);
					$sduration=$sduration[0]->sduration;
					$arr = array('sbid' => $sbid, 'snoso' => $snoso,  'snopo' => '',
					'sreff' => $sreff,'stgl' => $stgl, 'scid'=>$scid,'stype' => $stype,
					'ssid' => $ssid,'sppn' => $sfreeppn, 
					'sfreeppn' => $sfreeppn, 'sstatus' => $sstatus,'scdate' => $scdate,
					'sketerangan' => $sketerangan,'sduedate'=>$sduedate,'stypepay'=>$stypepay,
					'sduration'=>$sduration );	
				 
					 
				if ($this -> sales_order_model -> __insert_sales_order($arr)) {
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					
					$lastid=$this->db->insert_id();	
					
					 $this -> sales_order_model -> __get_total_sales_order_monthly($stglx[1],$stglx[2],$lastid);
					
									
					redirect(site_url('sales_order_detail/home/sales_order_detail_add/'. $lastid .'/'. $scid .'/'.$discdate));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('sales_order/home'));
				}
			//}
		}
		else {

			
		$view['scid'] = $this -> customers_lib -> __get_customers();
		$view['sbid'] = $this -> branch_lib -> __get_branch();
		$view['ssid'] = $this -> sales_lib -> __get_sales('',$this -> memcachedlib -> sesresult['ubid']);		
		$this->load->view('sales_order_add',$view);
		}
	}
	
	
	function source() {
		$view['hostname']=$this->db->hostname;
		$view['username']=$this->db->username;
		$view['password']=$this->db->password;
		$view['database']=$this->db->database;
		$this->load->view('source',$view,FALSE);
	}
	
	function sales_order_update($id,$scid) {
		if ($_POST) {
			$sbid = $this -> input -> post('sbid', TRUE);
			$snoso = $this -> input -> post('snoso', TRUE);			
			$stgl = $this -> input -> post('stgl', TRUE);
			$stglx=explode("/",$stgl);
			$stglin="$stglx[2]-$stglx[1]-$stglx[0]";
			$sreff = $this -> input -> post('sreff', TRUE);			
			$ssid = $this -> input -> post('csid', TRUE);			
			$sstatus = (int)$this ->input -> post('status', TRUE);
			$scdate=date('Y-m-d');
			$sketerangan = $this -> input -> post('sketerangan', TRUE);
			//$scid = $this -> input -> post('scid', TRUE);
			$stype = $this -> input -> post('stype', TRUE);
			$climit = str_replace('',',',$this -> input -> post('climit', TRUE));
			$sfreeppn = $this -> input -> post('sfreeppn', TRUE);
			$stypepay = $this -> input -> post('stypepay', TRUE);
			$topx = str_replace('',',',$this -> input -> post('topx', TRUE));			
			$ccash = str_replace('',',',$this -> input -> post('ccash', TRUE));
			$ccredit = str_replace('',',',$this -> input -> post('ccredit', TRUE));
			if($stypepay=="Cash"){

			$sduedate = date("Y-m-d",strtotime("$stglin + $ccash days"));			
			}else{			
			$sduedate = date("Y-m-d",strtotime("$stglin + $ccredit days"));
			}
			$ssubtotal = 0;
			$sppnnpwp = 0;
			$stotalsubppn = 0;
			$sppn = 0;
			$stotal = 0;				
			
			if ($id) {

					$arr = array('sbid' => $sbid, 'snoso' => $snoso,  'snopo' => '',
					'sreff' => $sreff,'stgl' => $stglin, 'scid'=>$scid,'stype' => $stype,
					'ssid' => $ssid,'sppn' => $sfreeppn, 
					'sfreeppn' => $sfreeppn, 'sstatus' => $sstatus,'scdate' => $scdate,
					'sketerangan' => $sketerangan,'sduedate'=>$sduedate,'stypepay'=>$stypepay
					 );		

					if ($this -> sales_order_model -> __update_sales_order($id, $arr)) {	
						__set_error_msg(array('info' => 'Data berhasil diubah.'));

					redirect(site_url('sales_order_detail/home/sales_order_detail_add/'. $id .'/'. $scid .''));						
					}
					else {
					print_r($arr);die;
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('sales_order/home'));
					}
				//}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('sales_order/home'));
			}
		}
		else {
			$view['id'] = $id;
			$view['scid'] = $scid;
		$view['detailx'] = $this -> sales_order_model -> __get_sales_order_detail($id);	
		$view['detailc'] = $this -> sales_order_model -> __get_customers_detail($scid);
		$view['sbid'] = $this -> branch_lib -> __get_branch();
		$view['ssid'] = $this -> sales_lib -> __get_sales('',$this -> memcachedlib -> sesresult['ubid']);		
		$this->load->view('sales_order_update',$view);
		}
	}
	
	
	function sales_order_cancel($id,$scid) {
		
			//update limit + limit so berdasarkan id so dan id cust
			$limitx=$this -> sales_order_model -> __get_limit_before($id,$scid);
				
				$arrl = array('climit' => $limitx);
				$this -> customers_model -> __update_customers($scid, $arrl);
				$this -> sales_order_model -> __delete_sales_order($id);
			redirect ('sales_order/home');		
	

	}	
	
	
	
	function sales_order_delete($id) {
		if ($this -> sales_order_model -> __delete_sales_order($id)) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('sales_order/home'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('sales_order'));
		}
	}
	
	function get_suggestion() {
		$hint = '';
		$a = array();
		$q = $_SERVER['QUERY_STRING'];
		$arr = $this -> sales_order_model -> __get_suggestion();
		
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
