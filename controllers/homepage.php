<?php

class Homepage extends Controller
{

    function __construct()
    {
        parent::__construct();


    }

    public function _own()
    {
        $menu['nologged'] = array(
            'index','about','contact'
        );
        $menu['user'] = array(
            'index','about','contact'
        );
        $menu['admin'] = array(
            'index','about','contact'
        );
        return $menu;
    }


    public function index()
    {
        $this->view->render('homepage/index');
    }
    public function about()
    {
        $this->view->render('homepage/about');
    }
    public function contact()
    {
        $this->view->render('homepage/contact');
    }


}
