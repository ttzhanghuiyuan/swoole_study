<?php
//创建异步tcp客户端
$sock_type = SWOOLE_SOCK_TCP;
$sync_type = SWOOLE_SOCK_ASYNC;
$client = new swoole_client($sock_type, $sync_type);

//注册连接成功的回调
$client->on('connect', function($cli){
    $cli->send("hello \n");
});


//注册数据接收$cli:服务信息 $data:数据
$client->on('receive',function($cli, $data){
    echo "data:{$data}";
});

//注册连接失败
$client->on('error', function($cli){
    echo "失败 \n";
});

//注册关闭函数
$client->on('close',function($cli){
    echo "关闭 \n";
});

$host = '192.168.120.1';
$port = 8080;
$timeout = 10;
$client->connect($host, $port, $timeout);
