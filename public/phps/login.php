<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json"); 


$memId = $_POST["memId"];//傳遞的資料用$memId代表
$memPsw = $_POST["memPsw"];

session_start();
try{
	//連線
	require_once("connectMuses.php");

	//在`member`資料表 將來會有memId=:有命名的參數 資料帶入
	$sql = "select * from `members` where memId=:memId and memPsw=:memPsw";
	//將sql指令編譯過
	$members = $pdo->prepare($sql);

	//將資料代入參數中(未知數中);
	$members->bindValue(":memId", $memId);//:memId帶入$memId
	$members->bindValue(":memPsw", $memPsw);
	//執行之
	$members->execute();


	if($members->rowCount() === 0){//查無此人, 帳密錯誤
		echo json_encode(["error" => "帳密錯誤"]);
	} else {
		echo json_encode(["success" => "登入成功"]);
	}
	//若有此人資料，請取回資料並顯示登入者名字
	$memRow = $members->fetch(PDO::FETCH_ASSOC);
	if ($members == null) {
		$members["message"] = "無會員資訊";
		$members["successful"] = false;
		echo json_encode($members);
		return;
	  }
}catch(PDOException $e){
	echo "錯誤行號 : ", $e->getLine();
	echo "錯誤原因 : ", $e->getMessage();
	// echo "系統暫時不能正常運行，請稍後再試<br>";	
	
}

// require_once("booksHeader.inc.php");
?>  

<?php 
// echo $memRow["memName"], ", 您好~";
?> 

<?php 
// require_once("booksFooter.inc.php");

?>