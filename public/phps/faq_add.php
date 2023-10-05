<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: multipart/form-data"); 
try {
    $dbname = "musesmuseum";//數據庫名稱
    $user = "root";//數據庫使用者名稱
    $password = "";//數據庫密碼
    $dsn = "mysql:host=localhost;port=3306;dbname=musesmuseum;charset=UTF8";//數據源名稱	
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,//設置錯誤處理模式為異常模式，以便捕獲和處理數據庫的異常
        PDO::ATTR_CASE => PDO::CASE_NATURAL];//列名字不改變大小
    $pdo = new PDO($dsn, $user, $password, $options);//創建PDO實力並連結到數據庫

    $data = file_get_contents('php://input');
    $dataObject = json_decode($data);
    $id = isset($dataObject->id) ? $dataObject->id : '';
    $question = $dataObject->question;
    $ans = $dataObject->ans;

    // $data = file_get_contents('php://input');
    // $dataObject = json_decode($data);
    // $id = isset($dataObject->id) ? $dataObject->id : '';
    // $question = $dataObject->question;
    // $ans = $dataObject->ans;


    if(empty($id)){  //檢查數據是否為空
        // $date = $data->data->date;
        $sql = "insert into faq (faq_question, faq_ans) values (:question, :ans)";//可以修改
        // $faqStmt = $pdo->prepare($sql);
        // $faqStmt->bindValue(":date", $date);
        
    }else{
        $sql = "update faq set `faq_question` = :question, `faq_ans` = :ans where `faq_id` = :faqid";
        // $faqStmt = $pdo->prepare($sql);
        // $faqStmt->bindValue(":faqid", $id);
    }
    $faqStmt = $pdo->prepare($sql);
    $faqStmt->bindValue(":question", $question);
    $faqStmt->bindValue(":ans", $ans);
    if (!empty($id)) {
        // 如果是更新操作，绑定 FAQ ID
        $faqStmt->bindValue(":faqid", $id);
    }
    $result = $faqStmt->execute();
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
//     $faqStmt = $pdo->prepare($sql);
//     $faqStmt->bindValue(":title", $title);
//     $faqStmt->bindValue(":content", $content);
//     $faqStmt->bindValue(":status", $status);
//     $faqStmt->bindValue(":date", $date);

//     $faqStmt->execute();
    
//     // 返回 JSON 響應
//     $response = ["message" => "新增成功"];
//     echo json_encode($response);
// } catch (PDOException $e) {
//     // 返回 JSON 錯誤響應
//     $errorResponse = ["error" => "新增失敗：" . $e->getMessage()];
//     echo json_encode($errorResponse);
// }

?>

