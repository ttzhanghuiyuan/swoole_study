<?php
//创建tcp客户端
$sock_type = SWOOLE_SOCK_TCP;
$client = new swoole_client($sock_type);

//连接服务器
$host = '192.168.120.1';
$port = 8080;
$timeout = 5;
$client->connect($host, $port, $timeout) or die('连接失败');

//向服务器发送数据
$data = 'hello world';
$client->send($data) or die('数据发送失败');


//服务器接收数据
$data = $client->recv();


if($data){
    var_dump($data);
}else{
    echo '接收失败';
}

$client->close();
