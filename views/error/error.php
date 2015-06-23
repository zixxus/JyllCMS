
<?php 
$l = HOMEPAGE;

header("refresh: 2; url=".$l);
echo '
<script>
setTimeout("location.href='.$l.'",2000);   
</script>';
?>
<h1>ERROR.php </h1>