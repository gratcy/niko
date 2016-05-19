<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> library('branch/branch_lib');
		$this -> load -> library('sales/sales_lib');
		$this -> load -> library('products/products_lib');
		$this -> load -> model('pembayaran/pembayaran_model');
		$this -> load -> model('pembayaran_detail_model');
		$this -> load -> model('purchase_order/purchase_order_model');
		$this -> load -> model('purchase_order_detail/purchase_order_detail_model');	
		$this -> load -> model('customers/customers_model');
		$this -> load -> model('retur_order_detail/retur_order_detail_model');
		$this -> load -> model('retur_order/retur_order_model');
	}

	function index() {
		//echo "xx";die;
		// $pager = $this -> pagination_lib -> pagination($this -> pembayaran_detail_model -> __get_pembayaran_detail(),3,10,site_url('pembayaran_detail'));
		// $view['pembayaran_detail'] = $this -> pagination_lib -> paginate();
		// $view['pages'] = $this -> pagination_lib -> pages();
		$this->load->view('pembayaran_detail', $view);
	}

//----BEGIN SO

	function pembayaran_details($id,$scid) {
	if(!isset($_POST['approve'])){$_POST['approve']="";}
		if($_POST['approve']=='1'){
			$id=$this -> input -> post('id', TRUE);
			$arr=array('sstatus' => '3');
			$this -> pembayaran_model -> __update_pembayaran($id, $arr);
			
			   $scid=$_POST['scid'];
				$limit=$_POST['sisaplafon_after'];
				$arrl = array('climit' => $limit);
					$this -> customers_model -> __update_customers($scid, $arrl);			
		
		}
			$view['id'] = $id;
			$view['scid'] = $scid;
			$view['detailx'] = $this -> pembayaran_model -> __get_pembayaran_detail($id);			
			$view['detail'] =$this -> pembayaran_detail_model -> __get_pembayaran_detail_prod($id);						
			$view['pbid'] = $this -> branch_lib -> __get_branch();
			$view['psid'] = $this -> sales_lib -> __get_sales();
			$view['pppid'] = $this -> products_lib -> __get_products();	
	
			$this->load->view('pembayaran_details',$view);
	}

	function pembayaran_report($id,$scid) {
			$view['id'] = $id;
			$view['scid'] = $scid;
			$view['detailx'] = $this -> pembayaran_model -> __get_pembayaran_detail($id);
			$view['detail'] =$this -> pembayaran_detail_model -> __get_pembayaran_detail_prod($id);						
			$view['pbid'] = $this -> branch_lib -> __get_branch();
			$view['psid'] = $this -> sales_lib -> __get_sales();
			$view['pppid'] = $this -> products_lib -> __get_products();	
	
			$this->load->view('pembayaran_report',$view,FALSE);
	}	

	function pembayaran_update($pmid,$scid,$pno_pm,$type_pay,$harga,$piutang,$noinv) {
		$kurang_bayar=$piutang-$harga;
		$datebyr=date('Y-m-d');
	$arz=array('kurang_bayar'=>	$kurang_bayar);
	$arp=array('status_bayar'=>3,'tgl_bayar'=>$datebyr,'pm_tgl'=>$datebyr);
					if ($this -> pembayaran_detail_model -> __update_pembayaranx($pmid,$arp)) {	
					$this -> pembayaran_detail_model -> __update_invoicez($noinv,$arz);
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
					$sdate_lunas=date('Y-m-d');	
				
			redirect(site_url('pembayaran_detail/home/pembayaran_detail_addz/'.$scid.'/'.$pno_pm.'/'.$type_pay));					
					}	
	}
	
	function pembayaran_detail_add($scid,$pno_pm) {

		if ($_POST) {

			
			// $totinv=$_POST['a'][0];
			// $totret=$_POST['c'][0];
			// $tottag=$totinv-$totret;

			if(!isset($_POST['b'])){ 
				$_POST['b']="";$jum=0;
				$jumr=count($_POST['d']);
				for($t=0;$t<$jumr;$t++){	
					$snoro = $_POST['d'][$t];
					$arrr = array('status_potong' => '1' ,'pno_pm'=>$pno_pm);	
				$this -> pembayaran_detail_model -> __update_ro($snoro,$scid, $arrr);
				}
			}else{
				$jum=count($_POST['b']);
			}
			for($j=0;$j<$jum;$j++){		
				$snoinv = $_POST['b'][$j];
				$snoro = $_POST['d'][$j];
	
				$sdate_pay=date('Y-m-d');			
						$arr = array('sdate_pay' => $sdate_pay,'pno_pm'=>$pno_pm );	
						$arrr = array('status_potong' => '1' ,'pno_pm'=>$pno_pm);						
						$this -> pembayaran_detail_model -> __update_invoice($snoinv, $arr);
						$this -> pembayaran_detail_model -> __update_ro($snoro,$scid, $arrr);
					
			}
			if($_POST['tglgiro']<>""){
				$ptgl_giro=explode("/",$_POST['tglgiro']);
				
				$pgirox="$ptgl_giro[2]-$ptgl_giro[1]-$ptgl_giro[0]";
				}else{
					$pgirox="";
				}

				//$no_invoice=$_POST['b'][0];
				$piutang=$_POST['totalz'];
				
				//echo $piutang;die;
				$custompaid=str_replace(',','',$_POST['custompaid']);
				$pwrite_off="";
				$kurang_bayar=str_replace(',','',$_POST['totalsisa']);
				$pm=0;
				$ptype=array('cash','transfer','Giro',$custompaid);
				//print_r($_POST);
		        $jumpay=count($_POST['payment']);
				//echo $jumpay;die;
				for($p=0;$p<$jumpay;$p++){
					
				$pamount=$_POST['payment'][$p];
				$pm=$pm+$pamount;
				$ard = array( 'pmdid'=>'','pno_pm' => $pno_pm,  
					'pm_tgl'=>'','ptype'=>$ptype[$p],'ptgl_trans'=>'',
					'pgirono'=>'','ptgl_giro'=>$pgirox,'pgiroacc'=>'',
					'pbank'=>'','pbankacc'=>'','prek'=>'','prekto'=>'',
					'pamount' => $pamount,'pwrite_off'=>'','pstatus'=>'1');	
				//print_r($ard);die;	
				if($pamount>0){
					$this -> pembayaran_detail_model -> __insert_pembayaran_detail($ard);
				}
				}		
					$suminv=$this -> pembayaran_detail_model -> __sum_inv($pno_pm);
					$sumret=$this -> pembayaran_detail_model -> __sum_ret($pno_pm);
					$sinv=$suminv[0]->tamount;
					$sret=$sumret[0]->sprice;
					
					$this -> pembayaran_detail_model -> __update_terima_ro($pno_pm, $sret,$scid);
					
				$sumpending=$this -> pembayaran_detail_model -> __sum_bayar_pending($pno_pm);
				$sumterima=$this -> pembayaran_detail_model -> __sum_bayar_terima($pno_pm);
				
				$spending=$sumpending[0]->spamount;
				$sterima=$sumterima[0]->spamount;
				
				$arp = array( 'ptotal_inv'=>$sinv,'ptotal_retur'=>$sret,'ptotal_tagihan'=>$piutang,
				'ptotal_terima'=>$sterima,'ptotal_pending'=>$spending,'pstatus'=>'1','pnote'=>'');					
				//print_r($arp);die;
				$this -> pembayaran_model -> __update_pembayaran($pno_pm, $arp);				
				redirect(site_url('pembayaran_detail/home/pembayaran_detail_addz/'.$scid.'/'.$pno_pm));
		}
		else {
		
			$view['scid'] = $scid;
			$view['pno_pm'] = $pno_pm;			
			$view['inv']=$this -> pembayaran_detail_model ->__get_pembayaran_inv($pno_pm);
			$view['ro']=$this -> pembayaran_detail_model ->__get_pembayaran_ro($pno_pm);
			$view['detailx'] = $this -> pembayaran_model -> __get_pembayaran_detail($pno_pm);
			$view['pembayaran'] = $this -> pembayaran_detail_model -> __get_pembayaran_detail($pno_pm);
			$view['potongan'] = $this -> pembayaran_detail_model -> __get_potongan($scid);
			$view['detail'] =$this -> pembayaran_detail_model -> __get_pembayaran_detail_inv($scid,$pno_pm);
			$view['detailr'] =$this -> retur_order_detail_model -> __get_retur_order_detail_by_cust($scid);
			$view['pbid'] = $this -> branch_lib -> __get_branch();
			$view['psid'] = $this -> sales_lib -> __get_sales();
			$view['pppid'] = $this -> products_lib -> __get_products();	

			$this->load->view('pembayaran_detail_add',$view);
		}
	}
	
	
