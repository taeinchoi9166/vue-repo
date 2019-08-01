<?php
    $list = [
        ['id' => 1, 'name' => '하스하기', 'date' => '2019-08-02', 'isComplete' => false],
        ['id' => 2, 'name' => '안녕하살법', 'date' => '2019-08-02', 'isComplete' => false],
        ['id' => 3, 'name' => '우왂', 'date' => '2019-08-02', 'isComplete' => false],
        ['id' => 4, 'name' => '으아아아아', 'date' => '2019-08-02', 'isComplete' => false]
    ];


    //var_dump($list);

    echo json_encode($list, JSON_UNESCAPED_UNICODE);

    header('Access-Control-Allow-Origin: *');
?>