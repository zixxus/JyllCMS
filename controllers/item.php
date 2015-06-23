<?php

class Item extends Controller
{

    function __construct()
    {
        parent::__construct();


    }

    public function _own()
    {
        $menu['nologged'] = array(
            'products','services'
        );
        $menu['user'] = array(
            'products','services'
        );
        $menu['admin'] = array(
            'products','services'
        );
        return $menu;
    }


    public function products()
    {
        $this->view->render('item/products');
    }
    public function services()
    {
        $this->view->render('item/services');
    }


}
