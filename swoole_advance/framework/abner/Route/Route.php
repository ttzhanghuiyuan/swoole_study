<?php
namespace Six\Core\Route;



class Route{
	private static $route;
	//添加路由
	public static function addRoute($method, $routeInfo)
	{
		self::$route[$method][] = $routeInfo;
	}
	
	//分发路由
	public static function addRoute($method, $routeInfo)
	{
		switch($method){
			case 'GET':
			foreach(self::$route[$method] as $v){
				//判断路径是否在注册路由上
				if($pathInfo == $v['routePath']){
					$handle = explode('@',$v['handle']);
					$class = $handle[0];
					$method = $handle[1];
					return (new $class)->$method();
				}
			}
			break;
			case 'POST':
			break;
		}
	}
}

?>