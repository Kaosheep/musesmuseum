<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

try{
    $dbname = "chd103_g1";
    $user = "root";
    $password = "";
    $dsn = "mysql:host=localhost;port=3306;dbname=chd103_g1;charset=UTF8";	
    $options = [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_CASE=>PDO::CASE_NATURAL];
    $pdo = new PDO( $dsn, $user, $password, $options);

    $data = json_decode(file_get_contents('php://input'));

    $sql = "insert into news (news_title, news_content, news_status) values (:aaa, :bbb, :ccc)";
    $empStmt = $pdo->prepare( $sql );
    $empStmt->bindValue(":aaa", $data->title);
    $empStmt->bindValue(":bbb", $data->content);
    $empStmt->bindValue(":ccc", $data->status);

    $empStmt->execute();
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute();
    
    // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // echo json_encode($result);

}catch (PDOException $e){
    echo "錯誤行號:", $e ->getLine(),"<br>";
    echo "錯誤原因:", $e ->getMessage(),"<br>";
}

