<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json"); 




session_start();
try{
        //連線
	require_once("connectMuses.php");

   //gpt提供
    // if (isset($_POST["mbr_email"])) {
    //     $mbr_email = $_POST["mbr_email"];
    //     print_r($mbr_email);

    //     // 使用预处理语句来根据会员电子邮件获取数据
    //     $sql = "SELECT * FROM `members` WHERE `mbr_email` = :mbr_email";
    //     $stmt = $pdo->prepare($sql);
    //     $stmt->bindParam(":mbr_email", $mbr_email, PDO::PARAM_STR);
    //     $stmt->execute();

    //     // 检查是否找到会员信息
    //     if ($stmt->rowCount() > 0) {
    //         $mbrInfoArray = $stmt->fetch(PDO::FETCH_ASSOC);
    //         $result = ["error" => false, "msg" => "取得資料", "members" => $mbrInfoArray];
    //         echo json_encode($result);
    //     } else {
    //         $result = ["error" => false, "msg" => "無資料", "members" => "{}"];
    //         echo json_encode($result);
    //     }
    // } else {
    //     $result = ["error" => true, "msg" => "未提供会员电子邮件"];
    //     echo json_encode($result);
    // }
    // } catch (PDOException $e) {
    // echo "錯誤行號 : ", $e->getLine();
    // echo "錯誤原因 : ", $e->getMessage();
	//在`member`資料表 將來會有mbr_email=:有命名的參數 資料帶入
	$sql = "select * from `members` where `mbr_email` = :mbr_email"; //where mbr_email=:mbr_email
	//將sql指令編譯過
	$members = $pdo->query($sql);
    if ( $members->rowCount()=== 0) { //查無資料
        $result = ["error" => false, "msg" => "無資料", "members" => "{}"];
        echo json_encode($result);
      } else { 
        $membersRows = $members->fetch(PDO::FETCH_ASSOC);
        $result = ["error" => false, "msg" => "取得資料", "members" => $membersRows];
        // echo json_encode($result);//送出json字串
      }
      if (isset($_POST["mbr_email"])) {
        $mbr_email = $_POST["mbr_email"];
    } else {
      
        $mbr_email = ""; 
    }


	//將資料代入參數中(未知數中);
    // $members->bindValue(":mbr_email", $_POST["mbr_email"]);
	// $members->bindValue("mbr_email", $mbr_email);//:mbr_email帶入$mbr_email
	// $members->bindValue("mbr_name", $mbr_name);
    // $members->bindValue("mbr_birt", $mbr_birt);
    // $members->bindValue("mbr_phone", $mbr_phone);
    // $members->bindValue("mbr_addr", $mbr_addr);

	//執行之
	$members->execute();
    $mbrInfoArray = $members->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($mbrInfoArray);

    }catch(PDOException $e){
        echo "錯誤行號 : ", $e->getLine();
        echo "錯誤原因 : ", $e->getMessage();
}


?>  
