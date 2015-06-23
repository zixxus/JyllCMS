<div class="options_three">
    <div class="noborder3x">
        <?php Login_Model::login_menu(); ?>
    </div>
    <div class="noborder8x">
        <table border="1px">
            <?php
            $user = $this->user;
            $k = 0;
            $l = HOMEPAGE . 'login/user/';
            
            
                    $link = HOMEPAGE.'login/user/edit/'.$user[$k]['u_id'];
//makeform($action = "", $method = "", $id = "", $class = "", $name = "", $onclick = "", $enctype = 0)
        echo Jyll_form::makeform('','post');
            
            
//input($label = "", $type = "", $name = "", $action = "", $id = "",$req = 0) 
        echo Jyll_form::input('email','typ','email','','','1',$user[$k]['u_email']);
        echo Jyll_form::input('password','typ','password','','','1');
        echo Jyll_form::input('name','typ','name','','','1',$user[$k]['u_name']);
        echo Jyll_form::input('surname','typ','surname','','','1',$user[$k]['u_surname']);
        echo Jyll_form::input('tel','typ','tel','','','1',$user[$k]['u_tel']);
        echo Jyll_form::input('own','typ','own','','','1',$user[$k]['u_own']);
        echo Jyll_form::input('active','typ','active','','','1',$user[$k]['u_active']);
        echo Jyll_form::input('Address','typ','address','','','1',$user[$k]['Address']);
        echo Jyll_form::button('Save Changes','submit','change');
        echo Jyll_form::endform();
        
        
            ?>

        </table>

    </div>
    <div class="noborder3x">
        <?php
        if ($_GET['alert']) {
            echo $_GET['alert'];
        }
        ?>
    </div>
</div>
<style>
    #formpostition_t{
        float:left;
    }
    </style>