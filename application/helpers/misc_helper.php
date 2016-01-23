<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function __set_error_msg($arr) {
	$CI =& get_instance();
	return $CI -> memcachedlib -> set('__msg', $arr, '60');
}

function __get_roles($key) {
    $arr = array();
    $CI =& get_instance();
    $permission = $CI -> memcachedlib -> sesresult['permission'];
    foreach($permission as $k => $v)
        $arr[$v['pname']] = $v['aaccess'];
    return (isset($arr[$key]) ? $arr[$key] : '');
}

function __get_error_msg() {
	$CI =& get_instance();
	$css = (isset($CI -> memcachedlib -> get('__msg')['error']) == '' ? 'success' : 'danger');
	if (isset($CI -> memcachedlib -> get('__msg')['info'])) $CI -> memcachedlib -> set('__msg_tmp', array('info' => true), '60');
	if (isset($CI -> memcachedlib -> get('__msg')['error']) || isset($CI -> memcachedlib -> get('__msg')['info'])) {
		$res = '<div class="alert alert-'.$css.' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
		$res .= (isset($CI -> memcachedlib -> get('__msg')['error']) ? $CI -> memcachedlib -> get('__msg')['error'] : $CI -> memcachedlib -> get('__msg')['info']);
		$res .= '</div>';
		$CI -> memcachedlib -> delete('__msg');
		return $res;
	}
}

function __get_status($status, $type) {
	if ($type == 1)
		return ($status == 1 ? 'Active' : 'Not Active');
	elseif ($type == 2)
		return ($status == 1 ? '<input type="checkbox" checked="checked" name="status" value="1" />' : '<input type="checkbox" name="status" value="1" />');
	else
		return ($status == 3 ? '<span style="font-weight:bold;color:#5cb85c;">Approved</span>' : ($status == 1 ? 'Active' : 'No Active'));
}

function __get_fkp_sp($str) {
	if ($str) $fp = explode('*', $str);
	else $fp = array(0,0);

	$res = '';
	if ($fp[0] == 1)
		$res .= 'FKP <input type="checkbox" checked="checked" name="fkp" value="1" /> ';
	else
		$res .= 'FKP <input type="checkbox" name="fkp" value="1" /> ';
	
	if ($fp[1] == 1)
		$res .= 'SP <input type="checkbox" checked="checked" name="sp" value="1" />';
	else
		$res .= 'SP <input type="checkbox" name="sp" value="1" />';
	return $res;
}

function __get_ppn($status, $type) {
	if ($type == 1)
		return ($status == 1 ? 'On' : 'Off');
	else
		return ($status == 1 ? '<input type="checkbox" checked="checked" name="sfreeppn" value="1" />' : '<input type="checkbox" name="sfreeppn" value="1" />');
}

function __get_customers_spec($status, $type, $name='') {
	if ($type == 1)
		return ($status == 1 ? 'Yes' : 'No');
	else
		return ($status == 1 ? '<input type="checkbox" checked="checked" name="'.$name.'" value="1" />' : '<input type="checkbox" name="'.$name.'" value="1" />');
}

function __get_delivery($id, $type) {
	$data = array('Jakarta','Semarang','Bandung', 'Surabaya');
	if ($type == 1) {
		return $data[$id];
	}
	else {
		$res = '';
		foreach($data as $k => $v)
			if ($id == $k)
				$res .= '<label>'.$v.' <input class="uniform" type="radio" name="delivery" value="'.$k.'" checked></label> <br />';
			else
				$res .= '<label>'.$v.' <input class="uniform" type="radio" name="delivery" value="'.$k.'"></label> <br />';
		return $res;
	}
}

function __get_rupiah($num,$type=1) {
	if ($type == 1) return "Rp. " . number_format($num,0,',','.');
	elseif ($type == 2) return number_format($num,0,',',',');
	elseif ($type == 3) return number_format($num,2,',','.');
	else return "Rp. " . number_format($num,2,',','.');
}

function __get_roles_by_id($key) {
    $arr = array();
    $CI =& get_instance();
    return $CI -> memcachedlib -> sesresult['gid'] !=  $key ? 'no' : '';
}

