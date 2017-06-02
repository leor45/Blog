<?php

if(!isset($_SESSION)){
    session_start();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Blog</title>
</head>
<?php  
if (!isset($_SESSION['login'])) {
	echo "<frameset>"
  		."<frame src=pages/principal.php>"
		."</frameset>";
}else{
		echo "<frameset>"
  		."<frame src=pages/principal2.php>"
		."</frameset>";
}

?>

</html>