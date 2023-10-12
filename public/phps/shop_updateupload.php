<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');


try {
    switch ($_FILES["image"]["error"]) {

        case UPLOAD_ERR_OK :
            $dir = "../image/productimage/";
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

 $sql = "UPDATE products SET prod_name=:name, prod_desc=:desc, prod_img=:img, prod_fixedprice=:fixedprice, prod_spec=:spec, prod_sellingprice=:sellingprice, prod_status=:status, prod_kind=:kind WHERE prod_id=:id";

 $prods = $pdo->prepare($sql);
 $prods->bindValue(":name", $_POST["name"]);
 $prods->bindValue(":desc", $_POST["desc"]);
 $prods->bindValue(":status", $_POST["status"]);
 $prods->bindValue(":fixedprice", $_POST["fixedprice"]);
 $prods->bindValue(":id", $_POST["id"]);
 $prods->bindValue(":spec", $_POST["spec"]);
 $prods->bindValue(":sellingprice", $_POST["sellingprice"]);
 $prods->bindValue(":kind", $_POST["kind"]);
 $prods->bindValue(":image", $filename); 
 //執行sql
 $prods->execute();
 
} catch (Exception $e) {
 echo "錯誤行號 : ", $e->getLine(), "<br>";
 echo "錯誤原因 : ", $e->getMessage(), "<br>";
}

?>
