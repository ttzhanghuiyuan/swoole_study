<?php

//异步文件写入

$content = 'hello world';
swoole_async_writefile('2.txt', $content, function($filename){
    echo $filename;
},0);
