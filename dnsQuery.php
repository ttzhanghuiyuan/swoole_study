<?php

//dns查询

//执行dns查询
$domain = 'www.baidu.com';
swoole_async_dns_lookup($domain, function($host, $ip){
    echo "$host $ip";
});