function __get_spelled($num) {
	$num = (float)$num;
	$bilangan = array(
	'',
	'satu',
	'dua',
	'tiga',
	'empat',
	'lima',
	'enam',
	'tujuh',
	'delapan',
	'sembilan',
	'sepuluh',
	'sebelas'
	);

	if ($num < 12) {
		return strtoupper($bilangan[$num]);
	}
	else if ($num < 20) {
		return strtoupper($bilangan[$num - 10] . ' belas');
	}
	else if ($num < 100) {
		$mod = (int)($num / 10);
		$hasil_mod = $num % 10;
		return strtoupper(trim(sprintf('%s puluh %s', $bilangan[$mod], $bilangan[$hasil_mod])));
	}
	else if ($num < 200) {
		return strtoupper(sprintf('seratus %s', __get_spelled($num - 100)));
	}
	else if ($num < 1000) {
		$mod = (int)($num / 100);
		$hasil_mod = $num % 100;
		return strtoupper(trim(sprintf('%s ratus %s', $bilangan[$mod], __get_spelled($hasil_mod))));
	}
	else if ($num < 2000) {
		return strtoupper(trim(sprintf('seribu %s', __get_spelled($num - 1000))));
	}
	else if ($num < 1000000) {
		$mod = (int)($num / 1000);
		$hasil_mod = $num % 1000;
		return strtoupper(sprintf('%s ribu %s', __get_spelled($mod), __get_spelled($hasil_mod)));
	}
	else if ($num < 1000000000) {
		$mod = (int)($num / 1000000);
		$hasil_mod = $num % 1000000;
		return strtoupper(trim(sprintf('%s juta %s', __get_spelled($mod), __get_spelled($hasil_mod))));
	}
	else if ($num < 1000000000000) {
		$mod = (int)($num / 1000000000);
		$hasil_mod = fmod($num, 1000000000);
		return strtoupper(trim(sprintf('%s milyar %s', __get_spelled($mod), __get_spelled($hasil_mod))));
	}
	else if ($num < 1000000000000000) {
		$mod = $num / 1000000000000;
		$hasil_mod = fmod($num, 1000000000000);
		return strtoupper(trim(sprintf('%s triliun %s', __get_spelled($mod), __get_spelled($hasil_mod))));
	}
	else {
		return 'Wow...';
	}
}

function __get_cities($id, $type) {
	$CI =& get_instance();
	$CI -> load -> library('city/city_lib');
	if ($type == 1) {
		$CI -> load -> model('city/city_model');
		$city = $CI -> city_model -> __get_city_detail($id);
		return $city[0] -> cname;
	}
	else
		return $CI -> city_lib -> __get_city($id);
}

function __get_province($id, $type) {
	$CI =& get_instance();
	$CI -> load -> library('province/province_lib');
	if ($type == 1) {
		$CI -> load -> model('province/province_model');
		$city = $CI -> province_model -> __get_province_detail($id);
		return $city[0] -> pname;
	}
	else
		return $CI -> province_lib -> __get_province($id);
}

function __get_condition_services($id, $type) {
	if ($type == 1) {
		return ($id == 1 ? 'Guarentee' : 'Non Guarentee');
	}
	else {
		return ($id == 1 ? '<label>Guarentee <input class="uniform" type="radio" name="cond" value="1" checked></label> <label>Non Guarentee <input class="uniform" type="radio" name="cond" value="2"></label>' : '<label>Guarentee <input class="uniform" type="radio" name="cond" value="1"></label> <label>Non Guarentee <input class="uniform" type="radio" name="cond" value="2" checked></label>');
	}
}

function __get_inventory_type($type) {
	if ($type == 1) return 'Product';
	elseif ($type == 2) return 'Sparepart';
	elseif ($type == 3) return 'Reject Product';
	elseif ($type == 4) return 'Return';
	elseif ($type == 5) return 'Reject Sparepart';
	else return 'Service';
}

function __get_price_type($type) {
	return ($type == 1 ? 'Product' : 'Sparepart');
}

function __get_total_new_pm($uid) {
	$CI =& get_instance();
	$CI -> load -> model('pm/pm_model');
	return $CI -> pm_model -> __get_total_new_pm($uid);
}

function __get_new_pm($uid) {
	$CI =& get_instance();
	$CI -> load -> model('pm/pm_model');
	$sql = $CI -> pm_model -> __get_new_pm($uid);
	$res = '';
	foreach($sql as $k => $v)
		$res .= '<li><a href="'.site_url('pm/pm_read/' . $v -> pid).'"><div><strong>'.$v -> uemail.'</strong><span class="pull-right text-muted"><em>'.__get_date($v -> pdate).'</em></span></div><div>'.substr($v -> psubject,0,50).'</div></a></li>';
	return $res;
}

