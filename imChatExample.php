<?php

//im聊天案例

//服务器代码
//创建websocket服务器
$ws = new swoole_websocket_server('0.0.0.0',9502);


//on函数 open message close
//open
$ws->on('open',function($ws, $request){
    echo "新用户 {$request->fd} 加入。 \n";
    $GLOBALS['fd'][$request->fd]['id'] = $request->fd; //设置用户id
    $GLOBALS['fd'][$request->fd]['name'] = '匿名用户'; //设置用户名 
});

//message
$ws->on('message',function($ws, $request){
    $msg = $GLOBALS['fd'][$request->fd]['name'].':'.$request->data."\n";
        if(strstr($request->data, "#name#")){//用户设置昵称
            $GLOBALS['fd'][$request->fd]['name'] = str_replace("#name#", '', $request->data);
        }else{  //进行用户信息发送
            foreach($GLOBALS['fd'] as $i){
                $ws->push($i['id'], $msg);
            }
        }
});

//colse
$ws->on('close',function($ws, $request){
    echo "客户端-{$request} 断开连接 \n";
    unset($GLOBALS['fd'][$request]); //清除连接池
});

$ws->start();
