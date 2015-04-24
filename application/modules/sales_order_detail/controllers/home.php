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
		$this -> load -> model('sales_order/sales_order_model');
		$this -> load -> model('sales_order_detail_model');
		$this -> load -> model('purchase_order/purchase_order_model');
		$this -> load -> model('purchase_order_detail/purchase_order_detail_model');	
		$this -> load -> model('customers/customers_model');
	}

	function index() {
		$pager = $this -> pagination_lib -> pagination($this -> sales_order_detail_model -> __get_sales_order_detail(),3,10,site_url('sales_order_detail'));
		$view['sales_order_detail'] = $this -> pagination_lib -> paginate();
		$view['pages'] = $this -> pagination_lib -> pages();
		$this->load->view('sales_order_detail', $view);
	}

//----BEGIN SO

	function sales_order_details($id,$scid) {
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
			$view['id'] = $id;
			$view['scid'] = $scid;
			$view['detailx'] = $this -> sales_order_model -> __get_sales_order_detail($id);			
			$view['detail'] =$this -> sales_order_detail_model -> __get_sales_order_detail_prod($id);						
			$view['pbid'] = $this -> branch_lib -> __get_branch();
			$view['psid'] = $this -> sales_lib -> __get_sales();
			$view['pppid'] = $this -> products_lib -> __get_products();	
	
			$this->load->view('sales_order_details',$view);
	}

	function sales_order_report($id,$scid) {
			$view['id'] = $id;
			$view['scid'] = $scid;
			$view['detailx'] = $this -> sales_order_model -> __get_sales_order_detail($id);
			$view['detail'] =$this -> sales_order_detail_model -> __get_sales_order_detail_prod($id);						
			$view['pbid'] = $this -> branch_lib -> __get_branch();
			$view['psid'] = $this -> sales_lib -> __get_sales();
			$view['pppid'] = $this -> products_lib -> __get_products();	
	
			$this->load->view('sales_order_report',$view,FALSE);
	}	


	
	function sales_order_detail_add($id,$scid) {
		if ($_POST) {
		
		if($_POST['add_plafon']==1){
		//echo $scid;
				$limit=$_POST['sisa']+$_POST['plafon'];
				$arr = array('climit' => $limit);
					$this -> customers_model -> __update_customers($scid, $arr);
						__set_error_msg(array('info' => 'Plafon berhasil ditambahkan.'));
						redirect(site_url('sales_order_detail/home/sales_order_detail_add/'. $id .'/'. $scid .''));
		
		}

	
			$pricex = $this -> input -> post('pricex', TRUE);
			$pricedist = $this -> input -> post('pricedist', TRUE);
			$pricesemi = $this -> input -> post('pricesemi', TRUE);
			$pricekey = $this -> input -> post('pricekey', TRUE);			
			$pricestore = $this -> input -> post('pricestore', TRUE);
			$priceconsume = $this -> input -> post('priceconsume', TRUE);
			$qtyx = $this -> input -> post('qtyx', TRUE);
		    $ssid = $this -> input -> post('id', TRUE);
			$spid = $this -> input -> post('spid', TRUE);
			$sqty = $this -> input -> post('sqty', TRUE);
			$sprice = $this -> input -> post('price', TRUE);
			$sdisc = $this -> input -> post('ddisc', TRUE);
			$ccat = $this -> input -> post('ccat', TRUE);
			$stypepay = $this -> input -> post('stypepay', TRUE);
		
		if($stypepay=="auto"){	
		$stypepay="credit";
			if($ccat=='1'){			
				if($qtyx>$sqty){
					$sprice=$pricestore;
					
				}else if($qtyx==$sqty){
					$sprice=$pricekey;
				}
			}
			if($ccat=='3'){
				$sprice=$priceconsume;
				$stypepay="cash";
			}
		}elseif($stypepay=="cash"){
		
			$sprice=$priceconsume;
			
		}elseif($stypepay=="credit"){
			if(($ccat=='1')or($ccat=='3')){	
		
				if($qtyx>$sqty){
					$sprice=$pricestore;
					
				}else if($sqty >=$qtyx){
					$sprice=$pricekey;
					
				}
			}
		}

					$arr = array( 'sid' =>'' ,'ssid' => $ssid,'spid' => $spid,'sqty' => $sqty ,'sprice' => $sprice,'sdisc' => $sdisc,'ssisa'=>$sqty);					
//print_r($arr);die;
					if ($this -> sales_order_detail_model -> __insert_sales_order_detail($arr)) {

						__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
						redirect(site_url('sales_order_detail/home/sales_order_detail_add/'. $id .'/'. $scid .''));
					}
					else {
						__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
						redirect(site_url('sales_order_detail/home/sales_order_detail_add/'. $id .'/'. $scid .''));
					}

		}
		else {
		
			$view['id'] = $id;
			$view['scid'] = $scid;
			$view['detailx'] = $this -> sales_order_model -> __get_sales_order_detail($id);
			$view['detail'] =$this -> sales_order_detail_model -> __get_sales_order_detail_prod($id);						
			$view['pbid'] = $this -> branch_lib -> __get_branch();
			$view['psid'] = $this -> sales_lib -> __get_sales();
			$view['pppid'] = $this -> products_lib -> __get_products();	
			
			$this->load->view('sales_order_detail_add',$view);
		}
	}
	

	function sales_order_detail_update($id,$scid) {

		if ($_POST) {
	
			$ssid = $this -> input -> post('ssid', TRUE);
			$spid = $this -> input -> post('spid', TRUE);			
			$id = (int) $this -> input -> post('id');
			
			if ($id) {

					$arr = array('ssid' => $ssid, 'spid' => $spid );						
					if ($this -> sales_order_detail_model -> __update_sales_order_detail($id, $arr)) {	
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('sales_order_detail/home'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('sales_order_detail/home'));
					}				
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('sales_order_detail/home'));
			}
		}
		else {
			$view['id'] = $id;
			$view['scid'] = $scid;
			$view['detailx'] = $this -> sales_order_model -> __get_sales_order_detail($id);
			$view['detail'] =$this -> sales_order_detail_model -> __get_sales_order_detail_prod($id);						
			$view['pbid'] = $this -> branch_lib -> __get_branch();
			$view['psid'] = $this -> sales_lib -> __get_sales();
			$view['pppid'] = $this -> products_lib -> __get_products();	
			
			$this->load->view('sales_order_detail_update',$view);
		}
	}
	
	function sales_order_detail_delete($id,$sid,$scid) {
		if ($this -> sales_order_detail_model -> __delete_sales_order_detail($id)) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('sales_order_detail/home/sales_order_detail_add/'.$sid.'/'.$scid));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('sales_order_detail'));
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
					if ($this -> sales_order_detail_model ->__update_delivery_order($sid, $arr)) {	
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('sales_order_detail/home/delivery_order_details/'. $sid . '/' . $scid));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('sales_order_detail/home/sales_order_details/'. $sid . '/' . $scid));
					}

		}
		else {
		
			$view['id'] = $id;
			$view['scid'] = $scid;
			$view['detailx'] = $this -> sales_order_model -> __get_sales_order_detail($id);
			$view['detail'] =$this -> sales_order_detail_model -> __get_sales_order_detail_prod($id);						
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
					if ($this -> sales_order_detail_model -> __insert_delivery_order_detail($arr)) {
						__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
						redirect(site_url('sales_order_detail/home/delivery_order_details_add/'. $id .'/'. $scid .'/'.$snodo));
					}
					else {
						__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
						redirect(site_url('sales_order_detail/home/delivery_order_add/'. $id .'/'. $scid .''));
					}

		}
		else {
		
			$view['id'] = $id;
			$view['scid'] = $scid;
			$view['detailx'] = $this -> sales_order_model -> __get_sales_order_detail($id);
			$view['detail'] =$this -> sales_order_detail_model -> __get_sales_order_detail_prod($id);						
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
			$durationx = $this -> input -> post('durationx', TRUE);
			$sno_invoice = $this -> input -> post('sno_invoice', TRUE);
			$stgl_invoicex = $this -> input -> post('stgl_invoice', TRUE);
			$stglxp=explode("/",$stgl_invoicex);
			$stgl_invoice=$stglxp[2]."-".$stglxp[1]."-".$stglxp[0];			
			//date('Y-m-d',strtotime($stgl_invoicex));
			$sduedate_invoice=date( "Y-m-d", strtotime( "$stgl_invoice + $durationx day" ) );
			//$sduedate_invoice = $stgl_invoice;
			//$this -> input -> post('stgl_invoice', TRUE);
          


					$arr = array('sno_invoice' => $sno_invoice, 'stgl_invoice' => $stgl_invoice,
					'sduedate_invoice' => $sduedate_invoice	);						
					if ($this -> sales_order_detail_model -> __update_invoice_order($snodo,$arr)) {
						__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
						redirect(site_url('sales_order_detail/home/invoice_report/'. $id .'/'. $scid .'/'.$snodo));
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
			$view['detaily'] = $this -> sales_order_detail_model -> __get_delivery_order_detail($id,$snodo);
			$view['detailx'] = $this -> sales_order_detail_model -> __get_delivery_order_detail($id,$snodo);
			$view['detail'] =$this -> sales_order_detail_model -> __get_sales_order_detail_prod($id);						
			$view['pbid'] = $this -> branch_lib -> __get_branch();
			$view['psid'] = $this -> sales_lib -> __get_sales();
			$view['pppid'] = $this -> products_lib -> __get_products();	
	
			$this->load->view('invoice_order_details_add',$view);
		}
	}	
	
	
	
	function delivery_order_details_add($id,$scid,$snodo) {
		if ($_POST) {
		//print_r($_POST);die;
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
			$sssid =$_POST['sssid'][$j];
			$samount =$_POST['samount'][$j];
			$ssisa=$qty-$sqty;
			
//echo "$qty - $sqty - $ssisa";//die;

					$arrdo=array('dstatus'=>3,'sssid'=>$sssid,'samount'=>$samount);
					$arrqty = array('ssisa' => $ssisa);
					$arr = array('sid' => $sid,'ssid' => $id,'spid' => $spid,  'sqty' => $sqty,
					'snodo' => $snodo, 'snopol' => $snopol, 'stgldo' => $stgldo, 'snomor' => $snomor,'dstatus'=>3,'sssid'=>$sssid,'samount'=>$samount	);	
					if ($this -> sales_order_detail_model ->__update_do_status($snodo,$arrdo)) {
						$this -> sales_order_detail_model ->__update_sales_order_detail($sid,$arrqty);
						$arrx = array('ibid' => $sbid, 'iiid' => $spid, 'itype' => 1, 'istockbegining' => '', 'istockin' => '', 'istockout' => $sqty, 'istock' => '', 'istatus' => 1 );
						$this -> sales_order_detail_model -> __insert_inventory($arrx);						
					}
					else {
						__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
						redirect(site_url('sales_order_detail/home/delivery_order_details_add/'. $id .'/'. $scid .''));
					}
			}		
						__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
						redirect(site_url('sales_order_detail/home/delivery_order_details/'. $id .'/'. $scid .'/'.$snodo));	

		}
		else {
		
			$view['id'] = $id;
			$view['scid'] = $scid;
			$view['snodo'] = $snodo;
			$view['detailx'] = $this -> sales_order_detail_model -> __get_delivery_order_detail($id,$snodo);
			$view['detail'] =$this -> sales_order_detail_model -> __get_sales_order_detail_prod($id);						
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
			$this -> sales_order_detail_model ->__del_do_item($snodo);	
		
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
				if ($this -> sales_order_detail_model -> __insert_delivery_order_detail($arr)) {
						$this -> sales_order_detail_model ->__update_do_status($snodo,$arrdo);
						//$this -> sales_order_detail_model ->__update_sales_order_detail($sid,$arrqty);

						$arrx = array('ibid' => $sbid, 'iiid' => $spid, 'itype' => 1, 'istockbegining' => '', 'istockin' => '', 'istockout' => $sqty, 'istock' => '', 'istatus' => 1 );
						$this -> sales_order_detail_model -> __insert_inventory($arrx);					
						
				}
				else {
							__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
							redirect(site_url('sales_order_detail/home/delivery_order_details_add/'. $id .'/'. $scid .''));
				}
			}	//die;	
						__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
						redirect(site_url('sales_order_detail/home/delivery_order_details/'. $id .'/'. $scid .'/'.$snodo));	

		}
		else {
		
			$view['id'] = $id;
			$view['scid'] = $scid;
			$view['snodo'] = $snodo;
			$view['detailx'] = $this -> sales_order_detail_model -> __get_delivery_order_detail($id,$snodo);
			$view['detail'] =$this -> sales_order_detail_model -> __get_sales_order_detail_prod($id);						
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
			$view['detailx'] = $this -> sales_order_detail_model -> __get_delivery_order_detail($id,$snodo);
			$view['detail'] =$this -> sales_order_detail_model -> __get_delivery_order_detail_prod($id,$snodo);	
			$view['details'] =$this -> sales_order_detail_model -> __get_sales_order_detail_prod($id);	
			$view['pbid'] = $this -> branch_lib -> __get_branch();
			$view['psid'] = $this -> sales_lib -> __get_sales();
			$view['pppid'] = $this -> products_lib -> __get_products();	
	
			$this->load->view('delivery_order_details',$view);
	}	
		

	function delivery_order_report($id,$sbid,$snodo) {
			$view['id'] = $id;
			$view['sbid'] = $sbid;
			$view['detailx'] = $this -> sales_order_detail_model -> __get_delivery_order_detail($id,$snodo);
			$view['detail'] =$this -> sales_order_detail_model -> __get_delivery_order_detail_prod($id,$snodo);						
			$view['pbid'] = $this -> branch_lib -> __get_branch();
			$view['psid'] = $this -> sales_lib -> __get_sales();
			$view['pppid'] = $this -> products_lib -> __get_products();	
	
			$this->load->view('delivery_order_report',$view,FALSE);
	}	
	
	
	function invoice_report($id,$sbid,$snodo) {
			$view['id'] = $id;
			$view['sbid'] = $sbid;
			$view['detailx'] = $this -> sales_order_detail_model -> __get_delivery_order_detail($id,$snodo);
			$view['detail'] =$this -> sales_order_detail_model -> __get_delivery_order_detail_prod($id,$snodo);						
			$view['pbid'] = $this -> branch_lib -> __get_branch();
			$view['psid'] = $this -> sales_lib -> __get_sales();
			$view['pppid'] = $this -> products_lib -> __get_products();	
			
	        //$this -> sales_order_detail_model -> __update_invoice_order($snodo,$arr);
			$this->load->view('invoice_report',$view,FALSE);
	}		
	
	
	
}
