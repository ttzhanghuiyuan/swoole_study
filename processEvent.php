<?php
//进程事件

$workers = []; //进程池
$worker_num = 3; //创建进程的数据量


for($i=0; $i < $worker_num; $i++){
    $process = new swoole_process('doProcess'); //创建单独新进程
    $pid = $process->start(); //创建进程,并获取进程id

    $workers[$pid] = $process; //存入进程数组
}

//进程对应执行的函数
function doProcess(swoole_process $process){
    $process->write("PID: {$process->pid}");  //到子进程写入信息
    echo "写入信息: {$process->pid} {$process->callback}";
}

//添加进程事件，向每个子进程添加需要执行的动作
foreach($workers as $process){
    //添加
    $sock = $process->pipe;
    swoole_event_add($sock, function($pipe) use ($process){
        $data = $process->read();  //能否读取数据
            echo "接收到: {$data} \n";
    });
}

