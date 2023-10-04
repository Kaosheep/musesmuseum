<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');


try {
    switch ($_FILES["image"]["error"]) {

        case UPLOAD_ERR_OK :
            $dir = "../image/news/";
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
            echo json_encode("檔案未選");
            break;
    }
 //連線
 require_once("./connectMuses.php");
    
 //準備sql

 $sql = "update news set news_title=:title, news_content=:content, news_status=:status,news_date=:date,news_img=:image where news_id=:id";

 $news = $pdo->prepare($sql);
 $news->bindValue(":title", $_POST["title"]);
 $news->bindValue(":content", $_POST["content"]);
 $news->bindValue(":status", $_POST["status"]);
 $news->bindValue(":date", $_POST["date"]);
 $news->bindValue(":id", $_POST["id"]);
 $news->bindValue(":image", $filename); //
 //執行sql
 $news->execute();



 
} catch (Exception $e) {
 echo "錯誤行號 : ", $e->getLine(), "<br>";
 echo "錯誤原因 : ", $e->getMessage(), "<br>";
 //echo "系統暫時不能正常運行，請稍後再試<br>";  
}

?>
