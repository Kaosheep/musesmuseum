<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/x-www-form-urlencoded");
// try {
//      require_once("./connectMuses.php");

//      $data = json_decode(file_get_contents('php://input'));

//     // 准备 SQL 语句
//     $newOrderSql = "INSERT INTO product_orders (mbr_id, po_date, po_sum, po_addr, po_area, po_city, po_phone, po_name) 
//                     VALUES (:mbr_id, :po_date, :po_sum, :po_addr, :po_area, :po_city, :po_phone, :po_name)";

//     // 使用 PDO 预处理语句
//     $stmt = $pdo->prepare($newOrderSql);

//     // 绑定参数
//     $stmt->bindParam(':mbr_id', $data->mbr_id);
//     $stmt->bindParam(':po_date', $data->po_date);
//     $stmt->bindParam(':po_sum', $data->po_sum);
//     $stmt->bindParam(':po_addr', $data->po_addr);
//     $stmt->bindParam(':po_area', $data->po_area);
//     $stmt->bindParam(':po_city', $data->po_city);
//     $stmt->bindParam(':po_phone', $data->po_phone);
//     $stmt->bindParam(':po_name', $data->po_name);

//     // 执行 SQL 语句
//     $stmt->execute();

//     // 返回成功消息给前端
//     echo json_encode(['message' => '订单已成功插入到数据库']);
// } catch (PDOException $e) {
//     // 处理数据库连接或查询错误
//     http_response_code(500); // 内部服务器错误
//     echo json_encode(['error' => '数据库操作失败：' . $e->getMessage()]);
// }

try {
    // 建立数据库连接（请替换以下信息为您的实际数据库信息）
         require_once("./connectMuses.php");
        
            // 准备 SQL 语句
            $newOrderSql = "INSERT INTO product_orders (mbr_id, po_date, po_sum, po_addr, po_area, po_city, po_phone, po_name) 
                            VALUES (:mbr_id, :po_date, :po_sum, :po_addr, :po_area, :po_city, :po_phone, :po_name)";
        
            // 使用 PDO 预处理语句
            $stmt = $pdo->prepare($newOrderSql);
        
            // 绑定参数
            $stmt->bindValue(':mbr_id', $_POST["mbr_id"], PDO::PARAM_STR);
            $stmt->bindValue(':po_date', $_POST["po_date"], PDO::PARAM_STR);
            $stmt->bindValue(':po_sum', $_POST["po_sum"], PDO::PARAM_STR);
            $stmt->bindValue(':po_addr', $_POST["po_addr"], PDO::PARAM_STR);
            $stmt->bindValue(':po_area', $_POST["po_area"], PDO::PARAM_STR);
            $stmt->bindValue(':po_city', $_POST["po_city"], PDO::PARAM_STR);
            $stmt->bindValue(':po_phone', $_POST["po_phone"], PDO::PARAM_STR);
            $stmt->bindValue(':po_name', $_POST["po_name"], PDO::PARAM_STR);
        
            // 执行 SQL 语句
            $stmt->execute();
        
            // 返回成功消息给前端
            echo json_encode(['message' => '订单已成功插入到数据库']);
        } catch (PDOException $e) {
            // 处理数据库连接或查询错误
            http_response_code(500); // 内部服务器错误
            echo json_encode(['error' => '数据库操作失败：' . $e->getMessage()]);
        }
        
?>

