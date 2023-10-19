<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header("Content-Type: application/x-www-form-urlencoded");
    
$headers = array(
        'Content-Type: multipart/form-data',
        'Authorization: Bearer zNLXjw48wHijTie5nS7KvXQCqDrstBKHiMgR5XOt4f8'
    );
    try {
        require_once("./connectMuses.php");

        if (isset($_POST["mbr_id"])) {
            $mbr_id = $_POST["mbr_id"];
            $sql = "SELECT po_id FROM product_orders WHERE mbr_id=:mbr_id ORDER BY po_date DESC, po_id DESC LIMIT 1";
            $ordersID = $pdo->prepare($sql);
        
            $ordersID->bindParam(':mbr_id', $mbr_id);  
                    
            $ordersID->execute();
      
            // 如果找得資料，取回資料，送出json
            if ($ordersID->rowCount() === 0) {
                echo "查無資料";
            } else {
                $po_id = $ordersID->fetchAll(PDO::FETCH_ASSOC);

                $message = array('message' => <<<EOL
                \n訂單編號: {$po_id[0]["po_id"]} \n新訂單已成立請至後臺管理確認\n訂單狀態。
            EOL,
                );
                
             
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "https://notify-api.line.me/api/notify");
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $message);
            
                $result = curl_exec($ch);
                curl_close($ch);
                
            }
        }
        
        
    } catch (PDOException $e) {
        $result = ["error"=>$e->getMessage()];
        echo json_encode($result);
    }
?>


