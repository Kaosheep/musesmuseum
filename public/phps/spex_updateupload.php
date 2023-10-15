<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');


try {
   
    if(isset($_FILES["image"])){
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
                echo json_encode("更新成功");    
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
                $filename = $_POST["image"];
                break;
        }
    }else{
        $filename = $_POST["image"];
        echo json_encode("更新成功"); 
    }
        
  

 //連線
 require_once("./connectMuses.php");
    
 //準備sql

 $sql = "update exhibitions set exh_name=:name, exh_desc=:desc, exh_status=:status, exh_startdate=:startdate, exh_enddate=:enddate, exh_loc=:loc, exh_img=:img where exh_id=:id";

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