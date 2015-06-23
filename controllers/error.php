<?php

class Error extends Controller
{
	
// 	error 404 to blad 404
//  error 403 brak strony pokazuje 404
//  error 100 Pustka przy delete
// 	error 1 to brak zalogowania
// 	error 2 brak uprawnien (przenies do homepage)
// 	error 3 blad obrazka(format)
//  error 4 zly zalaczony plik model
//  error 5 zle dane do logowania
//  error 6 zly odbior z transferuj
//  error 7 Zle uzupelnione pola
//  error 8 pusty portfel ! //nie zrobione jeszcze
//  error 9 wystapil blad podczas create_command //nie zrobione jeszcze
//	error 10 brak takiej pamieci //nie zrobione jeszcze
//	error 11 (rejestracja) istnieje taki email
//	error 12 (rejestracja) istnieje taki login
    function __construct()
    {
        parent::__construct();
        

    }

    public function _own(){
        $menu['nologged'] = array(
            'index','loggin','error_404','error_1','error_2','error_3','error_4','error_5',
            'error_6','error_7','error_8','error_9','error_10','error_11','error_12'
        );
        $menu['user'] = array(
            'index','loggin','error_404','error_1','error_2','error_3','error_4','error_5',
            'error_6','error_7','error_8','error_9','error_10'
        );
        $menu['moderator'] = array(
            'index','loggin','error_404','error_1','error_2','error_3','error_4','error_5',
            'error_6','error_7','error_8','error_9','error_10'
        );
        $menu['admin'] = array(
            'index','loggin','error_404','error_1','error_2','error_3','error_4','error_5',
        'error_6','error_7','error_8','error_9','error_10','error_100'
        );
        return $menu;
    }

    public function index()
    {
        $this->view->render('error/error');
    }

    public function loggin()
    {
        $this->view->render('error/loggin');

    }

    public function error_404(){

        $this->view->render('error/404','1');
    }
    public function error_1(){
    	$this->view->address = HOMEPAGE.'login/index';
        $this->view->render('error/1','1');
        
    }
    public function error_2(){
    	
        $this->view->render('error/2','1');
        
    }
    public function error_3(){
    	
        $this->view->render('error/3','1');
        
       
    }
    public function error_4(){
        $this->view->render('error/4','1');
    }
    public function error_5(){
        $this->view->render('error/5');
    }
    public function error_6(){
        $this->view->render('error/6');
    }
    public function error_7(){
        $this->view->render('error/7');
    }
    public function error_8(){
        $this->view->error = "error_8";
        $this->view->render('error/error_all');
    }
    public function error_9(){
        $this->view->error = "Acount Create Error";
        $this->view->render('error/error_all');
    }
    public function error_10(){
        $this->view->error = "error_10";
        $this->view->render('error/error_all');
    }
    public function error_11(){
        $this->view->error = "This email use before";
        $this->view->render('error/error_all');
    }
    public function error_12(){
        $this->view->error = "This Login use before";
        $this->view->render('error/error_all');
    }
    
    public function error_100($value){
        $this->view->error = "This Login use before";
    }
}