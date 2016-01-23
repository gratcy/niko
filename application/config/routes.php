<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home";
$route['404_override'] = '';

$route['login'] = 'login/home';
$route['login/logging'] = 'login/home/logging';
$route['login/logout'] = 'login/home/logout';

$route['settings'] = 'settings/home';
$route['settings/settings'] = 'settings/home/settings';

$route['users/?(:num)?'] = 'users/home/index/$1';
$route['users/users_add'] = 'users/home/users_add';
$route['users/users_update/?(:num)?'] = 'users/home/users_update/$1';
$route['users/users_delete/(:num)'] = 'users/home/users_delete/$1';
$route['users/users_group/?(:num)?'] = 'users/home/users_group/$1';
$route['users/users_group_add'] = 'users/home/users_group_add';
$route['users/users_group_update/?(:num)?'] = 'users/home/users_group_update/$1';
$route['users/users_group_delete/(:num)'] = 'users/home/users_group_delete/$1';

$route['branch/?(:num)?'] = 'branch/home/index/$1';
$route['branch/get_suggestion'] = 'branch/home/get_suggestion';
$route['branch/branch_add'] = 'branch/home/branch_add';
$route['branch/branch_update/?(:num)?'] = 'branch/home/branch_update/$1';
$route['branch/branch_delete/(:num)'] = 'branch/home/branch_delete/$1';

$route['customers/?(:num)?'] = 'customers/home/index/$1';
$route['customers/get_suggestion'] = 'customers/home/get_suggestion';
$route['customers/customers_add'] = 'customers/home/customers_add';
$route['customers/customers_update/?(:num)?'] = 'customers/home/customers_update/$1';
$route['customers/customers_delete/(:num)'] = 'customers/home/customers_delete/$1';

$route['categories/?(:num)?'] = 'categories/home/index/$1';
$route['categories/categories_add'] = 'categories/home/categories_add';
$route['categories/categories_update/?(:num)?'] = 'categories/home/categories_update/$1';
$route['categories/categories_delete/(:num)'] = 'categories/home/categories_delete/$1';

$route['packaging/?(:num)?'] = 'packaging/home/index/$1';
$route['packaging/packaging_add'] = 'packaging/home/packaging_add';
$route['packaging/packaging_update/?(:num)?'] = 'packaging/home/packaging_update/$1';
$route['packaging/packaging_delete/(:num)'] = 'packaging/home/packaging_delete/$1';

$route['price/(:num)/?(:num)?'] = 'price/home/index/$1/$2';
$route['price/price_add/(:num)'] = 'price/home/price_add/$1';
$route['price/price_update/(:num)/?(:num)?'] = 'price/home/price_update/$1/$2';
$route['price/price_delete/(:num)/(:num)'] = 'price/home/price_delete/$1/$2';

$route['products/?(:num)?'] = 'products/home/index/$1';
$route['products/get_suggestion'] = 'products/home/get_suggestion';
$route['products/products_add'] = 'products/home/products_add';
$route['products/products_update/?(:num)?'] = 'products/home/products_update/$1';
$route['products/products_delete/(:num)'] = 'products/home/products_delete/$1';

$route['group_product/?(:num)?'] = 'group_product/home/index/$1';
$route['group_product/group_product_add'] = 'group_product/home/group_product_add';
$route['group_product/group_product_update/?(:num)?'] = 'group_product/home/group_product_update/$1';
$route['group_product/group_product_delete/(:num)'] = 'group_product/home/group_product_delete/$1';

$route['group_sparepart/?(:num)?'] = 'group_sparepart/home/index/$1';
$route['group_sparepart/group_sparepart_add'] = 'group_sparepart/home/group_sparepart_add';
$route['group_sparepart/group_sparepart_update/?(:num)?'] = 'group_sparepart/home/group_sparepart_update/$1';
$route['group_sparepart/group_sparepart_delete/(:num)'] = 'group_sparepart/home/group_sparepart_delete/$1';

$route['sales/?(:num)?'] = 'sales/home/index/$1';
$route['sales/get_suggestion'] = 'sales/home/get_suggestion';
$route['sales/sales_add'] = 'sales/home/sales_add';
$route['sales/sales_update/?(:num)?'] = 'sales/home/sales_update/$1';
$route['sales/sales_delete/(:num)'] = 'sales/home/sales_delete/$1';

