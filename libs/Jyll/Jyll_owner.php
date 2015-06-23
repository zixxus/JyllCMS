<?php


class Jyll_owner
{


    public function check_own()
    {
        $session = Session::get('owner');
        if ($session == null) {
            $session = 'nologged';
        }
        return $session;

    }
    public function redirect_own($when,$link){
        if($when){
            View::redirectme($link);
        }
    }

    public function pageerror(){

        $class = Jyll::selected_class();
        $own = $this->check_own();
//echo $own;
        if($own == null){
            $own = 'nologged';
        }
        $c = 0;
        if (method_exists($class, '_own')) {
            $select_class = $class::_own();
//            print_r($select_class);
            foreach($select_class[$own] as $k=>$v){
//                echo $v;
$allow[$v] = $v;

            }
            foreach($select_class as $k=>$v){

            	foreach($select_class[$k] as $k=>$v){
            		
            		$all_own[] = $v;
            	
            	}

            }

            $all_own = array_unique($all_own);

        }

//        print_r(Jyll::url());
if(Jyll::url()[0] == null){
    $link = HOMEPAGE.DEFAULTPAGE.'/'.DEFAULTPAGEPATH;
    header("Location: $link");
}else if(Jyll::url()[0] != null && Jyll::url()[1] == null){
   $link = HOMEPAGE.Jyll::url()[0].'/'.DEFAULTPAGEPATH;
   header("Location: $link");

// 	Jyll::get_error(3);
//     Jyll::get_error(404);


}else if(Jyll::url()[0] != null && Jyll::url()[1] != null){
	
	
    if(method_exists(Jyll::url()[0], Jyll::url()[1])){

//     	print_r($all_own);
//     	echo $allow[Jyll::url()[1]];
//     	echo array_search($allow[Jyll::url()[1]], $all_own);
//     	exit;
    	
    	if(!in_array($allow[Jyll::url()[1]], $all_own)){
  		

    		if($own == 'nologged'){
    		
    			echo 'nologged';
//     			exit;
    			Jyll::get_error(1);
    		}else{
    		
    			echo 'logged brak uprawnien';
//     			exit;
    		
    			Jyll::get_error(2);
    		}
    		
    		
    	}
    	
    	
    }else{
    	
        Jyll::get_error(404);

    }
}
    }

public function must_ajax($on){
	
	if ( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' )
	{
		
		
	}else{
		Jyll::get_error(404);
	}

}

public function must_ajax_render($on,$off){
	

	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		/* special ajax here */
		View::render_ajax($on);
	}else{
		View::render($off);
	}
}


}