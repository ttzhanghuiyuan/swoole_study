<?php
//循环执行  定时器

$ms = 2000;
$callback = function($timer_id){
    echo "执行 $timer_id \n";
};
swoole_timer_tick($ms, $callback);


//单次执行  定时器
swoole_timer_after(3000, function(){
    echo "3000 后执行 \n";
});
