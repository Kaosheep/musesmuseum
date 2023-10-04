<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json"); 




session_start();
try{
    // $mbr_email = $_POST["mbr_email"];
    // $mbr_psw = $_POST["mbr_psw"];
    if (isset($_POST["mbr_email"])) {
        $mbr_email = $_POST["mbr_email"];
    } else {
        // 处理未定义的情况，或者设置默认值
        $mbr_email = ""; // 或者其他默认值
    }
	//連線
	require_once("connectMuses.php");

	//在`member`資料表 將來會有mbr_email=:有命名的參數 資料帶入
	$sql = "select * from `members` where `mbr_id`= 'M0001' ";
	//將sql指令編譯過
	$members = $pdo->query($sql);
    if ( $members->rowCount()=== 0) { //查無資料
        $result = ["error" => false, "msg" => "無資料", "members" => "{}"];
        echo json_encode($result);
      } else { 
        $membersRows = $members->fetchAll(PDO::FETCH_ASSOC);
        $result = ["error" => false, "msg" => "取得資料", "members" => $membersRows];
        // echo json_encode($result);//送出json字串
      }
    // if($result->num_rows > 0){
    //    while($row = $result->fetch_assoc()){
    //     echo $mbr_email;
    //    }
    // }

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

    }catch(PDOException $e){
        echo "錯誤行號 : ", $e->getLine();
        echo "錯誤原因 : ", $e->getMessage();
}


?>  
