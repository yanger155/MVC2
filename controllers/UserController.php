<?php 
namespace controllers;

// 用哪个模型就引哪个模型
use models\User;

class UserController
{

    public function hello(){
        // 取数据 模型
        $user = new User;
        $name = $user->getName();

        // 加载视图   视图
        view('blog.test',[
            'name' => $name
        ]);
    }
    
}
