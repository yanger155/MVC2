<?php 
namespace controllers;

// 用哪个模型就引哪个模型
use models\User;
use models\Order;

class UserController
{

    // public function hello(){
    //     // 取数据 模型
    //     $user = new User;
    //     $name = $user->getName();

    //     // 加载视图   视图
    //     view('blog.test',[
    //         'name' => $name
    //     ]);
    // }
    
    
    // 充值视图 
    public function charge()
    {
        view('user.charge');
    }

    // 处理充值表单
    public function docharge()
    {
        $money = $_POST['money'];

        $order = new Order;
        // 向数据库中插入订单
        $order->create($money);

        message('充值订单一生成，请立即支付！',2,'/user/orders');
    }
    
}
