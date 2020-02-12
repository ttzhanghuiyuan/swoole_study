<?php
//异步文件读取

swoole_async_read(__DIR__.'/1.txt', function($filename,$content){
    echo "{$filename} {$content}";
});
