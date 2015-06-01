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

function __get_ppn($status, $type) {
	if ($type == 1)
		return ($status == 1 ? 'Active' : 'Not Active');
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
	$city = array("Kab. Simeulue ","Kab. Aceh Singkil ","Kab. Aceh Selatan ","Kab. Aceh Tenggara ","Kab. Aceh Timur ","Kab. Aceh Tengah ","Kab. Aceh Barat ","Kab. Aceh Besar ","Kab. Pidie ","Kab. Bireuen ","Kab. Aceh Utara ","Kab. Aceh Barat Daya ","Kab. Gayo Lues ","Kab. Aceh Tamiang ","Kab. Nagan Raya ","Kab. Aceh Jaya ","Kab. Bener Meriah ","Kab. Pidie Jaya ","Kota Banda Aceh ","Kota Sabang ","Kota Langsa ","Kota Lhokseumawe ","Kota Subulussalam ","Kab. Nias ","Kab. Mandailing Natal ","Kab. Tapanuli Selatan ","Kab. Tapanuli Tengah ","Kab. Tapanuli Utara ","Kab. Toba Samosir ","Kab. Labuhan Batu ","Kab. Asahan ","Kab. Simalungun ","Kab. Dairi ","Kab. Karo ","Kab. Deli Serdang ","Kab. Langkat ","Kab. Nias Selatan ","Kab. Humbang Hasundutan ","Kab. Pakpak Bharat ","Kab. Samosir ","Kab. Serdang Bedagai ","Kab. Batu Bara ","Kab. Padang Lawas Utara ","Kab. Padang Lawas ","Kab. Labuhan Batu Selatan ","Kab. Labuhan Batu Utara ","Kab. Nias Utara ","Kab. Nias Barat ","Kota Sibolga ","Kota Tanjung Balai ","Kota Pematang Siantar ","Kota Tebing Tinggi ","Kota Medan ","Kota Binjai ","Kota Padangsidimpuan ","Kota Gunungsitoli ","Kab. Kepulauan Mentawai ","Kab. Pesisir Selatan ","Kab. Solok ","Kab. Sijunjung ","Kab. Tanah Datar ","Kab. Padang Pariaman ","Kab. Agam ","Kab. Lima Puluh Kota ","Kab. Pasaman ","Kab. Solok Selatan ","Kab. Dharmasraya ","Kab. Pasaman Barat ","Kota Padang ","Kota Solok ","Kota Sawah Lunto ","Kota Padang Panjang ","Kota Bukittinggi ","Kota Payakumbuh ","Kota Pariaman ","Kab. Kuantan Singingi ","Kab. Indragiri Hulu ","Kab. Indragiri Hilir ","Kab. Pelalawan ","Kab. S I A K ","Kab. Kampar ","Kab. Rokan Hulu ","Kab. Bengkalis ","Kab. Rokan Hilir ","Kab. Kepulauan Meranti ","Kota Pekanbaru ","Kota D U M A I ","Kab. Kerinci ","Kab. Merangin ","Kab. Sarolangun ","Kab. Batang Hari ","Kab. Muaro Jambi ","Kab. Tanjung Jabung Timur ","Kab. Tanjung Jabung Barat ","Kab. Tebo ","Kab. Bungo ","Kota Jambi ","Kota Sungai Penuh ","Kab. Ogan Komering Ulu ","Kab. Ogan Komering Ilir ","Kab. Muara Enim ","Kab. Lahat ","Kab. Musi Rawas ","Kab. Musi Banyuasin ","Kab. Banyu Asin ","Kab. Ogan Komering Ulu Selatan ","Kab. Ogan Komering Ulu Timur ","Kab. Ogan Ilir ","Kab. Empat Lawang ","Kota Palembang ","Kota Prabumulih ","Kota Pagar Alam ","Kota Lubuklinggau ","Kab. Bengkulu Selatan ","Kab. Rejang Lebong ","Kab. Bengkulu Utara ","Kab. Kaur ","Kab. Seluma ","Kab. Mukomuko ","Kab. Lebong ","Kab. Kepahiang ","Kab. Bengkulu Tengah ","Kota Bengkulu ","Kab. Lampung Barat ","Kab. Tanggamus ","Kab. Lampung Selatan ","Kab. Lampung Timur ","Kab. Lampung Tengah ","Kab. Lampung Utara ","Kab. Way Kanan ","Kab. Tulangbawang ","Kab. Pesawaran ","Kab. Pringsewu ","Kab. Mesuji ","Kab. Tulang Bawang Barat ","Kab. Pesisir Barat ","Kota Bandar Lampung ","Kota Metro ","Kab. Bangka ","Kab. Belitung ","Kab. Bangka Barat ","Kab. Bangka Tengah ","Kab. Bangka Selatan ","Kab. Belitung Timur ","Kota Pangkal Pinang ","Kab. Karimun ","Kab. Bintan ","Kab. Natuna ","Kab. Lingga ","Kab. Kepulauan Anambas ","Kota B A T A M ","Kota Tanjung Pinang ","Kab. Kepulauan Seribu ","Kota Jakarta Selatan ","Kota Jakarta Timur ","Kota Jakarta Pusat ","Kota Jakarta Barat ","Kota Jakarta Utara ","Kab. Bogor ","Kab. Sukabumi ","Kab. Cianjur ","Kab. Bandung ","Kab. Garut ","Kab. Tasikmalaya ","Kab. Ciamis ","Kab. Kuningan ","Kab. Cirebon ","Kab. Majalengka ","Kab. Sumedang ","Kab. Indramayu ","Kab. Subang ","Kab. Purwakarta ","Kab. Karawang ","Kab. Bekasi ","Kab. Bandung Barat ","Kab. Pangandaran ","Kota Bogor ","Kota Sukabumi ","Kota Bandung ","Kota Cirebon ","Kota Bekasi ","Kota Depok ","Kota Cimahi ","Kota Tasikmalaya ","Kota Banjar ","Kab. Cilacap ","Kab. Banyumas ","Kab. Purbalingga ","Kab. Banjarnegara ","Kab. Kebumen ","Kab. Purworejo ","Kab. Wonosobo ","Kab. Magelang ","Kab. Boyolali ","Kab. Klaten ","Kab. Sukoharjo ","Kab. Wonogiri ","Kab. Karanganyar ","Kab. Sragen ","Kab. Grobogan ","Kab. Blora ","Kab. Rembang ","Kab. Pati ","Kab. Kudus ","Kab. Jepara ","Kab. Demak ","Kab. Semarang ","Kab. Temanggung ","Kab. Kendal ","Kab. Batang ","Kab. Pekalongan ","Kab. Pemalang ","Kab. Tegal ","Kab. Brebes ","Kota Magelang ","Kota Surakarta ","Kota Salatiga ","Kota Semarang ","Kota Pekalongan ","Kota Tegal ","Kab. Kulon Progo ","Kab. Bantul ","Kab. Gunung Kidul ","Kab. Sleman ","Kota Yogyakarta ","Kab. Pacitan ","Kab. Ponorogo ","Kab. Trenggalek ","Kab. Tulungagung ","Kab. Blitar ","Kab. Kediri ","Kab. Malang ","Kab. Lumajang ","Kab. Jember ","Kab. Banyuwangi ","Kab. Bondowoso ","Kab. Situbondo ","Kab. Probolinggo ","Kab. Pasuruan ","Kab. Sidoarjo ","Kab. Mojokerto ","Kab. Jombang ","Kab. Nganjuk ","Kab. Madiun ","Kab. Magetan ","Kab. Ngawi ","Kab. Bojonegoro ","Kab. Tuban ","Kab. Lamongan ","Kab. Gresik ","Kab. Bangkalan ","Kab. Sampang ","Kab. Pamekasan ","Kab. Sumenep ","Kota Kediri ","Kota Blitar ","Kota Malang ","Kota Probolinggo ","Kota Pasuruan ","Kota Mojokerto ","Kota Madiun ","Kota Surabaya ","Kota Batu ","Kab. Pandeglang ","Kab. Lebak ","Kab. Tangerang ","Kab. Serang ","Kota Tangerang ","Kota Cilegon ","Kota Serang ","Kota Tangerang Selatan ","Kab. Jembrana ","Kab. Tabanan ","Kab. Badung ","Kab. Gianyar ","Kab. Klungkung ","Kab. Bangli ","Kab. Karang Asem ","Kab. Buleleng ","Kota Denpasar ","Kab. Lombok Barat ","Kab. Lombok Tengah ","Kab. Lombok Timur ","Kab. Sumbawa ","Kab. Dompu ","Kab. Bima ","Kab. Sumbawa Barat ","Kab. Lombok Utara ","Kota Mataram ","Kota Bima ","Kab. Sumba Barat ","Kab. Sumba Timur ","Kab. Kupang ","Kab. Timor Tengah Selatan ","Kab. Timor Tengah Utara ","Kab. Belu ","Kab. Alor ","Kab. Lembata ","Kab. Flores Timur ","Kab. Sikka ","Kab. Ende ","Kab. Ngada ","Kab. Manggarai ","Kab. Rote Ndao ","Kab. Manggarai Barat ","Kab. Sumba Tengah ","Kab. Sumba Barat Daya ","Kab. Nagekeo ","Kab. Manggarai Timur ","Kab. Sabu Raijua ","Kota Kupang ","Kab. Sambas ","Kab. Bengkayang ","Kab. Landak ","Kab. Pontianak ","Kab. Sanggau ","Kab. Ketapang ","Kab. Sintang ","Kab. Kapuas Hulu ","Kab. Sekadau ","Kab. Melawi ","Kab. Kayong Utara ","Kab. Kubu Raya ","Kota Pontianak ","Kota Singkawang ","Kab. Kotawaringin Barat ","Kab. Kotawaringin Timur ","Kab. Kapuas ","Kab. Barito Selatan ","Kab. Barito Utara ","Kab. Sukamara ","Kab. Lamandau ","Kab. Seruyan ","Kab. Katingan ","Kab. Pulang Pisau ","Kab. Gunung Mas ","Kab. Barito Timur ","Kab. Murung Raya ","Kota Palangka Raya ","Kab. Tanah Laut ","Kab. Kota Baru ","Kab. Banjar ","Kab. Barito Kuala ","Kab. Tapin ","Kab. Hulu Sungai Selatan ","Kab. Hulu Sungai Tengah ","Kab. Hulu Sungai Utara ","Kab. Tabalong ","Kab. Tanah Bumbu ","Kab. Balangan ","Kota Banjarmasin ","Kota Banjar Baru ","Kab. Paser ","Kab. Kutai Barat ","Kab. Kutai Kartanegara ","Kab. Kutai Timur ","Kab. Berau ","Kab. Penajam Paser Utara ","Kota Balikpapan ","Kota Samarinda ","Kota Bontang ","Kab. Malinau ","Kab. Bulungan ","Kab. Tana Tidung ","Kab. Nunukan ","Kota Tarakan ","Kab. Bolaang Mongondow ","Kab. Minahasa ","Kab. Kepulauan Sangihe ","Kab. Kepulauan Talaud ","Kab. Minahasa Selatan ","Kab. Minahasa Utara ","Kab. Bolaang Mongondow Utara ","Kab. Siau Tagulandang Biaro ","Kab. Minahasa Tenggara ","Kab. Bolaang Mongondow Selatan ","Kab. Bolaang Mongondow Timur ","Kota Manado ","Kota Bitung ","Kota Tomohon ","Kota Kotamobagu ","Kab. Banggai Kepulauan ","Kab. Banggai ","Kab. Morowali ","Kab. Poso ","Kab. Donggala ","Kab. Toli-toli ","Kab. Buol ","Kab. Parigi Moutong ","Kab. Tojo Una-una ","Kab. Sigi ","Kota Palu ","Kab. Kepulauan Selayar ","Kab. Bulukumba ","Kab. Bantaeng ","Kab. Jeneponto ","Kab. Takalar ","Kab. Gowa ","Kab. Sinjai ","Kab. Maros ","Kab. Pangkajene Dan Kepulauan ","Kab. Barru ","Kab. Bone ","Kab. Soppeng ","Kab. Wajo ","Kab. Sidenreng Rappang ","Kab. Pinrang ","Kab. Enrekang ","Kab. Luwu ","Kab. Tana Toraja ","Kab. Luwu Utara ","Kab. Luwu Timur ","Kab. Toraja Utara ","Kota Makassar ","Kota Parepare ","Kota Palopo ","Kab. Buton ","Kab. Muna ","Kab. Konawe ","Kab. Kolaka ","Kab. Konawe Selatan ","Kab. Bombana ","Kab. Wakatobi ","Kab. Kolaka Utara ","Kab. Buton Utara ","Kab. Konawe Utara ","Kota Kendari ","Kota Baubau ","Kab. Boalemo ","Kab. Gorontalo ","Kab. Pohuwato ","Kab. Bone Bolango ","Kab. Gorontalo Utara ","Kota Gorontalo ","Kab. Majene ","Kab. Polewali Mandar ","Kab. Mamasa ","Kab. Mamuju ","Kab. Mamuju Utara ","Kab. Maluku Tenggara Barat ","Kab. Maluku Tenggara ","Kab. Maluku Tengah ","Kab. Buru ","Kab. Kepulauan Aru ","Kab. Seram Bagian Barat ","Kab. Seram Bagian Timur ","Kab. Maluku Barat Daya ","Kab. Buru Selatan ","Kota Ambon ","Kota Tual ","Kab. Halmahera Barat ","Kab. Halmahera Tengah ","Kab. Kepulauan Sula ","Kab. Halmahera Selatan ","Kab. Halmahera Utara ","Kab. Halmahera Timur ","Kab. Pulau Morotai ","Kota Ternate ","Kota Tidore Kepulauan ","Kab. Fakfak ","Kab. Kaimana ","Kab. Teluk Wondama ","Kab. Teluk Bintuni ","Kab. Manokwari ","Kab. Sorong Selatan Kab. Sorong ","Kab. Raja Ampat ","Kab. Tambrauw ","Kab. Maybrat ","Kota Sorong ","Kab. Merauke ","Kab. Jayawijaya ","Kab. Jayapura ","Kab. Nabire ","Kab. Kepulauan Yapen ","Kab. Biak Numfor ","Kab. Paniai ","Kab. Puncak Jaya ","Kab. Mimika ","Kab. Boven Digoel ","Kab. Mappi ","Kab. Asmat ","Kab. Yahukimo ","Kab. Pegunungan Bintang ","Kab. Tolikara ","Kab. Sarmi ","Kab. Keerom ","Kab. Waropen ","Kab. Supiori ","Kab. Mamberamo Raya ","Kab. Nduga ","Kab. Lanny Jaya ","Kab. Mamberamo Tengah ","Kab. Yalimo ","Kab. Puncak ","Kab. Dogiyai ","Kab. Intan Jaya ","Kab. Deiyai ","Kota Jayapura ");
	if ($type == 1) {
		$res = $city[$id-1];
	}
	else {
		$res = '<option value=""></option>';
		foreach($city as $k => $v) {
			if ($id == ($k+1)) $res .= '<option value="'.($k+1).'" selected>'.$v.'</option>';
			else $res .= '<option value="'.($k+1).'">'.$v.'</option>';
		}
	}
	return $res;
}

