<?php

class Controller
{

    function __construct()
    {
        $this->view = new View();
        $this->jyll = new Jyll();

    }

    public function loadModel($param)
    {

        $path = 'models/' . $param . '_model.php';
        if (file_exists($path)) {

            require $path;
            $name = $param . '_Model';
            $this->model = new $name;
        }

    }

    public static function FrameworkExt($array)
    {
        $link = 'ext/' . $array . '.php';
        require_once $link;
    }


    public function redirect($link)
    {
        $link = HOMEPAGE . $link;

        header("Location: $link");
    }

    public function server_request()
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {


        } else {
            $this->redirect('error');
        }

    }


}