<?php
session_start();


if(isset($_SESSION['adminuser']))
{
	unset ($_SESSION['adminuser']);
	header('Location:\kr/loginfile.php');
}


if(isset($_SESSION['voterlog']))
{
	unset ($_SESSION['voterlog']);
	header('Location:\kr/');
}

header('Location:\kr/');

?>