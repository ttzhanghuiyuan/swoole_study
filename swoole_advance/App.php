<?php

namespace Advance;
use Swoole\Http\Server;
class App
{
    public function init(){

        define('ROOT_PATH', dirname(dirname(__DIR__)));
        define('APP_PATH', ROOT_PATH.'/application');
    }

    public function loadAnnotations(){
        $dir = glob(APP_PATH.'/api/controller/*');

        if(!empty($dirs)){
            foreach($dirs as $file){
                $obj = new TestController();
                $reflect = new \ReflectionClass($obj);

                foreach($reflect->getMethods() as $method){
                    
                }
            }
        }
    }
}