$route['sales_commision/?(:num)?'] = 'sales_commision/home/index/$1';
$route['sales_commision/sales_commision_add'] = 'sales_commision/home/sales_commision_add';
$route['sales_commision/sales_commision_update/?(:num)?'] = 'sales_commision/home/sales_commision_update/$1';
$route['sales_commision/sales_commision_delete/(:num)'] = 'sales_commision/home/sales_commision_delete/$1';

$route['services_wo/?(:num)?'] = 'services_wo/home/index/$1';
$route['services_wo/get_suggestion'] = 'services_wo/home/get_suggestion';
$route['services_wo/services_wo_print/?(:num)?'] = 'services_wo/home/services_wo_print/$1';
$route['services_wo/services_wo_add'] = 'services_wo/home/services_wo_add';
$route['services_wo/services_wo_update/?(:num)?'] = 'services_wo/home/services_wo_update/$1';
$route['services_wo/services_wo_delete/(:num)'] = 'services_wo/home/services_wo_delete/$1';
$route['services_wo/technical_add/(:num)'] = 'services_wo/home/technical_add/$1';
$route['services_wo/technical_tmp/(:num)'] = 'services_wo/home/technical_tmp/$1';
$route['services_wo/technical_delete/(:num)'] = 'services_wo/home/technical_delete/$1';
$route['services_wo/product_add/(:num)'] = 'services_wo/home/product_add/$1';
$route['services_wo/product_tmp/(:num)'] = 'services_wo/home/product_tmp/$1';
$route['services_wo/product_delete/(:num)'] = 'services_wo/home/product_delete/$1';
$route['services_wo/product_search/(:num)'] = 'services_wo/home/product_search/$1';

$route['services_sparepart/?(:num)?'] = 'services_sparepart/home/index/$1';
$route['services_sparepart/services_sparepart_add'] = 'services_sparepart/home/services_sparepart_add';
$route['services_sparepart/services_sparepart_update/?(:num)?'] = 'services_sparepart/home/services_sparepart_update/$1';
$route['services_sparepart/services_sparepart_delete/(:num)'] = 'services_sparepart/home/services_sparepart_delete/$1';
$route['services_sparepart/services_sparepart_print/(:num)'] = 'services_sparepart/home/services_sparepart_print/$1';
$route['services_sparepart/sparepart_add/(:num)'] = 'services_sparepart/home/sparepart_add/$1';
$route['services_sparepart/sparepart_search/(:num)'] = 'services_sparepart/home/sparepart_search/$1';
$route['services_sparepart/sparepart_tmp/(:num)'] = 'services_sparepart/home/sparepart_tmp/$1';
$route['services_sparepart/sparepart_delete/(:num)'] = 'services_sparepart/home/sparepart_delete/$1';

$route['services_report/?(:num)?'] = 'services_report/home/index/$1';
$route['services_report/services_report_add'] = 'services_report/home/services_report_add';
$route['services_report/services_report_update/?(:num)?'] = 'services_report/home/services_report_update/$1';
$route['services_report/services_report_delete/(:num)'] = 'services_report/home/services_report_delete/$1';
$route['services_report/services_report_print/(:num)'] = 'services_report/home/services_report_print/$1';
$route['services_report/product_tmp/(:num)'] = 'services_report/home/product_tmp/$1';

$route['inventory/?(:num)?/?(:num)?'] = 'inventory/home/index/$1/$2';
$route['inventory/(:num)/get_suggestion'] = 'inventory/home/get_suggestion/$1';
$route['inventory/inventory_add/?(:num)?'] = 'inventory/home/inventory_add/$1';
$route['inventory/inventory_update/?(:num)?/?(:num)?'] = 'inventory/home/inventory_update/$1/$2';
$route['inventory/inventory_delete/(:num)/(:num)'] = 'inventory/home/inventory_delete/$1/$2';

$route['rawmaterial_type/?(:num)?'] = 'rawmaterial_type/home/index/$1';
$route['rawmaterial_type/rawmaterial_type_add'] = 'rawmaterial_type/home/rawmaterial_type_add';
$route['rawmaterial_type/rawmaterial_type_update/?(:num)?'] = 'rawmaterial_type/home/rawmaterial_type_update/$1';
$route['rawmaterial_type/rawmaterial_type_delete/(:num)'] = 'rawmaterial_type/home/rawmaterial_type_delete/$1';

