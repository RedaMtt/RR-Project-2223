<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

define ('INDEX', true);
require 'inc/dbcon.php';
require 'inc/base.php';

if(!$stmt = $conn->prepare("SELECT Category.Id, Category.Name, SUM(Transactions.Amount) as TotalAmount FROM Transactions JOIN Category ON Transactions.CategoryId = Category.Id WHERE Transactions.UserId = ? GROUP BY Category.Id")){
    die('{"error":"Prepared Statement failed on prepare","errNo":"' . json_encode($conn -> errno) .'","mysqlError":"' . json_encode($conn -> error) .'","status":"fail"}');
}

if(!$stmt -> bind_param("i", $postvars['UserId'])){
    die('{"error":"Prepared Statement bind failed on bind","errNo":"' . json_encode($conn -> errno) .'","mysqlError":"' . json_encode($conn -> error) .'","status":"fail"}');
}
$stmt ->  execute();
$result = $stmt->get_result();

if (!$result) {
    $response['code'] = 7;
    $response['status'] = $api_response_code[$response['code']]['HTTP Response'];
    $response['data'] = $conn->error;
    deliver_response($response);
}

$response['data'] = getJsonObjFromResult($result);
$result->free();
$conn->close();
deliver_JSONresponse($response);

$stmt -> close();
die('{"data":"ok","message":"Record added successfully","status":"ok"}');
?>