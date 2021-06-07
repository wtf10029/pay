<?php



return [
    'alipay' => [
        'app_id' => '',
        'ali_public_key' => '',
        'driver' => Wtf10029\Pay\AliPay::class,
        'private_key' =>'',
        'log' => [
            'file' => BASE_PATH . '/runtime/logs/alipay.log',
        ],
        'mode' => 'dev',
        'notify_url' => '',
        'return_url' => '',
    ],
    'wechat' => [
        'app_id' =>'',
        'mch_id' => '',
        'driver' => Wtf10029\Pay\WeChatPay::class,
        'key' => '',
        'notify_url' =>'',
        'cert_client' => BASE_PATH . '/resources/wechat_pay/apiclient_cert.pem',
        'cert_key' => BASE_PATH . '/resources/wechat_pay/apiclient_key.pem',
        'log' => [
            'file' => BASE_PATH . '/runtime/logs/wechat_pay.log',
        ],
    ],
];