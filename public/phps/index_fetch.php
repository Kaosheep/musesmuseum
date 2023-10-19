<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json"); 
try{
	require_once("./connectMuses.php");
    $sql = "select * from news where news_status = 1 order by news_date DESC limit 3"; 
    $news = $pdo->query($sql); 
    $news->execute();
    $newRows = $news->fetchAll(PDO::FETCH_ASSOC);
    


    $sql1 = "select * from products limit 4"; 
    $prods = $pdo->query($sql1);
    $prods->execute();
    $prodRows = $prods->fetchAll(PDO::FETCH_ASSOC);

    $sql2 = "select * from exhibitions order by exh_startdate DESC limit 6"; 
    $exbs = $pdo->query($sql2);
    $exbs->execute();
    $exbRows = $exbs->fetchAll(PDO::FETCH_ASSOC);



    $indexarr=array($newRows,$prodRows,$exbRows);
    echo json_encode($indexarr);

  
} catch (PDOException $e) {
    echo "錯誤行號 : ", $e->getLine(), "<br>";
	  echo "錯誤原因 : ", $e->getMessage(), "<br>";
}