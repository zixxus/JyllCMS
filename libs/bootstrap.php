<?php

class Bootstrap {

    function __construct() {
        Session::init();
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);


        if (empty($url[0])) {
            $url[0] = DEFAULTPAGE;
        }
//        print_r($url);
        $file = 'controllers/' . $url[0] . '.php';
        if (file_exists($file)) {
            require $file;
        } else {

            header('Location:' . ERRORPAGE);
        }

        $controller = new $url[0];
        $controller->loadModel($url[0]);

        if (isset($url[2])) {
            if (count($url) >= 2) {
//                call_user_func_array("Login::user", $url);

                $parametrs = $url;
                array_splice($parametrs, 0, 2);
                call_user_func_array(array($controller, $url[1]), $parametrs);
//                $controller->{$url[1]}();
            } else {
                $controller->{$url[1]}($url[2]);
            }
//            if(isset($url[3])){
//                
//                $controller->{$url[1]}($url[2],$url[3]);
//            }else{
//            $controller->{$url[1]}($url[2]);
//            }
        } else {


            if (isset($url[1])) {


                if (method_exists($controller, $url[1])) {

                    $controller->$url[1]();
                } else {

                    header('Location:' . ERRORPAGE);
                }
            } else {
                $defaultpath = DEFAULTPAGEPATH;
                $controller->$defaultpath();
            }
        }
    }

}
