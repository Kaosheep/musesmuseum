<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: multipart/form-data"); 
try {
    $dbname = "musesmuseum";
    $user = "root";
    $password = "";
    $dsn = "mysql:host=localhost;port=3306;dbname=musesmuseum;charset=UTF8";	
    $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_CASE => PDO::CASE_NATURAL];
    $pdo = new PDO($dsn, $user, $password, $options);

    $data = json_decode(file_get_contents('php://input'));

    $id = isset($data->data->id) ? $data->data->id: '';
    $title = $data->data->title;
    $content = $data->data->content;
    $status = $data->data->status;

    if(empty($id)){  
        $date = $data->data->date;
        $sql = "insert into news (news_title, news_content, news_status, news_date, news_img) values (:title, :content, :status, :date, :image)";
        $newStmt = $pdo->prepare($sql);
       
        $newStmt->bindValue(":date", $date);
        
    }else{
        $sql = "update news set `news_title` = :title, `news_content` = :content, `news_status` = :status `news_img` = :image where `news_id` = :newsid";
        $newStmt = $pdo->prepare($sql);
        $newStmt->bindValue(":newsid", $id);
    }
   
    $newStmt->bindValue(":title", $title);
    $newStmt->bindValue(":content", $content);
    $newStmt->bindValue(":status", $status);
    $newStmt->bindValue(":image", $filename);
    $result = $newStmt->execute();
    // 返回 JSON 響應
    $response = ["message" => "新增成功"];

    echo json_encode($response);
} catch (PDOException $e) {
    // 返回 JSON 錯誤響應
    $errorResponse = ["message" => "新增失敗：" . $e->getMessage()];
    echo json_encode($errorResponse);
}

// try {
//     $dbname = "chd103_g1";
//     $user = "root";
//     $password = "";
//     $dsn = "mysql:host=localhost;port=3306;dbname=chd103_g1;charset=UTF8";	
//     $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_CASE => PDO::CASE_NATURAL];
//     $pdo = new PDO($dsn, $user, $password, $options);

//     $data = json_decode(file_get_contents('php://input'));
//     $title = $data->data->title;
//     $content = $data->data->content;
//     $status = $data->data->status;
//     $date = $data->data->date;

//     $sql = "insert into news (news_title, news_content, news_status, news_date) values (:title, :content, :status, :date)";
//     $newStmt = $pdo->prepare($sql);
//     $newStmt->bindValue(":title", $title);
//     $newStmt->bindValue(":content", $content);
//     $newStmt->bindValue(":status", $status);
//     $newStmt->bindValue(":date", $date);

//     $newStmt->execute();
    
//     // 返回 JSON 響應
//     $response = ["message" => "新增成功"];
//     echo json_encode($response);
// } catch (PDOException $e) {
//     // 返回 JSON 錯誤響應
//     $errorResponse = ["error" => "新增失敗：" . $e->getMessage()];
//     echo json_encode($errorResponse);
// }

?>

