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
$route['branch/branch_add'] = 'branch/home/branch_add';
$route['branch/branch_update/?(:num)?'] = 'branch/home/branch_update/$1';
$route['branch/branch_delete/(:num)'] = 'branch/home/branch_delete/$1';

$route['customers/?(:num)?'] = 'customers/home/index/$1';
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
$route['products/products_add'] = 'products/home/products_add';
$route['products/products_update/?(:num)?'] = 'products/home/products_update/$1';
$route['products/products_delete/(:num)'] = 'products/home/products_delete/$1';

$route['sales/?(:num)?'] = 'sales/home/index/$1';
$route['sales/sales_add'] = 'sales/home/sales_add';
$route['sales/sales_update/?(:num)?'] = 'sales/home/sales_update/$1';
$route['sales/sales_delete/(:num)'] = 'sales/home/sales_delete/$1';

$route['sales_commision/?(:num)?'] = 'sales_commision/home/index/$1';
$route['sales_commision/sales_commision_add'] = 'sales_commision/home/sales_commision_add';
$route['sales_commision/sales_commision_update/?(:num)?'] = 'sales_commision/home/sales_commision_update/$1';
$route['sales_commision/sales_commision_delete/(:num)'] = 'sales_commision/home/sales_commision_delete/$1';

$route['services/?(:num)?'] = 'services/home/index/$1';
$route['services/services_add'] = 'services/home/services_add';
$route['services/services_update/?(:num)?'] = 'services/home/services_update/$1';
$route['services/services_delete/(:num)'] = 'services/home/services_delete/$1';

$route['inventory/?(:num)?/?(:num)?'] = 'inventory/home/index/$1/$2';
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

$route['sparepart/?(:num)?'] = 'sparepart/home/index/$1';
$route['sparepart/sparepart_add'] = 'sparepart/home/sparepart_add';
$route['sparepart/sparepart_update/?(:num)?'] = 'sparepart/home/sparepart_update/$1';
$route['sparepart/sparepart_delete/(:num)'] = 'sparepart/home/sparepart_delete/$1';

$route['suplier/?(:num)?'] = 'suplier/home/index/$1';
$route['suplier/suplier_add'] = 'suplier/home/suplier_add';
$route['suplier/suplier_update/?(:num)?'] = 'suplier/home/suplier_update/$1';
$route['suplier/suplier_delete/(:num)'] = 'suplier/home/suplier_delete/$1';

$route['coa/?(:num)?'] = 'coa/home/index/$1';
$route['coa/coa_add'] = 'coa/home/coa_add';
$route['coa/coa_update/?(:num)?'] = 'coa/home/coa_update/$1';
$route['coa/coa_delete/(:num)'] = 'coa/home/coa_delete/$1';

$route['pm/?(:num)?'] = 'pm/home/index/$1';
$route['pm/outbox/?(:num)?'] = 'pm/home/outbox/$1';
$route['pm/pm_read/(:num)'] = 'pm/home/pm_read/$1';
$route['pm/pm_reply/(:num)'] = 'pm/home/pm_reply/$1';
$route['pm/pm_new'] = 'pm/home/pm_new';
$route['pm/get_suggestion'] = 'pm/home/get_suggestion';
$route['pm/pm_delete/(:num)/(:num)'] = 'pm/home/pm_delete/$1/$2';

$route['opname/?(:num)?/?(:num)?'] = 'opname/home/index/$1/$2';
$route['opname/opname_update/?(:num)?/?(:num)?'] = 'opname/home/opname_update/$1/$2';

$route['reportopname/?(:num)?/?(:num)?'] = 'reportopname/home/index/$1/$2';
$route['reportopname/sortreport/?(:num)?/?(:num)?/?(:num)?'] = 'reportopname/home/sortreport/$1/$2/$3';
/* End of file routes.php */
/* Location: ./application/config/routes.php */
