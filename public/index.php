<?php

session_start();


//定义全局的常量保存根目录 
// dirname(__FILE__);得到的是文件所在层目录名
// D:/www/MVC2/public/index.php
define('Root',dirname(dirname(__FILE__)).'/');
// $root = str_replace('\\','/',Root);
// echo $root;
// die;

// 得到D:/www/MVC2
//define('Root',dirname(__FILE__).'/../');
// str_replace('\\','/',Root);

// 引入 composer  自动加载文件
require(Root.'vendor/autoload.php');


// 加载类文件
// 类的自动加载机制   
function autoload($class)
{
    $path = str_replace('\\','/',$class);
    require(Root.$path.'.php');
}

// (一 new 就加载)
spl_autoload_register('autoload');


// $userController = new controllers\UserController;
// $userController -> hello();


// 加载视图文件
// 第二个参数可传可不传
function view($viewFileName,$data=[])
{
    // 把数组里的东西拿出来（解压）
    // 执行了这个函数之后，把数组中的数据解压出来当成变量来用
    extract($data);
    // 把 . 替换成 /
    $path = str_replace('.','/',$viewFileName).'.html';
    require(Root.'views/' . $path);

}

// echo '<pre>';
// var_dump($_SERVER);
// ["PATH_INFO"]=>
// string(12) "/index/index"
// die;

if(isset($_SERVER['PATH_INFO']))
{
    $pathInfo = $_SERVER['PATH_INFO'];
    $pathInfo = explode('/',$pathInfo);
    $controller = ucfirst($pathInfo[1]).'Controller';
    $action = $pathInfo[2];
}
else
{
    $controller = 'IndexController';
    $action = 'index';
}

$fullController = 'controllers\\'.$controller;

$_C = new $fullController;
$_C ->$action();

/***********MVC基本流程完成**********/

function message($type,$url,$message,$second= 5 )
{
    // ==0的时候。 当前页提示信息，页面跳转
    if(type==1)
    {
        
    }
   
}