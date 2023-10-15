<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');


try {
        if(isset($_FILES["img"])){
            switch ($_FILES["img"]["error"]) {    
                case UPLOAD_ERR_OK :
                    $dir = "../image/productimage/";
                    if( !file_exists($dir) ){
                        mkdir($dir);
                    }                            
                    $from = $_FILES["img"]["tmp_name"];
                
                    $filename = basename($_FILES['img']['name']);
                
                    $to = $dir . basename($_FILES['img']['name']);
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
                    $filename = $_POST["img"];
                    break;
            }
        }else{
            $filename = $_POST["img"];
            echo json_encode("更新成功"); 
        }
 //連線
 require_once("./connectMuses.php");
    
 //準備sql

 $sql = "UPDATE products SET prod_name=:name, prod_desc=:desc, prod_img=:img, prod_fixedprice=:fixedprice, prod_spec=:spec, prod_sellingprice=:sellingprice, prod_status=:status, prod_kind=:kind WHERE prod_id=:id";

 $prod = $pdo->prepare($sql);
 $prod->bindValue(":name", $_POST["name"]);
 $prod->bindValue(":desc", $_POST["desc"]);
 $prod->bindValue(":status", $_POST["status"]);
 $prod->bindValue(":fixedprice", $_POST["fixedprice"]);
 $prod->bindValue(":id", $_POST["id"]);
 $prod->bindValue(":spec", $_POST["spec"]);
 $prod->bindValue(":sellingprice", $_POST["sellingprice"]);
 $prod->bindValue(":kind", $_POST["kind"]);
 $prod->bindValue(":img", $filename); 
 //執行sql
 $prod->execute();
 
} catch (Exception $e) {
 echo "錯誤行號 : ", $e->getLine(), "<br>";
 echo "錯誤原因 : ", $e->getMessage(), "<br>";
}

?>
