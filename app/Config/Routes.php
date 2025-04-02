<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// 後台
$routes->group('backend', static function ($routes) {
    $routes->get('', 'Login::index');
    $routes->post('login', 'Login::login');
    $routes->get('logout', 'Login::logout');

    //主頁	
    $routes->get('setting/mypage', 'Setting::mypage');

    // 帳號管理
    $routes->group('user',  static function ($routes) {
        $routes->get('/', 'User::index');
        $routes->get('create', 'User::create');
        $routes->post('additem', 'User::additem');
        $routes->get('edit/(:num)', 'User::edit/$1');
        $routes->post('edititem', 'User::edititem');
        $routes->get('delitem/(:num)', 'User::delitem/$1');
    });

    // 創業教學管理
    $routes->group('videos',  static function ($routes) {
        $routes->get('/', 'Videos::index');
        $routes->get('create', 'Videos::create');
        $routes->post('additem', 'Videos::additem');
        $routes->get('edit/(:num)', 'Videos::edit/$1');
        $routes->post('edititem', 'Videos::edititem');
        $routes->get('delitem/(:num)', 'Videos::delitem/$1');
    });

    // TAG管理
    $routes->group('tags',  static function ($routes) {
        $routes->get('/', 'Tags::index');
        $routes->get('create', 'Tags::create');
        $routes->post('additem', 'Tags::additem');
        $routes->get('edit/(:num)', 'Tags::edit/$1');
        $routes->post('edititem', 'Tags::edititem');
        $routes->get('delitem/(:num)', 'Tags::delitem/$1');
    });

    // 聯絡我們管理
    $routes->group('contact',  static function ($routes) {
        $routes->get('/', 'Contact::index');
        $routes->get('view/(:num)', 'Contact::view/$1');
        $routes->get('delitem/(:num)', 'Contact::delitem/$1');
    });

    // 作品分類管理
    $routes->group('product_group',  static function ($routes) {
        $routes->get('/', 'ProductGroup::index');
        $routes->get('create', 'ProductGroup::create');
        $routes->post('additem', 'ProductGroup::additem');
        $routes->get('edit/(:num)', 'ProductGroup::edit/$1');
        $routes->post('edititem', 'ProductGroup::edititem');
        $routes->get('delitem/(:num)', 'ProductGroup::delitem/$1');
    });

    // 作品管理
    $routes->group('products',  static function ($routes) {
        $routes->get('/', 'Products::index');
        $routes->get('create', 'Products::create');
        $routes->post('additem', 'Products::additem');
        $routes->get('edit/(:num)', 'Products::edit/$1');
        $routes->post('edititem', 'Products::edititem');
        $routes->get('delitem/(:num)', 'Products::delitem/$1');
    });

    // 權限管理
    $routes->group('permission', static function ($routes) {
        $routes->get('/', 'Permission::index');
        $routes->post('save', 'Permission::save');
    });
});
