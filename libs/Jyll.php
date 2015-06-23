<?php
#version 0.1.1 beta //function many parametrs
#version 0.1.1 beta // add delete function 
class Jyll
{


    function __construct()
    {
        include "Jyll/Jyll_owner.php";
        include "Jyll/Jyll_menu.php";
        include "Jyll/Jyll_form.php";

        $this->owner = new Jyll_owner();
        $this->menu = new Jyll_menu();
        $this->Jform = new Jyll_form();
        $this->owner->pageerror();
        $this->menu->requiremenu();
        $this->Jform->required_form();
        
        
        
        foreach($_POST as $k=>$v){
            if(isset($_POST[$k])){
                $_POST[$k] = htmlspecialchars($_POST[$k]);
            }
        } 

    }
public function selected_class(){

    $result = array();
    $parent='Controller';
    foreach (get_declared_classes() as $class) {
        if (is_subclass_of($class, $parent)){
            return $class;
        }
    }
}

    public function get_redirect($where){

        $link = HOMEPAGE.$where;
        header("Location:$link");


    }

    public function get_error($NO,$val = null){
    	$link = HOMEPAGE.'error/error_'.$NO.'/'.$val;
    	header("Location:$link");
    }
    public function url(){

        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        return $url;
    }

    public function icon($addr){
        $build = '';
        if(is_array($addr)){

            foreach($addr as $key=>$val){
                if($key == 'src'){

                    $build .= ' '.$key.'="'.HOMEPAGE.'views/_images/icon/'.$val.'"';
                }else{
                $build .= ' '.$key.'="'.$val.'"';
                }
            }
        }else{
            $build = ' src="'.HOMEPAGE.'views/_images/icon/'.$addr.'"';
        }
        $ret = '<img '.$build.' />';

return $ret;

    }


    public function base_image($addr){
        $build = '';
        if(is_array($addr)){

            foreach($addr as $key=>$val){
                if($key == 'src'){

                    $build .= ' '.$key.'="'.HOMEPAGE.'views/_images/'.$val.'"';
                }else{
                    $build .= ' '.$key.'="'.$val.'"';
                }
            }
        }else{
            $build = ' src="'.HOMEPAGE.'views/_images/'.$addr.'"';
        }
        $ret = '<img '.$build.' />';

        return $ret;

    }

    public function loadModel($param)
    {
    
    	$path = 'models/' . $param . '_model.php';
    	if (file_exists($path)) {
    
    		require_once $path;
    		$name = $param . '_Model';
    		$this->$param = new $name;
    	}else{
    		Jyll::get_error(4);
    	}
    
    }
    public function one_or_zero($one_or_zero, $error_no){
    	if($one_or_zero == 0){
    		Jyll::get_error($error_no);
    	}
    }
    public function get_ip(){
    	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    		$ip = $_SERVER['HTTP_CLIENT_IP'];
    	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    	} else {
    		$ip = $_SERVER['REMOTE_ADDR'];
    	}
    	return $ip;
    }
    public function get_alert(){
    	if(isset($_GET['alert'])){
    		echo $_GET['alert'];
    	}
    }
    

}
