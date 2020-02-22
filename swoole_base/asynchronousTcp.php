<?php
$host = '0.0.0.0';
$port = 9505;
$serv = new swoole_server($host, $port);

//设置异步 进程工作数量
$setting = [
    'task_worker_num' => 4,
];
$serv->set($setting);


//投递异步任务
$serv->on('receive', function($serv, $fd, $from_id, $data){
    $task_id = $serv->task($data);  //异步id
        echo "异步ID:{$task_id} \n";
});

//处理 异步任务
$serv->on('task',function($serv, $task_id, $from_id, $data){
        echo "异步ID:{$task_id} \n";
        $serv->finish("{$data} -> OK");
});


//处理结果
$serv->on('finish',function($serv, $task_id, $data){
    echo "执行完成";
});

$serv->start();