$route['rawmaterial/?(:num)?'] = 'rawmaterial/home/index/$1';
$route['rawmaterial/rawmaterial_add'] = 'rawmaterial/home/rawmaterial_add';
$route['rawmaterial/rawmaterial_update/?(:num)?'] = 'rawmaterial/home/rawmaterial_update/$1';
$route['rawmaterial/rawmaterial_delete/(:num)'] = 'rawmaterial/home/rawmaterial_delete/$1';

$route['technical/?(:num)?'] = 'technical/home/index/$1';
$route['technical/technical_add'] = 'technical/home/technical_add';
$route['technical/technical_update/?(:num)?'] = 'technical/home/technical_update/$1';
$route['technical/technical_delete/(:num)'] = 'technical/home/technical_delete/$1';
$route['technical/get_suggestion'] = 'technical/home/get_suggestion';

$route['sparepart/?(:num)?'] = 'sparepart/home/index/$1';
$route['sparepart/get_suggestion'] = 'sparepart/home/get_suggestion';
$route['sparepart/sparepart_add'] = 'sparepart/home/sparepart_add';
$route['sparepart/sparepart_update/?(:num)?'] = 'sparepart/home/sparepart_update/$1';
$route['sparepart/sparepart_delete/(:num)'] = 'sparepart/home/sparepart_delete/$1';

$route['suplier/?(:num)?'] = 'suplier/home/index/$1';
$route['suplier/get_suggestion'] = 'suplier/home/get_suggestion';
$route['suplier/suplier_add'] = 'suplier/home/suplier_add';
$route['suplier/suplier_update/?(:num)?'] = 'suplier/home/suplier_update/$1';
$route['suplier/suplier_delete/(:num)'] = 'suplier/home/suplier_delete/$1';

$route['coa/?(:num)?'] = 'coa/home/index/$1';
$route['coa/coa_add'] = 'coa/home/coa_add';
$route['coa/coa_update/?(:num)?'] = 'coa/home/coa_update/$1';
$route['coa/coa_delete/(:num)'] = 'coa/home/coa_delete/$1';

$route['coagroup/?(:num)?'] = 'coagroup/home/index/$1';
$route['coagroup/coagroup_add'] = 'coagroup/home/coagroup_add';
$route['coagroup/coagroup_update/?(:num)?'] = 'coagroup/home/coagroup_update/$1';
$route['coagroup/coagroup_delete/(:num)'] = 'coagroup/home/coagroup_delete/$1';

$route['closingperiod'] = 'closingperiod/home';
$route['generalledger'] = 'generalledger/home';

$route['journal/?(:num)?'] = 'journal/home/index/$1';
$route['journal/journal_add'] = 'journal/home/journal_add';
$route['journal/journal_update/?(:num)?'] = 'journal/home/journal_update/$1';
$route['journal/journal_delete/(:num)'] = 'journal/home/journal_delete/$1';
$route['journal/journal_child_delete/(:num)'] = 'journal/home/journal_child_delete/$1';

$route['pm/?(:num)?'] = 'pm/home/index/$1';
$route['pm/outbox/?(:num)?'] = 'pm/home/outbox/$1';
$route['pm/pm_read/(:num)'] = 'pm/home/pm_read/$1';
$route['pm/pm_reply/(:num)'] = 'pm/home/pm_reply/$1';
$route['pm/pm_new'] = 'pm/home/pm_new';
$route['pm/get_suggestion'] = 'pm/home/get_suggestion';
$route['pm/pm_delete/(:num)/(:num)'] = 'pm/home/pm_delete/$1/$2';

$route['opname/?(:num)?/?(:num)?'] = 'opname/home/index/$1/$2';
$route['opname/opname_update/?(:num)?/?(:num)?'] = 'opname/home/opname_update/$1/$2';
$route['opname/get_suggestion/(:num)'] = 'opname/home/get_suggestion/$1';

$route['target/?(:num)?'] = 'target/home/index/$1';
$route['target/target_add'] = 'target/home/target_add';
$route['target/target_update/?(:num)?'] = 'target/home/target_update/$1';
$route['target/target_delete/(:num)'] = 'target/home/target_delete/$1';

