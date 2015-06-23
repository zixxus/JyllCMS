<div class="options_two">
    <div class="noborder13x">
<?php

if($_GET['alert']){
	echo $_GET['alert'];
}
$link = HOMEPAGE.'login/create';
//makeform($action = "", $method = "", $id = "", $class = "", $name = "", $onclick = "", $enctype = 0)
echo Jyll_form::makeform($link,'post');
//input($label = "", $type = "", $name = "", $action = "", $id = "")
echo Jyll_form::input('Email*','email','email','','','1');
echo Jyll_form::input('Password*','password','pass','','','1');
echo Jyll_form::input('Login*','text','u_username','','','1');
echo Jyll_form::input('Name','text','u_name');
echo Jyll_form::input('Surname','text','u_surname');
echo Jyll_form::input('Phone','tel','u_tel');
echo Jyll_form::input('Address','text','address');
echo Jyll_form::input('Regulations*','checkbox','regulamin','','','1');
echo Jyll_form::button('Register','submit','create');
echo Jyll_form::endform();


    ?>
    </div>
</div>