<?php
include('sql_connection.php');
function runSelectSql($s){
	$result = array();
	$conn = new mysqli ("139.224.133.40", "root","19911116","webChat");
	$ret = mysqli_query($conn,$s);
	while ($rows = mysqli_fetch_array($ret, MYSQLI_ASSOC)) {
		$result[] = $rows;
	}
	// return json_encode($result);
	return $result;
}
function runUpdateInsertSql($s){
	$conn = new mysqli ("139.224.133.40", "root","19911116","webChat");
	$ret = mysqli_query($conn,$s);
	// return "更新成功！";
}
$sql = "SELECT user_pwd, user_name FROM user";
// $pwd = runSelectSql($sql);
// echo $pwd[0]['user_pwd'];
?>