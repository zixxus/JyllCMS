<?php

class Homepage_Model extends Model
{

    function __construct()
    {
        parent::__construct();

    }

    public function index()
    {

//         $data = $this->relation_command(array(
//             'from' => 'pamiec_assigned',
//             'inner' => array(
//                 'pamiec',
//                 'user',
//                 'image',
//             		'image_assigned'
//             ),
//             'on' => array(
//                 'pamiec_assigned.pa_pamiec_id' => 'pamiec.p_id',
//                 'pamiec_assigned.pa_user_id' => 'user.u_id',
//                 'pamiec.p_id' => 'image_assigned.pamiec_id',
//                 'image.id' => 'image_assigned.img_id',
//             ),
//             'where' => '1 ORDER BY pamiec_assigned.pa_pamiec_id DESC limit 5',
//         ));
// $data = $this->normal_query_all("SELECT *
// FROM pamiec_assigned
// INNER JOIN user ON user.u_id = pamiec_assigned.pa_user_id
// INNER JOIN pamiec ON pamiec.p_id = pamiec_assigned.pa_pamiec_id
// INNER JOIN image_assigned ON image_assigned.pamiec_id = pamiec.p_id
// INNER JOIN image oN image_assigned.img_id = image.id
// GROUP BY pamiec.p_id ORDER BY p_id DESC LIMIT 5

// 		");


$data = $this->relation_command_full(array(
		'select'=>'*,pamiec.p_id AS id, COUNT(swieczki.idswieczki) AS ilosc_swieczek',
		'from' => 'pamiec',
		'inner' => array(
				'pamiec_assigned'=>array(
				'pamiec.p_id' => 'pamiec_assigned.pa_pamiec_id',
						
				),
				'user'=>array(

						'pamiec_assigned.pa_user_id' => 'user.u_id',
				),
				'image_assigned'=>array(
				'pamiec.p_id' => 'image_assigned.pamiec_id',
						
				),
				'image'=>array(

						'image.id' => 'image_assigned.img_id',
				),
		),
		'left' => array(
				'swieczki'=>array(
						'swieczki.p_id'=>'pamiec.p_id',
				),
		),
// 		`idswieczki`, `p_id`, `u_id`, `data`
		'group' => 'pamiec.p_id ORDER BY pamiec.p_id DESC LIMIT 5',
));

        return $data;
    }
    public function comment()
    {

       $data = $this->relation_command(array(
           'from'=>'pamiec_komentarze',
           'inner'=>array(
'pamiec','user',
           ),
           'on'=>array(
               'pamiec_komentarze.pk_pamiec_id'=>'pamiec.p_id',
               'pamiec_komentarze.pk_user_id'=>'user.u_id',

           ),
           'where'=>'1 ORDER BY pamiec_komentarze.pk_id DESC limit 10',

       ));

        return $data;
    }
    public function getdata($n){

        $data = array(
            'from' => 'pamiec_assigned',
            'inner' => array(
                'pamiec',
                'user',
                'image',
            ),
            'on' => array(
                'pamiec_assigned.pa_pamiec_id' => 'pamiec.p_id',
                'pamiec_assigned.pa_user_id' => 'user.u_id',
                'pamiec.image' => 'image.id',
            ),
            'where' => '1 ORDER BY pamiec_assigned.pa_pamiec_id DESC limit 5',
        );
        return $data;
    }

