<?php
if (Session::get(sessionname) == FALSE):
    ?>

    <menus id="left">
        <a id="firstleft" class="ajaxLink" href='<?php echo HOMEPAGE; ?>homepage/index'><p>Strona Domowa</p></a>
        <a id="secoundleft" class="ajaxLink" href='<?php echo HOMEPAGE; ?>login'><p>Zaloguj</p></a>
        <a id="secoundleft" class="ajaxLink" href='<?php echo HOMEPAGE; ?>login/register'><p>Rejestracja</p></a>
        <a href=''></a>
    </menus>


    <menus id="right">

        <a class="ajaxLink" href='<?php echo HOMEPAGE; ?>login/register'>Zarejestruj</a>
        <a class="ajaxLink" href='<?php echo HOMEPAGE; ?>login/register'>Zarejestruj</a>
        <a class="ajaxLink" href='<?php echo HOMEPAGE; ?>login/register'>Zarejestruj</a>
        <a class="ajaxLink" href='<?php echo HOMEPAGE; ?>login/register'>Zarejestruj</a>
        <a class="ajaxLink" href='<?php echo HOMEPAGE; ?>login/register'>Zarejestruj</a>
    </menus>

<?php

else:

    ?>


    <menus id="left">
        <a id="firstleft" class="ajaxLink" href='<?php echo HOMEPAGE; ?>homepage/index'><p>Strona Domowa</p></a>
        <a id="secoundleft" class="ajaxLink"
           href='<?php echo HOMEPAGE; ?>post/index/<?php echo Session::get('userid'); ?>'><p>Posty</p></a>
        <a id="secoundleft" class="ajaxLink" onclick="openlightbox('<?php echo HOMEPAGE; ?>dashboard/lightbox')"
           href='#'><p>Moje Konto</p></a>
        <a id="secoundleft" class="ajaxLink" href='<?php echo HOMEPAGE; ?>login/logout'><p>Wyloguj</p></a>
    </menus>
<?php
endif;