function pembayaran_lunas($scid,$pno_pm) {
	$scid=$_POST['scid'];
	$tots=$_POST['tots'];
	//echo $_POST['sisaz'];
	if($_POST['sisaz']>0){
		__set_error_msg(array('info' => 'Pelunasan gagal, Sisa tagihan masih ada'));//die;
redirect(site_url('pembayaran_detail/home/pembayaran_detail_addz/'.$scid.'/'.$pno_pm));		
	}
	
$this -> pembayaran_detail_model -> __bayar_lunas($pno_pm,$tots,$scid);//die;

redirect(site_url('pembayaran/home'));
}
function pembayaran_detail_addz($scid,$pno_pm) {
//PNO_PM di DETAIL == PMID pembayaran_tab
		if($_POST) {
		//echo $scid;die;	
			if(!isset($_POST['rekto'])){$_POST['rekto']="";}
			if(!isset($_POST['accgiro'])){$_POST['accgiro']="";}
			if(!isset($_POST['nogiro'])){$_POST['nogiro']="";}		
			$pmid=$_POST['id'];			
			$rekto=$_POST['rekto'];
			$accgiro=$_POST['accgiro'];
			$nogiro=$_POST['nogiro'];
			if(!isset($_POST['date_transfer'])){$_POST['date_transfer']="";}
			if($_POST['date_transfer']!=""){
			$date_tr=explode("/",$_POST['date_transfer']);
			$date_trans=$date_tr[2].'-'.$date_tr[1].'-'.$date_tr[0];
			}else{
				$date_trans="";
			}
			
			
			if($_POST['date_cash']!=""){
			$date_cs=explode("/",$_POST['date_cash']);
			$date_cash=$date_cs[2].'-'.$date_cs[1].'-'.$date_cs[0];
			}else{
				$date_cash="";
			}
			if($_POST['date_custom']!=""){
			$date_cst=explode("/",$_POST['date_custom']);
			$date_custom=$date_cst[2].'-'.$date_cst[1].'-'.$date_cst[0];
			}else{
				$date_custom="";
			}
			
			
			
			
			
			
			
			
			// $totinv=$_POST['a'][0];
			// $totret=$_POST['c'][0];
			// $tottag=$totinv-$totret;

			if(!isset($_POST['b'])){ 
				$_POST['b']="";$jum=0;
				//$this -> pembayaran_detail_model -> __update_limit($snoro,$scid, $arrr);				
				//}
			}else{
				$jum=count($_POST['b']);						
				for($j=0;$j<$jum;$j++){				
					$snoinv = $_POST['b'][$j];	
					$sdate_pay=date('Y-m-d');			
					$arr = array('sdate_pay' => $sdate_pay,'pno_pm'=>$pno_pm );	
					$this -> pembayaran_detail_model -> __update_invoice($snoinv, $arr);
				}

				

			}
			

				// $jumr=count($_POST['d']);
				// for($t=0;$t<$jumr;$t++){	
					// $snoro = $_POST['d'][$t];
					// $arrr = array('status_potong' => '1' ,'pno_pm'=>$pno_pm);	
				// $this -> pembayaran_detail_model -> __update_ro($snoro,$scid, $arrr);			
			
			if(!isset($_POST['d'])){$_POST['d']="";}
			$jumd=count($_POST['d']);			
			for($g=0;$g<$jumd;$g++){	
			if(!isset($_POST['d'][$g])){$_POST['d'][$g]="";}	
				$snoro = $_POST['d'][$g];		
						$arrr = array('status_potong' => '1' ,'pno_pm'=>$pno_pm);	
echo $snoro;						
						$this -> pembayaran_detail_model -> __update_ro($snoro,$scid, $arrr);
					
			}			
		
			
			
			//die;
			
			
			
			
			
			
			if($_POST['tglgiro']<>""){
				$ptgl_giro=explode("/",$_POST['tglgiro']);
				
				$pgirox="$ptgl_giro[2]-$ptgl_giro[1]-$ptgl_giro[0]";
				}else{
					$pgirox="";
				}

				//$no_invoice=$_POST['b'][0];
				$piutang=$_POST['totalz'];
				
				//echo $piutang;die;
				if(!isset($_POST['custompaid'])){$_POST['custompaid']="";}
				$custompaid=str_replace(',','',$_POST['custompaid']);
				$pwrite_off="";
				$kurang_bayar=str_replace(',','',$_POST['totalsisa']);
				$pm=0;
				$ptype=array('cash','transfer','giro',$custompaid);
				//print_r($_POST);
		        $jumpay=count($_POST['payment']);
				//echo $jumpay;die;
				for($p=0;$p<4;$p++){


					$nogirox=$nogiro;
					$pgiroxx=$pgirox;
					$accgirox=$accgiro;
					$date_transx=$date_trans;
					$rektox=$rekto;

				
				$pamount=str_replace(',','',$_POST['payment'][$p]);
				//echo $ptype[$p].'-'.$p.'-'.$pamount.'<br>';
				if(($pamount!=0) or ($pamount!='')){
					//echo $ptype[$p];
					if($p==0){ 
					$nogirox="";
					$pgiroxx="";
					$accgirox="";
					$date_transx="";
					$rektox="";
					$date_custom="";
					}elseif($p==1){ 
					$nogirox="";
					$pgiroxx="";
					$accgirox="";
					$date_cash="";
					$date_custom="";					
					// $date_trans="";
					// $rekto="";
					}elseif($p==2){ 
					// $nogiro="";
					// $pgirox="";
					// $accgiro="";
					$date_transx="";
					$rektox="";
					$date_cash="";
					$date_custom="";
					}elseif($p==3){ 
					$nogirox="";
					$pgiroxx="";
					$accgirox="";
					$date_transx="";
					$rektox="";
					$date_cash="";					
					}
				$pm=$pm+$pamount;
				// if($date_transx="0000-00-00"){$date_transx="";}
				// if($pgiroxx="0000-00-00"){$pgiroxx="";}
				//PNO_PM = PMID dr tabel pembayaran_tab
				$pmtgll=str_replace('0000-00-00','',$pgiroxx.$date_transx.$date_custom.$date_cash);
				//if($pmtgll==""){$pmtgll=date('Y-m-d');}
				echo $pmtgll.'<br>';
				//die;
				$ard = array( 'pmdid'=>'','pno_pm' => $pmid,  
					'pm_tgl'=>$pmtgll,'ptype'=>$ptype[$p],'ptgl_trans'=>$date_transx,
					'pgirono'=>$nogirox,'ptgl_giro'=>$pgiroxx,'pgiroacc'=>$accgirox,
					'pbank'=>'','pbankacc'=>'','prek'=>'','prekto'=>$rektox,
					'pamount' => $pamount,'pwrite_off'=>'','pstatus'=>'1');	
					//print_r($ard);die;
				if($pamount>0){
					$this -> pembayaran_detail_model -> __insert_pembayaran_detail($ard);
				}
				}
				}
				//die;

//die;				
					$suminv=$this -> pembayaran_detail_model -> __sum_inv($pno_pm);
					$sumret=$this -> pembayaran_detail_model -> __sum_ret($pno_pm);
					
					//print_r($sumret);
					$sinv=$suminv[0]->tamount;
					$sret=$sumret[0]->sprice;
					$this -> pembayaran_detail_model -> __update_terima_ro($pno_pm, $sret,$scid);
				$sumpending=$this -> pembayaran_detail_model -> __sum_bayar_pending($pno_pm);
				$sumterima=$this -> pembayaran_detail_model -> __sum_bayar_terima($pno_pm);
				
				$spending=$sumpending[0]->spamount;
				$sterima=$sumterima[0]->spamount;
				
				$arp = array( 'ptotal_inv'=>$sinv,'ptotal_retur'=>$sret,'ptotal_tagihan'=>$piutang,
				'ptotal_terima'=>$sterima,'ptotal_pending'=>$spending,'pstatus'=>'1','pnote'=>'');					
				echo '<pre>';
				//print_r($arp);die;
				$this -> pembayaran_model -> __update_pembayaran($pno_pm, $arp);				
				redirect(site_url('pembayaran_detail/home/pembayaran_detail_addz/'.$scid.'/'.$pno_pm));
		}
		else {
		// echo "$scid";die;
		
			$view['scid'] = $scid;
			$view['pno_pm'] = $pno_pm;			
			$view['inv']=$this -> pembayaran_detail_model ->__get_pembayaran_inv($pno_pm);
			$view['ro']=$this -> pembayaran_detail_model ->__get_pembayaran_ro($pno_pm);
			//echo "$scid";die;
			$view['detailx'] = $this -> pembayaran_model -> __get_pembayaran_detaila($pno_pm,$scid);
			
			$pmidx= $view['detailx'][0]->pmid;
			
			$view['pembayaran'] = $this -> pembayaran_detail_model -> __get_pembayaran_detail($pmidx);
			$view['potongan'] = $this -> pembayaran_detail_model -> __get_potongan($scid);
			$view['detail'] =$this -> pembayaran_detail_model -> __get_pembayaran_detail_inv($scid,$pno_pm);
			$view['detailr'] =$this -> retur_order_detail_model -> __get_retur_order_detail_by_cust($scid);
			$view['detailrr'] =$this -> retur_order_model -> __get_retur_order_by_pno_pm($pno_pm,$scid);			
			$view['pbid'] = $this -> branch_lib -> __get_branch();
			$view['psid'] = $this -> sales_lib -> __get_sales();
			$view['pppid'] = $this -> products_lib -> __get_products();	

			$this->load->view('pembayaran_detail_addz',$view);
		}
	}	
	
	
