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
		$this -> load -> model('purchase_order/purchase_order_model');
		$this -> load -> model('purchase_order_detail_model');
		$this -> load -> model('sales_order/sales_order_model');
		$this -> load -> model('sales_order_detail/sales_order_detail_model');
	}

	function index() {
		$pager = $this -> pagination_lib -> pagination($this -> purchase_order_detail_model -> __get_purchase_order_detail(),3,10,site_url('purchase_order_detail'));
		$view['purchase_order_detail'] = $this -> pagination_lib -> paginate();
		$view['pages'] = $this -> pagination_lib -> pages();
		$this->load->view('purchase_order_detail', $view);
	}
	function purchase_order_details($id) {
		$view['id'] = $id;
		$view['detailx'] = $this -> purchase_order_model -> __get_purchase_order_detail($id);
		$view['detail'] = $this -> purchase_order_detail_model -> __get_purchase_order_detail($id);
		$view['pbid'] = $this -> branch_lib -> __get_branch();
		$view['psid'] = $this -> sales_lib -> __get_sales();
		$view['pppid'] = $this -> products_lib -> __get_products();
		
		// print_r($view['detailx']);die;
			$this->load->view('purchase_order_details',$view);	
	}
	
	
	
	function penerimaan_details($id,$pno) {
		$view['id'] = $id;
		$view['pno'] = $pno;		
		$view['detailx'] = $this -> purchase_order_model -> __get_purchase_order_detail($id);
		$view['detail'] = $this -> purchase_order_detail_model -> __get_penerimaan_detail($id,$pno);
		$view['pbid'] = $this -> branch_lib -> __get_branch();
		$view['psid'] = $this -> sales_lib -> __get_sales();
		$view['pppid'] = $this -> products_lib -> __get_products();
		
		// print_r($view['detailx']);die;
			$this->load->view('penerimaan_details',$view);	
	}	
	

	function penerimaan_details_add($id,$pno) {
		if($_POST){
			$pbid=$_POST['pbidx'];
			$jum=count($_POST['pqty']);
			echo count($_POST['pqty']);
			//print_r($_POST);
				for($j=0;$j<$jum;$j++){
					$pid=$_POST['pid'][$j];
					$pbid=$_POST['pbid'][$j];
					$ppid=$_POST['ppid'][$j];
					$pppid=$_POST['pppid'][$j];
					$pcurrency=$_POST['pcurrency'][$j];
					$pqtyz=(int)$_POST['pqtyz'][$j];
					$pqty=(int)$_POST['pqty'][$j];
					$psisa=$pqtyz-$pqty;
					$pharga=$_POST['pharga'][$j];
					$pdisc=$_POST['pdisc'][$j];
					$pketerangan=$_POST['pketerangan'][$j];
					$pstatus=$_POST['pstatus'][$j];
					$pno_penerimaan=$_POST['pno_penerimaan'][$j];
					
					$arr = array('psisa' => $psisa );						
					
						$this -> purchase_order_detail_model ->  __update_purchase_order_detail($pid, $arr);
					$arrp=array('istockin'=>$pqty);
						$this -> sales_order_detail_model ->__update_inventoryin($pppid,$pbid,$arrp);
					
						 $arry = array( 'pid' => $pid ,'ppid' => $ppid ,'pppid' => $pppid, 'pcurrency' => $pcurrency , 'pqty' => $pqty , 'pharga' => $pharga , 'pdisc' => $pdisc ,'pketerangan' => $pketerangan,'pstatus' => $pstatus,'pno_penerimaan' => $pno_penerimaan );
						 $this -> purchase_order_detail_model -> __insert_penerimaan_detail($arry);	
						 $arrx = array('ibid' => $pbid, 'iiid' => $pid, 'itype' => 1, 'istockbegining' => '', 'istockin' => $pqty, 'istockout' => '', 'istock' => '', 'istatus' => 1 );
					$this -> purchase_order_detail_model -> __insert_inventory($arrx);	
				}
				
			redirect(site_url('purchase_order_detail/home/penerimaan_details/'.$ppid .'/' .$pno_penerimaan));
					// $arry = array( 'pid' => $idd ,'ppid' => $id ,'pppid' => $pppid, 'pcurrency' => $pcurrency , 'pqty' => $pqty , 'pharga' => $pharga , 'pdisc' => $pdisc ,'pketerangan' => $pketerangan,'pstatus' => $pstatus );

					// $arrz = array( 'pid' => $idd ,'ppid' => $id ,'pppid' => $pppid, 'pcurrency' => $pcurrency , 'pqty' => $pqty , 'pharga' => $pharga , 'pdisc' => $pdisc ,'pketerangan' => $pketerangan,'pstatus' => $pstatus );
					//$this -> purchase_order_detail_model -> __insert_penerimaan_detail($arry);		
		}else{
			$view['id'] = $id;
			$view['pno'] = $pno;
			$view['detailx'] = $this -> purchase_order_model -> __get_purchase_order_detailzz($id,$pno);
			$view['detail'] = $this -> purchase_order_detail_model -> __get_purchase_order_detail($id);
			$view['pbid'] = $this -> branch_lib -> __get_branch();
			$view['psid'] = $this -> sales_lib -> __get_sales();
			$view['pppid'] = $this -> products_lib -> __get_products();
			
			// print_r($view['detailx']);die;
				$this->load->view('penerimaan_details_add',$view);	
		}
	}	
	
	
	
	
	
	
	
	
	
	
	function purchase_order_detail_add($id) {
		if ($_POST) {
		//print_r($_POST);die;
			$pppid = $this -> input -> post('pppid', TRUE);
			$pcurrency = $this -> input -> post('pcurrency', TRUE);
			$pvol = $this -> input -> post('pvol', TRUE);
			if($pvol==0){
			$pvol=1;
			}
			$pqtyz = $this -> input -> post('pqty', TRUE);
			//echo $pqtyz.$pvol;die;
			$pqty= $pvol * $pqtyz;
			$pharga = $this -> input -> post('pharga', TRUE);
			$pdisc = $this -> input -> post('pdisc', TRUE);
			$pketerangan = $this -> input -> post('pketerangan', TRUE);
			$pstatus = (int)$this ->input -> post('status', TRUE);
			$id = (int) $this -> input -> post('id');
			$psisa = $this -> input -> post('pqty', TRUE);
		

			if ($id) {
			
					$arr = array( 'ppid' => $id ,'pppid' => $pppid, 'pcurrency' => $pcurrency , 'pqty' => $pqty , 'pharga' => $pharga , 'pdisc' => $pdisc ,'pketerangan' => $pketerangan,'pstatus' => $pstatus,'psisa' => $psisa );	
					//print_r($arr);die;
				if ($this -> purchase_order_detail_model -> __insert_purchase_order_detail($arr)) {
				$idd=  $this->db->insert_id();
				$arry = array( 'pid' => $idd ,'ppid' => $id ,'pppid' => $pppid, 'pcurrency' => $pcurrency , 'pqty' => $pqty , 'pharga' => $pharga , 'pdisc' => $pdisc ,'pketerangan' => $pketerangan,'pstatus' => $pstatus );
				//$this -> purchase_order_detail_model -> __insert_penerimaan_detail($arry);
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('purchase_order_detail/home/purchase_order_detail_add/'. $id .''));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('purchase_order_detail/home'));
				}
			}else{
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('purchase_order_detail/home'));			
			
			}
		}
		else {
		//echo "x2";die;
		$view['id'] = $id;
		$view['detailx'] = $this -> purchase_order_model -> __get_purchase_order_detail($id);
		$view['detail'] = $this -> purchase_order_detail_model -> __get_purchase_order_detail($id);
		$view['pbid'] = $this -> branch_lib -> __get_branch();
		$view['psid'] = $this -> sales_lib -> __get_sales();
		$view['pppid'] = $this -> products_lib -> __get_products();
		
		
		// print_r($view['detailx']);die;
			$this->load->view('purchase_order_detail_add',$view);
		}
	}
	
	function source_po() {
		$view['hostname']=$this->db->hostname;
		$view['username']=$this->db->username;
		$view['password']=$this->db->password;
		$view['database']=$this->db->database;
		
		$this->load->view('source_po',$view,FALSE);
	}	
	
	function purchase_order_report($id) {
		$view['id'] = $id;
		$view['detailx'] = $this -> purchase_order_model -> __get_purchase_order_detail($id);
		$view['detail'] = $this -> purchase_order_detail_model -> __get_purchase_order_detail($id);
		$view['pbid'] = $this -> branch_lib -> __get_branch();
		$view['psid'] = $this -> sales_lib -> __get_sales();
		$view['pppid'] = $this -> products_lib -> __get_products();						
			$view['pbid'] = $this -> branch_lib -> __get_branch();
			$view['psid'] = $this -> sales_lib -> __get_sales();
			$view['pppid'] = $this -> products_lib -> __get_products();	
	
			$this->load->view('purchase_order_report',$view,FALSE);
	}	
	
	function penerimaan_report($id,$pno) {
		$view['id'] = $id;
		$view['detailx'] = $this -> purchase_order_model -> __get_purchase_order_detail($id);
		$view['detail'] = $this -> purchase_order_detail_model -> __get_penerimaan_detail($id,$pno);
		$view['pbid'] = $this -> branch_lib -> __get_branch();
		$view['psid'] = $this -> sales_lib -> __get_sales();
		$view['pppid'] = $this -> products_lib -> __get_products();						
			$view['pbid'] = $this -> branch_lib -> __get_branch();
			$view['psid'] = $this -> sales_lib -> __get_sales();
			$view['pppid'] = $this -> products_lib -> __get_products();	
	
			$this->load->view('penerimaan_report',$view,FALSE);
	}		
	
	
	
	
	
	
	
	
	
	
	
	
	function purchase_order_detail_update($id,$ppid) {
	//print_r($id);die;
		if ($_POST) {		
		//print_r($_POST);die;	
			$ppid = $this -> input -> post('ppid', TRUE);
			$pid = $this -> input -> post('pid', TRUE);
			$pcurrency = $this -> input -> post('pcurrency', TRUE);
			$pqty = $this -> input -> post('pqty', TRUE);
			$pharga = $this -> input -> post('pharga', TRUE);
			$pdisc = $this -> input -> post('pdisc', TRUE);
			$pketerangan = $this -> input -> post('pketerangan', TRUE);
			$pstatus = $this -> input -> post('pstatus', TRUE);
			//$id = (int) $this -> input -> post('id');
			$id = (int)$this -> input -> post('pid', TRUE);
			if ($id) {
		
					$arr = array('pcurrency' => $pcurrency , 'pqty' => $pqty , 'pharga' => $pharga , 'pdisc' => $pdisc ,'pketerangan' => $pketerangan,'pstatus' => $pstatus );	
								
					
					if ($this -> purchase_order_detail_model -> __update_purchase_order_detail($id, $arr)) {	
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						//localhost/dist/purchase_order_detail/home/purchase_order_detail_add/22
						redirect(site_url('purchase_order_detail/home/purchase_order_detail_add/'.$ppid));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('purchase_order_detail/home'));
					}
				//}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('purchase_order_detail/home'));
			}
		}
		else {
			$view['id'] = $id;
			
			$view['detail'] = $this -> purchase_order_detail_model -> __get_purchase_order_detailx($id);
			// $view['pbid'] = $this -> branch_lib -> __get_branch($view['detail'][0] -> pbid);
			// $view['psid'] = $this -> sales_lib -> __get_sales($view['detail'][0] -> psid);
			// $view['ppid'] = $this -> products_lib -> __get_products($view['detail'][0] -> ppid);
			$this->load->view('purchase_order_detail_update', $view);
		}
	}
	
	
	
	
	function penerimaan_update($id,$ppid) {
	//print_r($id);die;
		if ($_POST) {		
		//print_r($_POST);die;	
			$ppid = $this -> input -> post('ppid', TRUE);
			$pid = $this -> input -> post('pid', TRUE);
			$pcurrency = $this -> input -> post('pcurrency', TRUE);
			$pqty = $this -> input -> post('pqty', TRUE);
			$pharga = $this -> input -> post('pharga', TRUE);
			$pdisc = $this -> input -> post('pdisc', TRUE);
			$pketerangan = $this -> input -> post('pketerangan', TRUE);
			$pstatus = $this -> input -> post('pstatus', TRUE);
			//$id = (int) $this -> input -> post('id');
			$id = (int)$this -> input -> post('pid', TRUE);
			if ($id) {
		
					$arr = array('pcurrency' => $pcurrency , 'pqty' => $pqty , 'pharga' => $pharga , 'pdisc' => $pdisc ,'pketerangan' => $pketerangan,'pstatus' => $pstatus );	
								
					
					if ($this -> purchase_order_detail_model -> __update_penerimaan($id, $arr)) {	
					//echo "cccc";die;
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						//localhost/dist/purchase_order_detail/home/purchase_order_detail_add/22
						redirect(site_url('purchase_order_detail/home/penerimaan_details/'.$ppid));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('purchase_order_detail/home'));
					}
				//}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('purchase_order_detail/home'));
			}
		}
		else {
			$view['id'] = $id;
			
			$view['detail'] = $this -> purchase_order_detail_model -> __get_penerimaan_detailx($id);
			// $view['pbid'] = $this -> branch_lib -> __get_branch($view['detail'][0] -> pbid);
			// $view['psid'] = $this -> sales_lib -> __get_sales($view['detail'][0] -> psid);
			// $view['ppid'] = $this -> products_lib -> __get_products($view['detail'][0] -> ppid);
			$this->load->view('penerimaan_update', $view);
		}
	}	
	
	
	
	
	
	
	
	
	
	
	function purchase_order_detail_delete($id,$ppid) {
		if ($this -> purchase_order_detail_model -> __delete_purchase_order_detail($id)) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('purchase_order_detail/home/purchase_order_details/'.$ppid));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('purchase_order_detail'));
		}
	}
}
