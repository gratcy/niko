<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> library('branch/branch_lib');
		$this -> load -> library('retur/retur_lib');
		$this -> load -> model('retur_model');
		$this -> load -> library('customers/customers_lib');
	}

	function index() {
		$keyword = $this -> input -> post('keyword');
		if ($keyword) {
			$view['keyword'] = $keyword;
			$view['retur'] = $this -> retur_model -> __get_search($keyword);
			$view['pages'] = '';
		}
		else {
			$pager = $this -> pagination_lib -> pagination($this -> retur_model -> __get_retur(),3,10,site_url('retur'));
			$view['retur'] = $this -> pagination_lib -> paginate();
			$view['pages'] = $this -> pagination_lib -> pages();
			$view['keyword'] = '';
		}
		if(!isset($_POST['approve'])){$_POST['approve']="";}
		if($_POST['approve']=='1'){
			$id=$this -> input -> post('id', TRUE);
			$arr=array('sstatus' => '3');
			$this -> retur_model -> __update_retur($id, $arr);
		
		}
		
		
		$this->load->view('retur', $view);
	}
	
	function retur_add() {
		if ($_POST) {
		
		
			$sbid = $this -> input -> post('sbid', TRUE);
			$snoso = $this -> input -> post('snoso', TRUE);			
			$stglx = explode("/",$this -> input -> post('stgl', TRUE));			
			$stgl="$stglx[2]-$stglx[1]-$stglx[0]";			
			$ssid = $this -> input -> post('csid', TRUE);			
			$sstatus = (int)$this ->input -> post('sstatus', TRUE);
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

			
			// print_r($_POST);die;
			
			// if (!$name || !$npwp || !$addr || !$phone1 || !$phone2 || !$city || !$prov) {
				// __set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				// redirect(site_url('retur' . '/' . __FUNCTION__));
			// }
			// else {
					$arr = array('sbid' => $sbid, 'snoso' => $snoso,  'snopo' => '',
					'sreff' => $sreff,'stgl' => $stgl, 'scid'=>$scid,'stype' => $stype,
					'ssid' => $ssid,'sppn' => $sfreeppn, 
					'sfreeppn' => $sfreeppn, 'sstatus' => $sstatus,'scdate' => $scdate,
					'sketerangan' => $sketerangan,'sduedate'=>$sduedate,'stypepay'=>$stypepay
					 );	
				if ($this -> retur_model -> __insert_retur($arr)) {
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					
					$lastid=$this->db->insert_id();	
					
					 $this -> retur_model -> __get_total_retur_monthly($stglx[1],$stglx[2],$lastid);
					
									
					redirect(site_url('retur_detail/home/retur_detail_add/'. $lastid .'/'. $scid .''));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('retur/home'));
				}
			//}
		}
		else {

			
		$view['scid'] = $this -> customers_lib -> __get_customers();
		$view['sbid'] = $this -> branch_lib -> __get_branch();
		$view['ssid'] = $this -> retur_lib -> __get_retur('',$this -> memcachedlib -> sesresult['ubid']);
		$this->load->view('retur_add',$view);
		}
	}
	
	function retur_update($id) {
	//print_r($id);die;
		if ($_POST) {
		//print_r($_POST);die;	
			$id = (int) $this -> input -> post('id');
			
			
			$sbid = $this -> input -> post('sbid', TRUE);
			$snoso = $this -> input -> post('snoso', TRUE);			
			// $stglx = explode("/",$this -> input -> post('stgl', TRUE));			
			// $stgl="$stglx[2]-$stglx[1]-$stglx[0]";		
			$stgl = $this -> input -> post('stgl', TRUE);			
			$ssid = $this -> input -> post('ssid', TRUE);			
			$sstatus = (int)$this ->input -> post('sstatus', TRUE);
			$scdate=date('Y-m-d');
			$sketerangan = $this -> input -> post('sketerangan', TRUE);
			$scid = $this -> input -> post('scid', TRUE);
			$stype = $this -> input -> post('stype', TRUE);
			$scurrency = $this -> input -> post('scurrency', TRUE);
			$skurs = $this -> input -> post('skurs', TRUE);
			$snpwp = $this -> input -> post('snpwp', TRUE);
			$climit = $this -> input -> post('climit', TRUE);
			$sfreeppn = $this -> input -> post('sfreeppn', TRUE);
			$ssubtotal = 0;
			$sppnnpwp = 0;
			$stotalsubppn = 0;
			$sppn = 0;
			$stotal = 0;	
			
			if ($id) {
				// if (!$name || !$npwp || !$addr || !$phone1 || !$phone2 || !$city || !$prov) {
					// __set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					// redirect(site_url('retur' . '/' . __FUNCTION__ . '/' . $id));
				// }
				// else {
			// else {
					$arr = array('sbid' => $sbid, 'snoso' => $snoso,  'stgl' => $stgl, 'ssid' => $ssid,'scid'=>$scid,'stype' => $stype,
					'scurrency' => $scurrency,'skurs' => $skurs,
					'snpwp' => $snpwp,'climit' => $climit,
					'sfreeppn' => $sfreeppn, 'ssubtotal' => $ssubtotal,		
					'sppnnpwp' => $sfreeppn, 'stotalsubppn' => $ssubtotal,	
					'sppn' => $sfreeppn, 'stotal' => $ssubtotal,'sketerangan' => $sketerangan,
					'sstatus' => $sstatus,'scdate' => $scdate );		
					
					
					
					if ($this -> retur_model -> __update_retur($id, $arr)) {	
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
											
						//redirect(site_url('retur/home'));
					redirect(site_url('retur_detail/home/retur_detail_add/'. $id .'/'. $scid .''));						
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('retur/home'));
					}
				//}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('retur/home'));
			}
		}
		else {
			$view['id'] = $id;
			
			$view['detail'] = $this -> retur_model -> __get_retur_detail($id);
			$view['sbid'] = $this -> branch_lib -> __get_branch($view['detail'][0] -> sbid);
			$view['ssid'] = $this -> retur_lib -> __get_retur($view['detail'][0] -> ssid,$this -> memcachedlib -> sesresult['ubid']);
			$this->load->view(__FUNCTION__, $view);
		}
	}
	
	function retur_delete($id) {
		if ($this -> retur_model -> __delete_retur($id)) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('retur/home'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('retur'));
		}
	}
	
	function get_suggestion() {
		$hint = '';
		$a = array();
		$q = $_SERVER['QUERY_STRING'];
		$arr = $this -> retur_model -> __get_suggestion();
		
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