function __get_province($id, $type) {
	$prov = array("Aceh", "Bali", "Banten", "Bengkulu", "Gorontalo", "Irian Jaya Barat", "Jakarta Raya", "Jambi", "Jawa Barat", "Jawa Tengah", "Jawa Timur", "Kalimantan Barat", "Kalimantan Selatan", "Kalimantan Tengah", "Kalimantan Timur", "Kepulauan Bangka Belitung", "Kepulauan Riau", "Lampung", "Maluku", "Maluku Utara", "Nusa Tenggara Barat", "Nusa Tenggara Timur", "Papua", "Riau", "Sulawesi Barat", "Sulawesi Selatan", "Sulawesi Tengah", "Sulawesi Tenggara", "Sulawesi Utara", "Sumatera Barat", "Sumatera Selatan", "Sumatera Utara", "Yogyakarta");
	if ($type == 1) {
		$res = $prov[$id-1];
	}
	else {
		$res = '<option value=""></option>';
		foreach($prov as $k => $v) {
			if ($id == ($k+1)) $res .= '<option value="'.($k+1).'" selected>'.$v.'</option>';
			else $res .= '<option value="'.($k+1).'">'.$v.'</option>';
		}
	}
	return $res;
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
	else return 'Return';
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
	$data = array('DISTI', 'REG', 'SEMI', 'CASH');
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
		return ($status === 0 ? 'Tukar Barang' : 'Potong Hutang');
	else
		return ($status === 0 ? '<label> Tukar Barang <input type="radio" class="uniform" name="ctyperetur" value="0" checked /></label> <label>Potong Hutang <input type="radio" class="uniform" name="ctyperetur" value="1" /></label>' : '<label> Tukar Barang <input type="radio" class="uniform" name="ctyperetur" value="0" /></label> <label>Potong Hutang <input type="radio" class="uniform" name="ctyperetur" value="1" checked /></label>');
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
		if ($id) $id = explode(',',$id);
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
    $arr = array();
    $CI =& get_instance();
    $res = json_encode($CI -> memcachedlib -> get(__keyTMP($_SERVER['REQUEST_URI'])));
    $CI -> memcachedlib -> delete(__keyTMP($_SERVER['REQUEST_URI']));
    return $res;
}
