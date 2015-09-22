<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> library('branch/branch_lib');
		$this -> load -> library('sales/sales_lib');
		$this -> load -> model('retur_order_model');
		$this -> load -> library('customers/customers_lib');
	}

	function index() {
		$keyword = $this -> input -> post('keyword');
		if ($keyword) {
			$view['keyword'] = $keyword;
			$view['retur_order'] = $this -> retur_order_model -> __get_search($keyword);
			$view['pages'] = '';
		}
		else {
			$pager = $this -> pagination_lib -> pagination($this -> retur_order_model -> __get_retur_order(),3,10,site_url('retur_order'));
			$view['retur_order'] = $this -> pagination_lib -> paginate();
			$view['pages'] = $this -> pagination_lib -> pages();
			$view['keyword'] = '';
		}
		if(!isset($_POST['approve'])){$_POST['approve']="";}
		if($_POST['approve']=='1'){
			$id=$this -> input -> post('id', TRUE);
			$arr=array('sstatus' => '3');
			$this -> retur_order_model -> __update_retur_order($id, $arr);
			
			   $scid=$_POST['scid'];
				$limit=$_POST['sisaplafon_after'];
				$arrl = array('climit' => $limit);
					$this -> customers_model -> __update_customers($scid, $arrl);			
		
		}
		
		
		$this->load->view('retur_order', $view);
	}
	
	function retur_order_add() {
		if ($_POST) {
		
		
			$sbid = $this -> input -> post('sbid', TRUE);
			$snoro = $this -> input -> post('snoro', TRUE);			
			$stglx = explode("/",$this -> input -> post('stgl', TRUE));			
			$stgl="$stglx[2]-$stglx[1]-$stglx[0]";			
			$ssid = $this -> input -> post('csid', TRUE);			
			//$sstatus = (int)$this ->input -> post('sstatus', TRUE);
			$sstatus=(int)0;
			$scdate=date('Y-m-d');
			$scid = $this -> input -> post('cid', TRUE);
			$stype = $this -> input -> post('stype', TRUE);
			$sketerangan = $this -> input -> post('sketerangan', TRUE);
			$sreff = $this -> input -> post('sreff', TRUE);
			$scurrency = $this -> input -> post('scurrency', TRUE);
			$sfreeppn = $this -> input -> post('climit', TRUE);
			$sfreeppn = $this -> input -> post('sfreeppn', TRUE);
			$stypepay = $this -> input -> post('stypepay', TRUE);
			$topx = $this -> input -> post('topx', TRUE);			
			$ccash = $this -> input -> post('ccash', TRUE);
			$ccredit = $this -> input -> post('ccredit', TRUE);
			if($stypepay=="Cash"){

			$sduedate = date("Y-m-d",strtotime("+$ccash days"));			
			}else{			
			$sduedate = date("Y-m-d",strtotime("+$ccredit days"));
			}
			$ssubtotal = 0;
			$sppnnpwp = 0;
			$stotalsubppn = 0;
			$sppn = 0;
			$stotal = 0;			

					$arr = array('sbid' => $sbid, 'snoro' => $snoro,  'snopo' => '',
					'sreff' => $sreff,'stgl' => $stgl, 'scid'=>$scid,'stype' => $stype,
					'ssid' => $ssid,'sppn' => $sfreeppn, 
					'sfreeppn' => $sfreeppn, 'sstatus' => $sstatus,'scdate' => $scdate,
					'sketerangan' => $sketerangan,'sduedate'=>$sduedate,'status_potong'=>0
					 );	
				if ($this -> retur_order_model -> __insert_retur_order($arr)) {
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					
					$lastid=$this->db->insert_id();	
					
					 $this -> retur_order_model -> __get_total_retur_order_monthly($stglx[1],$stglx[2],$lastid);
					
									
					redirect(site_url('retur_order_detail/home/retur_order_detail_add/'. $lastid .'/'. $scid .''));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('retur_order/home'));
				}
			//}
		}
		else {

			
		$view['scid'] = $this -> customers_lib -> __get_customers();
		$view['sbid'] = $this -> branch_lib -> __get_branch();
		$view['ssid'] = $this -> sales_lib -> __get_sales('',$this -> memcachedlib -> sesresult['ubid']);		
		$this->load->view('retur_order_add',$view);
		}
	}
	
	
	function source() {
		$view['hostname']=$this->db->hostname;
		$view['username']=$this->db->username;
		$view['password']=$this->db->password;
		$view['database']=$this->db->database;
		$this->load->view('source',$view,FALSE);
	}
	
	function retur_order_update($id,$scid) {
		if ($_POST) {
			$sbid = $this -> input -> post('sbid', TRUE);
			$snoro = $this -> input -> post('snoro', TRUE);			
			$stgl = $this -> input -> post('stgl', TRUE);
			$stglx=explode("/",$stgl);
			$stglin="$stglx[2]-$stglx[1]-$stglx[0]";
			$sreff = $this -> input -> post('sreff', TRUE);			
			$ssid = $this -> input -> post('csid', TRUE);			
			$sstatus = (int)$this ->input -> post('status', TRUE);
			$scdate=date('Y-m-d');
			$sketerangan = $this -> input -> post('sketerangan', TRUE);
			$scidx = $this -> input -> post('cid', TRUE);
			$stype = $this -> input -> post('stype', TRUE);
			$climit = $this -> input -> post('climit', TRUE);
			$sfreeppn = $this -> input -> post('sfreeppn', TRUE);
						$stypepay = $this -> input -> post('stypepay', TRUE);
			$topx = $this -> input -> post('topx', TRUE);			
			$ccash = $this -> input -> post('ccash', TRUE);
			$ccredit = $this -> input -> post('ccredit', TRUE);
			if($stypepay=="Cash"){

			$sduedate = date("Y-m-d",strtotime("+$ccash days"));			
			}else{			
			$sduedate = date("Y-m-d",strtotime("+$ccredit days"));
			}
			$ssubtotal = 0;
			$sppnnpwp = 0;
			$stotalsubppn = 0;
			$sppn = 0;
			$stotal = 0;				
			//echo $scidx;die;
			if ($id) {

					$arr = array('sbid' => $sbid, 'snoro' => $snoro,  'snopo' => '',
					'sreff' => $sreff,'stgl' => $stglin, 'scid'=>$scidx,'stype' => $stype,
					'ssid' => $ssid,'sppn' => $sfreeppn, 
					'sfreeppn' => $sfreeppn, 'sstatus' => $sstatus,'scdate' => $scdate,
					'sketerangan' => $sketerangan,'sduedate'=>$sduedate,'stypepay'=>$stypepay
					 );		

					if ($this -> retur_order_model -> __update_retur_order($id, $arr)) {	
						__set_error_msg(array('info' => 'Data berhasil diubah.'));

					redirect(site_url('retur_order_detail/home/retur_order_detail_add/'. $id .'/'. $scid .''));						
					}
					else {
					//print_r($arr);die;
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('retur_order/home'));
					}
				//}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('retur_order/home'));
			}
		}
		else {
			$view['id'] = $id;
			$view['scid'] = $scid;
		$view['detailx'] = $this -> retur_order_model -> __get_retur_order_detail($id);	
		$view['detailc'] = $this -> retur_order_model -> __get_customers_detail($scid);
		$view['sbid'] = $this -> branch_lib -> __get_branch();
		$view['ssid'] = $this -> sales_lib -> __get_sales('',$this -> memcachedlib -> sesresult['ubid']);		
		$this->load->view('retur_order_update',$view);
		}
	}
	
	function retur_order_delete($id) {
		if ($this -> retur_order_model -> __delete_retur_order($id)) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('retur_order/home'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('retur_order'));
		}
	}
	
	function get_suggestion() {
		$hint = '';
		$a = array();
		$q = $_SERVER['QUERY_STRING'];
		$arr = $this -> retur_order_model -> __get_suggestion();
		
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
