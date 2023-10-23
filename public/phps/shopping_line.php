<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header("Content-Type: application/x-www-form-urlencoded");
    // HAqUiurjOQfdlnXkTfbnSJ9odzlS1dOuOKsf526SSPe test
    // zNLXjw48wHijTie5nS7KvXQCqDrstBKHiMgR5XOt4f8 online

    
$headers = array(
        'Content-Type: multipart/form-data',
        'Authorization: Bearer zNLXjw48wHijTie5nS7KvXQCqDrstBKHiMgR5XOt4f8'
    );
    try {
        require_once("./connectMuses.php");

        if (isset($_POST["mbr_id"])) {
            $mbr_id = $_POST["mbr_id"];
            $sql = "SELECT * FROM product_orders WHERE mbr_id=:mbr_id ORDER BY po_date DESC, po_id DESC LIMIT 1";
            $ordersID = $pdo->prepare($sql);
        
            $ordersID->bindParam(':mbr_id', $mbr_id);  
                    
            $ordersID->execute();
      
            // 如果找得資料，取回資料，送出json
            if ($ordersID->rowCount() === 0) {
                echo "查無資料";
            } else {
                $po_id = $ordersID->fetchAll(PDO::FETCH_ASSOC);


                $sql = "SELECT * FROM product_details JOIN products ON product_details.prod_id = products.prod_id WHERE po_id=:po_id";
                $detail = $pdo->prepare($sql);
                
                $detail->bindParam(':po_id', $po_id[0]["po_id"]);  
                $detail->execute();
                $Alldeatil = $detail->fetchAll(PDO::FETCH_ASSOC);
                

                $return_array['status'] = 'SUCCESS';
                $return_array['message'] = '新增訂單成功';
                $message = PHP_EOL . $return_array['message'] . 
                PHP_EOL . '會員名稱:' . $po_id[0]["po_name"] .
                PHP_EOL . '會員電話:' . $po_id[0]["po_phone"] .
                PHP_EOL . '訂單編號:' . $po_id[0]["po_id"] .
                PHP_EOL . '訂購內容:' . product_string($Alldeatil) .
                PHP_EOL . '總金額:' . $po_id[0]["po_sum"];
                $message = array(
                    'message' => $message
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

    function product_string($details){
        $str = '';
        foreach($details as $key => $detail){
            $str .= PHP_EOL;
            $str .= $detail['prod_name'];
            $str .= ' * ';
            $str .= $detail['prod_dlt_qty'];
        }
        return $str;
    }
?>