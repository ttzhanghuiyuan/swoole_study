<?php
//进程队列通信


$workers = [];  //进程仓库
$worker_num = 2; //最大进程数


for($i=0; $i < $worker_num; $i++){
    $callback = 'doProcess';
    $redirect_stdin_stdout = false;
    $create_pipe = false;
    $process = new swoole_process($callback, $redirect_stdin_stdout, $create_pipe);//创建单独新进程
    $process->useQueue; //开启队列，类似与全局函数
    $pid = $process->start(); //创建进程,并获取进程id

    $workers[$pid] = $process; //存入进程数组
}

//进程执行函数
function doProcess(swoole_process $process){
    $recv = $process->pop();  //8192
    echo "从主进程获取到的数据: {$recv} \n";
    sleep(5);
    $process->exit(0);
}

//向子进程添加数据
foreach($workers as $pid => $process){
    $process->push("hello 子进程 {$pid}");
}

//等待子进程结束,回收资源
for($i=0; $i < $worker_num; $i++){
    $ret = swoole_process::wait();  //等待执行完成
    $pid = $ret['pid'];
    unset($workers[$pid]);
    echo "子进程退出 {$pid} \n";
}
