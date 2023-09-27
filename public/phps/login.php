<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


$memId = $_POST["memId"];//傳遞的資料用$memId代表
$memPsw = $_POST["memPsw"];

try{
	//連線
	$dbname = "books";
	$user = "root";
	$password = "";

	$dsn = "mysql:host=localhost;port=3306;dbname=$dbname;charset=utf8";

	$options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_CASE=>PDO::CASE_NATURAL);

	//建立pdo物件
	$pdo = new PDO($dsn, $user, $password, $options);
	//在`member`資料表 將來會有memId=:有命名的參數 資料帶入
	$sql = "select * from `member` where memId=:memId and memPsw=:memPsw";
	//將sql指令編譯過
	$member = $pdo->prepare($sql);

	//將資料代入參數中(未知數中);
	$member->bindValue(":memId", $memId);//:memId帶入$memId
	$member->bindValue(":memPsw", $memPsw);

	
	//執行之
	$member->execute();
	if($member->rowCount() === 0){
		echo json_encode(["error" => "帳密錯誤"]);
	} else {
		echo json_encode(["success" => "登入成功"]);
	}
	//若有此人資料，請取回資料並顯示登入者名字
	$memRow = $member->fetch(PDO::FETCH_ASSOC);
}catch(PDOException $e){
	echo "錯誤行號 : ", $e->getLine(), "<br>";
	echo "錯誤原因 : ", $e->getMessage(), "<br>";
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