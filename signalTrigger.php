<?php
//信号触发

//触发函数
swoole_process::signal(SIGALRM,function(){
    echo "1 \n";
});

//定时信号
swoole_process::alarm(100 * 1000);
