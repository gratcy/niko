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
	}

	function index() {
		echo "xx";die;
		$pager = $this -> pagination_lib -> pagination($this -> pembayaran_detail_model -> __get_pembayaran_detail(),3,10,site_url('pembayaran_detail'));
		$view['pembayaran_detail'] = $this -> pagination_lib -> paginate();
		$view['pages'] = $this -> pagination_lib -> pages();
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
				
			redirect(site_url('pembayaran_detail/home/pembayaran_detail_add/'.$scid.'/'.$pno_pm.'/'.$type_pay));					
					}	
	}
	
	function pembayaran_detail_add($scid,$pno_pm,$type_pay) {

		if ($_POST) {

			if(!isset($_POST['b'])){ 
				$_POST['b']="";$jum=0;
				$jumr=count($_POST['d']);
				for($t=0;$t<$jumr;$t++){	
					$snoro = $_POST['d'][$t];
					$arrr = array('status_potong' => '1' );	
				$this -> pembayaran_detail_model -> __update_ro($snoro, $arrr);
				}
			}else{
				$jum=count($_POST['b']);
			}
			for($j=0;$j<$jum;$j++){		
				$snoinv = $_POST['b'][$j];
				$snoro = $_POST['d'][$j];
				$sdate_pay=date('Y-m-d');			
						$arr = array('sdate_pay' => $sdate_pay,'pno_pm'=>$pno_pm );	
						$arrr = array('status_potong' => '1' );						
						$this -> pembayaran_detail_model -> __update_invoice($snoinv, $arr);
						$this -> pembayaran_detail_model -> __update_ro($snoro, $arrr);
					
			}
			if($_POST['tglgiro']<>""){
				$ptgl_giro=explode("/",$_POST['tglgiro']);
				
				$pgirox="$ptgl_giro[2]-$ptgl_giro[1]-$ptgl_giro[0]";
				}else{
					$pgirox="";
				}
				
		
				$no_invoice=$_POST['b'][0];
				$pcash=$_POST['totalcash'];
				$pgiro=$_POST['totalgiro'];
				$piutang=$_POST['totalz'];
				$pwrite_off=$_POST['wo'];
				$kurang_bayar=$_POST['totalsisa'];
				$arrg = array('ptgl_giro' => $pgirox,'pcash'=>$pcash,'pgiro'=>$pgiro,'piutang'=>$piutang,'pwrite_off'=>$pwrite_off,'kurang_bayar'=>$kurang_bayar);				
				$arr = array( 'pmid'=>'','pno_pm' => $pno_pm, 'pcid'=>$scid,  
					'pcash'=>$pcash,'pgiro'=>$pgiro,'piutang'=>$piutang,'ptgl_giro'=>$pgirox,'pwrite_off'=>'',
					'status' => '1','no_invoice'=>$no_invoice);	
		//echo $type_pay;die;			
				if($type_pay==1){
					//echo "a";die;
				$this -> pembayaran_detail_model -> __update_giro($pno_pm, $arrg);
				}else{
				//PRINT_R($arr);die;
				//echo "b";die;
				$this -> pembayaran_model -> __insert_pembayaran($arr);
				}
				//echo "bbb";die;
				
				redirect(site_url('pembayaran_detail/home/pembayaran_detail_add/'.$scid.'/'.$pno_pm.'/'.$type_pay));
		}
		else {
		
			//$view['id'] = $id;
			$view['scid'] = $scid;
			$view['pno_pm'] = $pno_pm;
			$view['detailx'] = $this -> pembayaran_model -> __get_pembayaran_detail($pno_pm);
			$view['potongan'] = $this -> pembayaran_detail_model -> __get_potongan($scid);
			$view['detail'] =$this -> pembayaran_detail_model -> __get_pembayaran_detail_inv($scid,$pno_pm);
			// echo $scid.'-'.$pno_pm;
				// print_r($view['detail']);die;
			$view['detailr'] =$this -> retur_order_detail_model -> __get_retur_order_detail_by_cust($scid);
			$view['pbid'] = $this -> branch_lib -> __get_branch();
			$view['psid'] = $this -> sales_lib -> __get_sales();
			$view['pppid'] = $this -> products_lib -> __get_products();	


$pager = $this -> pagination_lib -> pagination($this -> pembayaran_model -> __get_pembayaranid($pno_pm),3,10,site_url('pembayaran'));
			$view['pembayaran'] = $this -> pagination_lib -> paginate();

			
			$this->load->view('pembayaran_detail_add',$view);
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
			redirect(site_url('pembayaran_detail/home/pembayaran_detail_add/'.$sid.'/'.$scid));
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
