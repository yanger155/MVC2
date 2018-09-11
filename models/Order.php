<?php
namespace models;

class Order extends Base
{
    public function create($money)
    {
        $_SESSION['id'] = '123';
        $flake = new \libs\Snowflake(1023);
        // 将数据插入数据库中
        $stmt = self::$pdo->prepare('INSERT INTO orders(user_id,money,sn) VALUES(?,?,?)');
        $stmt->execute([
            $SESSION['id'],
            $money,
            $flake->nextId()
        ]);

    }
}