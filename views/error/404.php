<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/23/14
 * Time: 11:07 PM
 */


echo '404 ERROR';

header("refresh: 2; url=".HOMEPAGE);

echo '
<script>
setTimeout("location.href='.$l.'",2000);   
</script>';