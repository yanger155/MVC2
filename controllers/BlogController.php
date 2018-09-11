<?php
namespace controllers;

use PDO;

class BlogController
{

    // 日志列表
    public function search()
    {
        // 取日志的数据
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=blog','root','');

        $pdo->exec("SET NAMES utf8");


        /*************************搜索************************/
        $where = 1;
        $value = [];

        // 关键词
        // 为空为假，所以等于空可以省略不写
        if(isset($_GET['keyword']) && $_GET['keyword'])
        {
             // 'select * from blogs where title like "%我%" OR content like "%我%"';
             $where .= " AND (title LIKE ? OR content LIKE ?)";
             $value[] = '%'.$_GET['keyword'].'%';
             $value[] = '%'.$_GET['keyword'].'%';

        }

        // 开始时间搜索
        if(isset($_GET['start_time']) && $_GET['start_time'])
        {
            // ** 时间必须用字符串的形式。。
            $where .= " AND created_at >= ?";
            $value[] = $_GET['start_time'];
        }

        // 结束时间搜索
        if(isset($_GET['end_time']) && $_GET['end_time'])
        {
            $where .= " AND created_at <= ?";
            $value[] = $_GET['end_time'];
        }

        // 是否显示
        if(isset($_GET['is_show']) && ($_GET['is_show']==1 || $_GET['is_show']==='0'))
        {
            $where .= " AND is_show = ?";
            $value[] = $_GET['is_show'];
        }

        /****************************排序**************************/
        $odby = 'created_at';
        $odway = 'desc';

        if(isset($_GET['odby']) && $_GET['odby'] =='display')
        {
            $odby = 'display';
        }

        if(isset($_GET['odway']) && $_GET['odway'] =='acs')
        {
            $odway = 'asc';
        }
        /*************************sql语句**************************/ 
        // $stmt = $pdo->query("SELECT * FROM blogs WHERE $where");
        $stmt = $pdo->prepare("SELECT * FROM blogs WHERE $where");
        $stmt->execute($value);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // echo "SELECT * FROM blogs $where";
        // die;
        // 获取数据

        // echo "<pre>";
        // var_dump($data);

        // 显示视图
        view('blog.index',[
            'data' => $data,
        ]);
    }

    
}