<div class="options_three">
    <div class="noborder13x">
        <?php
        if ($_GET['alert']) {
            echo $_GET['alert'];
        }
        $link = HOMEPAGE . 'login/check_login';
//makeform($action = "", $method = "", $id = "", $class = "", $name = "", $onclick = "", $enctype = 0)
        echo Jyll_form::makeform($link, 'post');
//input($label = "", $type = "", $name = "", $action = "", $id = "")
        echo Jyll_form::input('Email*', 'email', 'login', '', '', '1');
        echo Jyll_form::input('Password*', 'password', 'password', '', '', '1');
        echo Jyll_form::button('login', 'submit', 'sub');
        echo Jyll_form::endform();
        ?>
    </div>
    <div class="noborder3x">
                    <?php echo Jyll_menu::make('Register', 'login/register','nologged'); ?>
    </div>
</div>
