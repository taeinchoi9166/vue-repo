<?php
    $data = $_POST['todo'];

   $res = ['success' =>  true, 'msg' => $data];

    header('Access-Control-Allow-Origin: *');
    echo json_encode($res,JSON_UNESCAPED_UNICODE);
?>
