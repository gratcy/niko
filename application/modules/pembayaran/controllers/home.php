<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> library('branch/branch_lib');
		$this -> load -> library('sales/sales_lib');
		$this -> load -> model('pembayaran_model');
		$this -> load -> library('customers/customers_lib');
	}

	function index() {
		$keyword = $this -> input -> post('keyword');
		if ($keyword) {
			$view['keyword'] = $keyword;
			$view['pembayaran'] = $this -> pembayaran_model -> __get_search($keyword);
			$view['pages'] = '';
		}
		else {
			$pager = $this -> pagination_lib -> pagination($this -> pembayaran_model -> __get_pembayaran(),3,10,site_url('pembayaran'));
			$view['pembayaran'] = $this -> pagination_lib -> paginate();
			$view['pages'] = $this -> pagination_lib -> pages();
			$view['keyword'] = '';
		}
		
		
		$this->load->view('pembayaran', $view);
	}
	

	function pembayaran_update($pno_pm) {
	$arp=array('status'=>3);
					if ($this -> pembayaran_model -> __update_pembayaran($pno_pm,$arp)) {	
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
					$sdate_lunas=date('Y-m-d');	
					$ardo=array('sdate_lunas'=>	$sdate_lunas);
                    $this -> pembayaran_model -> __update_dox($pno_pm,$ardo);					
					redirect(site_url('pembayaran/home'));						
					}	
	}
	function pembayaran_add() {
		if ($_POST) {	
			$pno_pm = $this -> input -> post('pno_pm', TRUE);
			$sreff = $this -> input -> post('sreff', TRUE);				
			$stglx = explode("/",$this -> input -> post('stgl', TRUE));			
			$stgl="$stglx[2]-$stglx[1]-$stglx[0]";			
			$scdate=date('Y-m-d');
			$scid = $this -> input -> post('cid', TRUE);
		
			$type_bayar = $this -> input -> post('type_bayar', TRUE);
			

					$arr = array( 'pmid'=>'','pno_pm' => $pno_pm, 'pcid'=>$scid,'pm_tgl' => $stgl,  
					'pcash'=>'','pgiro'=>'','piutang'=>'','ptgl_giro'=>'','pwrite_off'=>'',
					'sreff' => $sreff,
					'status' => '1',type_bayar=>$type_bayar);	
				if ($this -> pembayaran_model -> __insert_pembayaran($arr)) {
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));					
					 $lastid=$this->db->insert_id();						
					 //$this -> pembayaran_model -> __get_total_pembayaran_monthly($stglx[1],$stglx[2],$lastid);									
					redirect(site_url('pembayaran_detail/home/pembayaran_detail_add/'. $scid .'/'.$pno_pm.'/'.$type_bayar));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('pembayaran/home'));
				}

		}
		else {

			
		$view['scid'] = $this -> customers_lib -> __get_customers();
		$view['sbid'] = $this -> branch_lib -> __get_branch();
		$view['ssid'] = $this -> sales_lib -> __get_sales('',$this -> memcachedlib -> sesresult['ubid']);		
		$this->load->view('pembayaran_add',$view);
		}
	}
	
	
	function source() {
		$view['hostname']=$this->db->hostname;
		$view['username']=$this->db->username;
		$view['password']=$this->db->password;
		$view['database']=$this->db->database;
		$this->load->view('source',$view,FALSE);
	}
	
	function pembayaran_updatexx($id,$scid) {
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
			//$scid = $this -> input -> post('scid', TRUE);
			$stype = $this -> input -> post('stype', TRUE);
			$climit = $this -> input -> post('climit', TRUE);
			$sfreeppn = $this -> input -> post('sfreeppn', TRUE);
						$stypepay = $this -> input -> post('stypepay', TRUE);
			$topx = $this -> input -> post('topx', TRUE);			
			$ccash = $this -> input -> post('ccash', TRUE);
			$ccredit = $this -> input -> post('ccredit', TRUE);
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

					$arr = array('sbid' => $sbid, 'snoro' => $snoro,  'snopo' => '',
					'sreff' => $sreff,'stgl' => $stglin, 'scid'=>$scid,'stype' => $stype,
					'ssid' => $ssid,'sppn' => $sfreeppn, 
					'sfreeppn' => $sfreeppn, 'sstatus' => $sstatus,'scdate' => $scdate,
					'sketerangan' => $sketerangan,'sduedate'=>$sduedate,'stypepay'=>$stypepay
					 );		

					if ($this -> pembayaran_model -> __update_pembayaran($id, $arr)) {	
						__set_error_msg(array('info' => 'Data berhasil diubah.'));

					redirect(site_url('pembayaran_detail/home/pembayaran_detail_add/'. $id .'/'. $scid .''));						
					}
					else {
					print_r($arr);die;
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('pembayaran/home'));
					}
				//}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('pembayaran/home'));
			}
		}
		else {
			$view['id'] = $id;
			$view['scid'] = $scid;
		$view['detailx'] = $this -> pembayaran_model -> __get_pembayaran_detail($id);	
		$view['detailc'] = $this -> pembayaran_model -> __get_customers_detail($scid);
		$view['sbid'] = $this -> branch_lib -> __get_branch();
		$view['ssid'] = $this -> sales_lib -> __get_sales('',$this -> memcachedlib -> sesresult['ubid']);		
		$this->load->view('pembayaran_update',$view);
		}
	}
	
	function pembayaran_delete($id) {
		if ($this -> pembayaran_model -> __delete_pembayaran($id)) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('pembayaran/home'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('pembayaran'));
		}
	}
	
	function get_suggestion() {
		$hint = '';
		$a = array();
		$q = $_SERVER['QUERY_STRING'];
		$arr = $this -> pembayaran_model -> __get_suggestion();
		
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
