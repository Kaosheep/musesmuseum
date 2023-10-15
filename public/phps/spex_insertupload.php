<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');


try {
    switch ($_FILES["image"]["error"]) {

    case UPLOAD_ERR_OK :
        $dir = "../image/exhi/";
        if( !file_exists($dir) ){
            mkdir($dir);
        }
                
        $from = $_FILES["image"]["tmp_name"];
    
        $filename = basename($_FILES['image']['name']);
    
        $to = $dir . basename($_FILES['image']['name']);
        copy($from, $to);
        echo json_encode("上傳成功");    
        break;
    case UPLOAD_ERR_INI_SIZE :
        echo json_encode("上傳檔案太大, 不得超過", ini_get("upload_max_filesize"));
        break;
    case UPLOAD_ERR_FORM_SIZE :
        echo json_encode("上傳檔案太大, 不得超過", $_POST["MAX_FILE_SIZE"], "位元組");
        break;
    case UPLOAD_ERR_PARTIAL :
        echo json_encode("上傳檔案不完整, 請再試一次");
        break;
    case UPLOAD_ERR_NO_FILE :
        echo json_encode("檔案未選");
        break;

}
 //連線
 require_once("./connectMuses.php");
    
 //準備sql
 $sql = "insert into exhibitions (exh_name, exh_desc, exh_status, exh_startdate, exh_enddate, exh_loc, exh_img) values (:name, :desc, :status, :startdate, :enddate, :loc, :img)";

 $news = $pdo->prepare($sql);
 $news->bindValue(":name", $_POST["name"]);
 $news->bindValue(":desc", $_POST["desc"]);
 $news->bindValue(":status", $_POST["status"]);
 $news->bindValue(":startdate", $_POST["startdate"]);
 $news->bindValue(":enddate", $_POST["enddate"]);
 $news->bindValue(":loc", $_POST["loc"]);
 $news->bindValue(":img", $filename); //
 //執行sql
 $news->execute();



 
} catch (Exception $e) {
 echo "錯誤行號 : ", $e->getLine(), "<br>";
 echo "錯誤原因 : ", $e->getMessage(), "<br>";
 //echo "系統暫時不能正常運行，請稍後再試<br>";  
}

?>