$route['reportopname/?(:num)?/?(:num)?'] = 'reportopname/home/index/$1/$2';
$route['reportopname/sortreport/?(:num)?/?(:num)?/?(:num)?'] = 'reportopname/home/sortreport/$1/$2/$3';

$route['request/?(:num)?'] = 'request/home/index/$1';
$route['request/request_add'] = 'request/home/request_add';
$route['request/request_update/?(:num)?'] = 'request/home/request_update/$1';
$route['request/request_delete/(:num)'] = 'request/home/request_delete/$1';
$route['request/request_detail/(:num)'] = 'request/home/request_detail/$1';
$route['request/request_items/?(:num)?'] = 'request/home/request_items/$1';
$route['request/request_list_items/(:num)/?(:num)?/?(:num)?'] = 'request/home/request_list_items/$1/$2/$3';
$route['request/request_items_delete/(:num)'] = 'request/home/request_items_delete/$1';
$route['request/request_items_add/(:num)'] = 'request/home/request_items_add/$1';
$route['request/export/(excel|excel_detail)/?(:num)?'] = 'request/home/export/$1/$2';
$route['request/request_search'] = 'request/home/request_search';
$route['request/request_search_result/(:any)'] = 'request/home/request_search_result/$1';
$route['request/get_suggestion'] = 'request/home/get_suggestion';

$route['receiving/?(:num)?'] = 'receiving/home/index/$1';
$route['receiving/receiving_add'] = 'receiving/home/receiving_add';
$route['receiving/receiving_update/?(:num)?'] = 'receiving/home/receiving_update/$1';
$route['receiving/receiving_delete/(:num)'] = 'receiving/home/receiving_delete/$1';
$route['receiving/receiving_detail/(:num)'] = 'receiving/home/receiving_detail/$1';
$route['receiving/receiving_types/(:num)/?(:num)?'] = 'receiving/home/receiving_types/$1/$2';
$route['receiving/receiving_items/?(:num)?'] = 'receiving/home/receiving_items/$1';
$route['receiving/receiving_list_items/(:num)/?(:num)?'] = 'receiving/home/receiving_list_items/$1/$2';
$route['receiving/receiving_items_add/(:num)'] = 'receiving/home/receiving_items_add/$1';
$route['receiving/receiving_items_delete/(:num)'] = 'receiving/home/receiving_items_delete/$1';
$route['receiving/export/(excel|excel_detail)/?(:num)?'] = 'receiving/home/export/$1/$2';

$route['transfer/?(:num)?'] = 'transfer/home/index/$1';
$route['transfer/transfer_add'] = 'transfer/home/transfer_add';
$route['transfer/transfer_update/?(:num)?'] = 'transfer/home/transfer_update/$1';
$route['transfer/transfer_delete/(:num)'] = 'transfer/home/transfer_delete/$1';
$route['transfer/transfer_detail/(:num)'] = 'transfer/home/transfer_detail/$1';
$route['transfer/transfer_request_items/(:num)'] = 'transfer/home/transfer_request_items/$1';
$route['transfer/export/(excel|excel_detail)/?(:num)?'] = 'transfer/home/export/$1/$2';
$route['transfer/transfer_search'] = 'transfer/home/transfer_search';
$route['transfer/transfer_search_result/(:any)'] = 'transfer/home/transfer_search_result/$1';
$route['transfer/get_suggestion'] = 'transfer/home/get_suggestion';

$route['printpage/(receiving|dist_request|dist_transfer)/(:num)'] = 'printpage/home/$1/$2';

$route['city/?(:num)?'] = 'city/home/index/$1';
$route['city/city_add'] = 'city/home/city_add';
$route['city/city_update/?(:num)?'] = 'city/home/city_update/$1';
$route['city/city_delete/(:num)'] = 'city/home/city_delete/$1';

$route['province/?(:num)?'] = 'province/home/index/$1';
$route['province/province_add'] = 'province/home/province_add';
$route['province/province_update/?(:num)?'] = 'province/home/province_update/$1';
$route['province/province_delete/(:num)'] = 'province/home/province_delete/$1';
/* End of file routes.php */
/* Location: ./application/config/routes.php */