function pembayaran_terima($pmid,$cid,$pmdid,$amount,$pno_pm){
	$this -> pembayaran_detail_model -> __update_terima($pmid, $amount,$cid);
	$ar=array('pstatus'=>3);
	if($this -> pembayaran_detail_model -> __update_statd($pmdid, $ar)){
		//home/pembayaran_detail_add/2/1
		__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('pembayaran_detail/home/pembayaran_detail_addz/'.$cid.'/'.$pno_pm));
	}
}
	function pembayaran_detail_update($id,$scid) {

		if ($_POST) {
	
			$ssid = $this -> input -> post('ssid', TRUE);
			$spid = $this -> input -> post('spid', TRUE);			
			$id = (int) $this -> input -> post('id');
			
			if ($id) {

					$arr = array('ssid' => $ssid, 'spid' => $spid );						
					if ($this -> pembayaran_detail_model -> __update_pembayaran_detail($id, $arr)) {	
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('pembayaran_detail/home'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('pembayaran_detail/home'));
					}				
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('pembayaran_detail/home'));
			}
		}
		else {
			$view['id'] = $id;
			$view['scid'] = $scid;
			$view['detailx'] = $this -> pembayaran_model -> __get_pembayaran_detail($id);
			$view['detail'] =$this -> pembayaran_detail_model -> __get_pembayaran_detail_prod($id);						
			$view['pbid'] = $this -> branch_lib -> __get_branch();
			$view['psid'] = $this -> sales_lib -> __get_sales();
			$view['pppid'] = $this -> products_lib -> __get_products();	
			
			$this->load->view('pembayaran_detail_update',$view);
		}
	}
	
	function pembayaran_detail_delete($id,$sid,$scid) {
		if ($this -> pembayaran_detail_model -> __delete_pembayaran_detail($id)) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('pembayaran_detail/home/pembayaran_detail_addz/'.$sid.'/'.$scid));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('pembayaran_detail'));
		}
	}

