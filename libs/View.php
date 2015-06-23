<?php

class View
{

    function __construct()
    {
        define('Layout', 'views/_layouts/');
        define('siteimage', HOMEPAGE . 'public/img/');
        define('sitecss', HOMEPAGE . 'public/css/');
        define('sitejs', HOMEPAGE . 'public/js/');
    }

    public function render($name, $noinclude = False, $head = 'head', $foot = 'foot')
    {
//        $noinclude[0] = 1;
        if ($noinclude[0] == 0) {
            require 'views/_layouts/' . $head . '.php';
            require 'views/' . $name . '.php';

            require 'views/_layouts/' . $foot . '.php';
        } else {
            require 'views/' . $name . '.php';

        }
    }

    public function render_lightbox($name)
    {

        //echo '<div id="lightbox_bg" onclick="closelightbox()">';
        echo '<div id="lightbox_bg" >';
        require 'views/' . $name . '.php';
        echo '</div>';
    }

    public function render_ajax($name)
    {

    	echo '<div id="ajax_bg" >';
    	require 'views/' . $name . '.php';
    	echo '</div>';
    }
    
    public function addLay($param)
    {
        require 'views/_layouts/' . $param . '.php';
    }

    public static function loginForm()
    {
        if (Session::get(sessionname) == FALSE) {

            echo '
    

<form action="' . HOMEPAGE . 'login/check_login" method="post">
    <label>login</label><input type="text" name="login" />
    <label>pass</label><input type="password" name="password" />
    <label></label><input type="submit" name="sub" value="Log In !" />
</form>
    
    ';
        }
    }

    public static function redirectme($param)
    {

        $link = HOMEPAGE . $param;
        header("Location: $link");

    }

    public static function makeform($array)
    {

    }

    public static function fileuploader()
    {

    }


}
