<?php

namespace null\Libraries;

use App\Models\ProductMainCategoriesModel;

class MenuService
{
    public function getMainCategories() {
        $cachekey='main_menu_categories';

        if(!$categories=cache($cachekey)){
            $pmcModel=new ProductMainCategoriesModel();
            $categories=$pmcModel->getEnabledCategories();
            
            cache()->save($cachekey,$categories,3600);
        }

        return $categories;
    }
}
