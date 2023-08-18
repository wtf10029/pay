<?php


namespace Wtf10029\Pay;


class PayFactory
{

    protected $drivers = [];

    protected $configs = [
        'alipay' => [
            'app_id' => '',
            'ali_public_key' => '',
            'driver' => AliPay::class,
            'private_key' =>'',
            'log' => [
                'file' => __DIR__ . '/runtime/logs/alipay.log',
            ],
            'mode' => 'dev',
            'cert_client' => __DIR__ . '/resources/wechat_pay/apiclient_cert.pem',
            'cert_key' => __DIR__ . '/resources/wechat_pay/apiclient_key.pem',
            'notify_url' => '',
            'return_url' => '',
        ],
        'wechat' => [
            'app_id' =>'',
            'mch_id' => '',
            'driver' =>WeChatPay::class,
            'key' => '',
            'notify_url' =>'',
            'cert_client' => __DIR__ . '/resources/wechat_pay/apiclient_cert.pem',
            'cert_key' => __DIR__ . '/resources/wechat_pay/apiclient_key.pem',
            'log' => [
                'file' => __DIR__ . '/runtime/logs/wechat_pay.log',
            ],
        ],
    ];

    public function __construct($config = [])
    {

        if ($config){
            $this->configs = array_merge($this->configs, $config);
        }

//        $this->configs = require dirname(__DIR__) . '/config/pay.php';

        foreach ($this->configs as $key => $item) {
            $driverClass = $item['driver'];

            if (!class_exists($driverClass)) {
                throw new \Exception(sprintf('[Error] class %s is invalid.', $driverClass));
            }

            $driver = new $driverClass($item);
            if (!$driver instanceof PayInterface) {
                throw new \Exception(sprintf('[Error] class %s is not instanceof %s.', $driverClass,
                    PayInterface::class));
            }
            $this->drivers[$key] = $driver;
        }
    }

    public function __get($name)
    {
        return $this->get($name);
    }


    public function get(string $name)
    {
        $driver = $this->drivers[$name] ?? null;
        if (!$driver || !$driver instanceof PayInterface) {
            throw new Exception(sprintf('[Error]  %s is a invalid driver.', $name));
        }

        return $driver;
    }



    public function setConfig($name, $value)
    {
        return $this->configs[$name] = $value;
    }

}
