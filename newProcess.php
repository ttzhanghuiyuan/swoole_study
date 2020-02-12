<?php
//进程创建

//进程对应执行的函数
function doProcess(swoole_process $worker){
    echo "pid",$worker->pid,"\n";
    sleep(10);
}

//创建进程

$process = new swoole_process($callback, $redirect_stdin_stdout, $create_pipe);
$pid = $process->start();

$process = new swoole_process($callback, $redirect_stdin_stdout, $create_pipe);
$pid = $process->start();

$process = new swoole_process($callback, $redirect_stdin_stdout, $create_pipe);
$pid = $process->start();


//等待结束
swoole_process::wait();

