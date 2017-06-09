<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['obat'] = 'home/obat';
$route['obat/(:any)'] = 'home/obat/$1';
$route['cek'] = 'home/cek';
$route['konfirmasi'] = 'home/konfirmasi';
$route['beli'] = 'home/beli';
$route['beli/(:any)'] = 'home/tambah_keranjang/$1';

//AJAX
$route['update_jumlah'] = 'home/update_jumlah';
$route['del_item'] = "home/del_item";

$route['default_controller'] = 'home';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
