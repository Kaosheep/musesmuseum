<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json"); 
switch ($_FILES["upFile"]["error"]) {
    case UPLOAD_ERR_OK :
        $dir = "../image/news";    
        if(file_exists($dir) === false) {
            //make directory
            mkdir($dir);
        }
        
        $from = $_FILES['upFile']['tmp_name'] ; //含路徑(比如 C:/wamp64/tmp/phpBC72.xx)
        $to = $dir . $_FILES['upFile']['name'] ; //只含檔案名稱, 可以自己設定所要的資料夾名稱
        copy($from , $to);
        echo "上傳成功~<br>";    
        break;
    case UPLOAD_ERR_INI_SIZE :
        echo "上傳檔案太大, 不得超過", ini_get("upload_max_filesize"), "<br>";
        break;
    case UPLOAD_ERR_FORM_SIZE :
        echo "上傳檔案太大, 不得超過", $_POST["MAX_FILE_SIZE"], "位元組<br>";
        break;
    case UPLOAD_ERR_PARTIAL :
        echo "上傳檔案不完整, 請再試一次<br>";
        break;
    case UPLOAD_ERR_NO_FILE :
        echo "檔案未選<br>";
        break;
}

?>