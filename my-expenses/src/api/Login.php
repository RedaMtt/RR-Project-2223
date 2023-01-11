<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

define ('INDEX', true);
require 'inc/dbcon.php';
require 'inc/base.php';

if(!$stmt = $conn->prepare("Select Username, Email, Password, Id from User WHERE Email = ? and Password = ?")){
    die('{"error":"Prepared Statement failed on prepare","errNo":"' . json_encode($conn -> errno) .'","mysqlError":"' . json_encode($conn -> error) .'","status":"fail"}');
}

if(!$stmt -> bind_param("ss", $postvars['Email'], $postvars['Password'])){
    die('{"error":"Prepared Statement bind failed on bind","errNo":"' . json_encode($conn -> errno) .'","mysqlError":"' . json_encode($conn -> error) .'","status":"fail"}');
}
$stmt -> execute();

if($conn->affected_rows == 0) {
    $stmt -> close();
    die('{"error":"Prepared Statement failed on execute : no rows affected","errNo":"' . json_encode($conn -> errno) .'","mysqlError":"' . json_encode($conn -> error) .'","status":"fail"}');
}
// added
$stmt -> close();
die('{"data":"ok","message":"Record added successfully","status":"ok"}');
?>