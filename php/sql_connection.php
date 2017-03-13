<?php
	global $conn;
	$url = "139.224.133.40";
	$conn = new mysqli ($url, "root","19911116","webChat");
	if (mysqli_connect_error())
	{
		//header("Content-type: login/html; charset=utf-8"); 
	  printf("Connect faile: %s\n",mysqli_connect_error());
	  exit;
	}
	$sql = "set names 'utf8'";
    mysqli_query($conn,$sql);
?>