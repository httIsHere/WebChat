<?php
//开启session--相当于cookie？
session_start();
?>

<?php
	require_once('commonFunction.php');
	include("page_switching.php");

    $user=$_GET["useremail"]; 
	$password=$_GET["userpwd"];
	$userkind = $_GET['userkind'];

    //随机生成accessID
    $accessid = rand();

    $_SESSION["accessID"] = $accessid;
    $_SESSION["useremail"] = $user;

	if ($userkind == "1")
		 {
		 	$sql = "SELECT id,admin_pwd FROM admin WHERE admin_name = '$user'";
		 }
	else
		 {
		 	$sql = "SELECT user_pwd, user_name FROM user WHERE user_email = '$user'";
		 }

    //查询记录
	$result = runSelectSql($sql);
	$pwd=$result[0]["user_pwd"];
	// echo $pwd;

	if ($result)
		 {
		 	if (($userkind == '1' && $rows["admin_pwd"] == $password)||($userkind == '0' && $pwd == $password))
		 	{
				if($userkind == '1' ){
				page_redirect(false,"admin.html","");
			    }
				else{
					echo "登录成功！";
					//对该用户嵌入accessID
					$_SESSION["username"] = $result[0]["user_name"];
					$sql = "UPDATE user SET user_accessid = '$accessid'  WHERE user_email = '$user'";
					$result = runUpdateInsertSql($sql);
					$url = "../user_index.html";
					page_redirect(false,"../user_index.html","");
				}
		 	}
		 	else
		 	{
		 		page_redirect(true,"","password is wrong!");
		 	}
		 }
		 else
		 {
			   page_redirect(true,"","UserEmail is not available!");
		 }

?>
