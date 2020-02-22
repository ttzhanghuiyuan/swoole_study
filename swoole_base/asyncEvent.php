<?php
//异步事件
$remote_socket = 'tcp://www.qq.com:80';
$fp = stream_socket_client($remote_socket, $errno, $errstr, 30);
$string = 'GET / HTTP/1.1\r\nHost: www.qq.com\r\n\r\n';
fwrite($fp, $string);


//添加异步事件
swoole_event_add($fp, function($fp){
    $resp = fread($fp, 8192);
        var_dump($resp);
        swoole_event_del($fp);
        fclose($fp);
});

echo "这个先执行完成\n";
