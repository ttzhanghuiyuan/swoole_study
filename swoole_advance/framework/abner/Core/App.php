<?php

namespace Advance;
use Swoole\Http\Server;
class App
{
	public function run()
	{
		$http = new Server('0.0.0.0', 9501);
		$http->on('request', function($request, $response){
			
			$pathInfo = $request->server['path_info'];
			$method = $request->server['request_method'];
			//分发路由
			\Six\Core\Route\Route::dispatch(method, pathInfo);
			
			$response->end("<h1>abner start </h1>");
		});
		
		$http->start();  //服务器启动
	}
	
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
				
				//类注解
				$classDocComment = $reflect->getDocComment();
				
				//正则匹配
				preg_match('/@Controller\((.*)\)/i', $classDocComment, $prefix);
				//清除引号及匹配
				$prefix = str_replace("\"",'',explode("=",$prefix[1])[1]);

                foreach($reflect->getMethods() as $method){
                    //方法注解
					$methodDocComment = $reflect->getDocComment();
				
					//正则匹配
					preg_match('/@Controller\((.*)\)/i', $methodDocComment, $suffix);
					//清除引号及匹配
					$suffix = str_replace("\"",'',explode("=",$suffix[1])[1]);
					
					//组装路由信息
					$routeInfo = [
						'routePath' => $prefix.'/'.$suffix,
						'handle' => $reflect->getName()."@".$method->getName(),
					];
					
					\Six\Core\Route\Route::addRoute('GET', $routeInfo);
                }
            }
        }
    }
}