    public function loadmore($id){

        $pages = '12';
        $p_start = '5';
//         $ob1 = ($id*$pages)-$p_start-1-$id;
$page_start = 5;
$wybrane = $page_start+($id*10);
$pages = 5;

$lewa = $wybrane-10;
$prawa= $wybrane-5;


        $pagination_max = $this->fetch_command(array(
            'select'=>'*',
            'from'=>'pamiec',
            'where'=>"1",
        ),0,1);
$pg_count = $pagination_max->rowCount();

        $data['max'] = ceil(($pg_count-$p_start)/$pages);

//        echo $data['max'];



        //     FROM pamiec_assigned
        //     INNER JOIN user ON user.u_id = pamiec_assigned.pa_user_id
        //     INNER JOIN pamiec ON pamiec.p_id = pamiec_assigned.pa_pamiec_id
        //     INNER JOIN image_assigned ON image_assigned.pamiec_id = pamiec.p_id
        //     INNER JOIN image oN image_assigned.img_id = image.id
        //     GROUP BY pamiec.p_id ORDER BY p_id DESC LIMIT 5
        


       
//          $data['pdo'] = $this->relation_command(array(
//             'from' => 'pamiec_assigned',
//             'inner' => array(
//                 'user',
//                 'pamiec',
//                 'image_assigned',
//                 'image',
//             ),
//             'on' => array(
//                 'user.u_id' => 'pamiec_assigned.pa_user_id',
//                 'pamiec.p_id' => 'pamiec_assigned.pa_pamiec_id',
//                 'image_assigned.pamiec_id' => 'pamiec.p_id',
//                 'image_assigned.img_id' => 'image.id',
//             ),
//             'group' => " pamiec.p_id ORDER BY p_id DESC LIMIT $ob1,$pages",
//         ),0);

        $data['pdo']['left'] = $this->relation_command_full(array(
        		'select'=>'*,pamiec.p_id AS id, COUNT(swieczki.idswieczki) AS ilosc_swieczek',
        		'from' => 'pamiec',
        		'inner' => array(
        				'pamiec_assigned'=>array(
        						'pamiec.p_id' => 'pamiec_assigned.pa_pamiec_id',
        
        				),
        				'user'=>array(
        
        						'pamiec_assigned.pa_user_id' => 'user.u_id',
        				),
        				'image_assigned'=>array(
        						'pamiec.p_id' => 'image_assigned.pamiec_id',
        
        				),
        				'image'=>array(
        
        						'image.id' => 'image_assigned.img_id',
        				),
        		),
        		'left' => array(
        				'swieczki'=>array(
        						'swieczki.p_id'=>'pamiec.p_id',
        				),
        		),
        		// 		`idswieczki`, `p_id`, `u_id`, `data`
        		'group' => "pamiec.p_id ORDER BY pamiec.p_id DESC LIMIT $lewa, $pages",
        ));
         $data['pdo']['right'] = $this->relation_command_full(array(
		'select'=>'*,pamiec.p_id AS id, COUNT(swieczki.idswieczki) AS ilosc_swieczek',
		'from' => 'pamiec',
		'inner' => array(
				'pamiec_assigned'=>array(
				'pamiec.p_id' => 'pamiec_assigned.pa_pamiec_id',
						
				),
				'user'=>array(

						'pamiec_assigned.pa_user_id' => 'user.u_id',
				),
				'image_assigned'=>array(
				'pamiec.p_id' => 'image_assigned.pamiec_id',
						
				),
				'image'=>array(

						'image.id' => 'image_assigned.img_id',
				),
		),
		'left' => array(
				'swieczki'=>array(
						'swieczki.p_id'=>'pamiec.p_id',
				),
		),
// 		`idswieczki`, `p_id`, `u_id`, `data`
		'group' => "pamiec.p_id ORDER BY pamiec.p_id DESC LIMIT $prawa, $pages",
));
        

//         $data['pdo'] = $this->fetch_command(array(
//             'select'=>'*',
//             'from'=>'pamiec',
//             'where'=>"1  ORDER BY `pamiec`.`p_id` DESC limit $ob1,$pages",
//         ));
// if($data['pdo']->rowCount() == 0){
//     Jyll::get_error(404);
// }else{
//     $data['pdo']->fetch();
// }

        return $data;

    }


    public function loadmorecomment($id){

        $pages = '11';
        $p_start = '5';
        $ob1 = ($id*$pages)-$p_start-1-$id;




        $pages = '12';
        $p_start = '10';
        //         $ob1 = ($id*$pages)-$p_start-1-$id;
        $page_start = 10;
        $wybrane = $page_start+($id*20);
        $pages = 10;
        
        $lewa = $wybrane-20;
        $prawa= $wybrane-10;
        
        
        $pagination_max = $this->fetch_command(array(
            'select'=>'*',
            'from'=>'pamiec_komentarze',
            'where'=>"1",
        ),0,1);
        $pg_count = $pagination_max->rowCount();

        $data['max'] = ceil(($pg_count-$p_start)/$pages);


        $data['pdo']['left'] = $this->relation_command(array(
        		'from'=>'pamiec_komentarze',
        		'inner'=>array(
        				'pamiec'
        		),
        		'on'=>array(
        				'pamiec_komentarze.pk_pamiec_id'=>'pamiec.p_id',
        
        		),
        		'where'=>"1 ORDER BY pamiec_komentarze.pk_id DESC limit $lewa,$pages",
        
        ));

        $data['pdo']['right'] = $this->relation_command(array(
        		'from'=>'pamiec_komentarze',
        		'inner'=>array(
        				'pamiec'
        		),
        		'on'=>array(
        				'pamiec_komentarze.pk_pamiec_id'=>'pamiec.p_id',
        
        		),
        		'where'=>"1 ORDER BY pamiec_komentarze.pk_id DESC limit $prawa,$pages",
        
        ));
        
//         if($data['pdo']['left']->rowCount() == 0){
//             Jyll::get_error(404);
//         }else{
//             $data['pdo']['left']->fetch();
//         }
        
//         if($data['pdo']['right']->rowCount() == 0){
//             Jyll::get_error(404);
//         }else{
//             $data['pdo']['right']->fetch();
//         }

        return $data;

    }
}
