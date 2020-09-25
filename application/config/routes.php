<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route = array(
    'default_controller' => 'produk',
    'administrator' => 'administrator',
    'login' => 'login',
    'agenda' => 'agenda',
    'auth' => 'auth',
    'berita' => 'berita',
    'contact' => 'contact',
    'download' => 'download',
    'gallery' => 'gallery',
    'konfirmasi' => 'konfirmasi',
    'main' => 'main',
    'members' => 'members',
    'page' => 'page',
    'produk' => 'produk',
    'reseller' => 'reseller',
    'testimoni' => 'testimoni',
    'video' => 'video',
    'administrator/laporan/penjualan'   => 'laporan/penjualan',
    'administrator/laporan/pembelian'   => 'laporan/pembelian',
    'administrator/laporan/kas'   => 'laporan/kas',
    'administrator/laporan/hutang'   => 'laporan/hutang',
    'administrator/laporan/piutang'   => 'laporan/piutang',
    'administrator/laporan/laba_rugi'   => 'laporan/laba_rugi',
    'administrator/laporan/stok_opname'   => 'laporan/stok_opname',
    'administrator/laporan/stok_in_out'   => 'laporan/stok_in_out',
    'administrator/laporan/retur_penjualan'   => 'laporan/retur_penjualan',
    'administrator/laporan/retur_pembelian'   => 'laporan/retur_pembelian',
);

$route['(:any)'] = 'ref/$1/$2';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
