<?php

$host = '0.0.0.0';
$port = 9502;
$mode = SWOOLE_PROCESS;  //多进程模式
$sock_type = SWOOLE_SOCK_UDP; //udp服务
$serv = new swoole_server($host, $port, $mode, $sock_type);

//监听数据接受的事件
/*
 * $serv 服务信息
 * $data 数据,接收到的数据
 * $fd 客户端信息
 */
$serv->on('packet',function($serv,$data,$fd){
    //发送数据到相应客户端,反馈信息
    $ip = $fd['address'];
        $port = $fd['port'];
        $data = "Server: {$data}";
        $serv->sendto($ip, $port, $data);
        var_dump($fd);
});

$serv->start(); //启动服务
