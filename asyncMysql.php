<?php

//异步mysql操作


//实例化资源
$db = new swoole_mysql();

$config = [
    'host' => '106.53.95.41',
    'user' => 'root',
    'password' => 'w63eXEhdBWLr6cik',
    'database' => 'online',
    'charset' => 'utf8',
];

//连接数据
$db->connect($config,function($db,$r){
    if($r == false){
        var_dump($db->connect_errno, $db->connect_error);
        die("失败");
    }

    //成功的逻辑
    $sql = ' show tables';
    $db->query($sql, function(swoole_mysql $db, $r){
        if($r == false){
            var_dump($db->error);
            die("操作失败");
        }elseif($r == false){
            var_dump($db->affected_rows, $db->insert_id);
        }

        var_dump($r);
        $db->close();
    });

});
