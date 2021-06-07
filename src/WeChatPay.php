<?php


namespace Wtf10029\Pay;


use Yansongda\Pay\Pay;

class WeChatPay implements PayInterFace
{
    private $pay;

    public function __construct($config)
    {
        $this->pay = Pay::wechat($config);
    }


    public function pay($order,$scene)
    {
        switch ($scene){

            case 'miniapp':
                $result = $this->pay->miniapp($order);
                break;
            case 'app':
                $result = $this->pay->app($order);
                break;
            case 'mp':
                $result = $this->pay->mp($order);
                break;
            default:
                // 二维码内容： $qr = $result->code_url;
                $result = $this->pay->scan($order);

        }
        // laravel 框架中请直接 return
        return $result;

    }


    public function refund($order)
    {
       return $this->pay->refund($order);

    }


    public function verify($data = null)
    {
        return $this->pay->verify($data);
    }


    public function success()
    {
        return $this->pay->success();
    }


}