//----END SO----

	function sourcex($scid) {
		$view['hostname']=$this->db->hostname;
		$view['username']=$this->db->username;
		$view['password']=$this->db->password;
		$view['database']=$this->db->database;
		$view['scid']=$scid;
		$this->load->view('sourcex',$view,FALSE);
	}
//---BEGIN DO-----	
	
	function delivery_order($id,$scid) {
		if ($_POST) {
		    $sid = $this -> input -> post('id', TRUE);
			$scid = $this -> input -> post('scid', TRUE);
			$snodo = $this -> input -> post('snodo', TRUE);
			$snopol = $this -> input -> post('snopol', TRUE);
			$stgldos = $this -> input -> post('stgldo', TRUE);		
			$stgldox = explode("/",$stgldos);			
			$stgldo="$stgldox[2]-$stgldox[1]-$stgldox[0]";				
			$snomor = $this -> input -> post('snomor', TRUE);

					$arr = array('sid' => $sid, 'scid' => $scid, 'scid' => $snodo, 
					'snodo' => $scid, 'snopol' => $snopol, 'stgldo' => $stgldo, 'snomor' => $snomor	);						
					if ($this -> pembayaran_detail_model ->__update_delivery_order($sid, $arr)) {	
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('pembayaran_detail/home/delivery_order_details/'. $sid . '/' . $scid));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('pembayaran_detail/home/pembayaran_details/'. $sid . '/' . $scid));
					}

		}
		else {
		
			$view['id'] = $id;
			$view['scid'] = $scid;
			$view['detailx'] = $this -> pembayaran_model -> __get_pembayaran_detail($id);
			$view['detail'] =$this -> pembayaran_detail_model -> __get_pembayaran_detail_prod($id);						
			$view['pbid'] = $this -> branch_lib -> __get_branch();
			$view['psid'] = $this -> sales_lib -> __get_sales();
			$view['pppid'] = $this -> products_lib -> __get_products();	
			
			$this->load->view('delivery_order',$view);
		}
	}
	
	
	function delivery_order_add($id,$scid) {
		if ($_POST) {

		    $sid = $this -> input -> post('id', TRUE);
			$scid = $this -> input -> post('scid', TRUE);
			$snodo = $this -> input -> post('snodo', TRUE);
			$snopol = $this -> input -> post('snopol', TRUE);
			$stgldos = $this -> input -> post('stgldo', TRUE);
			$driver = $this -> input -> post('driver', TRUE);			
			$stgldox = explode("/",$stgldos);			
			$stgldo="$stgldox[2]-$stgldox[1]-$stgldox[0]";
			$snomor = $this -> input -> post('snomor', TRUE);
			
					$arr = array('sid' => 0, 'ssid' => $id, 'spid' => 0, 'sqty' => 0, 
					'snodo' => $snodo, 'snopol' => $snopol, 'stgldo' => $stgldo, 'snomor' => $snomor,'driver'=>$driver,'dstatus'=>1	);						
					if ($this -> pembayaran_detail_model -> __insert_delivery_order_detail($arr)) {
						__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
						redirect(site_url('pembayaran_detail/home/delivery_order_details_add/'. $id .'/'. $scid .'/'.$snodo));
					}
					else {
						__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
						redirect(site_url('pembayaran_detail/home/delivery_order_add/'. $id .'/'. $scid .''));
					}

		}
		else {
		
			$view['id'] = $id;
			$view['scid'] = $scid;
			$view['detailx'] = $this -> pembayaran_model -> __get_pembayaran_detail($id);
			$view['detail'] =$this -> pembayaran_detail_model -> __get_pembayaran_detail_prod($id);						
			$view['pbid'] = $this -> branch_lib -> __get_branch();
			$view['psid'] = $this -> sales_lib -> __get_sales();
			$view['pppid'] = $this -> products_lib -> __get_products();				
			$this->load->view('delivery_order_add',$view);
		}
	}
	

	
	
