<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');

try {
    // 檢查問題(question)和答案(answer)是否都不為空
    if (!empty($_POST["question"]) && !empty($_POST["ans"])) {
        require_once("./connectMuses.php"); // 連線資料庫

        // 準備 SQL 語句
        $sql = "UPDATE faq SET faq_question = :question, faq_ans = :ans WHERE faq_id = :id";

        // 使用 PDO 預處理語句
        $faq = $pdo->prepare($sql);
        
        // 綁定參數
        $faq->bindValue(":question", $_POST["question"]);
        $faq->bindValue(":ans", $_POST["ans"]);
        $faq->bindValue(":id", $_POST["id"]);

        // 執行 SQL 更新
        $faq->execute();

        // 如果問題更新成功，設置回應消息為 "更新成功"
        $responseMessage = "更新成功";
    } else {
        // 如果問題或答案為空，設置回應消息為 "問題或答案不能為空"
        $responseMessage = "問題或答案不能為空";
    }
    
    echo json_encode($responseMessage);
} catch (Exception $e) {
    echo "錯誤行號 : ", $e->getLine(), "<br>";
    echo "錯誤原因 : ", $e->getMessage(), "<br>";
    //echo "系統暫時不能正常運行，請稍後再試<br>";  
}
?>
