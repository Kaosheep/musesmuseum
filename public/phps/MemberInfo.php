<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json"); 

$mbr_email = $_POST["mbr_email"];
$mbr_psw = $_POST["mbr_psw"];

// $mbrInfoArray = array(
//     "mbr_name" = $_POST["mbr_name"];
//     "mbr_birth" = $_POST["mbr_birth"];
//     "mbr_email" = $_POST["mbr_email"];
//     "mbr_phone" = $_POST["mbr_phone"];
//     "mbr_addr" = $_POST["mbr_addr"];

// )



session_start();
try{
	//連線
	require_once("connectMuses.php");

	//在`member`資料表 將來會有mbr_email=:有命名的參數 資料帶入
	$sql = "select * from `members` where `mbr_id`= 'M0001' ";
	//將sql指令編譯過
	$members = $pdo->query($sql);
    if($result->num_rows > 0){
       while($row = $result->fetch_assoc()){
        echo $mbr_email;
       }
    }

	//將資料代入參數中(未知數中);

	// $members->bindValue(":mbr_email", $mbr_email);//:mbr_email帶入$mbr_email
	// $members->bindValue(":mbr_name", $mbr_name);
    // $members->bindValue(":mbr_birt", $mbr_birt);
    // $members->bindValue(":mbr_phone", $mbr_phone);
    // $members->bindValue(":mbr_addr", $mbr_addr);

    
	//執行之
	$members->execute();
    $mbrInfoArray = $members->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($mbrInfoArray);
	// if($members->rowCount() === 0){//查無此人, 帳密錯誤
	// 	echo json_encode(["error" => "帳密錯誤"]);
	// } else {
	// 	echo json_encode(["success" => "登入成功"]);
	// }
	//若有此人資料，請取回資料並顯示登入者名字
	// $memRow = $members->fetch(PDO::FETCH_ASSOC);
	// if ($members == null) {
	// 	$members["message"] = "無會員資訊";
	// 	$members["successful"] = false;
	// 	echo json_encode($members);
	// 	return;
	//   }else{
	// 	echo json_encode($memRow);
	//   }
    }catch(PDOException $e){
        echo "錯誤行號 : ", $e->getLine();
        echo "錯誤原因 : ", $e->getMessage();
}

// require_once("booksHeader.inc.php");
?>  

<?php 
// echo $memRow["memName"], ", 您好~";
?> 

<?php 
// require_once("booksFooter.inc.php");

?>