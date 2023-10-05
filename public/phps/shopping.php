<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header("Content-Type: application/json");

    try {
        require_once("./connectMuses.php");

        $countySql = "SELECT * FROM counties";        
        $counties = $pdo->prepare($countySql);
        
        $counties->execute();

        //如果找得資料，取回資料，送出json
        if ($counties->rowCount() === 0) {
            echo "查無資料";
        } else {
            $countyRow = $counties->fetchAll(PDO::FETCH_ASSOC);
            $result[] = $countyRow;            
        }
        
        if (isset($_POST["countyId"])) {
            $county_id = $_POST["countyId"];
                       
            $districtSql = "SELECT * FROM districts WHERE county_id=:county_id";
            $districts = $pdo->prepare($districtSql);

            $districts->bindParam(':county_id', $county_id, PDO::PARAM_INT);           
                
            $districts->execute();

            //如果找得資料，取回資料，送出json
            if ($districts->rowCount() === 0) {
                echo "查無資料";
            } else {
                $districtRow = $districts->fetchAll(PDO::FETCH_ASSOC);
                                
                //送出json字串
                $result[] = $districtRow;
            }
        }
        
        echo json_encode($result);

    } catch (PDOException $e) {
        $result = ["error"=>$e->getMessage()];
        echo json_encode($result);
    }
?>