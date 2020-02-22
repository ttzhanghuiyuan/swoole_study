<?php
$host = '0.0.0.0';
$port = 9503;
$serv = new swoole_http_server($host, $port);
//获取请求
/*
 * $request 请求信息
 * $response 返回信息
 */
$serv->on('request',function($request,$response){
    var_dump($request);
    $response->header("Content-Type","text/html;charset=utf-8");//设置返回头信息
    $response->end('hello world '.rand(100,999));//发送信息
});

$serv->start();
