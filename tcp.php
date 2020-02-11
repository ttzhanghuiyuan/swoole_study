<?php
//创建服务器
$host = '0.0.0.0'; //string
$port = 9501; //int
$serv = new swoole_server($host, $port);
/*
 * $host:监听地址 127.0.0.1 本地ip
 *               192.168.50.133 监听对应外网ip
 *               0.0.0.0
 * ipv4/ipv6 ::0
 * 
 * 
 * $port:端口号
 * 1024以下需要root权限
 * 9501
 * 
 * $mode:SWOOLE_PROCESS 多进程的方式
 * $sock_type:SWOOLE_SOCK_TCP 默认tcp服务
 */

//使用
//bool $swoole_server->on(string $event,mixed $callback);
/*
 * $event：
 * connect 当连接的时候 $serv:服务器信息 $fd：客户端信息
 * receive 当接受到数据 $serv:服务器信息 $fd：客户端信息 $from_id:客户id $data:数据
 * close 关闭连接
 */
$serv->on('connect', function($serv, $fd){
    echo "建立连接成功\n";
});

$serv->on('receive', function($serv, $fd, $from_id, $data){
    echo "接收到数据\n";
    var_dump($data);
});

$serv->on('close',function($serv, $fd){
    echo "连接关闭\n";
});


$serv->start(); //启动服务器