function __get_customer_category($cid, $type) {
	$data = array('DISTRIBUTOR', 'SEMI','AGENT', 'STORE', 'CONSUMER', 'SUPERMARKET', 'OEM');
	if ($type == 1) {
		return $data[$cid];
	}
	else {
		$res = '';
		foreach($data as $k => $v)
			if ($cid == $k)
				$res .= '<label>'.$v.' <input class="uniform" type="radio" name="cat" value="'.$k.'" checked></label>';
			else
				$res .= '<label>'.$v.' <input class="uniform" type="radio" name="cat" value="'.$k.'"></label>';
		return $res;
	}
}

//~ function __get_product_group($cid,$type) {
	//~ $data = array('DVD', 'TV', 'AC');
	//~ if ($type == 1) {
		//~ return $data[$cid];
	//~ }
	//~ else {
		//~ $res = '<option value=""></option>';
		//~ foreach($data as $k => $v)
			//~ if ($cid && $cid == $k)
				//~ $res .= '<option value="'.$k.'" selected>'.$v.'</option>';
			//~ else
				//~ $res .= '<option value="'.$k.'">'.$v.'</option>';
		//~ return $res;
	//~ }
//~ }

function __get_product_type($cid,$type) {
	$data = array('FINISH GOOD', 'RAW MATERIAL', 'PACKAGING');
	if ($type == 1) {
		return $data[$cid];
	}
	else {
		$res = '';
		foreach($data as $k => $v)
			if ($cid == $k)
				$res .= '<label><input class="uniform" type="radio" name="type" value="'.$k.'" checked> '.$v.'</label><br>';
			else
				$res .= '<label> <input class="uniform" type="radio" name="type" value="'.$k.'"> '.$v.'</label><br>';
		return $res;
	}
}

function __get_customer_retur($status, $type) {
	if ($type == 1)
		return ($status === 0 ? 'Tukar Guling' : 'Potong Nota');
	else
		return ($status === 0 ? '<label> Tukar Guling <input type="radio" class="uniform" name="ctyperetur" value="0" checked /></label> <label>Potong Nota <input type="radio" class="uniform" name="ctyperetur" value="1" /></label>' : '<label> Tukar Guling <input type="radio" class="uniform" name="ctyperetur" value="0" /></label> <label>Potong Nota <input type="radio" class="uniform" name="ctyperetur" value="1" checked /></label>');
}

function __reverse_key($arr) {
	$arr = explode(',',$arr);
	$drr = array();
	foreach($arr as $v) {
		$drr[$v] = $v;
	}
	return $drr;
}

function __get_sales_area($id, $type='') {
	$area = array('Dalam Kota', 'Luar Kota', 'Luar Pulau');
	$res = '';
	if ($type == 1) {
		if ($id) $id = explode(',',$id);
		else $id = array();
		
		foreach($area as $k => $v)
			if (array_key_exists($k, $id))
				$res = $v . ',';
		return $res;
	}
	else {
		if ($id !== '') $id = __reverse_key($id);
		else $id = array();
		
		foreach($area as $k => $v)
			if (array_key_exists($k, $id))
				$res .= '<label> '.$v . ' <input type="checkbox" class="uniform" name="sarea['.$k.']" value="'.$k.'" checked /></label>';
			else
				$res .= '<label> '.$v . ' <input type="checkbox" class="uniform" name="sarea['.$k.']" value="'.$k.'" /></label>';
		return $res;
	}
}

function __keyTMP($str) {
	return str_replace('/','PalMa',$str);
}

function __get_PTMP() {
    $CI =& get_instance();
    if (isset($CI -> memcachedlib -> get('__msg_tmp')['info'])) {
		$CI -> memcachedlib -> delete(__keyTMP($_SERVER['HTTP_REFERER']));
		return json_encode(array());
	}
    $res = json_encode($CI -> memcachedlib -> get(__keyTMP($_SERVER['REQUEST_URI'])));
    $CI -> memcachedlib -> delete(__keyTMP($_SERVER['REQUEST_URI']));
    return $res;
}

function __get_receiving_name($id, $type) {
	if ($type == 2)
		return $id;
	else
		return 'R'.str_pad($id, 4, "0", STR_PAD_LEFT);
}

function __get_request_type($id, $type) {
	if ($type == 1)
		return ($id == 2 ? 'Retur' : 'Transfer');
	else
		return ($id == 2 ? '<option value="1">Transfer</option><option value="2" selected>Retur</option>' : '<option value="1" selected>Transfer</option><option value="2">Retur</option>');
}

function __get_receiving_type($id, $type) {
	if ($type == 1)
		return ($id == 1 ? 'Branches' : 'Vendor / Factory');
	else
		return ($id == 1 ? '<option value="1" selected>Branches</option><option value="2">Vendor / Factory</option>' : '<option value="1">Branches</option><option value="2" selected>Vendor / Factory</option>');
}
