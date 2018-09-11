<?php
namespace controllers;

use Yansongda\Pay\Pay;

class AlipayController
{
    public $config = [
        'app_id' => '2016091700531136 ',
        // 支付成功后台通知地址
        'notify_url' => 'http://requestbin.fullcontact.com/r6s2a1r6',
        // 支付成功后跳转地址
        'return_url' => 'http://localhost:9999/alipay/return',
        // 支付宝公钥
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA8+3rZQAMKZwRhYMD2gFDH80I118G8h54DRUJdMuyhbd1clY/AOQVrknOLBiLrJr6z20HxJVHsR4uHpHij9EbUwwBEBahlbUYduE7wdZ0n8agqROw9YGsNPzJDU2PPK3mA4r/q95LpUmOzgvIA80Rql2o7ttUmOLm8oE/vdrmv1vYa+SNz7FFzGsNLDlPr4GgJQ0qlXZ31x6VUIey0DHm+wK8TTlE+/J2O6NUSykB4J17s5pmB2gIO0/LGQ8uffItR5aokusObUAOOyrvAsvr5iPRSKD2kOqBjGrLaENfAyHibXStlb7IyHu17mdsnsJOOPTUuCsY8ggB1JV7IsSiVQIDAQAB',
        // 商户应用密钥
        'private_key' => 'MIIEpAIBAAKCAQEAukKbstmAnJqYORRQL0Gj3a/L5sSglxZ1nI+KuSC0ipKh/uPXsIOVgUTd0nHLe8N9HBACAp8iRAxPzbAAUqRWdDG1/9t5z3OweGiWFVO63gvgRXb23QpjJwxvazk8FFJLo5R84pHMn/aOJ7XVR27sOywiI2sOdgjUy0UUx0A8Y0DnM+62REnr3+pkeL/mlFImffVbQpF3CdJs7KvWjrViV+9f65trU/RnVhpJyGhOCa7cjFey556ESN3zKkAR64eA5q1nmFBFSTnkM5iSyvL5OWT44G2rsceKNsd0hwH+0sx05ki6Rw7Fj57VxHPybkcMzJHrdAb3HGTkgOYaWPVBRwIDAQABAoIBAQCVjsxUZL8XgC7AjmYAO/WnGPRhvPqxtrADYWLjWbZ+GlWHRE25hz6xyKlQxFy+aO75bIUgs8Sg3T3rC+qGcTyWGiBobEO35s4JMPlp8Ix4pRKU1HxOanvJK/v/Hbr3Gklv9Nf+WVH0E9Z7Xk7+B7wZm0tiIyE+d8Ld4P9ZKmQS0PhUYLyn82QlXYkZujn6yeknjAWUiBLd3FXjOE0UpPnhdJB97cuKKNdnNToJmNV5MKq9l9VzHtbBzsMz4Xh9RvluudN4XF0SE8FiCG2WsI+l45yjvCflnXXZHvRZvHd+tjfEfgzVzijylwsWVo+x1YstLleJaT6owoiLY4izNHHRAoGBAOc9pTYCl1sCmgyG0G8s4ir0iy6LPhFz0WSP+S/3EIODHTLpNUfr74xsFObOlyY6fnE4RNlLYVNgSvevX8LNHGCIfX4mZunIdjoTy7yQUypGMWfN23bMxi29QKA+50EqzWPhsRCPmobJyS6Z3eB7GFCocL3JJ4J3/2z20CprYFIpAoGBAM40CR2Ed3GOTmjyPEXwUtGDMRrsQaNtcf1Q+kdL03GDMUXmbg0RQiYW7MUDE0mDM0yvDpuUXculCd9633hzilSkPmh0PhraRILfCTwuDYq5VV1c67X7onTjZm6pmcTp5DDnOD5JwMZDa1Rj2fVI3q9I6iYzgumOxrouvTU0N8XvAoGAWgUkkM8XbwWnROMit3UIouJKYJcyVYb56CUoQ+Txl9DuCAjDhjkyKz9UL7oTG33ABYF7RABVZijhZmTuaZ6Bwo7AE+ENRUuVwuw77y9cQOPMjfWUzz3OlLXNN9TlH/hytsSAssrExF4/pJWfy6kAAT5hjXCGogLm+9tllG3ytGkCgYEAphF4aeJehAD1G0ZDzpvfR0ceTC2MK3+gd0A5YSQrVVcwXrhXV4TXvm9mHsD8To8wyIiP/jK+W50+V1LRGWQMO2DPtjYwMlYpKTFRcbsxQtFCc9+7IiRX0UW3IFbNNa6dDdmaDWg+ri5sCVollosqdQcHNN71hv5rBFVSIsA8TtcCgYBvi2d9ZcEGpCRdaCpImlZFgrdYg2mOK2fd3XgWvGKa0et3DmpwhMHRAsPKR1+gtBUgAeV8ALY1W+Rv9KeinjFcFV0qRmYdom4wCSLQGG+ykrJeBYcMZGhm73BQhc2I73b/MhWV8Cn3uw1795aajQX7lJs3EpFwloSO/8T7sikjjg==',
        // 沙箱模式（可选）
        'mode' => 'dev',
    ];
    // 发起支付
    public function pay()
    {
        $order = [
            'out_trade_no' => time(),    // 本地订单ID
            'total_amount' => '0.01',    // 支付金额
            'subject' => 'test subject', // 支付标题
        ];

        $alipay = Pay::alipay($this->config)->web($order);

        $alipay->send();
    }
    // 支付完成跳回
    public function return()
    {
        $data = Pay::alipay($this->config)->verify(); // 是的，验签就这么简单！
        echo '<h1>支付成功！</h1> <hr>';
        var_dump( $data->all() );
    }
    // 接收支付完成的通知
    public function notify()
    {
        $alipay = Pay::alipay($this->config);
        try{
            $data = $alipay->verify(); // 是的，验签就这么简单！
            // 这里需要对 trade_status 进行判断及其它逻辑进行判断，在支付宝的业务通知中，只有交易通知状态为 TRADE_SUCCESS 或 TRADE_FINISHED 时，支付宝才会认定为买家付款成功。
            // 1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号；
            // 2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额）；
            echo '订单ID：'.$data->out_trade_no ."\r\n";
            echo '支付总金额：'.$data->total_amount ."\r\n";
            echo '支付状态：'.$data->trade_status ."\r\n";
            echo '商户ID：'.$data->seller_id ."\r\n";
            echo 'app_id：'.$data->app_id ."\r\n";
        } catch (\Exception $e) {
            echo '失败：';
            var_dump($e->getMessage()) ;
        }
        // 返回响应
        $alipay->success()->send();
    }

    // 退款
    public function refund()
    {
        // 生成唯一退款订单号
        $refundNo = md5( rand(1,99999) . microtime() );
        try{
            // 退款
            $ret = Pay::alipay($this->config)->refund([
                'out_trade_no' => '1536227456',    // 之前的订单流水号
                'refund_amount' => 0.01,              // 退款金额，单位元
                'out_request_no' => $refundNo,     // 退款订单号
            ]);
            if($ret->code == 10000)
            {
                echo '退款成功！';
            }
        }
        catch(\Exception $e)
        {
            var_dump( $e->getMessage() );
        }
    }


    


}