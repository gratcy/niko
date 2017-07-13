<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> library('branch/branch_lib');
		$this -> load -> library('sales/sales_lib');
		$this -> load -> model('komisi_model');
		$this -> load -> library('customers/customers_lib');
	}

	
	function index() {
			if(!isset($_GET['search'])){ $_GET['search']=0;}
            
			
			if($_POST){
				//print_r($_POST);
			if(!isset($_POST['xcl'])){ $_POST['xcl']="";}
			if(!isset($_POST['sid'])){ $_POST['sid']="";}
			if(!isset($_POST['monthh'])){ $_POST['monthh']=0;}
			if(!isset($_POST['years'])){ $_POST['years']=0;}
			//print_r($_POST);
				$sid=$_POST['sid'];
				$monthh=$_POST['monthh'];
				$years=$_POST['years'];
				
				$dz=cal_days_in_month(CAL_GREGORIAN,$monthh,$years);

				$datea=$years.'-'.$monthh.'-01';
				$dateb=$years.'-'.$monthh.'-'.$dz;
				//echo $datea.'---'.$dateb.'<br>';die;
				$my=$monthh.'/'.$years;
				
				$view['starget'] = $this -> komisi_model -> __get_sales_target($sid,$my);
				$view['totinv'] = $this -> komisi_model -> __get_tot_inv($sid,$datea,$dateb);
				$view['komisi'] = $this -> komisi_model -> __get_komisi_selheader($sid,$datea,$dateb);
				$view['tretur'] = $this -> komisi_model -> __get_komisi_retur($sid,$datea,$dateb);
				//print_r($view['tretur']);
				
			}else{	
				$pager = $this -> pagination_lib -> pagination($this -> komisi_model -> __get_komisi_all_page(),3,5,site_url('komisi/home/index/'));
				if($_GET['search']=='1'){
					$view['komisi'] = $this -> komisi_model -> __get_komisi_search();	
				}else{			
					//$view['komisi'] = $this -> pagination_lib -> paginate();
					$view['komisi'] = $this -> komisi_model -> __get_komisi_header();
				}				
				
			}
		//$view['pages'] = $this -> pagination_lib -> pages();	
		$view['keyword'] = '';
		 
		//$this->load->view('komisi', $view);
		

		if($_POST['xcl']=='Excel'){ 
		 
			$this->load->view('komisi', $view,FALSE);
		
		}else{
			$this->load->view('komisi', $view);
		}
		
	}
	
	function komisi_detail() {
			if(!isset($_GET['search'])){ $_GET['search']=0;}
			if(!isset($_GET['no_invoice'])){ $_GET['no_invoice']="";}
			$pager = $this -> pagination_lib -> pagination($this -> komisi_model -> __get_komisi_all_page(),3,5,site_url('komisi/home/index/'));
			if($_GET['search']=='1'){
			$view['komisi'] = $this -> komisi_model -> __get_komisi_search();	
			}else{			
			//$view['komisi'] = $this -> pagination_lib -> paginate();
			$view['komisi_h'] = $this -> komisi_model -> __get_komisi_header();
			$view['komisi'] = $this -> komisi_model -> __get_komisi_all();
			}				
			

		//$view['pages'] = $this -> pagination_lib -> pages();	
		$view['keyword'] = '';
		 
		$this->load->view('komisi_detail', $view);
		
	}	
	
	function add_komisi($pno_pm) {

		$zz=$this -> komisi_model -> __get_komisi_zz($pno_pm);
		
		$persenn=0;
		$typer="";
		$comm=0;
		$i=0; //die;
		foreach( $zz  as $k=>$v ){  
		$i++;
			$pcid = $v -> pcid;		
			$cid = $v -> ccidd;			
			$lmt=0;
			$uncid=unserialize($cid);
			$par=array('0','0','0','0','0');
			if($pcid>0){
			$par=$uncid[$pcid];

			
			if($v -> stypepay=="cash"){
				$lmt=$par['3'];
			}elseif($v -> stypepay=="credit"){
				$lmt=$par['4'];
			}
			
		 }else{
			 $lmt=0;
				
			}
			//}
			//die;
					
		//$denda= -0.175;
		$denda= $par['2'];		
		if($v -> catname == 'NC'){
			if($v -> stypepay == "cash"){
				$persenn= $par['0'];
				$dur=$v -> days - $lmt;
				if($dur<1){
					$typer="A1";
					$comm=$v -> tamount*$persenn /100;
				}elseif($dur>0 AND $dur <= 5){
					$typer="A2";
					$comm=$v -> tamount* ($persenn /100)*0.5;
				}elseif($dur>5 AND $dur <= 10){
					$typer="A3";
					$comm=0;
				}else if($dur>10){
					$typer="A4";
					$comm=$v -> tamount*$denda /100;
				}
			}elseif($v -> stypepay == "credit"){
				$persenn= $par['1'];
				$dur=$v -> days - $lmt;
			    if($dur < 1){
					$typer="B1";
					$comm=$v -> tamount*$persenn /100;
				}elseif($dur>0 AND $dur <= 5){
					$typer="B2";
					$comm=$v -> tamount* ($persenn /100)*0.5;
				}elseif($dur>5 AND $dur <= 10){
					$typer="B3";
					$comm=0;
				}else if($dur > 10){
					$typer="B4";
					$comm=$v -> tamount*$denda /100;
				}
			}elseif($v -> stypepay == "denda"){
				$persenn= $par['2'];
			}
		}elseif($v -> catname == 'K1'){
			if($v -> stypepay == "cash"){
				$persenn= $par['0'];
				$dur=$v -> days - $lmt;
			    if($dur<1){
					$typer="A1";
					$comm=$v -> tamount*$persenn /100;
				}elseif($dur>0 AND $dur <= 5){
					$typer="A2";
					$comm=$v -> tamount* ($persenn /100)*0.5;					
				}elseif($dur>5 AND $dur <= 10){
					$typer="A3";
					$comm=0;
				}elseif($dur>10){
					$typer="A4";
					$comm=$v -> tamount*$denda /100;
				}
			}elseif($v -> stypepay == "credit"){
				$persenn= $par['1'];
			    $dur=$v -> days - $lmt;
			    if($dur>15){
					$typer="B4";
					$comm=$v -> tamount*$denda /100;
				}elseif($dur>5 AND $dur <= 15){
					$typer="B3";
					$comm=0;
				}elseif($dur>0 AND $dur <= 5){
					$typer="B2";
					$comm=$v -> tamount*($persenn /100) * 0.5;
				}elseif($dur < 1){
					$typer="B1";
					$comm=$v -> tamount*$persenn /100;
				}
			}elseif($v -> stypepay == "denda"){
				$persenn= $par['2'];
			}			
		}elseif($v -> catname == 'K2'){
			if($v -> stypepay == "cash"){
				$persenn= $par['0'];
				$dur=$v -> days - $lmt;
			    if($dur>10){
					$typer="A4";
					$comm=$v -> tamount*$denda /100;
				}elseif($dur>5 AND $dur <= 10){
					$typer="A3";
					$comm=0;
				}elseif($dur<1){
					$typer="A1";
					$comm=$v -> tamount*$persenn /100;
				}elseif($dur<=5 AND $dur > 0){
					$typer="A2";
					$comm=$v -> tamount* ($persenn /100)*0.5;					
				}
			}elseif($v -> stypepay == "credit"){
				$persenn= $par['1'];
				$dur=$v -> days - $lmt;
			    if($dur>15){
					$typer="B4";
					$comm=$v -> tamount*$denda /100;
				}elseif($dur>5 AND $dur <= 15){
					$typer="B3";
					$comm=0;
				}elseif($dur>0 AND $dur <= 5){
					$typer="B2";
					$comm=$v -> tamount*($persenn /100) * 0.5;
				}else if($dur < 1){
					$typer="B1";
					$comm=$v -> tamount*$persenn /100;
				}			
			}elseif($v -> stypepay == "denda"){
				$persenn= $par['2'];
			}			
		}	

		elseif($v -> catname == 'SP'){
			if($v -> stypepay == "cash"){
				$persenn= $par['0'];
				$dur=$v -> days - $lmt;
			    if($dur<1){
					$typer="A1";
					$comm=$v -> tamount*$persenn /100;
				}elseif($dur>0 AND $dur <= 5){
					$typer="A2";
					$comm=$v -> tamount* ($persenn /100)*0.5;					
				}elseif($dur>5 AND $dur <= 10){
					$typer="A3";
					$comm=0;
				}elseif($dur>10){
					$typer="A4";
					$comm=$v -> tamount*$denda /100;
				}
			}elseif($v -> stypepay == "credit"){
				$persenn= $par['1'];
			    $dur=$v -> days - $lmt;
			    if($dur>15){
					$typer="B4";
					$comm=$v -> tamount*$denda /100;
				}elseif($dur>5 AND $dur <= 15){
					$typer="B3";
					$comm=0;
				}elseif($dur>0 AND $dur <= 5){
					$typer="B2";
					$comm=$v -> tamount*($persenn /100) * 0.5;
				}elseif($dur < 1){
					$typer="B1";
					$comm=$v -> tamount*$persenn /100;
				}
			}elseif($v -> stypepay == "denda"){
				$persenn= $par['2'];
			}			
		}

		elseif($v -> catname == 'OEM'){
			if($v -> stypepay == "cash"){
				$persenn= $par['0'];
				$dur=$v -> days - $lmt;
			    if($dur<1){
					$typer="A1";
					$comm=$v -> tamount*$persenn /100;
				}elseif($dur>0 ){
					$typer="A3";
					$comm=0;
				}
			}elseif($v -> stypepay == "credit"){
				$persenn= $par['1'];
			    $dur=$v -> days - $lmt;
			    if($dur > 0 ){
					$typer="B3";
					$comm=0;
				}elseif($dur < 1){
					$typer="B1";
					$comm=$v -> tamount*$persenn /100;
				}
			}elseif($v -> stypepay == "denda"){
				$persenn= $par['2'];
			}			
		}
		





		
		//echo "<table>";
		if($v -> sname!=""){

		echo $v->tdisc;
		
		
		$arr = array(
					'did' => $v -> did, 
					'sssid' => $v -> sssid, 
					'pno_pm' => $v -> pno_pm, 
					'scid'=> $v -> scid,
					'spid' => $v -> spid, 
					'pcid' => $v -> pcid, 
					'pcode' => $v -> pcode, 
					'p_amount' => $v -> tamount,
					'sno_invoice'=>$v -> sno_invoice,
					'date_inv'=> $v -> stgl_invoice,
					'date_lunas'=> $v -> sdate_lunas,
					'date_bayar'=> $v -> sdate_pay,
					'duration'=> $v -> days,
					'kategori'=> $v -> catname,
					'type_bayar'=> $v -> stypepay,
					'persen'=>$persenn,
					'limit'=>$lmt,
					'type_com'=>$typer,
					'amount_com'=>$comm
					);	
		
		$this -> komisi_model ->  __insert_komisi($arr);
		
		}  
 
	} 
							

		
		//$yy=$this -> komisi_model -> __get_komisi_yy($zz);
		// $view['tes']=$zz;
	
		// $this->load->view('pembayaran', $view);
		
		redirect('/pembayaran/home');
	}

	function komisi_header() {

		//$pager = $this -> pagination_lib -> pagination($this -> komisi_model -> __get_komisi_header(),3,10,site_url('komisi'));
		//$view['komisi'] = $this -> pagination_lib -> paginate();
		//$view['komisi'] = $this -> komisi_model -> __get_komisi();
		$view['komisi_all'] = $this -> komisi_model -> __get_komisi_header();
		//$view['pages'] = $this -> pagination_lib -> pages();		
		$this->load->view('komisi_header', $view);
	}
	
}
		
?>