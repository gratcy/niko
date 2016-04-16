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
			$totalso=$this -> input -> post('totalso', TRUE);
			$id=$this -> input -> post('id', TRUE);
			$arr=array('sstatus' => '3','sototal'=>$totalso);
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

		$view['hostname']=$this->db->hostname;
		$view['username']=$this->db->username;
		$view['password']=$this->db->password;
		$view['database']=$this->db->database;		

	
			//$this->load->view('sales_order_report',$view,FALSE);
			$this->load->view('print_so',$view,FALSE);
	}	


	
	function sales_order_detail_add($id,$scid) {
		
		$promodisc=0;
		$sqtykoli=0;
		if ($_POST) {
			
			$sqtykoli= $this -> input -> post('sqtykoli', TRUE);
			
		$discdate=$_POST['discdate'];

			if($_POST['add_plafon']==1){

					$limit=$_POST['sisa']+$_POST['plafon'];
					$arr = array('climit' => $limit);
						$this -> customers_model -> __update_customers($scid, $arr);
							__set_error_msg(array('info' => 'Plafon berhasil ditambahkan.'));
							redirect(site_url('sales_order_detail/home/sales_order_detail_add/'. $id .'/'. $scid .'/'.$discdate));
			
			}

			$promodisc = str_replace(',','',$this -> input -> post('promodisc', TRUE));
			$pricex = str_replace(',','',$this -> input -> post('pricex', TRUE));
			$pricedist = str_replace(',','',$this -> input -> post('pricedist', TRUE));
			$pricesemi = str_replace(',','',$this -> input -> post('pricesemi', TRUE));
			$pricekey = str_replace(',','',$this -> input -> post('pricekey', TRUE));			
			$pricestore = str_replace(',','',$this -> input -> post('pricestore', TRUE));
			$priceconsume = str_replace(',','',$this -> input -> post('priceconsume', TRUE));
			$qtyx = $this -> input -> post('qtyx', TRUE);
		    $ssid = $this -> input -> post('id', TRUE);
			$spid = $this -> input -> post('spid', TRUE);
			$ppid = $this -> input -> post('ppid', TRUE);
			$sqtykol= $this -> input -> post('sqtykol', TRUE);
			//$sqtykoli= $this -> input -> post('sqtykoli', TRUE);
			
			//echo $sqtykoli;die;
			$sqtypcs= $this -> input -> post('sqtypcs', TRUE);
			if($sqtykoli==''){
			$sqty= $this -> input -> post('sqtypcs', TRUE);
			}else{
			$sqty= $this -> input -> post('sqtykoli', TRUE)* $sqtykol;
			}
			//$sqty = $this -> input -> post('sqty', TRUE);
			$sprice = str_replace(',','',$this -> input -> post('price', TRUE));
			$price = str_replace(',','',$this -> input -> post('price', TRUE));
			$sdisc = $this -> input -> post('ddisc', TRUE);
			$ccat = $this -> input -> post('ccat', TRUE);
			$stypepay = $this -> input -> post('stypepay', TRUE);
			
		if($stypepay=="auto"){	
			$stypepay="credit";
			if($ccat=='3'){				
			$stypepay="cash";
			}
		}

		$sprice=$price;

					$arr = array( 'sid' =>'' ,'ssid' => $ssid,'spid' => $spid,'sqty' => $sqty ,'sprice' => $sprice,'sdisc' => $sdisc,'spromodisc'=>$promodisc,'ssisa'=>$sqty);					
//print_r($arr);die;
					if ($this -> sales_order_detail_model -> __insert_sales_order_detail($arr)) {

						__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
						redirect(site_url('sales_order_detail/home/sales_order_detail_add/'. $id .'/'. $scid .'/'.$discdate));
					}
					else {
						__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
						redirect(site_url('sales_order_detail/home/sales_order_detail_add/'. $id .'/'. $scid .'/'.$discdate));
					}

		}
		else {
			

			$view['id'] = $id;
			$view['scid'] = $scid;
			$view['detailx'] = $this -> sales_order_model -> __get_sales_order_detail($id);
			$view['detail'] =$this -> sales_order_detail_model -> __get_sales_order_detail_prod($id);$view['sqtykoli']=$sqtykoli;
			$view['promodisc']=$promodisc;			
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

	function sourcex($scid,$bidx,$stypid) {
		$view['hostname']=$this->db->hostname;
		$view['username']=$this->db->username;
		$view['password']=$this->db->password;
		$view['database']=$this->db->database;
		$view['scid']=$scid;
		$view['bidx']=$bidx;
		$view['stype']=$stypid;
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
			$drivera = $this -> input -> post('driver', TRUE);
			$driverb = $this -> input -> post('adriver', TRUE);
			$driver=$drivera.'-'.$driverb;
			$stgldox = explode("/",$stgldos);			
			$stgldo="$stgldox[2]-$stgldox[1]-$stgldox[0]";
			$snomor = $this -> input -> post('snomor', TRUE);
			
					$arr = array('sid' => 0, 'ssid' => $id, 'spid' => 0, 'sqty' => 0, 'scid'=>$scid,
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
	
	
	
		    $view['id'] = $id;
			$view['scid'] = $scid;
			$view['snodo'] = $snodo;
			$view['detaily'] = $this -> sales_order_detail_model -> __get_delivery_order_detail($id,$snodo);
			$view['detailx'] = $this -> sales_order_detail_model -> __get_delivery_order_detail($id,$snodo);
			//print_r($view['detailx']);
			$view['detail'] =$this -> sales_order_detail_model -> __get_sales_order_detail_prod($id);						
			$view['pbid'] = $this -> branch_lib -> __get_branch();
			$view['psid'] = $this -> sales_lib -> __get_sales();
			$view['pppid'] = $this -> products_lib -> __get_products();	
		if ($_POST) {

		
			$scid = $scid;
			$snodo = $snodo;
			$durationx = $this -> input -> post('durationx', TRUE);
			$sno_invoice = $this -> input -> post('sno_invoice', TRUE);
			$juminv = $this -> input -> post('juminv', TRUE);
			$stgl_invoicex = $this -> input -> post('stgl_invoice', TRUE);
			$stglxp=explode("/",$stgl_invoicex);
			$stgl_invoice=$stglxp[2]."-".$stglxp[1]."-".$stglxp[0];			
			//date('Y-m-d',strtotime($stgl_invoicex));
			$sduedate_invoice=date( "Y-m-d", strtotime( "$stgl_invoice + $durationx day" ) );
			//$sduedate_invoice = $stgl_invoice;
			//$this -> input -> post('stgl_invoice', TRUE);
          


					$arr = array('sno_invoice' => $sno_invoice, 'stgl_invoice' => $stgl_invoice,
					'sduedate_invoice' => $sduedate_invoice,'kurang_bayar'=>$juminv	);						
					if ($this -> sales_order_detail_model -> __update_invoice_order($snodo,$arr)) {
						__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
						redirect(site_url('sales_order_detail/home/invoice_report/'. $id .'/'. $scid .'/'.$snodo.'?ox=1'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
						redirect(site_url('invoice/home/invoice_order_add/'. $id .'/'. $scid .''));
					}

		}
		else {
		
			// $view['id'] = $id;
			// $view['scid'] = $scid;
			// $view['snodo'] = $snodo;
			// $view['detaily'] = $this -> sales_order_detail_model -> __get_delivery_order_detail($id,$snodo);
			// $view['detailx'] = $this -> sales_order_detail_model -> __get_delivery_order_detail($id,$snodo);
			// $view['detail'] =$this -> sales_order_detail_model -> __get_sales_order_detail_prod($id);						
			// $view['pbid'] = $this -> branch_lib -> __get_branch();
			// $view['psid'] = $this -> sales_lib -> __get_sales();
			// $view['pppid'] = $this -> products_lib -> __get_products();	
			
			
			$view['id'] = $id;
			$view['scid'] = $scid;
			$view['snodo'] = $snodo;
			$view['detailx'] = $this -> sales_order_detail_model -> __get_delivery_order_detail($id,$snodo);
			
//print_r($view['detailx'][0]->sdurationx);die;			
			$view['durationx']=$view['detailx'][0]->sdurationx;
			
			$view['detail'] =$this -> sales_order_detail_model -> __get_delivery_order_detail_prod($id,$snodo);	
			
			$view['details'] =$this -> sales_order_detail_model -> __get_sales_order_detail_prod($id);	
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
			$sbid=$this -> input -> post('sbid', TRUE);
		for($j=0;$j<$jum;$j++){	
			$did = $_POST['did'][$j];
			$sid = $_POST['sid'][$j];
			$spid = $_POST['spid'][$j];
			$qty = $_POST['qty'][$j];
			$sqty =$_POST['sqty'][$j];			
			$sssid =$_POST['sssid'][$j];
			$samount =$_POST['samount'][$j];
			$tamount =$_POST['tamount'][$j];
			$ssisa[$j]=$qty-$sqty;
			//$istock=$istockbegining-istockout+istockin;
		
//echo $sisa[$j].'<br>';
					$arrp=array('istockout'=>$sqty);
					$arrqx = array('sstatus'=>3);
					$arrdos=array('dstatus'=>3);
					$arrdo=array('dstatus'=>3,'sssid'=>$sssid,'samount'=>$samount,'tamount'=>$tamount);
					$arrqty = array('ssisa' => $ssisa[$j]);
					$arr = array('sid' => $sid,'ssid' => $id,'spid' => $spid,  'sqty' => $sqty,
					'snodo' => $snodo, 'snopol' => $snopol, 'stgldo' => $stgldo, 'snomor' => $snomor,'dstatus'=>3,'sssid'=>$sssid,'tamount'=>$samount	);	
					if ($this -> sales_order_detail_model ->__update_do_status($snodo,$arrdos)) {
						$this -> sales_order_model ->__update_sales_order($id,$arrqx);
						$this -> sales_order_detail_model ->__update_inventory($spid,$sbid,$arrp);
						$this -> sales_order_detail_model ->__update_amount_status($did,$arrdo);
						$this -> sales_order_detail_model ->__update_sales_order_detail($sid,$arrqty);
						$arrx = array('ibid' => $sbid, 'iiid' => $spid, 'itype' => 1, 'istockbegining' => '', 'istockin' => '', 'istockout' => $sqty, 'istock' => '', 'istatus' => 1 );
						$this -> sales_order_detail_model -> __insert_inventory($arrx);						
					}
					else {
						__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
						redirect(site_url('sales_order_detail/home/delivery_order_details_add/'. $id .'/'. $scid .''));
					}
			}		
			
			//die;
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
			$this -> sales_order_detail_model ->__del_do_item($snodo);	
		
			for($j=0;$j<$jum;$j++){		
				$sid = $_POST['sid'][$j];
				$spid = $_POST['spid'][$j];
				$qty = $_POST['qty'][$j];
				$sqty =$_POST['sqty'][$j];			
				$ssisa=$qty-$sqty;
				$samount =$_POST['samount'][$j];

						$arrdo=array('dstatus'=>1);
						//$arrqty = array('ssisa' => $ssisa);
						$arr = array('sid' => $sid,'ssid' => $id,'spid' => $spid, 'scid'=>$scid, 'sqty' => $sqty,
						'snodo' => $snodo, 'snopol' => $snopol, 'stgldo' => $stgldo, 'snomor' => $snomor,'dstatus'=>1,'samount'=>$samount	);										
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
			$view['snodo'] = $snodo;
			$view['sbid'] = $sbid;
			$view['detailx'] = $this -> sales_order_detail_model -> __get_delivery_order_detail($id,$snodo);
			$view['detail'] =$this -> sales_order_detail_model -> __get_delivery_order_detail_prod($id,$snodo);						
			$view['pbid'] = $this -> branch_lib -> __get_branch();
			$view['psid'] = $this -> sales_lib -> __get_sales();
			$view['pppid'] = $this -> products_lib -> __get_products();	
			$view['hostname']=$this->db->hostname;
			$view['username']=$this->db->username;
			$view['password']=$this->db->password;
			$view['database']=$this->db->database;		
			
			//$this->load->view('delivery_order_report',$view,FALSE);
			$this->load->view('print_do',$view,FALSE);

	}	
	
	
	function invoice_report($id,$sbid,$snodo) {
		
		if($_POST){
			$scid=$this -> input -> post('scid', TRUE);
			$dototal=$this -> input -> post('dototal', TRUE);
			$snodo=$this -> input -> post('snodo', TRUE);
			$arp=array('kurang_bayar'=>$dototal,'dototal'=>$dototal);
			$this -> sales_order_detail_model -> __update_invoice_order($snodo,$arp);
			redirect(site_url('sales_order_detail/home/invoice_report/'. $id .'/'. $scid .'/'.$snodo));
			
		}
			$view['id'] = $id;
			$view['sbid'] = $sbid;
			$view['snodo'] = $snodo;
			$view['detailx'] = $this -> sales_order_detail_model -> __get_delivery_order_detail($id,$snodo);
			$view['detail'] =$this -> sales_order_detail_model -> __get_delivery_order_detail_prod($id,$snodo);		


			//$view['detailx'] = $this -> sales_order_detail_model -> __get_delivery_order_detail($id,$snodo);
			//$view['detail'] =$this -> sales_order_detail_model -> __get_delivery_order_detail_prod($id,$snodo);	
			$view['details'] =$this -> sales_order_detail_model -> __get_sales_order_detail_prod($id);	

			

			
			$view['pbid'] = $this -> branch_lib -> __get_branch();
			$view['psid'] = $this -> sales_lib -> __get_sales();
			$view['pppid'] = $this -> products_lib -> __get_products();	

			$view['hostname']=$this->db->hostname;
			$view['username']=$this->db->username;
			$view['password']=$this->db->password;
			$view['database']=$this->db->database;	
			
			//$this->load->view('invoice_report',$view,FALSE);
			$this->load->view('print_invoice',$view,FALSE);
	}		
	
	
	
}
