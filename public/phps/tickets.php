<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// 数据库连接信息
$dbname = "musesmuseum";
$user = "root";
$password = "";
$dsn = "mysql:host=localhost;port=3306;dbname=musesmuseum;charset=UTF8";	

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT tkt_id, tkt_name, tkt_price FROM tickets WHERE tkt_status = 1";
    $stmt = $pdo->query($sql);
    $tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($tickets) {
        echo json_encode($tickets);
    } else {
        echo json_encode(array('error' => 'No data found'));
    }
} catch (PDOException $e) {
    die("数据库连接失败: " . $e->getMessage());
}
?>