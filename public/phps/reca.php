<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json"); 

$recaptcha_secret_key = '6LdRr54oAAAAAKrCuZw2ex77wC5tiEzMAGkb2wpD';
$recaptcha_response = $_POST['token'];

$recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
$recaptcha_data = [
    'secret' => $recaptcha_secret_key,
    'g-recaptcha-response' => $recaptcha_response,
];

$options = [
    'http' => [
        'header' => "Content-type: application/x-www-form-urlencoded",
        'method' => 'POST',
        'content' => http_build_query($recaptcha_data),
    ],
];

$context = stream_context_create($options);
$recaptcha_result = file_get_contents($recaptcha_url, false , $context);
$recaptcha_response_data = json_decode($recaptcha_result, true);

print_r($recaptcha_result); -->

if ($recaptcha_response_data['success']) {
    echo "reCAPTCHA 驗證成功！";
    // 在這裡執行您的其他操作
    // ...
} else {
    echo "reCAPTCHA 驗證失敗！";
    $error_codes = $recaptcha_response_data['error-codes'];
    // 現在$error_codes是一個包含錯誤代碼的數組
    // 可以根據需要處理這些錯誤代碼
    print_r($error_codes); // 這將顯示錯誤代碼
}
?>