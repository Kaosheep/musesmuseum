<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json"); 


$mbr_email = $_POST["mbr_email"];//傳遞的資料用$mbr_email代表
$mbr_psw = $_POST["mbr_psw"];

session_start();
try{
	//連線
	require_once("connectMuses.php");

	//在`member`資料表 將來會有mbr_email=:有命名的參數 資料帶入
	$sql = "select * from `members` where mbr_email=:mbr_email and mbr_psw=:mbr_psw";
	//將sql指令編譯過
	$members = $pdo->prepare($sql);

	//將資料代入參數中(未知數中);
	$members->bindValue(":mbr_email", $mbr_email);//:mbr_email帶入$mbr_email
	$members->bindValue(":mbr_psw", $mbr_psw);
	//執行之
	$members->execute();
	$memRow = $members->fetch(PDO::FETCH_ASSOC);
	if ($members == null) {
		$members["message"] = "無會員資訊";
		$members["successful"] = false;
		echo json_encode($members);
		return;
	  }else{
		echo json_encode($memRow);
	  }
}catch(PDOException $e){
	echo "錯誤行號 : ", $e->getLine();
	echo "錯誤原因 : ", $e->getMessage();
	// echo "系統暫時不能正常運行，請稍後再試<br>";	
	if (isset($yourArray["mbr_email"])) {
		$mbr_email = $yourArray["mbr_email"];
	} else {
		echo "mbr_email 未定义";
	}
}


?>  

<?php 
// echo $memRow["memName"], ", 您好~";
?> 

