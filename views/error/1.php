<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/3/14
 * Time: 11:57 PM
 */

echo '<div id="alert"> YOU ARE NOT LOGIN </div>';


$l = $this->address;
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

header("refresh: 2; url=".$l);


?>
