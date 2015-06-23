<?php

class Session
{

    public static function init()
    {
        @session_start();
    }

    public static function set($key, $val)
    {
        $_SESSION[$key] = $val;
    }

    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
    }

    public static function destroy()
    {
        session_destroy();
    }

    public static function checklogged()
    {
        if (Session::get(sessionname) == FALSE) {
            Session::destroy();
            $link = logginerrorpage;
            header("location: $link");
            exit;
        }

    }


    public static function mustlogg()
    {
    	if (Session::get(sessionname) == FALSE) {
    		Session::destroy();
    		$link = loginpage;
    		header("location: $link");
    		exit;
    	}
    
    }
    

    public static function block_for_logged()
    {
        if (Session::get(sessionname) == TRUE) {
            $link = logginerrorpage;
            header("location: $link");
            exit;
        }

    }


}
