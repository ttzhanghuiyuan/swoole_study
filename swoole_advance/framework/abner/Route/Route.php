<?php
namespace Six\Core\Route;



class Route{
	private static $route;
	//���·��
	public static function addRoute($method, $routeInfo)
	{
		self::$route[$method][] = $routeInfo;
	}
	
	//�ַ�·��
	public static function addRoute($method, $routeInfo)
	{
		switch($method){
			case 'GET':
			foreach(self::$route[$method] as $v){
				//�ж�·���Ƿ���ע��·����
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