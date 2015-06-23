<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/3/14
 * Time: 11:57 PM
 */

echo '<div id="alert"> Supplemented bad form ! </div>';


$l = HOMEPAGE.loginpage;
header("refresh: 1; url=".$l);
echo '

		<script>
$(document).ready( function() {

	$("#alert").fadeIn(500, function () {
    
		
	url = "'.$l.'";
			
			setInterval(function(){
			 $( location ).attr("href", url);
 }, 1000);
			
});
	
});
			</script>
		
';


// exit();

?>
