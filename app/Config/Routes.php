<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('about', 'About::index');

// 產品
$routes->group('products', static function ($routes) {
    $routes->get('/', 'Products::index_main'); // 前台主分類列表
    $routes->get('index_sub/(:num)', 'Products::index_sub/$1'); // 前台副分類列表
    $routes->get('index/(:num)', 'Products::index/$1'); // 前台產品列表
    $routes->get('detail/(:num)', 'Products::detail/$1'); // 前台產品詳細
    $routes->get('search', 'Products::search'); // 前台產品搜尋
    $routes->get('global-search', 'Products::globalSearch'); // 全站搜尋
});

// 技術支援
$routes->group('support', static function ($routes) {
    $routes->get('/', 'Support::index');
    $routes->get('download/(:any)', 'Support::download/$1');
});

// 活動訊息
$routes->group('news', static function ($routes) {
    $routes->get('/', 'News::index'); // 前台列表
    $routes->get('detail/(:num)', 'News::detail/$1'); // 前台詳細
});

// 聯絡我們
$routes->group('contact', static function ($routes) {
    $routes->get('/', 'Contact::create'); // 前台畫面
    $routes->post('/', 'Contact::submit'); // 前台送出
});

// 後台
$routes->group('backend', static function ($routes) {
    $routes->get('', 'Login::index');
    $routes->post('login', 'Login::login');
    $routes->get('logout', 'Backend\Login::logout');

    //主頁	
    $routes->add('setting/mypage', 'Backend\Setting::mypage');

    //產品大分類管理
    $routes->add('productmc', 'Backend\ProductMC::index');
    $routes->add('productmc/create', 'Backend\ProductMC::create');
    $routes->post('productmc/additem', 'Backend\ProductMC::additem');
    $routes->add('productmc/edit/(:num)', 'Backend\ProductMC::edit/$1');
    $routes->post('productmc/edititem', 'Backend\ProductMC::edititem');
    $routes->add('productmc/delitem/(:num)', 'Backend\ProductMC::delitem/$1');
    //產品小分類管理
    $routes->add('productsc', 'Backend\ProductSC::index');
    $routes->add('productsc/create', 'Backend\ProductSC::create');
    $routes->post('productsc/additem', 'Backend\ProductSC::additem');
    $routes->add('productsc/edit/(:num)', 'Backend\ProductSC::edit/$1');
    $routes->post('productsc/edititem', 'Backend\ProductSC::edititem');
    $routes->add('productsc/delitem/(:num)', 'Backend\ProductSC::delitem/$1');

    //產品管理
    $routes->group('product', static function ($routes) {
        $routes->add('/', 'Backend\Product::index');
        $routes->add('create', 'Backend\Product::create');
        $routes->get('getSubCategories/(:num)', 'Backend\Product::getSubCategories/$1');
        $routes->get('get-tags/(:num)', 'Backend\Product::getTags/$1');
        $routes->post('additem', 'Backend\Product::additem');
        $routes->add('edit/(:num)', 'Backend\Product::edit/$1');
        $routes->post('edititem', 'Backend\Product::edititem');
        $routes->delete('(:num)', 'Backend\Product::delete/$1');
    });

    // 帳號管理
    $routes->group('user',  static function ($routes) {
        $routes->add('/', 'Backend\User::index');
        $routes->add('create', 'Backend\User::create');
        $routes->post('additem', 'Backend\User::additem');
        $routes->add('edit/(:num)', 'Backend\User::edit/$1');
        $routes->post('edititem', 'Backend\User::edititem');
        $routes->add('delitem/(:num)', 'Backend\User::delitem/$1');
    });

    // 聯絡我們管理
    $routes->group('contact', static function ($routes) {
        $routes->get('/', 'Contact::index');
        $routes->delete('(:num)', 'Contact::delete/$1');
    });

    // 活動訊息管理
    $routes->group('news', static function ($routes) {
        $routes->get('/', 'News::index_backend');
        $routes->get('create', 'News::create');
        $routes->post('/', 'News::create_submit');
        $routes->get('(:num)', 'News::edit/$1');
        $routes->post('edit', 'News::edit_submit');
        $routes->delete('(:num)', 'News::delete/$1');
    });

    // 產品諮詢服務管理
    $routes->group('consultations', static function ($routes) {
        $routes->get('/', 'Support::index_consultations');
        $routes->get('create', 'Support::create_consultations');
        $routes->post('/', 'Support::create_consultations_submit');
        $routes->get('(:num)', 'Support::edit_consultations/$1');
        $routes->post('edit', 'Support::edit_consultations_submit');
        $routes->delete('(:num)', 'Support::delete_consultations/$1');
    });

    // 產品諮詢服務管理
    $routes->group('downloads', static function ($routes) {
        $routes->get('/', 'Support::index_download');
        $routes->get('create', 'Support::create_download');
        $routes->post('/', 'Support::create_download_submit');
        $routes->get('(:num)', 'Support::edit_download/$1');
        $routes->post('edit', 'Support::edit_download_submit');
        $routes->delete('(:num)', 'Support::delete_download/$1');
    });

    //Banners
    $routes->add('banners', 'Backend\Banners::index');
    $routes->add('banners/create', 'Backend\Banners::create');
    $routes->post('banners/additem', 'Backend\Banners::additem');
    $routes->add('banners/edit/(:num)', 'Backend\Banners::edit/$1');
    $routes->post('banners/edititem', 'Backend\Banners::edititem');
    $routes->add('banners/delitem/(:num)', 'Backend\Banners::delitem/$1');
});