function invoice_order_add($id,$scid,$snodo) {
		if ($_POST) {

		
			$scid = $scid;
			$snodo = $snodo;
			$sno_invoice = $this -> input -> post('sno_invoice', TRUE);
			$stgl_invoicex = $this -> input -> post('stgl_invoice', TRUE);
			$stgl_invoice=date('Y-m-d',strtotime($stgl_invoicex));
			$sduedate_invoice = $this -> input -> post('stgl_invoice', TRUE);



					$arr = array('sno_invoice' => $sno_invoice, 'stgl_invoice' => $stgl_invoice,
					'sduedate_invoice' => $sduedate_invoice	);						
					if ($this -> pembayaran_detail_model -> __update_invoice_order($snodo,$arr)) {
						__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
						redirect(site_url('pembayaran_detail/home/invoice_report/'. $id .'/'. $scid .'/'.$snodo));
					}
					else {
						__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
						redirect(site_url('invoice/home/invoice_order_add/'. $id .'/'. $scid .''));
					}

		}
		else {
		
			$view['id'] = $id;
			$view['scid'] = $scid;
			$view['snodo'] = $snodo;
			$view['detailx'] = $this -> pembayaran_detail_model -> __get_delivery_order_detail($id,$snodo);
			$view['detail'] =$this -> pembayaran_detail_model -> __get_pembayaran_detail_prod($id);						
			$view['pbid'] = $this -> branch_lib -> __get_branch();
			$view['psid'] = $this -> sales_lib -> __get_sales();
			$view['pppid'] = $this -> products_lib -> __get_products();	
	
			$this->load->view('invoice_order_details_add',$view);
		}
	}	
	
	
	
	function delivery_order_details_add($id,$scid,$snodo) {
		if ($_POST) {
		
			$sbid = $this -> input -> post('sbid', TRUE);
			$scid = $this -> input -> post('scid', TRUE);
			$snodo = $this -> input -> post('snodo', TRUE);
			$snopol = $this -> input -> post('snopol', TRUE);
			$stgldos = $this -> input -> post('stgldo', TRUE);			
			$stgldox = explode("/",$stgldos);			
			$stgldo="$stgldox[2]-$stgldox[1]-$stgldox[0]";				
			$snomor = $this -> input -> post('snomor', TRUE);		
			$jum=count($_POST['sqty']);

		for($j=0;$j<$jum;$j++){		
			$sid = $_POST['sid'][$j];
			$spid = $_POST['spid'][$j];
			$qty = $_POST['qty'][$j];
			$sqty =$_POST['sqty'][$j];			
			$ssisa=$qty-$sqty;
			
//echo "$qty - $sqty - $ssisa";//die;

					$arrdo=array('dstatus'=>3);
					$arrqty = array('ssisa' => $ssisa);
					$arr = array('sid' => $sid,'ssid' => $id,'spid' => $spid,  'sqty' => $sqty,
					'snodo' => $snodo, 'snopol' => $snopol, 'stgldo' => $stgldo, 'snomor' => $snomor,dstatus=>3	);	
					if ($this -> pembayaran_detail_model ->__update_do_status($snodo,$arrdo)) {
						$this -> pembayaran_detail_model ->__update_pembayaran_detail($sid,$arrqty);
						$arrx = array('ibid' => $sbid, 'iiid' => $spid, 'itype' => 1, 'istockbegining' => '', 'istockin' => '', 'istockout' => $sqty, 'istock' => '', 'istatus' => 1 );
						$this -> pembayaran_detail_model -> __insert_inventory($arrx);						
					}
					else {
						__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
						redirect(site_url('pembayaran_detail/home/delivery_order_details_add/'. $id .'/'. $scid .''));
					}
			}		
						__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
						redirect(site_url('pembayaran_detail/home/delivery_order_details/'. $id .'/'. $scid .'/'.$snodo));	

		}
		else {
		
			$view['id'] = $id;
			$view['scid'] = $scid;
			$view['snodo'] = $snodo;
			$view['detailx'] = $this -> pembayaran_detail_model -> __get_delivery_order_detail($id,$snodo);
			$view['detail'] =$this -> pembayaran_detail_model -> __get_pembayaran_detail_prod($id);						
			$view['pbid'] = $this -> branch_lib -> __get_branch();
			$view['psid'] = $this -> sales_lib -> __get_sales();
			$view['pppid'] = $this -> products_lib -> __get_products();	
	
			$this->load->view('delivery_order_details_add',$view);
		}
	}


	function delivery_order_details_add_confirm($id,$scid,$snodo) {
		if ($_POST) {

		    $sbid = $this -> input -> post('sbid', TRUE);
			$scid = $this -> input -> post('scid', TRUE);
			$snodo = $this -> input -> post('snodo', TRUE);
			$snopol = $this -> input -> post('snopol', TRUE);
			$stgldos = $this -> input -> post('stgldo', TRUE);			
			$stgldox = explode("/",$stgldos);			
			$stgldo="$stgldox[2]-$stgldox[1]-$stgldox[0]";				
			$snomor = $this -> input -> post('snomor', TRUE);	
			$jum=count($_POST['sqty']);
			$this -> pembayaran_detail_model ->__del_do_item($snodo);	
		
			for($j=0;$j<$jum;$j++){		
				$sid = $_POST['sid'][$j];
				$spid = $_POST['spid'][$j];
				$qty = $_POST['qty'][$j];
				$sqty =$_POST['sqty'][$j];			
				$ssisa=$qty-$sqty;


						$arrdo=array('dstatus'=>1);
						//$arrqty = array('ssisa' => $ssisa);
						$arr = array('sid' => $sid,'ssid' => $id,'spid' => $spid,  'sqty' => $sqty,
						'snodo' => $snodo, 'snopol' => $snopol, 'stgldo' => $stgldo, 'snomor' => $snomor,'dstatus'=>1	);										
				if ($this -> pembayaran_detail_model -> __insert_delivery_order_detail($arr)) {
						$this -> pembayaran_detail_model ->__update_do_status($snodo,$arrdo);
						//$this -> pembayaran_detail_model ->__update_pembayaran_detail($sid,$arrqty);

						$arrx = array('ibid' => $sbid, 'iiid' => $spid, 'itype' => 1, 'istockbegining' => '', 'istockin' => '', 'istockout' => $sqty, 'istock' => '', 'istatus' => 1 );
						$this -> pembayaran_detail_model -> __insert_inventory($arrx);					
						
				}
				else {
							__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
							redirect(site_url('pembayaran_detail/home/delivery_order_details_add/'. $id .'/'. $scid .''));
				}
			}	//die;	
						__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
						redirect(site_url('pembayaran_detail/home/delivery_order_details/'. $id .'/'. $scid .'/'.$snodo));	

		}
		else {
		
			$view['id'] = $id;
			$view['scid'] = $scid;
			$view['snodo'] = $snodo;
			$view['detailx'] = $this -> pembayaran_detail_model -> __get_delivery_order_detail($id,$snodo);
			$view['detail'] =$this -> pembayaran_detail_model -> __get_pembayaran_detail_prod($id);						
			$view['pbid'] = $this -> branch_lib -> __get_branch();
			$view['psid'] = $this -> sales_lib -> __get_sales();
			$view['pppid'] = $this -> products_lib -> __get_products();	
	
			$this->load->view('delivery_order_details_add_confirm',$view);
		}
	}
	
	function delivery_order_details($id,$scid,$snodo) {
			$view['id'] = $id;
			$view['scid'] = $scid;
			$view['snodo'] = $snodo;
			$view['detailx'] = $this -> pembayaran_detail_model -> __get_delivery_order_detail($id,$snodo);
			$view['detail'] =$this -> pembayaran_detail_model -> __get_delivery_order_detail_prod($id,$snodo);	
			$view['details'] =$this -> pembayaran_detail_model -> __get_pembayaran_detail_prod($id);	
			$view['pbid'] = $this -> branch_lib -> __get_branch();
			$view['psid'] = $this -> sales_lib -> __get_sales();
			$view['pppid'] = $this -> products_lib -> __get_products();	
	
			$this->load->view('delivery_order_details',$view);
	}	
		

	function delivery_order_report($id,$sbid,$snodo) {
			$view['id'] = $id;
			$view['sbid'] = $sbid;
			$view['detailx'] = $this -> pembayaran_detail_model -> __get_delivery_order_detail($id,$snodo);
			$view['detail'] =$this -> pembayaran_detail_model -> __get_delivery_order_detail_prod($id,$snodo);						
			$view['pbid'] = $this -> branch_lib -> __get_branch();
			$view['psid'] = $this -> sales_lib -> __get_sales();
			$view['pppid'] = $this -> products_lib -> __get_products();	
	
			$this->load->view('delivery_order_report',$view,FALSE);
	}	
	
	
	function invoice_report($id,$sbid,$snodo) {
			$view['id'] = $id;
			$view['sbid'] = $sbid;
			$view['detailx'] = $this -> pembayaran_detail_model -> __get_delivery_order_detail($id,$snodo);
			$view['detail'] =$this -> pembayaran_detail_model -> __get_delivery_order_detail_prod($id,$snodo);						
			$view['pbid'] = $this -> branch_lib -> __get_branch();
			$view['psid'] = $this -> sales_lib -> __get_sales();
			$view['pppid'] = $this -> products_lib -> __get_products();	
	
			$this->load->view('invoice_report',$view,FALSE);
	}		
	
	
	
}
