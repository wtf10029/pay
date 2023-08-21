<?php



return [
    'alipay' => [
        'app_id' => '',
        'ali_public_key' => '',
        'driver' => Wtf10029\Pay\AliPay::class,
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
        'driver' => Wtf10029\Pay\WeChatPay::class,
        'key' => '',
        'notify_url' =>'',
        'cert_client' => __DIR__ . '/resources/wechat_pay/apiclient_cert.pem',
        'cert_key' => __DIR__ . '/resources/wechat_pay/apiclient_key.pem',
        'log' => [
            'file' => __DIR__ . '/runtime/logs/wechat_pay.log',
        ],
    ],
    'bf' => [
        'app_id' =>'',
        'mch_id' => '',
        'driver' => Wtf10029\Pay\BFPay::class,
        'key' => '',
        'notify_url' =>'',
        'cert_client' => __DIR__ . '/resources/wechat_pay/apiclient_cert.pem',
        'cert_key' => __DIR__ . '/resources/wechat_pay/apiclient_key.pem',
        'log' => [
            'file' => __DIR__ . '/runtime/logs/wechat_pay.log',
        ],
    ],
];
